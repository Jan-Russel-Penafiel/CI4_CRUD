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
            padding: 0.75rem 1rem;
        }

        .navbar-brand {
            color: var(--primary-white) !important;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .navbar-toggler {
            border-color: rgba(255,255,255,.3);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(255,255,255,.25);
        }

        .navbar-nav {
            align-items: center;
        }

        .navbar-nav .nav-link {
            color: rgba(255,255,255,.9) !important;
            margin: 0 0.3rem;
            padding: 0.5rem 0.8rem !important;
            transition: all 0.3s;
            font-size: .85rem;
            border-radius: 4px;
            display: inline-flex;
            align-items: center;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-white) !important;
            background-color: rgba(255,255,255,.1);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-white) !important;
            font-weight: 500;
            background-color: rgba(255,255,255,.15);
        }

        .navbar-nav .nav-link i {
            margin-right: 0.4rem;
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
            border-radius: 8px 8px 0 0 !important;
            padding: 1rem 1.25rem;
            font-weight: 600;
            font-size: .9rem;
        }

        .card-header h5,
        .card-header h6 {
            font-size: .9rem
        }

        .stat-card {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 2px solid var(--border-color);
        }

        .stat-card i {
            font-size: 2rem;
            opacity: 0.8;
        }

        .stat-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }

        .stat-card p {
            margin: 0;
            opacity: 0.9;
            font-size: .8rem;
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
            color: var(--primary-black);
        }

        .btn-outline-black:hover {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white)
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

        .welcome-banner {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .welcome-banner h1 {
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }

        .welcome-banner p {
            font-size: .9rem;
            opacity: 0.9;
            margin: 0;
        }

        .quick-action-card {
            text-align: center;
            padding: 1.5rem;
            border-radius: 8px;
            border: 2px solid var(--border-color);
            transition: all 0.3s;
            cursor: pointer;
            background-color: var(--primary-white);
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .quick-action-card:hover {
            border-color: var(--primary-black);
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,.15);
            color: var(--primary-black);
        }

        .quick-action-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-black);
        }

        .quick-action-card h5 {
            font-weight: 600;
            margin: 0;
            font-size: .9rem;
        }

        @media (max-width:768px) {
            .container-fluid {
                padding: 0.5rem
            }

            .welcome-banner {
                padding: 1rem;
                margin-bottom: 1rem
            }

            .welcome-banner h1 {
                font-size: 1.3rem
            }

            .welcome-banner p {
                font-size: .75rem
            }

            .stat-card {
                padding: 1rem;
                margin-bottom: 1rem
            }

            .stat-card h3 {
                font-size: 1.3rem
            }

            .quick-action-card {
                padding: 1.2rem;
                margin-bottom: 0.8rem;
                min-height: auto
            }

            .quick-action-card i {
                font-size: 1.8rem;
                margin-bottom: 0.8rem
            }

            .quick-action-card h5 {
                font-size: .85rem
            }

            .navbar-brand {
                font-size: .95rem
            }

            .navbar-nav {
                margin-top: 0.5rem;
            }

            .navbar-nav .nav-link {
                font-size: .8rem;
                padding: 0.6rem 0.8rem !important;
                margin: 0.2rem 0;
            }

            .card {
                margin-bottom: 1rem
            }

            .table-responsive {
                font-size: .65rem
            }

            .table th,
            .table td {
                padding: 0.3rem;
                font-size: .6rem
            }

            .btn {
                font-size: .65rem;
                padding: .3rem .6rem
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

            .row {
                margin: 0 -0.25rem
            }

            .col-md-4, .col-md-3 {
                padding: 0 0.25rem;
                margin-bottom: 0.5rem
            }

            .navbar-toggler {
                font-size: .75rem;
                padding: 0.25rem 0.5rem
            }

            .table-responsive {
                border: none
            }

            .quick-action-card {
                padding: 1rem
            }

            .welcome-banner {
                padding: 0.75rem;
                text-align: left
            }

            .stat-card {
                padding: 0.75rem
            }
        }

        /* Tailwind-style Navigation */
        nav {
            background: linear-gradient(135deg, #000 0%, #6c757d 100%);
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        nav .container {
            max-width: 1200px;
        }

        nav a {
            text-decoration: none;
        }

        @media (min-width: 1024px) {
            #mobile-menu {
                display: none !important;
            }
            
            #mobile-menu-btn {
                display: none !important;
            }
        }

        @media (max-width: 1023px) {
            nav .lg\\:flex {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav style="background: linear-gradient(135deg, #000 0%, #6c757d 100%); box-shadow: 0 2px 4px rgba(0,0,0,.1); position: sticky; top: 0; z-index: 50; color: white; padding: 0.75rem 0;">
        <div class="container" style="display: flex; align-items: center; justify-content: space-between; padding: 0 1rem;">
            <a href="<?= base_url('user/dashboard') ?>" style="color: white; font-weight: 600; font-size: 1.1rem; text-decoration: none; display: flex; align-items: center;">
                <i class="fas fa-user-circle" style="margin-right: 0.5rem;"></i>User Portal
            </a>
            <button id="mobile-menu-btn" class="lg:hidden" style="color: white; background: none; border: none; cursor: pointer; display: none;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path id="menu-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div id="desktop-menu" style="display: flex; align-items: center; gap: 0.25rem;">
                <a href="<?= base_url('user/dashboard') ?>" style="color: white; padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500; background-color: rgba(255,255,255,0.15); text-decoration: none; transition: all 0.3s;">
                    <i class="fas fa-tachometer-alt" style="margin-right: 0.25rem;"></i><span>Dashboard</span>
                </a>
                <a href="<?= base_url('user/transactions') ?>" style="color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; text-decoration: none; transition: all 0.3s;">
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
            <a href="<?= base_url('user/dashboard') ?>" style="display: block; color: white; padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500; background-color: rgba(255,255,255,0.15); margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-tachometer-alt" style="margin-right: 0.5rem;"></i>Dashboard
            </a>
            <a href="<?= base_url('user/transactions') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-receipt" style="margin-right: 0.5rem;"></i>Transactions
            </a>
            <a href="<?= base_url('user/products') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-box" style="margin-right: 0.5rem;"></i>Products
            </a>
            <a href="<?= base_url('user/profile') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-user" style="margin-right: 0.5rem;"></i>Profile
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
        // Mobile menu toggle
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

    <div class="container-fluid mt-4">
        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <h1><i class="fas fa-hand-wave me-2"></i>Welcome back, <?= esc($username) ?>!</h1>
            <p class="mb-0"><i class="fas fa-clock me-2"></i><?= date('l, F d, Y') ?></p>
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

        <!-- Statistics Row -->
        <div class="row">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Total Transactions</p>
                            <h3><?= number_format($totalTransactions) ?></h3>
                        </div>
                        <i class="fas fa-receipt"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Total Spent</p>
                            <h3>₱<?= number_format($totalSpent, 2) ?></h3>
                        </div>
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Account Status</p>
                            <h3>Active</h3>
                        </div>
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-clock me-2"></i>Recent Transactions
                    </div>
                    <div class="card-body">
                        <?php if (empty($recentTransactions)): ?>
                            <div class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3"></i>
                                <p>No transactions yet. Browse our products catalog!</p>
                                <a href="<?= base_url('user/products') ?>" class="btn btn-black">
                                    <i class="fas fa-box me-2"></i>View Products
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Transaction #</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recentTransactions as $transaction): ?>
                                        <tr>
                                            <td><strong><?= esc($transaction['transaction_number']) ?></strong></td>
                                            <td><?= date('M d, Y h:i A', strtotime($transaction['created_at'])) ?></td>
                                            <td><strong>₱<?= number_format($transaction['total_amount'], 2) ?></strong></td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    <?= strtoupper(esc($transaction['payment_method'])) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success badge-status">Completed</span>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('user/transaction/' . $transaction['id']) ?>" 
                                                   class="btn btn-sm btn-outline-black">
                                                    <i class="fas fa-eye me-1"></i>View
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
