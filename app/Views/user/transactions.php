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

        .card {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            transition: transform .2s ease;
            font-size: .75rem;
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
            border-radius: 6px 6px 0 0 !important;
            padding: 1rem 1.25rem;
            font-weight: 600;
            font-size: .9rem;
        }

        .card-header h5,
        .card-header h6 {
            font-size: .9rem
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

        .table-striped>tbody>tr:nth-of-type(odd)>td {
            background-color: var(--primary-white)
        }

        .table-striped>tbody>tr:nth-of-type(even)>td {
            background-color: var(--light-gray)
        }

        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, .05)
        }

        .badge-status {
            padding: 0.3rem 0.5rem;
            font-size: 0.65rem;
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

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--dark-gray);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
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
            background-color: #f8f9fa;
            border-color: var(--primary-black);
            color: var(--primary-black)
        }

        .pagination-info {
            font-size: .7rem
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

        .table-mobile-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch
        }

        .table-mobile-scroll::-webkit-scrollbar {
            height: 4px
        }

        .table-mobile-scroll::-webkit-scrollbar-track {
            background: var(--light-gray)
        }

        .table-mobile-scroll::-webkit-scrollbar-thumb {
            background: var(--dark-gray);
            border-radius: 2px
        }

        /* Mobile Card Layout */
        .mobile-transaction-card {
            display: none;
            background: var(--primary-white);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
            transition: transform 0.2s ease, box-shadow 0.3s;
        }

        .mobile-transaction-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,.15);
        }

        .mobile-card-header {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
            background-color: #f8f9fa;
        }

        .mobile-card-body {
            padding: 0.75rem;
        }

        .mobile-cards-container {
            display: none;
        }

        @media (max-width: 768px) {
            .table-responsive {
                display: none !important;
            }
            
            .mobile-transaction-card {
                display: block;
            }

            .mobile-cards-container {
                display: block !important;
            }
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

            .table {
                font-size: .6rem;
                min-width: 600px
            }

            .table th {
                font-size: .58rem;
                padding: .4rem .2rem;
                white-space: nowrap
            }

            .table td {
                padding: .4rem .2rem;
                font-size: .6rem
            }

            .card {
                margin-bottom: 1rem
            }

            .card-header {
                padding: .75rem 1rem;
                font-size: .85rem
            }

            .navbar-brand {
                font-size: .85rem
            }

            .navbar-nav .nav-link {
                font-size: .7rem;
                padding: 0.5rem 0.75rem
            }

            .empty-state {
                padding: 1.5rem 1rem
            }

            .empty-state i {
                font-size: 2.5rem
            }

            .btn {
                font-size: .6rem;
                padding: .25rem .4rem
            }

            .badge-status {
                font-size: .55rem;
                padding: 0.2rem 0.4rem
            }

            .alert {
                font-size: .7rem;
                padding: 0.5rem
            }

            .mobile-transaction-card {
                margin-bottom: 0.75rem;
            }

            .mobile-card-header, .mobile-card-body {
                padding: 0.6rem;
            }
        }

        @media (max-width:576px) {
            .container-fluid {
                padding: 0.25rem
            }

            .table {
                font-size: .55rem;
                min-width: 500px
            }

            .table th,
            .table td {
                padding: .3rem .15rem
            }

            .card-header {
                padding: .6rem .8rem
            }

            .navbar-toggler {
                font-size: .75rem;
                padding: 0.25rem 0.5rem
            }

            .empty-state {
                padding: 1rem 0.5rem
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav style="background: linear-gradient(135deg, #000 0%, #6c757d 100%); box-shadow: 0 2px 4px rgba(0,0,0,.1); position: sticky; top: 0; z-index: 50; color: white; padding: 0.75rem 0;">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between; padding: 0 1rem;">
            <a href="<?= base_url('user/dashboard') ?>" style="color: white; font-weight: 600; font-size: 1.1rem; text-decoration: none; display: flex; align-items: center;">
                <i class="fas fa-user-circle" style="margin-right: 0.5rem;"></i><span class="d-none d-sm-inline">User Portal</span><span class="d-sm-none">Portal</span>
            </a>
            <button id="mobile-menu-btn" class="lg:hidden" style="color: white; background: none; border: none; cursor: pointer; display: none;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path id="menu-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div id="desktop-menu" style="display: flex; align-items: center; gap: 0.25rem;">
                <a href="<?= base_url('user/dashboard') ?>" style="color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; text-decoration: none; transition: all 0.3s;">
                    <i class="fas fa-tachometer-alt" style="margin-right: 0.25rem;"></i><span>Dashboard</span>
                </a>
                <a href="<?= base_url('user/transactions') ?>" style="color: white; padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500; background-color: rgba(255,255,255,0.15); text-decoration: none; transition: all 0.3s;">
                    <i class="fas fa-receipt" style="margin-right: 0.25rem;"></i><span>Transactions</span>
                </a>
                <a href="<?= base_url('user/profile') ?>" style="color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; text-decoration: none; transition: all 0.3s;">
                    <i class="fas fa-user" style="margin-right: 0.25rem;"></i><span>Profile</span>
                </a>
                <a href="<?= base_url('user/products') ?>" style="color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; text-decoration: none; transition: all 0.3s;">
                    <i class="fas fa-box" style="margin-right: 0.25rem;"></i><span>Products</span>
                </a>
                <a href="<?= base_url('auth/logout') ?>" style="color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; text-decoration: none; transition: all 0.3s;">
                    <i class="fas fa-sign-out-alt" style="margin-right: 0.25rem;"></i><span>Logout</span>
                </a>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden" style="padding: 0.75rem 1rem; display: none;">
            <a href="<?= base_url('user/dashboard') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-tachometer-alt" style="margin-right: 0.5rem;"></i>Dashboard
            </a>
            <a href="<?= base_url('user/transactions') ?>" style="display: block; color: white; padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500; background-color: rgba(255,255,255,0.15); margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-receipt" style="margin-right: 0.5rem;"></i>Transactions
            </a>
            <a href="<?= base_url('user/profile') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-user" style="margin-right: 0.5rem;"></i>Profile
            </a>
            <a href="<?= base_url('user/products') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-box" style="margin-right: 0.5rem;"></i>Products
            </a>
            <a href="<?= base_url('auth/logout') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; text-decoration: none;">
                <i class="fas fa-sign-out-alt" style="margin-right: 0.5rem;"></i>Logout
            </a>
        </div>
    </nav>

    <style>
        #desktop-menu a:hover {
            background-color: rgba(255,255,255,0.1) !important;
        }
        #mobile-menu a:hover {
            background-color: rgba(255,255,255,0.1) !important;
        }
        @media (max-width: 1023px) {
            #desktop-menu {
                display: none !important;
            }
            #mobile-menu-btn {
                display: block !important;
            }
        }
    </style>

    <script>
        const menuBtn = document.getElementById('mobile-menu-btn');
        if (menuBtn) {
            menuBtn.addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobile-menu');
                const menuOpen = document.getElementById('menu-open');
                const menuClose = document.getElementById('menu-close');
                
                if (mobileMenu.style.display === 'none' || mobileMenu.style.display === '') {
                    mobileMenu.style.display = 'block';
                    menuOpen.style.display = 'none';
                    menuClose.style.display = 'block';
                } else {
                    mobileMenu.style.display = 'none';
                    menuOpen.style.display = 'block';
                    menuClose.style.display = 'none';
                }
            });
        }
    </script>

    <div class="container mt-4">
        <!-- Page Header -->
        <div class="page-header">
            <h1><i class="fas fa-history me-2"></i>Transaction History</h1>
            <p class="mb-0">View your complete transaction records</p>
        </div>

        <div class="mb-3">
            <a href="<?= base_url('user/dashboard') ?>" class="btn btn-outline-black">
                <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
            </a>
        </div>

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

        <div class="card">
            <div class="card-header bg-black text-white d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <h5 class="mb-0"><i class="fas fa-list me-2"></i>Transaction History</h5>
                </div>
                <div class="d-flex align-items-center">
                    <small class="me-3">
                        <i class="fas fa-receipt me-1"></i>
                        <span>
                            <?php if (!empty($transactions)): ?>
                                Showing <?= count($transactions) ?> transaction(s)
                                <?php if (isset($pager)): ?>
                                    (Page <?= $pager->getCurrentPage() ?> of <?= $pager->getPageCount() ?>)
                                <?php endif; ?>
                            <?php else: ?>
                                No transactions
                            <?php endif; ?>
                        </span>
                    </small>
                </div>
            </div>
            <div class="card-body p-0">
                <?php if (empty($transactions)): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h4>No Transactions Found</h4>
                        <p class="text-muted">You haven't made any purchases yet.</p>
                        <a href="<?= base_url('user/products') ?>" class="btn btn-outline-black">
                            <i class="fas fa-box me-2"></i>Browse Products
                        </a>
                    </div>
                <?php else: ?>
                    <!-- Desktop Table View -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"><i class="fas fa-hashtag me-1"></i>Transaction #</th>
                                    <th scope="col"><i class="fas fa-calendar me-1"></i>Date & Time</th>
                                    <th scope="col"><i class="fas fa-peso-sign me-1"></i>Amount</th>
                                    <th scope="col"><i class="fas fa-credit-card me-1"></i>Payment</th>
                                    <th scope="col"><i class="fas fa-phone me-1"></i>Phone</th>
                                    <th scope="col"><i class="fas fa-info-circle me-1"></i>Status</th>
                                    <th scope="col"><i class="fas fa-cogs me-1"></i>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transactions as $transaction): ?>
                                <tr>
                                    <td><strong><?= esc($transaction['transaction_number']) ?></strong></td>
                                    <td>
                                        <i class="fas fa-calendar me-1"></i><?= date('M d, Y', strtotime($transaction['created_at'])) ?>
                                        <br>
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i><?= date('h:i A', strtotime($transaction['created_at'])) ?>
                                        </small>
                                    </td>
                                    <td>
                                        <strong class="text-success">₱<?= number_format($transaction['total_amount'], 2) ?></strong>
                                    </td>
                                    <td>
                                        <?php
                                        $methodIcons = [
                                            'cash' => 'money-bill-wave text-success',
                                            'card' => 'credit-card text-primary',
                                            'digital' => 'mobile-alt text-info'
                                        ];
                                        $icon = $methodIcons[$transaction['payment_method']] ?? 'wallet';
                                        ?>
                                        <i class="fas fa-<?= $icon ?> me-1"></i>
                                        <?= ucfirst(esc($transaction['payment_method'])) ?>
                                    </td>
                                    <td>
                                        <?php if ($transaction['customer_phone']): ?>
                                            <i class="fas fa-phone me-1"></i><?= esc($transaction['customer_phone']) ?>
                                        <?php else: ?>
                                            <span class="text-muted">N/A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-success badge-status">
                                            <i class="fas fa-check-circle me-1"></i>Completed
                                        </span>
                                        <?php if ($transaction['sms_sent']): ?>
                                            <br><span class="badge bg-info badge-status mt-1">
                                                <i class="fas fa-sms me-1"></i>SMS Sent
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('user/transaction/' . $transaction['id']) ?>" 
                                               class="btn btn-outline-primary btn-sm" title="View Receipt">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Mobile Card View -->
        <?php if (!empty($transactions)): ?>
            <div class="mobile-cards-container">
                <?php foreach ($transactions as $transaction): ?>
                    <div class="mobile-transaction-card">
                        <div class="mobile-card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0 fw-semibold"><?= esc($transaction['transaction_number']) ?></h6>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i><?= date('M d, Y', strtotime($transaction['created_at'])) ?>
                                        <i class="fas fa-clock ms-2 me-1"></i><?= date('h:i A', strtotime($transaction['created_at'])) ?>
                                    </small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-bold text-success">₱<?= number_format($transaction['total_amount'], 2) ?></div>
                                    <span class="badge bg-success" style="font-size: 0.6rem;">
                                        <i class="fas fa-check-circle me-1"></i>Completed
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-card-body">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <small class="text-muted">Payment Method:</small>
                                    <div style="font-size: 0.75rem;">
                                        <?php
                                        $methodIcons = [
                                            'cash' => 'money-bill-wave text-success',
                                            'card' => 'credit-card text-primary',
                                            'digital' => 'mobile-alt text-info'
                                        ];
                                        $icon = $methodIcons[$transaction['payment_method']] ?? 'wallet';
                                        ?>
                                        <i class="fas fa-<?= $icon ?> me-1"></i>
                                        <?= ucfirst(esc($transaction['payment_method'])) ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Phone:</small>
                                    <div style="font-size: 0.75rem;">
                                        <?php if ($transaction['customer_phone']): ?>
                                            <i class="fas fa-phone me-1"></i><?= esc($transaction['customer_phone']) ?>
                                        <?php else: ?>
                                            <span class="text-muted">N/A</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <?php if ($transaction['sms_sent']): ?>
                                    <span class="badge bg-info" style="font-size: 0.6rem;">
                                        <i class="fas fa-sms me-1"></i>SMS Sent
                                    </span>
                                <?php else: ?>
                                    <span></span>
                                <?php endif; ?>
                                <a href="<?= base_url('user/transaction/' . $transaction['id']) ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>View Receipt
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Pagination -->
        <?php if (isset($pager) && $pager->getPageCount() > 1): ?>
            <div class="mt-4">
                <div class="d-flex justify-content-center align-items-center">
                    <?php if ($pager->getCurrentPage() > 1): ?>
                        <a href="<?= $pager->getPreviousPageURI() ?>" class="btn btn-outline-black me-3">
                            <i class="fas fa-chevron-left me-1"></i>Previous
                        </a>
                    <?php endif; ?>
                    <span class="mx-3">
                        <strong>Page <?= $pager->getCurrentPage() ?> of <?= $pager->getPageCount() ?></strong>
                    </span>
                    <?php if ($pager->getCurrentPage() < $pager->getPageCount()): ?>
                        <a href="<?= $pager->getNextPageURI() ?>" class="btn btn-outline-black ms-3">
                            Next<i class="fas fa-chevron-right ms-1"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="text-center mt-2">
                    <small class="text-muted">
                        Showing <?= count($transactions) ?> transactions
                    </small>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
