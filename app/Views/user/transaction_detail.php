<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title><?= $title ?> - POS System</title>
    <meta name="author" content="Jan Russel E. Peñafiel">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-black: #000;
            --primary-white: #fff;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
            --border-color: #dee2e6
        }

        body {
            background-color: var(--light-gray);
            color: var(--primary-black);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: .8rem
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }

        .navbar-brand {
            color: var(--primary-white) !important;
            font-weight: 600;
            font-size: 1rem;
        }

        .navbar-nav .nav-link {
            color: rgba(255,255,255,.85) !important;
            margin: 0 0.5rem;
            transition: color 0.3s;
            font-size: .8rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-white) !important;
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-white) !important;
            font-weight: 500;
        }

        .btn {
            font-size: .7rem;
            padding: .25rem .5rem
        }

        .btn-lg {
            font-size: .8rem;
            padding: .4rem .8rem
        }

        .btn-black {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white)
        }

        .btn-black:hover {
            background-color: var(--dark-gray);
            border-color: var(--dark-gray);
            color: var(--primary-white)
        }

        .btn-outline-black {
            border-color: var(--primary-black);
            color: var(--primary-black)
        }

        .btn-outline-black:hover {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white)
        }

        .receipt {
            max-width: 400px;
            margin: 0 auto;
            background: var(--primary-white);
            border: 2px solid var(--primary-black);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .receipt-header {
            text-align: center;
            padding: 20px;
            border-bottom: 2px dashed var(--primary-black);
            background: var(--light-gray);
            border-radius: 10px 10px 0 0;
        }

        .receipt-body {
            padding: 20px;
        }

        .receipt-footer {
            text-align: center;
            padding: 20px;
            border-top: 2px dashed var(--primary-black);
            background: var(--light-gray);
            border-radius: 0 0 10px 10px;
        }

        .receipt-item {
            display: flex;
            justify-content: between;
            align-items: flex-start;
            margin-bottom: 10px;
            padding: 5px 0;
        }

        .receipt-item:not(:last-child) {
            border-bottom: 1px dotted var(--primary-black);
        }

        .item-details {
            flex-grow: 1;
        }

        .item-price {
            text-align: right;
            margin-left: 10px;
        }

        .receipt-total {
            border-top: 2px solid var(--primary-black);
            margin-top: 15px;
            padding-top: 10px;
            font-size: 1.1em;
            font-weight: bold;
        }

        .sms-status {
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid var(--primary-black);
        }

        .sms-sent {
            background: var(--light-gray);
            color: var(--primary-black);
        }

        .sms-not-sent {
            background: var(--light-gray);
            color: var(--primary-black);
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .page-header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        .alert {
            font-size: .75rem
        }

        .alert-success {
            background-color: var(--primary-white);
            border-color: var(--primary-black);
            color: var(--primary-black)
        }

        .alert-danger {
            background-color: var(--light-gray);
            border-color: var(--primary-black);
            color: var(--primary-black)
        }

        .modal-content {
            border: 2px solid var(--primary-black);
            border-radius: 10px
        }

        .modal-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
            border-bottom: none
        }

        .table {
            font-size: .7rem
        }

        .table th {
            font-size: .65rem;
            padding: .5rem
        }

        .table td {
            padding: .5rem
        }

        @media (max-width:768px) {
            .container-fluid {
                padding: 0.5rem
            }

            .page-header {
                padding: 1rem;
                margin-bottom: 1rem
            }

            .page-header h1 {
                font-size: 1.2rem
            }

            .receipt {
                max-width: 100%;
                margin: 0;
            }

            .receipt-header, .receipt-body, .receipt-footer {
                padding: 15px;
            }

            .navbar-brand {
                font-size: .85rem
            }

            .navbar-nav .nav-link {
                font-size: .7rem;
                padding: 0.5rem 0.75rem
            }

            .btn {
                font-size: .7rem;
                padding: .4rem .8rem
            }

            .alert {
                font-size: .7rem;
                padding: 0.5rem
            }
        }

        @media (max-width:576px) {
            .container-fluid {
                padding: 0.25rem
            }

            .receipt-header, .receipt-body, .receipt-footer {
                padding: 12px;
            }

            .receipt-item {
                padding: 6px 0;
                font-size: .75rem;
            }

            .navbar-toggler {
                font-size: .75rem;
                padding: 0.25rem 0.5rem
            }
        }

        @media print {
            .no-print {
                display: none !important;
            }
            .receipt {
                box-shadow: none;
                border: none;
                max-width: none;
                width: 100%;
            }
            body {
                background: white !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('user/dashboard') ?>">
                <i class="fas fa-user-circle me-2"></i><span class="d-none d-sm-inline">User Portal</span><span class="d-sm-none">Portal</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/dashboard') ?>">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('user/transactions') ?>">
                            <i class="fas fa-receipt me-1"></i>Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/profile') ?>">
                            <i class="fas fa-user me-1"></i>Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/products') ?>">
                            <i class="fas fa-box me-1"></i>Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Page Header -->
        <div class="page-header no-print">
            <h1><i class="fas fa-receipt me-2"></i>Transaction Receipt</h1>
            <p class="mb-0">Transaction #<?= esc($transaction['transaction_number']) ?></p>
        </div>

        <div class="mb-3 no-print">
            <a href="<?= base_url('user/transactions') ?>" class="btn btn-outline-black">
                <i class="fas fa-arrow-left me-2"></i>Back to Transactions
            </a>
            <button onclick="window.print()" class="btn btn-black ms-2">
                <i class="fas fa-print me-2"></i>Print Receipt
            </button>
        </div>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show no-print">
                <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show no-print">
                <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Receipt -->
        <div class="receipt">
            <!-- Header -->
            <div class="receipt-header">
                <h3><i class="fas fa-store me-2"></i>POS System</h3>
                <p class="mb-1">Point of Sale Receipt</p>
                <p class="text-muted small mb-0">Thank you for your purchase!</p>
            </div>

            <!-- Body -->
            <div class="receipt-body">
                <!-- Transaction Info -->
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <strong>Transaction #:</strong><br>
                            <small><?= esc($transaction['transaction_number']) ?></small>
                        </div>
                        <div class="col-6 text-end">
                            <strong>Date & Time:</strong><br>
                            <small><?= date('M d, Y H:i', strtotime($transaction['created_at'])) ?></small>
                        </div>
                    </div>
                </div>

                <!-- Customer Info -->
                <?php if ($transaction['customer_phone']): ?>
                <div class="mb-3">
                    <strong>Customer Phone:</strong> <?= esc($transaction['customer_phone']) ?>
                </div>
                <?php endif; ?>

                <!-- Items -->
                <div class="mb-3">
                    <h6><i class="fas fa-shopping-bag me-2"></i>Items Purchased</h6>
                    <?php if (!empty($transaction['items'])): ?>
                        <?php foreach ($transaction['items'] as $item): ?>
                        <div class="receipt-item">
                            <div class="item-details">
                                <div class="fw-bold"><?= esc($item['product_name']) ?></div>
                                <small class="text-muted">
                                    <?= $item['quantity'] ?> × ₱<?= number_format($item['price'], 2) ?>
                                </small>
                            </div>
                            <div class="item-price">
                                <div>₱<?= number_format($item['subtotal'], 2) ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-muted">No items found for this transaction.</div>
                    <?php endif; ?>
                </div>

                <!-- Total -->
                <div class="receipt-total">
                    <div class="d-flex justify-content-between">
                        <span>Total Amount:</span>
                        <span>₱<?= number_format($transaction['total_amount'], 2) ?></span>
                    </div>
                    <div class="d-flex justify-content-between mt-1">
                        <span>Payment Method:</span>
                        <span><?= ucfirst($transaction['payment_method']) ?></span>
                    </div>
                </div>

                <!-- SMS Status -->
                <?php if ($transaction['customer_phone']): ?>
                <div class="sms-status <?= $transaction['sms_sent'] ? 'sms-sent' : 'sms-not-sent' ?>">
                    <i class="fas fa-sms me-2"></i>
                    <?php if ($transaction['sms_sent']): ?>
                        Receipt sent via SMS to <?= esc($transaction['customer_phone']) ?>
                    <?php else: ?>
                        SMS receipt not sent
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Footer -->
            <div class="receipt-footer">
                <p class="mb-1"><strong>Thank you for your business!</strong></p>
                <p class="small text-muted mb-0">
                    Receipt generated on <?= date('Y-m-d H:i:s') ?>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Enhanced print functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + P for print
                if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
                    e.preventDefault();
                    window.print();
                }
                
                // Escape to go back
                if (e.key === 'Escape') {
                    window.location.href = '<?= base_url('user/transactions') ?>';
                }
            });
        });
    </script>
</body>
</html>