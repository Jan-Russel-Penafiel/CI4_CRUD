<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionItemModel extends Model
{
    protected $table = 'transaction_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'transaction_id',
        'product_id',
        'product_name',
        'price',
        'quantity',
        'subtotal'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Validation rules
    protected $validationRules = [
        'transaction_id' => 'required|integer',
        'product_id' => 'required|integer',
        'product_name' => 'required|max_length[255]',
        'price' => 'required|decimal|greater_than[0]',
        'quantity' => 'required|integer|greater_than[0]',
        'subtotal' => 'required|decimal|greater_than_equal_to[0]'
    ];
    
    protected $validationMessages = [
        'transaction_id' => [
            'required' => 'Transaction ID is required.',
            'integer' => 'Transaction ID must be an integer.'
        ],
        'product_id' => [
            'required' => 'Product ID is required.',
            'integer' => 'Product ID must be an integer.'
        ],
        'product_name' => [
            'required' => 'Product name is required.',
            'max_length' => 'Product name cannot exceed 255 characters.'
        ],
        'price' => [
            'required' => 'Price is required.',
            'decimal' => 'Price must be a valid decimal number.',
            'greater_than' => 'Price must be greater than 0.'
        ],
        'quantity' => [
            'required' => 'Quantity is required.',
            'integer' => 'Quantity must be an integer.',
            'greater_than' => 'Quantity must be greater than 0.'
        ],
        'subtotal' => [
            'required' => 'Subtotal is required.',
            'decimal' => 'Subtotal must be a valid decimal number.',
            'greater_than_equal_to' => 'Subtotal must be zero or greater.'
        ]
    ];
    
    /**
     * Add item to transaction
     * 
     * @param array $data
     * @return int|false Item ID or false on failure
     */
    public function addItem($data)
    {
        // Calculate subtotal if not provided
        if (!isset($data['subtotal']) || $data['subtotal'] <= 0) {
            $data['subtotal'] = $data['price'] * $data['quantity'];
        }
        
        if ($this->validate($data)) {
            return $this->insert($data);
        }
        return false;
    }
    
    /**
     * Add multiple items to transaction
     * 
     * @param int $transactionId
     * @param array $items Array of item data
     * @return bool Success status
     */
    public function addMultipleItems($transactionId, $items)
    {
        $success = true;
        
        foreach ($items as $item) {
            $item['transaction_id'] = $transactionId;
            
            if (!$this->addItem($item)) {
                $success = false;
            }
        }
        
        return $success;
    }
    
    /**
     * Get items for a transaction
     * 
     * @param int $transactionId
     * @return array Transaction items
     */
    public function getTransactionItems($transactionId)
    {
        return $this->where('transaction_id', $transactionId)
                    ->orderBy('created_at', 'ASC')
                    ->findAll();
    }
    
    /**
     * Get total amount for a transaction
     * 
     * @param int $transactionId
     * @return float Total amount
     */
    public function getTransactionTotal($transactionId)
    {
        $result = $this->selectSum('subtotal')
                      ->where('transaction_id', $transactionId)
                      ->first();
        
        return $result['subtotal'] ?? 0;
    }
    
    /**
     * Get best selling products
     * 
     * @param string $startDate
     * @param string $endDate
     * @param int $limit
     * @return array Best selling products
     */
    public function getBestSellingProducts($startDate = null, $endDate = null, $limit = 10)
    {
        $builder = $this->db->table($this->table . ' ti')
                           ->select('ti.product_id, ti.product_name, SUM(ti.quantity) as total_sold, SUM(ti.subtotal) as total_revenue')
                           ->groupBy('ti.product_id, ti.product_name')
                           ->orderBy('total_sold', 'DESC')
                           ->limit($limit);
        
        if ($startDate && $endDate) {
            $builder->join('transactions t', 't.id = ti.transaction_id')
                   ->where('DATE(t.created_at) >=', $startDate)
                   ->where('DATE(t.created_at) <=', $endDate);
        }
        
        return $builder->get()->getResultArray();
    }
    
    /**
     * Get product sales summary for a specific product
     * 
     * @param int $productId
     * @param string $startDate
     * @param string $endDate
     * @return array Product sales summary
     */
    public function getProductSales($productId, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table($this->table . ' ti')
                           ->select('
                               COUNT(ti.id) as transaction_count,
                               SUM(ti.quantity) as total_quantity,
                               SUM(ti.subtotal) as total_revenue,
                               AVG(ti.quantity) as avg_quantity_per_sale,
                               AVG(ti.subtotal) as avg_revenue_per_sale
                           ')
                           ->where('ti.product_id', $productId);
        
        if ($startDate && $endDate) {
            $builder->join('transactions t', 't.id = ti.transaction_id')
                   ->where('DATE(t.created_at) >=', $startDate)
                   ->where('DATE(t.created_at) <=', $endDate);
        }
        
        return $builder->get()->getRowArray();
    }
    
    /**
     * Update item quantity and recalculate subtotal
     * 
     * @param int $itemId
     * @param int $quantity
     * @return bool Success status
     */
    public function updateItemQuantity($itemId, $quantity)
    {
        $item = $this->find($itemId);
        
        if (!$item) {
            return false;
        }
        
        $newSubtotal = $item['price'] * $quantity;
        
        return $this->update($itemId, [
            'quantity' => $quantity,
            'subtotal' => $newSubtotal
        ]);
    }
    
    /**
     * Remove item from transaction
     * 
     * @param int $itemId
     * @return bool Success status
     */
    public function removeItem($itemId)
    {
        return $this->delete($itemId);
    }
}