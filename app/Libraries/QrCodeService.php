<?php

namespace App\Libraries;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Exception;

class QrCodeService
{
    protected $writer;
    protected $renderer;
    
    public function __construct()
    {
        // Create renderer with SVG backend (no external dependencies required)
        $this->renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );
        $this->writer = new Writer($this->renderer);
    }
    
    /**
     * Generate QR code for a product
     * 
     * @param int $productId
     * @param string $productName
     * @param float $price
     * @return string Base64 encoded QR code image
     */
    public function generateProductQrCode($productId, $productName, $price)
    {
        // Create JSON data for the QR code
        $qrData = json_encode([
            'type' => 'product',
            'id' => $productId,
            'name' => $productName,
            'price' => $price,
            'timestamp' => time()
        ]);
        
        try {
            // Generate QR code
            $qrCode = $this->writer->writeString($qrData);
            
            // Convert to base64
            return base64_encode($qrCode);
        } catch (Exception $e) {
            log_message('error', 'QR Code generation failed: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Generate QR code as data URI for direct use in HTML
     * 
     * @param int $productId
     * @param string $productName
     * @param float $price
     * @return string Data URI or null on failure
     */
    public function generateProductQrCodeDataUri($productId, $productName, $price)
    {
        $base64 = $this->generateProductQrCode($productId, $productName, $price);
        
        if ($base64) {
            return 'data:image/svg+xml;base64,' . $base64;
        }
        
        return null;
    }
    
    /**
     * Save QR code to file
     * 
     * @param int $productId
     * @param string $productName
     * @param float $price
     * @param string $filePath
     * @return bool Success status
     */
    public function saveProductQrCodeToFile($productId, $productName, $price, $filePath)
    {
        // Create JSON data for the QR code
        $qrData = json_encode([
            'type' => 'product',
            'id' => $productId,
            'name' => $productName,
            'price' => $price,
            'timestamp' => time()
        ]);
        
        try {
            // Generate QR code and save to file
            $this->writer->writeFile($qrData, $filePath);
            return true;
        } catch (Exception $e) {
            log_message('error', 'QR Code file save failed: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Decode QR code data
     * 
     * @param string $qrData
     * @return array|null Decoded data or null on failure
     */
    public function decodeQrData($qrData)
    {
        try {
            $decoded = json_decode($qrData, true);
            
            // Validate the QR code structure
            if (isset($decoded['type']) && $decoded['type'] === 'product' && 
                isset($decoded['id']) && isset($decoded['name']) && isset($decoded['price'])) {
                return $decoded;
            }
            
            return null;
        } catch (Exception $e) {
            log_message('error', 'QR Code decode failed: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Generate simple text QR code
     * 
     * @param string $text
     * @return string Base64 encoded QR code image
     */
    public function generateTextQrCode($text)
    {
        try {
            $qrCode = $this->writer->writeString($text);
            return base64_encode($qrCode);
        } catch (Exception $e) {
            log_message('error', 'Text QR Code generation failed: ' . $e->getMessage());
            return null;
        }
    }
}