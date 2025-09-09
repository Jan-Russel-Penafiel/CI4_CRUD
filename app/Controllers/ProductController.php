<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $productModel;
    protected $session;
    
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {
        // Check if user is authenticated
        if (!$this->isAuthenticated()) {
            return view('index', ['show_login' => true]);
        }
        
        $pager = \Config\Services::pager();
        
        // Get search keyword if any
        $keyword = $this->request->getGet('search');
        $perPage = 5; // Products per page
        
        if ($keyword) {
            $products = $this->productModel->searchProducts($keyword, $perPage);
            $data['search'] = $keyword;
        } else {
            $products = $this->productModel->getProductsPaginated($perPage);
            $data['search'] = '';
        }
        
        $data['products'] = $products;
        $data['pager'] = $this->productModel->pager;
        $data['total_products'] = $this->productModel->getTotalProducts();
        $data['show_login'] = false;
        
        // Calculate the starting number for pagination
        $currentPage = $this->productModel->pager->getCurrentPage();
        $data['start_number'] = ($currentPage - 1) * $perPage;
        
        return view('index', $data);
    }
    
    public function showCreateForm()
    {
        if (!$this->isAuthenticated()) {
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        $data['validation'] = \Config\Services::validation();
        return view('create_product', $data);
    }
    
    public function create()
    {
        if (!$this->isAuthenticated()) {
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        $validationRules = [
            'product_name' => [
                'label' => 'Product Name',
                'rules' => 'required|min_length[3]|max_length[255]'
            ],
            'description' => [
                'label' => 'Description',
                'rules' => 'permit_empty|max_length[1000]'
            ],
            'price' => [
                'label' => 'Price',
                'rules' => 'required|decimal|greater_than[0]'
            ]
        ];
        
        if (!$this->validate($validationRules)) {
            $data['validation'] = $this->validator;
            return view('create_product', $data);
        }
        
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')
        ];
        
        try {
            if ($this->productModel->createProduct($data)) {
                $this->session->setFlashdata('success', 'Product created successfully!');
            } else {
                $this->session->setFlashdata('error', 'Failed to create product. Please check your input.');
            }
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Database error: ' . $e->getMessage());
        }
        
        return redirect()->to('/');
    }
    
    public function edit($id)
    {
        if (!$this->isAuthenticated()) {
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        $product = $this->productModel->getProduct($id);
        
        if (!$product) {
            $this->session->setFlashdata('error', 'Product not found.');
            return redirect()->to('/');
        }
        
        $data['product'] = $product;
        $data['validation'] = \Config\Services::validation();
        
        return view('edit_product', $data);
    }
    
    public function update($id)
    {
        if (!$this->isAuthenticated()) {
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        $product = $this->productModel->getProduct($id);
        
        if (!$product) {
            $this->session->setFlashdata('error', 'Product not found.');
            return redirect()->to('/products');
        }
        
        $validationRules = [
            'product_name' => [
                'label' => 'Product Name',
                'rules' => 'required|min_length[3]|max_length[255]'
            ],
            'description' => [
                'label' => 'Description',
                'rules' => 'permit_empty|max_length[1000]'
            ],
            'price' => [
                'label' => 'Price',
                'rules' => 'required|decimal|greater_than[0]'
            ]
        ];
        
        if (!$this->validate($validationRules)) {
            $data['product'] = $product;
            $data['validation'] = $this->validator;
            return view('edit_product', $data);
        }
        
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')
        ];
        
        try {
            if ($this->productModel->updateProduct($id, $data)) {
                $this->session->setFlashdata('success', 'Product updated successfully!');
            } else {
                $this->session->setFlashdata('error', 'Failed to update product. Please check your input.');
            }
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Database error: ' . $e->getMessage());
        }
        
        return redirect()->to('/');
    }
    
    public function delete($id)
    {
        if (!$this->isAuthenticated()) {
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        $product = $this->productModel->getProduct($id);
        
        if (!$product) {
            $this->session->setFlashdata('error', 'Product not found.');
            return redirect()->to('/');
        }
        
        try {
            if ($this->productModel->deleteProduct($id)) {
                $this->session->setFlashdata('success', 'Product moved to trash successfully! It can be restored if needed.');
            } else {
                $this->session->setFlashdata('error', 'Failed to delete product.');
            }
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'Database error: ' . $e->getMessage());
        }
        
        return redirect()->to('/');
    }
    
    // View trash (deleted products)
    public function trash()
    {
        if (!$this->isAuthenticated()) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['error' => 'Authentication required']);
            }
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        $pager = \Config\Services::pager();
        $perPage = 10;
        
        $deletedProducts = $this->productModel->getDeletedProducts($perPage);
        $data['products'] = $deletedProducts;
        $data['pager'] = $this->productModel->pager;
        $data['total_products'] = $this->productModel->getDeletedProductsCount();
        $data['page_title'] = 'Trash - Deleted Products';
        
        // Return JSON for AJAX requests
        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        }
        
        return view('trash', $data);
    }
    
    // Restore deleted product
    public function restore($id)
    {
        if (!$this->isAuthenticated()) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['error' => 'Authentication required']);
            }
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        try {
            if ($this->productModel->restoreProduct($id)) {
                $message = 'Product restored successfully!';
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON(['success' => true, 'message' => $message]);
                }
                $this->session->setFlashdata('success', $message);
            } else {
                $message = 'Failed to restore product.';
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON(['success' => false, 'message' => $message]);
                }
                $this->session->setFlashdata('error', $message);
            }
        } catch (\Exception $e) {
            $message = 'Database error: ' . $e->getMessage();
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['success' => false, 'message' => $message]);
            }
            $this->session->setFlashdata('error', $message);
        }
        
        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unknown error occurred']);
        }
        return redirect()->to('/trash');
    }
    
    // Permanently delete product
    public function permanentDelete($id)
    {
        if (!$this->isAuthenticated()) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['error' => 'Authentication required']);
            }
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        try {
            if ($this->productModel->permanentlyDeleteProduct($id)) {
                $message = 'Product permanently deleted!';
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON(['success' => true, 'message' => $message]);
                }
                $this->session->setFlashdata('success', $message);
            } else {
                $message = 'Failed to permanently delete product.';
                if ($this->request->isAJAX()) {
                    return $this->response->setJSON(['success' => false, 'message' => $message]);
                }
                $this->session->setFlashdata('error', $message);
            }
        } catch (\Exception $e) {
            $message = 'Database error: ' . $e->getMessage();
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['success' => false, 'message' => $message]);
            }
            $this->session->setFlashdata('error', $message);
        }
        
        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unknown error occurred']);
        }
        return redirect()->to('/trash');
    }

    public function view($id)
    {
        if (!$this->isAuthenticated()) {
            $this->session->setFlashdata('error', 'Please login to access this page.');
            return redirect()->to('/');
        }
        
        $product = $this->productModel->getProduct($id);
        
        if (!$product) {
            $this->session->setFlashdata('error', 'Product not found.');
            return redirect()->to('/');
        }
        
        $data['product'] = $product;
        return view('view_product', $data);
    }
    
    // Authentication methods
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            
            // Default credentials
            $defaultUsername = 'admin';
            $defaultPassword = 'admin123';
            
            if ($username === $defaultUsername && $password === $defaultPassword) {
                $this->session->set('admin_logged_in', true);
                $this->session->set('admin_username', $username);
                $this->session->setFlashdata('success', 'Welcome! You have successfully logged in.');
                return redirect()->to('/');
            } else {
                $this->session->setFlashdata('error', 'Invalid username or password. Please try again.');
                return redirect()->to('/');
            }
        }
        
        return redirect()->to('/');
    }
    
    public function logout()
    {
        $this->session->remove('admin_logged_in');
        $this->session->remove('admin_username');
        $this->session->setFlashdata('success', 'You have been logged out successfully.');
        return redirect()->to('/');
    }
    
    private function isAuthenticated()
    {
        return $this->session->get('admin_logged_in') === true;
    }

    // Bulk Operations
    public function bulkDelete()
    {
        if (!$this->isAuthenticated()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Authentication required']);
        }

        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request method']);
        }

        $json = $this->request->getJSON();
        $ids = $json->ids ?? [];

        if (empty($ids) || !is_array($ids)) {
            return $this->response->setJSON(['success' => false, 'message' => 'No products selected']);
        }

        // Validate that all IDs are numeric
        foreach ($ids as $id) {
            if (!is_numeric($id) || $id <= 0) {
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid product ID']);
            }
        }

        try {
            $successCount = 0;
            $failCount = 0;

            foreach ($ids as $id) {
                if ($this->productModel->deleteProduct($id)) {
                    $successCount++;
                } else {
                    $failCount++;
                }
            }

            if ($successCount > 0) {
                $message = $successCount . ' product(s) moved to trash successfully!';
                if ($failCount > 0) {
                    $message .= ' (' . $failCount . ' failed)';
                }
                return $this->response->setJSON(['success' => true, 'message' => $message]);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to move products to trash']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }

    public function bulkRestore()
    {
        if (!$this->isAuthenticated()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Authentication required']);
        }

        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request method']);
        }

        $json = $this->request->getJSON();
        $ids = $json->ids ?? [];

        if (empty($ids) || !is_array($ids)) {
            return $this->response->setJSON(['success' => false, 'message' => 'No products selected']);
        }

        // Validate that all IDs are numeric
        foreach ($ids as $id) {
            if (!is_numeric($id) || $id <= 0) {
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid product ID']);
            }
        }

        try {
            $successCount = 0;
            $failCount = 0;

            foreach ($ids as $id) {
                if ($this->productModel->restoreProduct($id)) {
                    $successCount++;
                } else {
                    $failCount++;
                }
            }

            if ($successCount > 0) {
                $message = $successCount . ' product(s) restored successfully!';
                if ($failCount > 0) {
                    $message .= ' (' . $failCount . ' failed)';
                }
                return $this->response->setJSON(['success' => true, 'message' => $message]);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to restore products']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }

    public function bulkPermanentDelete()
    {
        if (!$this->isAuthenticated()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Authentication required']);
        }

        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request method']);
        }

        $json = $this->request->getJSON();
        $ids = $json->ids ?? [];

        if (empty($ids) || !is_array($ids)) {
            return $this->response->setJSON(['success' => false, 'message' => 'No products selected']);
        }

        // Validate that all IDs are numeric
        foreach ($ids as $id) {
            if (!is_numeric($id) || $id <= 0) {
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid product ID']);
            }
        }

        try {
            $successCount = 0;
            $failCount = 0;

            foreach ($ids as $id) {
                if ($this->productModel->permanentlyDeleteProduct($id)) {
                    $successCount++;
                } else {
                    $failCount++;
                }
            }

            if ($successCount > 0) {
                $message = $successCount . ' product(s) permanently deleted!';
                if ($failCount > 0) {
                    $message .= ' (' . $failCount . ' failed)';
                }
                return $this->response->setJSON(['success' => true, 'message' => $message]);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to permanently delete products']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
}
