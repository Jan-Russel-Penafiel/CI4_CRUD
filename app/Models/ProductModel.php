<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_name', 'description', 'price', 'status'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Enable soft deletes by default - only show active products
    protected $useSoftDeletes = false; // We're implementing custom soft delete
    
    // Override builder to add default where clause for active products
    protected function initialize()
    {
        // This will be called automatically
    }
    
    // Helper method to get builder with active products only
    protected function getActiveBuilder()
    {
        return $this->where('status', 'active');
    }
    
    // Helper method to get builder without status restriction
    protected function getAllBuilder()
    {
        return $this->builder();
    }
    
    // Validation rules
    protected $validationRules = [
        'product_name' => 'required|min_length[3]|max_length[255]',
        'description'  => 'permit_empty|max_length[1000]',
        'price'        => 'required|decimal|greater_than[0]',
        'status'       => 'permit_empty|in_list[active,deleted]'
    ];
    
    protected $validationMessages = [
        'product_name' => [
            'required'   => 'Product name is required.',
            'min_length' => 'Product name must be at least 3 characters long.',
            'max_length' => 'Product name cannot exceed 255 characters.'
        ],
        'description' => [
            'max_length' => 'Description cannot exceed 1000 characters.'
        ],
        'price' => [
            'required'     => 'Price is required.',
            'decimal'      => 'Price must be a valid decimal number.',
            'greater_than' => 'Price must be greater than 0.'
        ],
        'status' => [
            'in_list' => 'Status must be either active or deleted.'
        ]
    ];
    
    // Create with validation (always set status to active)
    public function createProduct($data)
    {
        // Ensure new products are always active
        $data['status'] = 'active';
        
        if ($this->validate($data)) {
            return $this->insert($data);
        }
        return false;
    }
    
    // Read single product (only active)
    public function getProduct($id)
    {
        return $this->where('status', 'active')->find($id);
    }
    
    // Read single product regardless of status (for admin purposes)
    public function getProductWithStatus($id)
    {
        return $this->find($id);
    }
    
    // Read all products with pagination (only active)
    public function getProductsPaginated($perPage = 10)
    {
        return $this->where('status', 'active')->paginate($perPage);
    }
    
    // Update with validation
    public function updateProduct($id, $data)
    {
        // Don't allow status change through regular update
        unset($data['status']);
        
        if ($this->validate($data)) {
            return $this->update($id, $data);
        }
        return false;
    }
    
    // Soft delete - change status to 'deleted'
    public function deleteProduct($id)
    {
        return $this->update($id, ['status' => 'deleted']);
    }
    
    // Restore deleted product
    public function restoreProduct($id)
    {
        return $this->update($id, ['status' => 'active']);
    }
    
    // Permanently delete (use with caution)
    public function permanentlyDeleteProduct($id)
    {
        return $this->delete($id, true);
    }
    
    // Search products (only active)
    public function searchProducts($keyword, $perPage = 10)
    {
        return $this->where('status', 'active')
                    ->groupStart()
                    ->like('product_name', $keyword)
                    ->orLike('description', $keyword)
                    ->groupEnd()
                    ->paginate($perPage);
    }
    
    // Get total count (only active)
    public function getTotalProducts()
    {
        return $this->where('status', 'active')->countAllResults(false);
    }
    
    // Get deleted products count
    public function getDeletedProductsCount()
    {
        return $this->where('status', 'deleted')->countAllResults(false);
    }
    
    // Get all deleted products (for admin trash view)
    public function getDeletedProducts($perPage = 10)
    {
        return $this->where('status', 'deleted')->paginate($perPage);
    }
}
