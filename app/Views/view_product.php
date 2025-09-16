<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-black: #000000;
            --primary-white: #ffffff;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
            --border-color: #dee2e6;
        }
        
        body {
            background-color: var(--light-gray);
            color: var(--primary-black);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.8rem;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            padding: 1.5rem 0;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            font-size: 1.5rem;
        }
        
        .header p {
            font-size: 0.7rem;
        }
        
        .card {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-size: 0.75rem;
        }
        
        .card-header h5, .card-header h6 {
            font-size: 0.9rem;
        }
        
        .btn {
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
        }
        
        .btn-lg {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
        
        .info-row {
            border-bottom: 1px solid var(--border-color);
            padding: 0.75rem 0;
            font-size: 0.75rem;
        }
        
        .price-display {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
        }
        
        .alert {
            font-size: 0.75rem;
        }
        
        .btn-black {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white);
        }
        
        .btn-black:hover {
            background-color: var(--dark-gray);
            border-color: var(--dark-gray);
            color: var(--primary-white);
        }
        
        .btn-outline-black {
            border-color: var(--primary-black);
            color: var(--primary-black);
        }
        
        .btn-outline-black:hover {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white);
        }
        
        .price-card {
            background: black;
            color: white;
            border: none;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--dark-gray);
        }
        
        .info-value {
            font-weight: 500;
        }
        
        .badge-custom {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
        }
        
        .status-badge {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-0"><i class="fas fa-eye me-3"></i>Product Details</h1>
                    <p class="mb-0 mt-2">Comprehensive product information and management</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="d-flex justify-content-end align-items-center gap-3">
                        <a href="<?= base_url() ?>" class="btn btn-outline-light">
                            <i class="fas fa-arrow-left me-2"></i>Back to Products
                        </a>
                        <a href="<?= base_url('products/edit/' . $product['id']) ?>" class="btn btn-light">
                            <i class="fas fa-edit me-2"></i>Edit Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Product Information -->
                <div class="card mb-4">
                    <div class="card-header bg-black text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-box me-2"></i><?= esc($product['product_name']) ?></h5>
                            <span class="badge badge-custom status-badge">
                                <i class="fas fa-check-circle me-1"></i>Active Product
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="info-label"><i class="fas fa-hashtag me-2"></i>Product ID:</span>
                                        </div>
                                        <div class="col-md-9">
                                            <span class="badge bg-dark badge-custom">#<?= $product['id'] ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="info-label"><i class="fas fa-tag me-2"></i>Product Name:</span>
                                        </div>
                                        <div class="col-md-9">
                                            <span class="info-value"><?= esc($product['product_name']) ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="info-label"><i class="fas fa-align-left me-2"></i>Description:</span>
                                        </div>
                                        <div class="col-md-9">
                                            <?php if (!empty($product['description'])): ?>
                                                <div class="info-value"><?= nl2br(esc($product['description'])) ?></div>
                                            <?php else: ?>
                                                <em class="text-muted">No description provided</em>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="info-label"><i class="fas fa-calendar-plus me-2"></i>Date Created:</span>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="info-value">
                                                <?= date('F d, Y \a\t g:i A', strtotime($product['created_at'])) ?>
                                                <br><small class="text-muted"><?= date('Y-m-d H:i:s', strtotime($product['created_at'])) ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="info-label"><i class="fas fa-calendar-edit me-2"></i>Last Modified:</span>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="info-value">
                                                <?= date('F d, Y \a\t g:i A', strtotime($product['updated_at'])) ?>
                                                <br><small class="text-muted"><?= date('Y-m-d H:i:s', strtotime($product['updated_at'])) ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="card price-card">
                                        <div class="card-body">
                                            <i class="fas fa-peso-sign fa-3x mb-3"></i>
                                            <div class="price-display">₱<?= number_format($product['price'], 2) ?></div>
                                            <p class="mb-0 opacity-75">Current Retail Price</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <small class="text-muted">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Price includes applicable taxes
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Add keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + E for edit
                if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
                    e.preventDefault();
                    window.location.href = '<?= base_url('products/edit/' . $product['id']) ?>';
                }
                
                // Ctrl/Cmd + P for print
                if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
                    e.preventDefault();
                    window.print();
                }
                
                // Escape to go back
                if (e.key === 'Escape') {
                    window.location.href = '<?= base_url() ?>';
                }
            });
        });
        
        // Enhanced print functionality
        function printProductDetails() {
            window.print();
        }

        // Print styles
        const printCSS = `
            @media print {
                body { background: white !important; font-size: 12pt !important; }
                .header, .btn { display: none !important; }
                .card { border: 1px solid #000 !important; box-shadow: none !important; }
                .card-header { background: #000 !important; color: white !important; }
                .price-card { background: #28a745 !important; }
                .container { max-width: 100% !important; margin: 0 !important; padding: 0 !important; }
            }
        `;
        
        const style = document.createElement('style');
        style.textContent = printCSS;
        document.head.appendChild(style);
    </script>
</body>
</html>
