<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\TransactionItemModel;
use App\Libraries\QrCodeService;
use App\Libraries\SmsService;
use CodeIgniter\HTTP\ResponseInterface;

class PosController extends BaseController
{
    protected $productModel;
    protected $transactionModel;
    protected $transactionItemModel;
    protected $qrCodeService;
    protected $smsService;
    protected $session;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->transactionItemModel = new TransactionItemModel();
        $this->qrCodeService = new QrCodeService();
        $this->smsService = new SmsService();
        $this->session = session();
    }
    
    /**
     * POS Dashboard
     */
    public function dashboard()
    {
        $data = [
            'title' => 'POS Dashboard',
            'recentTransactions' => $this->transactionModel->getRecentTransactions(5),
            'dailySales' => $this->transactionModel->getDailySales(),
            'lowStockProducts' => $this->productModel->getLowStockProducts(5),
            'cart' => $this->session->get('cart') ?? []
        ];
        
        return view('pos/dashboard', $data);
    }
    
    /**
     * QR Code Scanner
     */
    public function scanner()
    {
        $data = [
            'title' => 'QR Code Scanner',
            'cart' => $this->session->get('cart') ?? []
        ];
        
        return view('pos/scanner', $data);
    }
    
    /**
     * Process scanned QR code
     */
    public function processScan()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }
        
        $qrData = $this->request->getPost('qr_data');
        
        if (!$qrData) {
            return $this->response->setJSON(['success' => false, 'message' => 'No QR data provided']);
        }
        
        // Decode QR data
        $productData = $this->qrCodeService->decodeQrData($qrData);
        
        if (!$productData) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid QR code']);
        }
        
        // Verify product exists and is active
        $product = $this->productModel->getProduct($productData['id']);
        
        if (!$product) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product not found or inactive']);
        }
        
        // Check stock availability
        if (!$this->productModel->hasStock($product['id'], 1)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product out of stock']);
        }
        
        // Add to cart
        $this->addToCart($product);
        
        return $this->response->setJSON([
            'success' => true, 
            'message' => 'Product added to cart',
            'product' => $product,
            'cart_count' => count($this->session->get('cart') ?? [])
        ]);
    }
    
    /**
     * Add product to cart
     */
    private function addToCart($product, $quantity = 1)
    {
        $cart = $this->session->get('cart') ?? [];
        $productId = $product['id'];
        
        if (isset($cart[$productId])) {
            // Check if we can add more quantity
            $newQuantity = $cart[$productId]['quantity'] + $quantity;
            if ($this->productModel->hasStock($productId, $newQuantity)) {
                $cart[$productId]['quantity'] = $newQuantity;
                $cart[$productId]['subtotal'] = $cart[$productId]['price'] * $newQuantity;
            } else {
                return false; // Not enough stock
            }
        } else {
            // Add new item to cart
            $cart[$productId] = [
                'product_id' => $product['id'],
                'product_name' => $product['product_name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'subtotal' => $product['price'] * $quantity
            ];
        }
        
        $this->session->set('cart', $cart);
        return true;
    }
    
    /**
     * Update cart item quantity
     */
    public function updateCart()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/pos/dashboard');
        }
        
        $productId = $this->request->getPost('product_id');
        $quantity = (int) $this->request->getPost('quantity');
        $action = $this->request->getPost('action'); // 'update' or 'remove'
        
        $cart = $this->session->get('cart') ?? [];
        
        if ($action === 'remove' || $quantity <= 0) {
            unset($cart[$productId]);
        } else {
            // Check stock availability
            if (!$this->productModel->hasStock($productId, $quantity)) {
                return $this->response->setJSON(['success' => false, 'message' => 'Not enough stock available']);
            }
            
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
                $cart[$productId]['subtotal'] = $cart[$productId]['price'] * $quantity;
            }
        }
        
        $this->session->set('cart', $cart);
        
        $cartTotal = array_sum(array_column($cart, 'subtotal'));
        
        return $this->response->setJSON([
            'success' => true,
            'cart_count' => count($cart),
            'cart_total' => number_format($cartTotal, 2)
        ]);
    }
    
    /**
     * Get cart contents
     */
    public function getCart()
    {
        $cart = $this->session->get('cart') ?? [];
        $cartTotal = array_sum(array_column($cart, 'subtotal'));
        
        return $this->response->setJSON([
            'success' => true,
            'cart' => $cart,
            'cart_total' => $cartTotal
        ]);
    }
    
    /**
     * Checkout page
     */
    public function checkout()
    {
        $cart = $this->session->get('cart') ?? [];
        
        if (empty($cart)) {
            session()->setFlashdata('error', 'Cart is empty');
            return redirect()->to('/pos/dashboard');
        }
        
        $cartTotal = array_sum(array_column($cart, 'subtotal'));
        
        $data = [
            'title' => 'Checkout',
            'cart' => $cart,
            'cart_total' => $cartTotal
        ];
        
        return view('pos/checkout', $data);
    }
    
    /**
     * Process checkout
     */
    public function processCheckout()
    {
        $cart = $this->session->get('cart') ?? [];
        
        if (empty($cart)) {
            return redirect()->to('/pos/dashboard')->with('error', 'Cart is empty');
        }
        
        $paymentMethod = $this->request->getPost('payment_method');
        $customerPhone = $this->request->getPost('customer_phone');
        
        if (!in_array($paymentMethod, ['cash', 'card', 'digital'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid payment method');
        }
        
        if ($customerPhone && !$this->smsService->validatePhoneNumber($customerPhone)) {
            return redirect()->back()->withInput()->with('error', 'Invalid phone number format');
        }
        
        // Calculate total
        $totalAmount = array_sum(array_column($cart, 'subtotal'));
        
        // Check stock for all items
        foreach ($cart as $item) {
            if (!$this->productModel->hasStock($item['product_id'], $item['quantity'])) {
                return redirect()->back()->with('error', 'Insufficient stock for ' . $item['product_name']);
            }
        }
        
        // Start transaction
        $db = \Config\Database::connect();
        $db->transStart();
        
        try {
            // Create transaction
            $transactionData = [
                'total_amount' => $totalAmount,
                'payment_method' => $paymentMethod,
                'customer_phone' => $customerPhone
            ];
            
            $transactionId = $this->transactionModel->createTransaction($transactionData);
            
            if (!$transactionId) {
                throw new \Exception('Failed to create transaction');
            }
            
            // Add transaction items
            foreach ($cart as $item) {
                $itemData = [
                    'transaction_id' => $transactionId,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['product_name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal']
                ];
                
                if (!$this->transactionItemModel->addItem($itemData)) {
                    throw new \Exception('Failed to add transaction item');
                }
                
                // Update stock
                if (!$this->productModel->updateStock($item['product_id'], $item['quantity'], 'subtract')) {
                    throw new \Exception('Failed to update stock for ' . $item['product_name']);
                }
            }
            
            $db->transComplete();
            
            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }
            
            // Clear cart
            $this->session->remove('cart');
            
            // Send SMS if phone number provided
            if ($customerPhone) {
                $this->sendReceiptSms($transactionId);
            }
            
            return redirect()->to('/pos/receipt/' . $transactionId)->with('success', 'Transaction completed successfully');
            
        } catch (\Exception $e) {
            $db->transRollback();
            log_message('error', 'Checkout failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }
    
    /**
     * Display receipt
     */
    public function receipt($transactionId)
    {
        $transaction = $this->transactionModel->getTransactionWithItems($transactionId);
        
        if (!$transaction) {
            return redirect()->to('/pos/dashboard')->with('error', 'Transaction not found');
        }
        
        $data = [
            'title' => 'Receipt',
            'transaction' => $transaction
        ];
        
        return view('pos/receipt', $data);
    }
    
    /**
     * Send receipt SMS
     */
    private function sendReceiptSms($transactionId)
    {
        $transaction = $this->transactionModel->getTransactionWithItems($transactionId);
        
        if (!$transaction || !$transaction['customer_phone']) {
            return false;
        }
        
        $smsResult = $this->smsService->sendReceiptSms(
            $transaction['customer_phone'],
            $transaction
        );
        
        if ($smsResult['success']) {
            $this->transactionModel->markSmsSent($transactionId);
            log_message('info', 'Receipt SMS sent for transaction: ' . $transaction['transaction_number']);
        } else {
            log_message('error', 'Failed to send receipt SMS for transaction: ' . $transaction['transaction_number']);
        }
        
        return $smsResult['success'];
    }
    
    /**
     * Resend receipt SMS
     */
    public function resendSms($transactionId)
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/pos/dashboard');
        }
        
        $result = $this->sendReceiptSms($transactionId);
        
        return $this->response->setJSON([
            'success' => $result,
            'message' => $result ? 'SMS sent successfully' : 'Failed to send SMS'
        ]);
    }
    
    /**
     * Search products for manual adding
     */
    public function searchProducts()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }
        
        $search = $this->request->getPost('search');
        
        if (strlen($search) < 2) {
            return $this->response->setJSON(['success' => false, 'message' => 'Search term too short']);
        }
        
        $products = $this->productModel->like('product_name', $search)
                                     ->where('status', 'active')
                                     ->limit(10)
                                     ->findAll();
        
        return $this->response->setJSON(['success' => true, 'products' => $products]);
    }
    
    /**
     * Add product manually (without QR scan)
     */
    public function addProduct()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/pos/dashboard');
        }
        
        $productId = $this->request->getPost('product_id');
        $quantity = (int) $this->request->getPost('quantity') ?: 1;
        
        $product = $this->productModel->getProduct($productId);
        
        if (!$product) {
            return $this->response->setJSON(['success' => false, 'message' => 'Product not found']);
        }
        
        if (!$this->productModel->hasStock($productId, $quantity)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Insufficient stock']);
        }
        
        if ($this->addToCart($product, $quantity)) {
            $cart = $this->session->get('cart') ?? [];
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Product added to cart',
                'cart_count' => count($cart)
            ]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to add product to cart']);
        }
    }
}