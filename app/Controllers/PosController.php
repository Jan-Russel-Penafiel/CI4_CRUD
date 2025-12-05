<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\TransactionItemModel;
use App\Models\UserModel;
use App\Libraries\QrCodeService;
use App\Libraries\SmsService;
use CodeIgniter\HTTP\ResponseInterface;

class PosController extends BaseController
{
    protected $productModel;
    protected $transactionModel;
    protected $transactionItemModel;
    protected $userModel;
    protected $qrCodeService;
    protected $smsService;
    protected $session;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->transactionItemModel = new TransactionItemModel();
        $this->userModel = new UserModel();
        $this->qrCodeService = new QrCodeService();
        $this->smsService = new SmsService();
        $this->session = session();
    }
    
    /**
     * POS Dashboard
     */
    public function dashboard()
    {
        // Get dashboard statistics
        $dailySales = $this->transactionModel->getDailySales();
        $weeklySales = $this->transactionModel->getWeeklySales();
        $weeklyTransactions = $this->transactionModel->getWeeklyTransactions();
        $monthlySales = $this->transactionModel->getMonthlySales();
        $recentTransactions = $this->transactionModel->getRecentTransactions(5);
        $lowStockProducts = $this->productModel->getLowStockProducts(10);
        $totalProducts = $this->productModel->getTotalProducts();
        
        $data = [
            'title' => 'POS Dashboard',
            'recentTransactions' => $recentTransactions,
            'dailySales' => $dailySales,
            'weeklySales' => $weeklySales,
            'weeklyTransactions' => $weeklyTransactions,
            'monthlySales' => $monthlySales,
            'lowStockProducts' => $lowStockProducts,
            'lowStockCount' => count($lowStockProducts),
            'totalProducts' => $totalProducts,
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
     * Get cart count for AJAX updates
     */
    public function cartCount()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/pos/dashboard');
        }
        
        $cart = $this->session->get('cart') ?? [];
        
        return $this->response->setJSON([
            'success' => true,
            'count' => count($cart)
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
            
            // Check if customer already has transactions (existing customer)
            $isExistingCustomer = $this->transactionModel
                ->where('customer_phone', $customerPhone)
                ->where('id !=', $transactionId)
                ->countAllResults() > 0;
            
            // Create user account automatically only for new customers
            $userCreated = false;
            $userCredentials = null;
            if ($customerPhone && !$isExistingCustomer) {
                $userCredentials = $this->createUserAccount($customerPhone);
                $userCreated = $userCredentials !== false;
            }
            
            // Send SMS if phone number provided
            if ($customerPhone) {
                $this->sendReceiptSms($transactionId, $userCredentials);
            }
            
            $successMessage = 'Transaction completed successfully';
            if ($userCreated) {
                $successMessage .= '. User account created - Username: ' . $userCredentials['username'] . ', Password: ' . $userCredentials['password'];
            }
            
            return redirect()->to('/pos/receipt/' . $transactionId)->with('success', $successMessage);
            
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
    private function sendReceiptSms($transactionId, $userCredentials = null)
    {
        $transaction = $this->transactionModel->getTransactionWithItems($transactionId);
        
        if (!$transaction || !$transaction['customer_phone']) {
            return false;
        }
        
        $smsResult = $this->smsService->sendReceiptSms(
            $transaction['customer_phone'],
            $transaction,
            $userCredentials
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
    
    /**
     * Create user account automatically based on phone number
     */
    private function createUserAccount($customerPhone)
    {
        try {
            // Generate username from phone number
            $username = $this->generateUsername($customerPhone);
            
            // Check if username already exists, if so, make it unique
            $originalUsername = $username;
            $counter = 1;
            while ($this->userModel->usernameExists($username)) {
                $username = $originalUsername . $counter;
                $counter++;
            }
            
            // Generate a secure random password
            $password = $this->generateSecurePassword();
            
            // Create user data
            $userData = [
                'username' => $username,
                'password' => $password
            ];
            
            // Create the user account
            $userId = $this->userModel->createUser($userData);
            
            if ($userId) {
                log_message('info', 'Auto-created user account: ' . $username . ' for phone: ' . $customerPhone);
                return [
                    'user_id' => $userId,
                    'username' => $username,
                    'password' => $password
                ];
            } else {
                log_message('error', 'Failed to create user account for phone: ' . $customerPhone);
                return false;
            }
            
        } catch (\Exception $e) {
            log_message('error', 'Error creating user account: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Generate username from phone number
     */
    private function generateUsername($phoneNumber)
    {
        // Clean phone number (remove non-digits)
        $cleanPhone = preg_replace('/[^0-9]/', '', $phoneNumber);
        
        // If phone starts with 63, remove country code
        if (substr($cleanPhone, 0, 2) === '63') {
            $cleanPhone = '0' . substr($cleanPhone, 2);
        }
        
        // Simple username: just the phone number
        return $cleanPhone;
    }
    
    /**
     * Generate a simple random password
     */
    private function generateSecurePassword($length = 6)
    {
        // Simple password: just numbers (6 digits)
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= random_int(0, 9);
        }
        return $password;
    }
    
    /**
     * Check if customer exists by phone number (AJAX endpoint)
     */
    public function checkCustomer()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }

        $phone = $this->request->getPost('phone');
        
        if (!$phone) {
            return $this->response->setJSON(['success' => false, 'message' => 'Phone number required']);
        }

        // Clean phone number
        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
        
        // Check for existing transactions with this phone number
        $transactions = $this->transactionModel
            ->select('id, transaction_number, created_at, total_amount')
            ->where('customer_phone', $phone)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        if (empty($transactions)) {
            return $this->response->setJSON([
                'success' => true,
                'isReturning' => false,
                'message' => 'New customer - account will be created'
            ]);
        }

        // Customer exists, get transaction summary
        $totalTransactions = $this->transactionModel->where('customer_phone', $phone)->countAllResults();
        $totalSpent = $this->transactionModel
            ->selectSum('total_amount')
            ->where('customer_phone', $phone)
            ->get()
            ->getRow()
            ->total_amount ?? 0;

        return $this->response->setJSON([
            'success' => true,
            'isReturning' => true,
            'customerInfo' => [
                'phone' => $phone,
                'totalTransactions' => $totalTransactions,
                'totalSpent' => $totalSpent,
                'lastTransaction' => $transactions[0]['created_at'] ?? null,
                'recentTransactions' => $transactions
            ]
        ]);
    }
}
