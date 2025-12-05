<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\ProductModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $userModel;
    protected $transactionModel;
    protected $productModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->transactionModel = new TransactionModel();
        $this->productModel = new ProductModel();
        $this->session = \Config\Services::session();
    }

    /**
     * Check if user is logged in
     */
    private function checkAuth()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('/auth/login')->with('error', 'Please login to continue');
        }
        return null;
    }

    /**
     * User Dashboard
     */
    public function dashboard()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $userId = $this->session->get('user_id');
        $username = $this->session->get('username');

        // Get user's transaction statistics
        $userTransactions = $this->transactionModel
            ->where('customer_phone IS NOT NULL')
            ->findAll();

        $totalTransactions = count($userTransactions);
        $totalSpent = array_sum(array_column($userTransactions, 'total_amount'));
        $recentTransactions = $this->transactionModel
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        $data = [
            'title' => 'User Dashboard',
            'username' => $username,
            'totalTransactions' => $totalTransactions,
            'totalSpent' => $totalSpent,
            'recentTransactions' => $recentTransactions
        ];

        return view('user/dashboard', $data);
    }

    /**
     * User Profile
     */
    public function profile()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to('/auth/login')->with('error', 'User not found');
        }

        $data = [
            'title' => 'My Profile',
            'user' => $user
        ];

        return view('user/profile', $data);
    }

    /**
     * Update Profile
     */
    public function updateProfile()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $userId = $this->session->get('user_id');
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validate input
        $validation = \Config\Services::validation();
        
        if ($newPassword) {
            // If changing password
            $validation->setRules([
                'current_password' => 'required',
                'new_password' => 'required|min_length[6]',
                'confirm_password' => 'required|matches[new_password]'
            ], [
                'current_password' => [
                    'required' => 'Current password is required'
                ],
                'new_password' => [
                    'required' => 'New password is required',
                    'min_length' => 'Password must be at least 6 characters'
                ],
                'confirm_password' => [
                    'required' => 'Please confirm your password',
                    'matches' => 'Passwords do not match'
                ]
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Validation failed')
                    ->with('validation_errors', $validation->getErrors());
            }

            // Verify current password
            $user = $this->userModel->find($userId);
            if (!password_verify($currentPassword, $user['password'])) {
                return redirect()->back()
                    ->with('error', 'Current password is incorrect');
            }

            // Update password
            try {
                $this->userModel->updatePassword($userId, $newPassword);
                return redirect()->to('/user/profile')
                    ->with('success', 'Password updated successfully');
            } catch (\Exception $e) {
                return redirect()->back()
                    ->with('error', 'Failed to update password: ' . $e->getMessage());
            }
        }

        return redirect()->to('/user/profile')
            ->with('error', 'No changes made');
    }

    /**
     * User Transaction History
     */
    public function transactions()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $userId = $this->session->get('user_id');
        
        // Get all transactions (in a real app, you'd filter by user)
        $transactions = $this->transactionModel
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $data = [
            'title' => 'My Transactions',
            'transactions' => $transactions,
            'pager' => $this->transactionModel->pager
        ];

        return view('user/transactions', $data);
    }

    /**
     * View Transaction Details
     */
    public function viewTransaction($transactionId)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $transaction = $this->transactionModel->getTransactionWithItems($transactionId);

        if (!$transaction) {
            return redirect()->to('/user/transactions')
                ->with('error', 'Transaction not found');
        }

        $data = [
            'title' => 'Transaction Details',
            'transaction' => $transaction
        ];

        return view('user/transaction_detail', $data);
    }

    /**
     * View Products List (Read-only)
     */
    public function products()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        // Get search and filter parameters
        $search = $this->request->getGet('search');
        $sortBy = $this->request->getGet('sort') ?? 'product_name';
        $order = $this->request->getGet('order') ?? 'asc';

        // Build query
        $builder = $this->productModel->where('status', 'active');

        if ($search) {
            $builder->groupStart()
                    ->like('product_name', $search)
                    ->orLike('description', $search)
                    ->groupEnd();
        }

        // Get products with pagination
        $products = $builder->orderBy($sortBy, $order)
                           ->paginate(12);

        $data = [
            'title' => 'Products Catalog',
            'products' => $products,
            'pager' => $this->productModel->pager,
            'search' => $search,
            'sortBy' => $sortBy,
            'order' => $order
        ];

        return view('user/products', $data);
    }

    /**
     * View Single Product Details (Read-only)
     */
    public function viewProduct($productId)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck) return $authCheck;

        $product = $this->productModel->where('status', 'active')
                                      ->find($productId);

        if (!$product) {
            return redirect()->to('/user/products')
                ->with('error', 'Product not found');
        }

        // Generate QR code for the product
        $qrCodeService = new \App\Libraries\QrCodeService();
        $qrCodeDataUri = $qrCodeService->generateProductQrCodeDataUri(
            $product['id'], 
            $product['product_name'], 
            $product['price']
        );

        $data = [
            'title' => 'Product Details',
            'product' => $product,
            'qrCodeDataUri' => $qrCodeDataUri
        ];

        return view('user/product_detail', $data);
    }
}
