<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - POS System</title>
    <meta name="author" content="Jan Russel E. Peñafiel">
    <meta name="description" content="POS System Dashboard - Created by Jan Russel E. Peñafiel">
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
            background: var(--primary-black);
            color: var(--primary-white);
            border-radius: 50%;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            position: absolute;
            top: -8px;
            right: -8px;
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
            border-bottom: none
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
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Sales Summary Cards with Charts -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card stats-card card-hover h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-peso-sign stats-icon"></i>
                        <h6 class="mb-0">Today's Sales</h6>
                    </div>
                    <div class="card-body text-center">
                        <div class="stats-value">₱<?= number_format($dailySales['total_sales'], 2) ?></div>
                        <div class="stats-label">Average: ₱<?= number_format($dailySales['average_sale'], 2) ?></div>
                        <div class="chart-container">
                            <canvas id="salesChart"></canvas>
                        </div>
                        <div class="chart-legend">
                            <small class="text-muted">Daily Sales Trend</small>
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
                        <div class="stats-value"><?= $dailySales['total_transactions'] ?></div>
                        <div class="stats-label">Today</div>
                        <div class="chart-container">
                            <canvas id="transactionsChart"></canvas>
                        </div>
                        <div class="chart-legend">
                            <small class="text-muted">Transaction Distribution</small>
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
                        <div class="stats-value"><?= count($lowStockProducts) ?></div>
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
                                    <tr>
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
            <div class="col-md-8">
                <div class="card">
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Low Stock Alert</h5>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($lowStockProducts)): ?>
                        <?php foreach ($lowStockProducts as $product): ?>
                        <div class="d-flex justify-content-between align-items-center mb-2 p-2 border rounded">
                            <div>
                                <small class="fw-bold"><?= esc($product['product_name']) ?></small>
                                <br>
                                <small class="text-danger">Stock: <?= $product['stock_quantity'] ?></small>
                            </div>
                            <a href="<?= base_url('products/edit/' . $product['id']) ?>" class="btn btn-sm btn-outline-black">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        <?php endforeach; ?>
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
        // Chart.js Configuration for Dashboard Statistics
        document.addEventListener('DOMContentLoaded', function() {
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
                    labels: ['6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'Yesterday', 'Today'],
                    datasets: [{
                        label: 'Sales',
                        data: [
                            <?= isset($dailySales['weekly_data']) ? implode(',', $dailySales['weekly_data']) : '15, 18, 12, 25, 30, 20, ' . $dailySales['total_sales'] ?>,
                        ],
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
                    labels: ['Morning', 'Afternoon', 'Evening', 'Night'],
                    datasets: [{
                        label: 'Transactions',
                        data: [
                            Math.ceil(<?= $dailySales['total_transactions'] ?> * 0.4),
                            Math.ceil(<?= $dailySales['total_transactions'] ?> * 0.35),
                            Math.ceil(<?= $dailySales['total_transactions'] ?> * 0.2),
                            Math.ceil(<?= $dailySales['total_transactions'] ?> * 0.05)
                        ],
                        backgroundColor: [
                            'rgba(0, 0, 0, 0.8)',
                            'rgba(0, 0, 0, 0.6)',
                            'rgba(0, 0, 0, 0.4)',
                            'rgba(0, 0, 0, 0.2)'
                        ],
                        borderColor: '#000',
                        borderWidth: 1
                    }]
                },
                options: commonOptions
            });

            // Stock Chart (Doughnut Chart)
            const stockCtx = document.getElementById('stockChart').getContext('2d');
            const lowStockCount = <?= count($lowStockProducts) ?>;
            const totalProducts = <?= isset($totalProducts) ? $totalProducts : 50 ?>;
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
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message || 'Error updating cart');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating cart');
            });
        }

        // Product search
        const searchInput = document.getElementById('productSearch');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', function() {
            const search = this.value.trim();
            
            if (search.length < 2) {
                searchResults.innerHTML = '';
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
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">${escapeHtml(product.product_name)}</h6>
                            <p class="mb-1 text-muted">₱${parseFloat(product.price).toFixed(2)}</p>
                            <small>Stock: ${product.stock_quantity}</small>
                        </div>
                        <button class="btn btn-sm btn-black add-product" data-product-id="${product.id}">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                `;
            });
            html += '</div>';
            
            searchResults.innerHTML = html;

            // Add event listeners for add buttons
            document.querySelectorAll('.add-product').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    addProductToCart(productId);
                });
            });
        }

        function addProductToCart(productId) {
            fetch('<?= base_url('pos/add-product') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message || 'Error adding product');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error adding product');
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