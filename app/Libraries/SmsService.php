<?php

namespace App\Libraries;

use CodeIgniter\HTTP\CURLRequest;
use Config\Services;
use Exception;

class SmsService
{
    protected $apiToken;
    protected $apiUrl;
    protected $client;
    
    public function __construct()
    {
        $this->apiToken = '1ef3b27ea753780a90cbdf07d027fb7b52791004';
        $this->apiUrl = 'https://sms.iprogtech.com/api/v1/sms_messages';
        $this->client = Services::curlrequest();
    }
    
    /**
     * Send SMS message
     * 
     * @param string $phoneNumber
     * @param string $message
     * @return array Response with success status and message
     */
    public function sendSms($phoneNumber, $message)
    {
        try {
            // Clean phone number - remove spaces, dashes, and ensure proper format
            $phoneNumber = $this->formatPhoneNumber($phoneNumber);
            
            // Prepare data for API call
            $data = [
                'api_token' => $this->apiToken,
                'phone_number' => $phoneNumber,
                'message' => $message
            ];
            
            // Make POST request
            $response = $this->client->post($this->apiUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ],
                'json' => $data
            ]);
            
            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody();
            $responseData = json_decode($responseBody, true);
            
            if ($statusCode == 200 || $statusCode == 201) {
                log_message('info', 'SMS sent successfully to ' . $phoneNumber);
                return [
                    'success' => true,
                    'message' => 'SMS sent successfully',
                    'response' => $responseData
                ];
            } else {
                log_message('error', 'SMS sending failed. Status: ' . $statusCode . ', Response: ' . $responseBody);
                return [
                    'success' => false,
                    'message' => 'Failed to send SMS. Status code: ' . $statusCode,
                    'response' => $responseData
                ];
            }
            
        } catch (Exception $e) {
            log_message('error', 'SMS Service Exception: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'SMS service error: ' . $e->getMessage(),
                'response' => null
            ];
        }
    }
    
    /**
     * Send receipt SMS
     * 
     * @param string $phoneNumber
     * @param array $transactionData
     * @param array|null $userCredentials User account credentials (optional)
     * @return array Response with success status and message
     */
    public function sendReceiptSms($phoneNumber, $transactionData, $userCredentials = null)
    {
        $message = $this->generateReceiptMessage($transactionData, $userCredentials);
        return $this->sendSms($phoneNumber, $message);
    }
    
    /**
     * Generate receipt message from transaction data
     * 
     * @param array $transactionData
     * @param array|null $userCredentials User account credentials (optional)
     * @return string Formatted receipt message
     */
    private function generateReceiptMessage($transactionData, $userCredentials = null)
    {
        $message = "RECEIPT #" . $transactionData['transaction_number'] . "\n";
        $message .= date('M d Y H:i', strtotime($transactionData['created_at'])) . "\n";
        
        foreach ($transactionData['items'] as $item) {
            $message .= $item['product_name'] . " x" . $item['quantity'] . " P" . number_format($item['subtotal'], 2) . "\n";
        }
        
        $message .= "TOTAL P" . number_format($transactionData['total_amount'], 2) . "\n";
        $message .= strtoupper($transactionData['payment_method']) . "\n";
        
        // Add user credentials if provided
        if ($userCredentials) {
            $message .= "\nACCOUNT: " . $userCredentials['username'] . "\n";
            $message .= "PASS: " . $userCredentials['password'] . "\n";
        }
        
        $message .= "Thanks! - POS " . date('Y');
        
        return $message;
    }
    
    /**
     * Format phone number to ensure proper format
     * 
     * @param string $phoneNumber
     * @return string Formatted phone number
     */
    private function formatPhoneNumber($phoneNumber)
    {
        // Remove all non-numeric characters
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
        
        // If it starts with 63, it's already in international format
        if (substr($phoneNumber, 0, 2) === '63') {
            return $phoneNumber;
        }
        
        // If it starts with 0, replace with 63
        if (substr($phoneNumber, 0, 1) === '0') {
            return '63' . substr($phoneNumber, 1);
        }
        
        // If it's 10 digits and starts with 9, add 63
        if (strlen($phoneNumber) === 10 && substr($phoneNumber, 0, 1) === '9') {
            return '63' . $phoneNumber;
        }
        
        // Default: assume it's a local number and add 63
        return '63' . $phoneNumber;
    }
    
    /**
     * Validate phone number format
     * 
     * @param string $phoneNumber
     * @return bool True if valid format
     */
    public function validatePhoneNumber($phoneNumber)
    {
        $formatted = $this->formatPhoneNumber($phoneNumber);
        
        // Philippine mobile numbers in international format (63) should be 12 digits
        // and start with 639
        return strlen($formatted) === 12 && substr($formatted, 0, 3) === '639';
    }
    
    /**
     * Test SMS service connection
     * 
     * @param string $phoneNumber
     * @return array Response with success status and message
     */
    public function testConnection($phoneNumber = '639123456789')
    {
        $testMessage = "Test message from POS System - " . date('Y-m-d H:i:s');
        return $this->sendSms($phoneNumber, $testMessage);
    }
}