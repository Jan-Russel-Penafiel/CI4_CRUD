<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - POS System</title>
    <meta name="author" content="Jan Russel E. Peñafiel">
    <meta name="description" content="POS System Dashboard - Created by Jan Russel E. Peñafiel">
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
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

        .header {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            padding: 1.5rem 0;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, .1)
        }

        .header h1 {
            font-size: 1.5rem
        }

        .header p {
            font-size: .7rem
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

        .card {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            transition: transform .2s ease;
            font-size: .75rem
        }

        .card-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
            border-bottom: none;
            font-weight: 600
        }

        .card-header h5,
        .card-header h6 {
            font-size: .9rem
        }

        .cart-counter {
            background: var(--primary-white);
            color: var(--primary-black);
            border: 2px solid var(--primary-white);
            border-radius: 50%;
            padding: 0.2rem 0.4rem;
            font-size: 0.7rem;
            font-weight: 700;
            position: absolute;
            top: -10px;
            right: -12px;
            min-width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .cart-counter:empty {
            display: none;
        }

        .card-hover {
            transition: transform 0.2s;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .sales-card {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            border: 2px solid var(--primary-black)
        }

        .transactions-card {
            background: linear-gradient(135deg, var(--dark-gray) 0%, var(--primary-black) 100%);
            color: var(--primary-white);
            border: 2px solid var(--primary-black)
        }

        .products-card {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            border: 2px solid var(--primary-black)
        }

        .action-btn {
            width: 100%;
            height: 120px;
            font-size: 1.1rem;
            border-radius: 15px;
            border: 2px solid var(--primary-black);
            background-color: var(--primary-white);
            color: var(--primary-black);
            transition: all 0.3s ease
        }

        .action-btn:hover {
            background-color: var(--primary-black);
            color: var(--primary-white);
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

        .form-control {
            font-size: .75rem;
            border: 1px solid var(--border-color);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out
        }

        .form-control:focus {
            border-color: var(--primary-black);
            box-shadow: 0 0 0 .2rem rgba(0, 0, 0, .25)
        }

        .btn {
            font-size: .7rem;
            padding: .25rem .5rem
        }

        .btn-lg {
            font-size: .8rem;
            padding: .4rem .8rem
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

        .badge {
            background-color: var(--primary-black) !important;
            color: var(--primary-white)
        }

        .modal-content {
            border: 2px solid var(--primary-black);
            border-radius: 10px
        }

        .modal-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
            border-bottom: none;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-header .modal-title {
            margin-bottom: 0;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .toast {
            background-color: var(--primary-black);
            border: 2px solid var(--primary-white);
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            font-size: .65rem;
            min-width: 200px;
            max-width: 280px;
            margin-bottom: .25rem;
            color: var(--primary-white)
        }

        .toast-header {
            background-color: var(--primary-black);
            border-bottom: 1px solid var(--primary-white);
            padding: .3rem .5rem;
            font-weight: 600;
            color: var(--primary-white);
            font-size: .6rem
        }

        .toast-body {
            padding: .4rem .5rem;
            color: var(--primary-white);
            background-color: var(--primary-black);
            font-size: .65rem;
            line-height: 1.2
        }

        .toast.bg-success,
        .toast.bg-danger,
        .toast.bg-info,
        .toast.bg-primary {
            background-color: var(--primary-black);
            border-color: var(--primary-white)
        }

        .toast.bg-success .toast-header,
        .toast.bg-danger .toast-header,
        .toast.bg-info .toast-header,
        .toast.bg-primary .toast-header {
            background-color: var(--primary-black);
            color: var(--primary-white)
        }

        .toast .btn-close {
            font-size: .5rem;
            padding: .2rem;
            filter: invert(1)
        }

        .modal .btn-close {
            background-color: var(--primary-white);
            border: 2px solid var(--primary-black);
            border-radius: 50%;
            width: 32px;
            height: 32px;
            font-size: 1rem;
            font-weight: 700;
            opacity: 1;
            filter: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal .btn-close:hover {
            background-color: var(--primary-black);
            color: var(--primary-white);
            filter: invert(1);
        }

        .modal .btn-close:focus {
            box-shadow: 0 0 0 .25rem rgba(0, 0, 0, .25);
        }

        .toast .toast-header i {
            font-size: .6rem
        }

        .toast-container {
            max-height: 100vh;
            overflow-y: auto
        }

        .toast-container::-webkit-scrollbar {
            width: 4px
        }

        .toast-container::-webkit-scrollbar-track {
            background: transparent
        }

        .toast-container::-webkit-scrollbar-thumb {
            background: var(--primary-white);
            border-radius: 2px
        }

        .toast-container::-webkit-scrollbar-thumb:hover {
            background: var(--dark-gray)
        }

        .toast.hiding {
            animation: slideOutBottom .3s ease-in
        }

        /* Quantity input styling in search results */
        .quantity-input {
            border-color: var(--border-color);
            text-align: center;
            font-size: 0.75rem;
        }

        .quantity-input:focus {
            border-color: var(--primary-black);
            box-shadow: 0 0 0 .2rem rgba(0, 0, 0, .25);
        }

        .list-group-item .input-group {
            min-width: 120px;
        }

        @keyframes slideInBottom {
            from {
                transform: translateY(100%);
                opacity: 0
            }
            to {
                transform: translateY(0);
                opacity: 1
            }
        }

        @keyframes slideOutBottom {
            from {
                transform: translateY(0);
                opacity: 1
            }
            to {
                transform: translateY(100%);
                opacity: 0
            }
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.1rem
        }

        .nav-link {
            font-size: .8rem
        }

        @media (max-width: 768px) {
            .action-btn {
                height: 100px;
                font-size: 1rem
            }
        }

        /* Statistics Chart Styles - Matching index.php */
        .chart-container {
            position: relative;
            height: 120px;
            width: 100%;
            margin: 0.3rem 0;
        }

        .stats-card {
            transition: all 0.3s ease-in-out;
            min-height: 200px;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stats-card .card-header {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            border-bottom: 1px solid var(--primary-black);
            padding: 0.4rem 0.6rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .stats-card .card-body {
            padding: 0.6rem;
            background-color: var(--primary-white);
            color: var(--primary-black);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .stats-value {
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0.3rem 0;
        }

        .stats-label {
            font-size: 0.65rem;
            opacity: 0.8;
            margin-bottom: 0.5rem;
        }

        .stats-icon {
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
            opacity: 0.7;
        }

        .chart-legend {
            font-size: 0.6rem;
            text-align: center;
            margin-top: 0.3rem;
        }

        canvas {
            font-size: 0.6rem;
        }

        @media (max-width: 768px) {
            .chart-container {
                height: 100px;
            }
            
            .stats-card {
                min-height: 180px;
            }
            
            .stats-value {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="toast-container position-fixed bottom-0 start-0 p-2" style="z-index:9999;"></div>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-1"><i class="fas fa-cash-register me-2"></i>POS System - Dashboard</h1>
                    <p class="mb-0 opacity-75">Point of Sale Management System</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <nav>
                        <a href="<?= base_url('products') ?>" class="text-white me-3 text-decoration-none">
                            <i class="fas fa-box me-1"></i>Products
                        </a>
                        <a href="<?= base_url('pos/scanner') ?>" class="text-white me-3 text-decoration-none">
                            <i class="fas fa-qrcode me-1"></i>Scanner
                        </a>
                        <button class="text-white me-3 text-decoration-none bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fas fa-search me-1"></i>Search Products
                        </button>
                        <a href="<?= base_url('pos/checkout') ?>" class="text-white position-relative text-decoration-none">
                            <i class="fas fa-shopping-cart me-1"></i>Cart
                            <span class="cart-counter" id="cartCounter"><?= count($cart) ?></span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">


        <!-- Sales Summary Cards with Charts -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card stats-card card-hover h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-peso-sign stats-icon"></i>
                        <h6 class="mb-0">Today's Sales</h6>
                    </div>
                    <div class="card-body text-center">
                        <div class="stats-value">₱<?= number_format($dailySales['today_sales'], 2) ?></div>
                        <div class="stats-label">Today</div>
                        <div class="chart-container">
                            <canvas id="salesChart"></canvas>
                        </div>
                        <div class="chart-legend">
                            <small class="text-muted">Weekly Sales Trend</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stats-card card-hover h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-receipt stats-icon"></i>
                        <h6 class="mb-0">Transactions</h6>
                    </div>
                    <div class="card-body text-center">
                        <div class="stats-value"><?= $dailySales['today_transactions'] ?></div>
                        <div class="stats-label">Today</div>
                        <div class="chart-container">
                            <canvas id="transactionsChart"></canvas>
                        </div>
                        <div class="chart-legend">
                            <small class="text-muted">Weekly Transactions</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stats-card card-hover h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-exclamation-triangle stats-icon"></i>
                        <h6 class="mb-0">Low Stock Alert</h6>
                    </div>
                    <div class="card-body text-center">
                        <div class="stats-value"><?= $lowStockCount ?></div>
                        <div class="stats-label">Products</div>
                        <div class="chart-container">
                            <canvas id="stockChart"></canvas>
                        </div>
                        <div class="chart-legend">
                            <small class="text-muted">Stock Status Overview</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Cart -->
        <?php if (!empty($cart)): ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Current Cart</h5>
                        <a href="<?= base_url('pos/checkout') ?>" class="btn btn-black">
                            <i class="fas fa-credit-card me-1"></i>Checkout
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php foreach ($cart as $productId => $item): ?>
                                    <tr data-product-id="<?= $productId ?>">
                                        <td><?= esc($item['product_name']) ?></td>
                                        <td>₱<?= number_format($item['price'], 2) ?></td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm quantity-input" 
                                                   value="<?= $item['quantity'] ?>" min="1" 
                                                   data-product-id="<?= $productId ?>" style="width: 70px;">
                                        </td>
                                        <td>₱<?= number_format($item['subtotal'], 2) ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-black remove-item" data-product-id="<?= $productId ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $total += $item['subtotal']; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-dark text-white">
                                        <th colspan="3">Total</th>
                                        <th>₱<?= number_format($total, 2) ?></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Recent Transactions & Low Stock -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Recent Transactions</h5>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($recentTransactions)): ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Transaction #</th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <th>SMS</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentTransactions as $transaction): ?>
                                    <tr>
                                        <td><?= esc($transaction['transaction_number']) ?></td>
                                        <td>₱<?= number_format($transaction['total_amount'], 2) ?></td>
                                        <td><span class="badge bg-secondary"><?= ucfirst($transaction['payment_method']) ?></span></td>
                                        <td>
                                            <?php if ($transaction['sms_sent']): ?>
                                                <i class="fas fa-check-circle text-success" title="SMS Sent"></i>
                                            <?php else: ?>
                                                <i class="fas fa-times-circle text-muted" title="No SMS"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= date('M d, H:i', strtotime($transaction['created_at'])) ?></td>
                                        <td>
                                            <a href="<?= base_url('pos/receipt/' . $transaction['id']) ?>" class="btn btn-sm btn-outline-black">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <p class="text-muted text-center mb-0">No recent transactions</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Low Stock Alert (Horizontal Rectangle) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Low Stock Alert</h5>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($lowStockProducts)): ?>
                        <div class="row g-2">
                            <?php foreach ($lowStockProducts as $product): ?>
                            <div class="col-md-3 col-sm-4 col-6">
                                <div class="d-flex justify-content-between align-items-center p-2 border rounded bg-light">
                                    <div class="flex-grow-1">
                                        <small class="fw-bold d-block text-truncate"><?= esc($product['product_name']) ?></small>
                                        <small class="text-danger">Stock: <?= $product['stock_quantity'] ?></small>
                                    </div>
                                    <a href="<?= base_url('products/edit/' . $product['id']) ?>" class="btn btn-sm btn-outline-black ms-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                        <p class="text-muted text-center mb-0">All products have sufficient stock</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Products Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Search Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="productSearch" placeholder="Search products...">
                    </div>
                    <div id="searchResults"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Toast Notification Configuration
        const ToastConfig = {
            maxToasts: 5,
            loadingToastId: null
        };

        // Notification Service
        const NotificationService = {
            initializeFlashMessages() {
                <?php if (session()->getFlashdata('success')): ?>
                this.showNotification('<?= addslashes(session()->getFlashdata('success')) ?>', 'success');
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                this.showNotification('<?= addslashes(session()->getFlashdata('error')) ?>', 'error');
                <?php endif; ?>
                <?php if (session()->getFlashdata('validation_errors')): ?>
                <?php 
                $errors = session()->getFlashdata('validation_errors'); 
                if (is_array($errors)) {
                    $errorMessage = "Please fix the following errors:\n• " . implode("\n• ", array_values($errors));
                } else {
                    $errorMessage = "Validation errors occurred.";
                }
                ?>
                this.showNotification('<?= addslashes($errorMessage) ?>', 'error');
                <?php endif; ?>
            },

            showNotification(message, type = 'info') {
                const container = document.querySelector('.toast-container');
                if (!container) {
                    console.error('Toast container not found');
                    return;
                }

                const toasts = container.querySelectorAll('.toast');
                if (toasts.length >= ToastConfig.maxToasts) {
                    this.removeOldestToast(toasts);
                }

                const toastId = this.generateToastId();
                const config = this.getToastConfig(type);
                const html = this.buildToastHTML(toastId, config, message, type);

                container.insertAdjacentHTML('beforeend', html);
                return this.showToast(toastId, config, type);
            },

            removeOldestToast(toasts) {
                const oldest = toasts[0];
                const bsToast = bootstrap.Toast.getInstance(oldest);
                if (bsToast) {
                    bsToast.hide();
                } else {
                    oldest.remove();
                }
            },

            generateToastId() {
                return 'toast-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
            },

            getToastConfig(type) {
                const configs = {
                    'success': { bgClass: 'bg-success', icon: 'fas fa-check-circle', title: 'Success', delay: 4000 },
                    'error': { bgClass: 'bg-danger', icon: 'fas fa-exclamation-circle', title: 'Error', delay: 6000 },
                    'info': { bgClass: 'bg-info', icon: 'fas fa-info-circle', title: 'Information', delay: 5000 },
                    'loading': { bgClass: 'bg-white text-dark', icon: 'fas fa-spinner fa-spin', title: 'Loading', delay: 0 }
                };
                return configs[type] || configs['info'];
            },

            buildToastHTML(toastId, config, message, type) {
                const closeButton = type !== 'loading' 
                    ? '<button type="button" class="btn-close" data-bs-dismiss="toast"></button>' 
                    : '';

                return `<div class="toast ${config.bgClass}" id="${toastId}" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="${config.icon} me-2"></i>
                        <strong class="me-auto">${config.title}</strong>
                        ${closeButton}
                    </div>
                    <div class="toast-body">${message}</div>
                </div>`;
            },

            showToast(toastId, config, type) {
                const toastEl = document.getElementById(toastId);
                const toast = new bootstrap.Toast(toastEl, {
                    delay: config.delay,
                    autohide: config.delay > 0
                });

                toastEl.addEventListener('hidden.bs.toast', () => {
                    toastEl.remove();
                    if (ToastConfig.loadingToastId === toastId) {
                        ToastConfig.loadingToastId = null;
                    }
                });

                toast.show();
                toastEl.style.animation = 'slideInBottom 0.3s ease-out';
                
                if (type === 'loading') {
                    ToastConfig.loadingToastId = toastId;
                }
                
                return { toast, toastId };
            },

            showSuccess(message) {
                this.showNotification(message, 'success');
            },

            showError(message) {
                this.showNotification(message, 'error');
            },

            showInfo(message) {
                this.showNotification(message, 'info');
            },

            showLoading(message) {
                this.hideLoading();
                return this.showNotification(message, 'loading');
            },

            hideLoading() {
                if (ToastConfig.loadingToastId) {
                    const toast = document.getElementById(ToastConfig.loadingToastId);
                    if (toast) {
                        const bs = bootstrap.Toast.getInstance(toast);
                        if (bs) bs.hide();
                    }
                    ToastConfig.loadingToastId = null;
                }
            },

            clearAll() {
                document.querySelectorAll('.toast').forEach(t => {
                    const bs = bootstrap.Toast.getInstance(t);
                    if (bs) bs.hide();
                });
            }
        };

        // Chart.js Configuration for Dashboard Statistics
        document.addEventListener('DOMContentLoaded', function() {
            NotificationService.initializeFlashMessages();
            initializeCharts();
        });

        function initializeCharts() {
            // Common chart configuration matching index.php statistics
            const commonOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        display: false
                    },
                    y: {
                        display: false
                    }
                }
            };

            // Sales Chart (Line Chart)
            const salesCtx = document.getElementById('salesChart').getContext('2d');
            new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: [<?php echo '"' . implode('", "', array_keys($weeklySales)) . '"'; ?>],
                    datasets: [{
                        label: 'Sales',
                        data: [<?php echo implode(', ', array_values($weeklySales)); ?>],
                        borderColor: '#000',
                        backgroundColor: 'rgba(0, 0, 0, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#000',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 4
                    }]
                },
                options: {
                    ...commonOptions,
                    scales: {
                        ...commonOptions.scales,
                        y: {
                            ...commonOptions.scales.y,
                            beginAtZero: true
                        }
                    }
                }
            });

            // Transactions Chart (Bar Chart)
            const transactionsCtx = document.getElementById('transactionsChart').getContext('2d');
            new Chart(transactionsCtx, {
                type: 'bar',
                data: {
                    labels: [<?php echo '"' . implode('", "', array_keys($weeklyTransactions)) . '"'; ?>],
                    datasets: [{
                        label: 'Transactions',
                        data: [<?php echo implode(', ', array_values($weeklyTransactions)); ?>],
                        backgroundColor: [
                            'rgba(0, 0, 0, 0.8)',
                            'rgba(0, 0, 0, 0.7)',
                            'rgba(0, 0, 0, 0.6)',
                            'rgba(0, 0, 0, 0.5)',
                            'rgba(0, 0, 0, 0.4)',
                            'rgba(0, 0, 0, 0.3)',
                            'rgba(0, 0, 0, 0.9)'
                        ],
                        borderColor: '#000',
                        borderWidth: 1
                    }]
                },
                options: commonOptions
            });

            // Stock Chart (Doughnut Chart)
            const stockCtx = document.getElementById('stockChart').getContext('2d');
            const lowStockCount = <?= $lowStockCount ?>;
            const totalProducts = <?= $totalProducts ?>;
            const adequateStock = Math.max(0, totalProducts - lowStockCount);
            
            new Chart(stockCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Low Stock', 'Adequate Stock'],
                    datasets: [{
                        data: [lowStockCount, adequateStock],
                        backgroundColor: [
                            'rgba(220, 53, 69, 0.8)',
                            'rgba(0, 0, 0, 0.8)'
                        ],
                        borderColor: [
                            '#dc3545',
                            '#000'
                        ],
                        borderWidth: 2,
                        cutout: '60%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }

        // Update cart quantities
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                const productId = this.dataset.productId;
                const quantity = this.value;
                
                updateCart(productId, quantity, 'update');
            });
        });

        // Remove items from cart
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.dataset.productId;
                updateCart(productId, 0, 'remove');
            });
        });

        function updateCart(productId, quantity, action) {
            const loadingToast = NotificationService.showLoading('Updating cart...');
            
            fetch('<?= base_url('pos/update-cart') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    product_id: productId,
                    quantity: quantity,
                    action: action
                })
            })
            .then(response => response.json())
            .then(data => {
                NotificationService.hideLoading();
                
                if (data.success) {
                    NotificationService.showSuccess('Cart updated successfully');
                    updateCartCounter();
                    updateCartDisplay(productId, quantity, action);
                } else {
                    NotificationService.showError(data.message || 'Error updating cart');
                }
            })
            .catch(error => {
                NotificationService.hideLoading();
                console.error('Error:', error);
                NotificationService.showError('Error updating cart');
            });
        }
        
        function updateCartDisplay(productId, quantity, action) {
            const cartRow = document.querySelector(`tr[data-product-id="${productId}"]`);
            
            if (action === 'remove' || quantity == 0) {
                // Remove the row and check if cart is empty
                if (cartRow) {
                    cartRow.remove();
                }
                
                // Check if cart is now empty
                const cartTableBody = document.querySelector('.table tbody');
                if (cartTableBody && cartTableBody.children.length === 0) {
                    // Hide the entire cart section if empty
                    const cartSection = cartTableBody.closest('.row.mb-4');
                    if (cartSection) {
                        cartSection.style.display = 'none';
                    }
                }
            } else if (action === 'update' && cartRow) {
                // Update the quantity and subtotal in the existing row
                const quantityInput = cartRow.querySelector('.quantity-input');
                const subtotalCell = cartRow.querySelector('td:nth-child(4)');
                const priceCell = cartRow.querySelector('td:nth-child(2)');
                
                if (quantityInput && subtotalCell && priceCell) {
                    const price = parseFloat(priceCell.textContent.replace('₱', '').replace(',', ''));
                    const newSubtotal = price * quantity;
                    
                    quantityInput.value = quantity;
                    subtotalCell.textContent = '₱' + newSubtotal.toLocaleString('en-US', {minimumFractionDigits: 2});
                }
            }
            
            // Recalculate and update the total
            updateCartTotal();
        }
        
        function updateCartTotal() {
            const subtotalCells = document.querySelectorAll('.table tbody td:nth-child(4)');
            let total = 0;
            
            subtotalCells.forEach(cell => {
                const subtotal = parseFloat(cell.textContent.replace('₱', '').replace(',', ''));
                if (!isNaN(subtotal)) {
                    total += subtotal;
                }
            });
            
            const totalCell = document.querySelector('.table tfoot th:nth-child(4)');
            if (totalCell) {
                totalCell.textContent = '₱' + total.toLocaleString('en-US', {minimumFractionDigits: 2});
            }
        }

        // Product search
        const searchInput = document.getElementById('productSearch');
        const searchResults = document.getElementById('searchResults');
        
        // Initialize search results
        searchResults.innerHTML = '<p class="text-muted text-center">Search for products to add to cart</p>';
        
        // Reset search when modal is opened
        const searchModal = document.getElementById('searchModal');
        if (searchModal) {
            searchModal.addEventListener('shown.bs.modal', function () {
                searchInput.focus();
                searchResults.innerHTML = '<p class="text-muted text-center">Search for products to add to cart</p>';
            });
        }

        searchInput.addEventListener('input', function() {
            const search = this.value.trim();
            
            if (search.length < 2) {
                searchResults.innerHTML = '<p class="text-muted text-center">Type at least 2 characters to search</p>';
                return;
            }
            
            fetch('<?= base_url('pos/search-products') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    search: search
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displaySearchResults(data.products);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        function displaySearchResults(products) {
            if (products.length === 0) {
                searchResults.innerHTML = '<p class="text-muted text-center">No products found</p>';
                return;
            }

            let html = '<div class="list-group">';
            products.forEach(product => {
                html += `
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <h6 class="mb-1">${escapeHtml(product.product_name)}</h6>
                                <p class="mb-1 text-muted">₱${parseFloat(product.price).toFixed(2)}</p>
                                <small class="text-muted">Stock: ${product.stock_quantity}</small>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group-sm">
                                    <input type="number" class="form-control quantity-input" 
                                           value="1" min="1" max="${product.stock_quantity}" 
                                           data-product-id="${product.id}" 
                                           placeholder="Qty" style="max-width: 70px;">
                                    <button class="btn btn-black add-product" 
                                            data-product-id="${product.id}" type="button">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            html += '</div>';
            
            searchResults.innerHTML = html;

            // Add event listeners for quantity inputs (Enter key support)
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        const productId = this.dataset.productId;
                        const addButton = document.querySelector(`button.add-product[data-product-id="${productId}"]`);
                        if (addButton) {
                            addButton.click();
                        }
                    }
                });
            });

            // Add event listeners for add buttons
            document.querySelectorAll('.add-product').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    const quantityInput = document.querySelector(`input.quantity-input[data-product-id="${productId}"]`);
                    const quantity = quantityInput ? parseInt(quantityInput.value) || 1 : 1;
                    const originalText = this.innerHTML;
                    
                    // Validate quantity
                    if (quantity < 1) {
                        NotificationService.showError('Quantity must be at least 1');
                        return;
                    }
                    
                    const maxQuantity = parseInt(quantityInput.max);
                    if (quantity > maxQuantity) {
                        NotificationService.showError(`Only ${maxQuantity} items available in stock`);
                        return;
                    }
                    
                    // Disable button and show loading state
                    this.disabled = true;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';
                    
                    // Add product to cart with specified quantity
                    addProductToCart(productId, quantity);
                    
                    // Reset button after a short delay
                    setTimeout(() => {
                        this.disabled = false;
                        this.innerHTML = originalText;
                        // Reset quantity to 1
                        if (quantityInput) {
                            quantityInput.value = 1;
                        }
                    }, 1500);
                });
            });
        }

        function addProductToCart(productId, quantity = 1) {
            const loadingToast = NotificationService.showLoading('Adding product to cart...');
            
            fetch('<?= base_url('pos/add-product') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                NotificationService.hideLoading();
                
                if (data.success) {
                    NotificationService.showSuccess('Product added to cart successfully');
                    updateCartCounter();
                    
                    // Clear the search input but keep modal open
                    const searchInput = document.getElementById('productSearch');
                    if (searchInput) {
                        searchInput.value = '';
                        searchResults.innerHTML = '<p class="text-muted text-center">Search for products to add to cart</p>';
                    }
                } else {
                    NotificationService.showError(data.message || 'Error adding product');
                }
            })
            .catch(error => {
                NotificationService.hideLoading();
                console.error('Error:', error);
                NotificationService.showError('Error adding product to cart');
            });
        }

        function updateCartCounter() {
            fetch('<?= base_url('pos/cart-count') ?>', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const cartCounter = document.getElementById('cartCounter');
                    if (cartCounter) {
                        cartCounter.textContent = data.count;
                        
                        // Add a subtle animation to draw attention
                        cartCounter.style.transform = 'scale(1.2)';
                        cartCounter.style.transition = 'transform 0.2s ease';
                        
                        setTimeout(() => {
                            cartCounter.style.transform = 'scale(1)';
                        }, 200);
                    }
                }
            })
            .catch(error => {
                console.error('Error updating cart counter:', error);
            });
        }

        function escapeHtml(unsafe) {
            return unsafe
                 .replace(/&/g, "&amp;")
                 .replace(/</g, "&lt;")
                 .replace(/>/g, "&gt;")
                 .replace(/"/g, "&quot;")
                 .replace(/'/g, "&#039;");
        }
    </script>
</body>
</html>