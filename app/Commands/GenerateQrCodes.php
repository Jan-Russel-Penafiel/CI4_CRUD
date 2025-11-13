<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\ProductModel;

class GenerateQrCodes extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'POS';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'pos:generate-qr';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generate QR codes for all products';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'pos:generate-qr [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--force' => 'Regenerate QR codes for all products, even if they already exist'
    ];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $productModel = new \App\Models\ProductModel();
        $force = array_key_exists('force', $params) || CLI::getOption('force');
        
        CLI::write('Starting QR code generation...', 'green');
        
        // Get all active products
        $products = $productModel->where('status', 'active')->findAll();
        
        if (empty($products)) {
            CLI::write('No products found.', 'yellow');
            return;
        }
        
        $generated = 0;
        $skipped = 0;
        $errors = 0;
        
        foreach ($products as $product) {
            $productId = $product['id'];
            $productName = $product['product_name'];
            
            // Skip if QR code already exists and not forcing
            if (!$force && !empty($product['qr_code'])) {
                CLI::write("Skipping {$productName} (QR code already exists)", 'yellow');
                $skipped++;
                continue;
            }
            
            CLI::write("Generating QR code for: {$productName}");
            
            try {
                if ($productModel->generateQrCode($productId)) {
                    CLI::write("✓ Generated QR code for: {$productName}", 'green');
                    $generated++;
                } else {
                    CLI::write("✗ Failed to generate QR code for: {$productName}", 'red');
                    $errors++;
                }
            } catch (\Exception $e) {
                CLI::write("✗ Error generating QR code for {$productName}: " . $e->getMessage(), 'red');
                $errors++;
            }
        }
        
        CLI::newLine();
        CLI::write("QR Code Generation Summary:", 'cyan');
        CLI::write("Generated: {$generated}", 'green');
        CLI::write("Skipped: {$skipped}", 'yellow');
        CLI::write("Errors: {$errors}", $errors > 0 ? 'red' : 'green');
        CLI::write("Total Products: " . count($products), 'blue');
        
        if ($errors > 0) {
            CLI::write('Some QR codes failed to generate. Check the logs for details.', 'red');
        } else {
            CLI::write('QR code generation completed successfully!', 'green');
        }
    }
}
