<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'transaction_number', 
        'total_amount', 
        'payment_method', 
        'customer_phone', 
        'sms_sent', 
        'receipt_data'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Validation rules
    protected $validationRules = [
        'transaction_number' => 'required|is_unique[transactions.transaction_number]',
        'total_amount' => 'required|decimal|greater_than[0]',
        'payment_method' => 'required|in_list[cash,card,digital]',
        'customer_phone' => 'permit_empty|max_length[20]'
    ];
    
    protected $validationMessages = [
        'transaction_number' => [
            'required' => 'Transaction number is required.',
            'is_unique' => 'Transaction number must be unique.'
        ],
        'total_amount' => [
            'required' => 'Total amount is required.',
            'decimal' => 'Total amount must be a valid decimal number.',
            'greater_than' => 'Total amount must be greater than 0.'
        ],
        'payment_method' => [
            'required' => 'Payment method is required.',
            'in_list' => 'Payment method must be cash, card, or digital.'
        ],
        'customer_phone' => [
            'max_length' => 'Phone number cannot exceed 20 characters.'
        ]
    ];
    
    /**
     * Create new transaction with auto-generated transaction number
     * 
     * @param array $data
     * @return int|false Transaction ID or false on failure
     */
    public function createTransaction($data)
    {
        // Generate unique transaction number if not provided
        if (!isset($data['transaction_number']) || empty($data['transaction_number'])) {
            $data['transaction_number'] = $this->generateTransactionNumber();
        }
        
        // Set default values
        $data['sms_sent'] = 0;
        
        if ($this->validate($data)) {
            return $this->insert($data);
        }
        return false;
    }
    
    /**
     * Generate unique transaction number
     * 
     * @return string Unique transaction number
     */
    private function generateTransactionNumber()
    {
        $prefix = 'TXN';
        $date = date('Ymd');
        $counter = 1;
        
        do {
            $transactionNumber = $prefix . $date . str_pad($counter, 4, '0', STR_PAD_LEFT);
            $counter++;
        } while ($this->where('transaction_number', $transactionNumber)->first());
        
        return $transactionNumber;
    }
    
    /**
     * Get transaction with items
     * 
     * @param int $transactionId
     * @return array|null Transaction data with items
     */
    public function getTransactionWithItems($transactionId)
    {
        $transaction = $this->find($transactionId);
        
        if (!$transaction) {
            return null;
        }
        
        $transactionItemModel = new TransactionItemModel();
        $items = $transactionItemModel->where('transaction_id', $transactionId)->findAll();
        
        $transaction['items'] = $items;
        
        return $transaction;
    }
    
    /**
     * Mark SMS as sent
     * 
     * @param int $transactionId
     * @return bool Success status
     */
    public function markSmsSent($transactionId)
    {
        return $this->update($transactionId, ['sms_sent' => 1]);
    }
    
    /**
     * Get daily sales summary for dashboard
     * 
     * @param string $date Date in Y-m-d format
     * @return array Sales summary with simple structure for dashboard
     */
    public function getDailySales($date = null)
    {
        if (!$date) {
            $date = date('Y-m-d');
        }
        
        // Get today's sales
        $todaySales = $this->selectSum('total_amount')
                          ->where('DATE(created_at)', $date)
                          ->first();
        
        // Get today's transaction count
        $todayTransactions = $this->where('DATE(created_at)', $date)
                                 ->countAllResults();
        
        return [
            'today_sales' => $todaySales['total_amount'] ?? 0.00,
            'today_transactions' => $todayTransactions,
        ];
    }

    /**
     * Get weekly sales data for charts
     * 
     * @return array Weekly sales data
     */
    public function getWeeklySales()
    {
        $weekAgo = date('Y-m-d', strtotime('-6 days'));
        $today = date('Y-m-d');
        
        $weeklySales = $this->select('DATE(created_at) as date, SUM(total_amount) as daily_total')
                           ->where('DATE(created_at) >=', $weekAgo)
                           ->where('DATE(created_at) <=', $today)
                           ->groupBy('DATE(created_at)')
                           ->orderBy('DATE(created_at)', 'ASC')
                           ->findAll();
        
        // Create array with all 7 days
        $salesData = [];
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $dayName = $days[date('w', strtotime($date))];
            $salesData[$dayName] = 0;
        }
        
        // Fill in actual sales data
        foreach ($weeklySales as $sale) {
            $dayName = $days[date('w', strtotime($sale['date']))];
            $salesData[$dayName] = (float)$sale['daily_total'];
        }
        
        return $salesData;
    }

    /**
     * Get weekly transactions count for charts
     * 
     * @return array Weekly transactions count
     */
    public function getWeeklyTransactions()
    {
        $weekAgo = date('Y-m-d', strtotime('-6 days'));
        $today = date('Y-m-d');
        
        $weeklyTransactions = $this->select('DATE(created_at) as date, COUNT(*) as daily_count')
                                  ->where('DATE(created_at) >=', $weekAgo)
                                  ->where('DATE(created_at) <=', $today)
                                  ->groupBy('DATE(created_at)')
                                  ->orderBy('DATE(created_at)', 'ASC')
                                  ->findAll();
        
        // Create array with all 7 days
        $transactionData = [];
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $dayName = $days[date('w', strtotime($date))];
            $transactionData[$dayName] = 0;
        }
        
        // Fill in actual transaction data
        foreach ($weeklyTransactions as $transaction) {
            $dayName = $days[date('w', strtotime($transaction['date']))];
            $transactionData[$dayName] = (int)$transaction['daily_count'];
        }
        
        return $transactionData;
    }

    /**
     * Get monthly sales data for charts
     * 
     * @return array Monthly sales data
     */
    public function getMonthlySales()
    {
        $monthAgo = date('Y-m-d', strtotime('-29 days'));
        $today = date('Y-m-d');
        
        $monthlySales = $this->select('DATE(created_at) as date, SUM(total_amount) as daily_total')
                            ->where('DATE(created_at) >=', $monthAgo)
                            ->where('DATE(created_at) <=', $today)
                            ->groupBy('DATE(created_at)')
                            ->orderBy('DATE(created_at)', 'ASC')
                            ->findAll();
        
        // Create array for the last 30 days
        $salesData = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = date('m/d', strtotime("-$i days"));
            $salesData[$date] = 0;
        }
        
        // Fill in actual sales data
        foreach ($monthlySales as $sale) {
            $date = date('m/d', strtotime($sale['date']));
            $salesData[$date] = (float)$sale['daily_total'];
        }
        
        return $salesData;
    }

    /**
     * Get detailed daily sales summary (legacy method for backward compatibility)
     * 
     * @param string $date Date in Y-m-d format
     * @return array Detailed sales summary
     */
    public function getDetailedDailySales($date = null)
    {
        if (!$date) {
            $date = date('Y-m-d');
        }
        
        $db = \Config\Database::connect();
        
        $result = $db->query("
            SELECT 
                COUNT(*) as total_transactions,
                SUM(total_amount) as total_sales,
                AVG(total_amount) as average_sale,
                payment_method,
                COUNT(*) as payment_count
            FROM {$this->table} 
            WHERE DATE(created_at) = ?
            GROUP BY payment_method
        ", [$date])->getResultArray();
        
        $summary = [
            'date' => $date,
            'total_transactions' => 0,
            'total_sales' => 0,
            'average_sale' => 0,
            'payment_methods' => []
        ];
        
        foreach ($result as $row) {
            $summary['total_transactions'] += $row['total_transactions'];
            $summary['total_sales'] += $row['total_sales'];
            $summary['payment_methods'][$row['payment_method']] = [
                'count' => $row['payment_count'],
                'amount' => $row['total_sales']
            ];
        }
        
        if ($summary['total_transactions'] > 0) {
            $summary['average_sale'] = $summary['total_sales'] / $summary['total_transactions'];
        }
        
        return $summary;
    }
    
    /**
     * Get transactions for a date range
     * 
     * @param string $startDate
     * @param string $endDate
     * @param int $perPage
     * @return array Paginated transactions
     */
    public function getTransactionsByDateRange($startDate, $endDate, $perPage = 20)
    {
        return $this->where('DATE(created_at) >=', $startDate)
                    ->where('DATE(created_at) <=', $endDate)
                    ->orderBy('created_at', 'DESC')
                    ->paginate($perPage);
    }
    
    /**
     * Get recent transactions
     * 
     * @param int $limit
     * @return array Recent transactions
     */
    public function getRecentTransactions($limit = 10)
    {
        return $this->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
}