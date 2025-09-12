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

    // Get statistics for dashboard
    public function getStatistics($period = 'daily')
    {
        $db = \Config\Database::connect();
        $now = new \DateTime();
        
        // Get summary statistics
        $totalProducts = $this->where('status', 'active')->countAllResults(false);
        
        // Calculate total price
        $totalPriceQuery = $db->query("SELECT SUM(price) as total_price FROM {$this->table} WHERE status = 'active'");
        $totalPrice = $totalPriceQuery->getRow()->total_price ?? 0;
        
        // Get products created/updated today
        $today = $now->format('Y-m-d');
        $productsAddedToday = $db->query("SELECT COUNT(*) as count FROM {$this->table} WHERE DATE(created_at) = ? AND status = 'active'", [$today])->getRow()->count;
        $productsUpdatedToday = $db->query("SELECT COUNT(*) as count FROM {$this->table} WHERE DATE(updated_at) = ? AND DATE(updated_at) != DATE(created_at) AND status = 'active'", [$today])->getRow()->count;
        
        // Generate chart data based on period
        $chartData = $this->generateChartData($period, $db);
        
        // Get price distribution
        $priceDistribution = $this->getPriceDistribution($db);
        
        return [
            'summary' => [
                'totalProducts' => (int)$totalProducts,
                'productsAdded' => (int)$productsAddedToday,
                'productsUpdated' => (int)$productsUpdatedToday,
                'totalPrice' => round($totalPrice, 2)
            ],
            'chartData' => $chartData,
            'priceDistribution' => $priceDistribution
        ];
    }

    private function generateChartData($period, $db)
    {
        $now = new \DateTime();
        $labels = [];
        $data = [];
        
        if ($period === 'daily') {
            // Last 7 days
            for ($i = 6; $i >= 0; $i--) {
                $date = clone $now;
                $date->sub(new \DateInterval("P{$i}D"));
                $dateStr = $date->format('Y-m-d');
                
                $labels[] = $date->format('M j');
                
                $count = $db->query("SELECT COUNT(*) as count FROM {$this->table} WHERE DATE(created_at) = ? AND status = 'active'", [$dateStr])->getRow()->count;
                $data[] = (int)$count;
            }
        } elseif ($period === 'weekly') {
            // Last 8 weeks
            for ($i = 7; $i >= 0; $i--) {
                $date = clone $now;
                $date->sub(new \DateInterval("P{$i}W"));
                
                $weekStart = $date->format('Y-m-d');
                $weekEnd = $date->add(new \DateInterval('P6D'))->format('Y-m-d');
                
                $labels[] = "Week " . $date->format('W');
                
                $count = $db->query("SELECT COUNT(*) as count FROM {$this->table} WHERE DATE(created_at) BETWEEN ? AND ? AND status = 'active'", [$weekStart, $weekEnd])->getRow()->count;
                $data[] = (int)$count;
            }
        } else { // monthly
            // Last 6 months
            for ($i = 5; $i >= 0; $i--) {
                $date = clone $now;
                $date->sub(new \DateInterval("P{$i}M"));
                
                $monthStart = $date->format('Y-m-01');
                $monthEnd = $date->format('Y-m-t');
                
                $labels[] = $date->format('M Y');
                
                $count = $db->query("SELECT COUNT(*) as count FROM {$this->table} WHERE DATE(created_at) BETWEEN ? AND ? AND status = 'active'", [$monthStart, $monthEnd])->getRow()->count;
                $data[] = (int)$count;
            }
        }
        
        return [
            'labels' => $labels,
            'datasets' => [[
                'label' => 'Products Created',
                'data' => $data,
                'backgroundColor' => 'rgba(0, 0, 0, 0.1)',
                'borderColor' => 'rgba(0, 0, 0, 0.8)',
                'borderWidth' => 2,
                'fill' => true,
                'tension' => 0.4
            ]]
        ];
    }

    private function getPriceDistribution($db)
    {
        $ranges = [
            '₱0-500' => [0, 500],
            '₱501-1000' => [501, 1000],
            '₱1001-5000' => [1001, 5000],
            '₱5001+' => [5001, 999999999]
        ];
        
        $data = [];
        $labels = [];
        
        foreach ($ranges as $label => $range) {
            $labels[] = $label;
            if ($range[1] === 999999999) {
                $count = $db->query("SELECT COUNT(*) as count FROM {$this->table} WHERE price >= ? AND status = 'active'", [$range[0]])->getRow()->count;
            } else {
                $count = $db->query("SELECT COUNT(*) as count FROM {$this->table} WHERE price BETWEEN ? AND ? AND status = 'active'", [$range[0], $range[1]])->getRow()->count;
            }
            $data[] = (int)$count;
        }
        
        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
}
