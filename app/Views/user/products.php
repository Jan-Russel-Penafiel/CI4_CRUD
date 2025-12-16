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

        .product-card {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            transition: transform 0.2s ease, box-shadow 0.3s;
            height: 100%;
            background: var(--primary-white);
            font-size: .75rem;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,.15);
        }

        .product-image {
            width: 100%;
            height: 150px;
            background: linear-gradient(135deg, var(--light-gray) 0%, #e0e0e0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px 6px 0 0;
            color: var(--dark-gray);
            font-size: 2.5rem;
        }

        .product-card-body {
            padding: 1rem;
        }

        .product-name {
            font-weight: 600;
            font-size: .9rem;
            margin-bottom: 0.5rem;
            color: var(--primary-black);
            min-height: 2rem;
        }

        .product-description {
            color: var(--dark-gray);
            font-size: 0.75rem;
            margin-bottom: 0.75rem;
            min-height: 2.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-black);
            margin-bottom: 0.5rem;
        }

        .product-stock {
            font-size: 0.7rem;
            margin-bottom: 0.75rem;
        }

        .stock-badge {
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.65rem;
        }

        .stock-in {
            background-color: #d4edda;
            color: #155724;
        }

        .stock-low {
            background-color: #fff3cd;
            color: #856404;
        }

        .stock-out {
            background-color: #f8d7da;
            color: #721c24;
        }

        .search-container {
            background-color: var(--primary-white);
            padding: .6rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 2px solid var(--border-color);
            transition: all 0.2s ease-in-out
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

        .table {
            font-size: .7rem;
            margin-bottom: 0;
        }

        .table th {
            font-size: .65rem;
            padding: .5rem;
            background-color: var(--primary-black);
            color: var(--primary-white);
            border-color: var(--dark-gray);
        }

        .table td {
            padding: .5rem;
            vertical-align: middle;
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
            padding: 3rem 1.5rem;
            color: var(--dark-gray);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
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
            background-color: #f8f9fa;
            border-color: var(--primary-black);
            color: var(--primary-black)
        }

        .form-control {
            font-size: .75rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out
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

            .product-card {
                margin-bottom: 1rem
            }

            .search-container {
                padding: 0.75rem;
                margin-bottom: 0.75rem
            }

            .form-control {
                font-size: .75rem;
                padding: 0.5rem
            }

            .navbar-brand {
                font-size: .85rem
            }

            .navbar-nav .nav-link {
                font-size: .7rem;
                padding: 0.5rem 0.75rem
            }

            .product-image {
                height: 140px;
                font-size: 2.2rem
            }

            .product-card-body {
                padding: .85rem
            }

            .product-name {
                font-size: .85rem;
                min-height: 1.8rem
            }

            .product-description {
                font-size: .7rem;
                min-height: 2rem
            }

            .product-price {
                font-size: 1.1rem
            }

            .btn {
                font-size: .65rem;
                padding: .3rem .6rem
            }

            .empty-state {
                padding: 2rem 1rem
            }

            .empty-state i {
                font-size: 2.5rem
            }
        }

        /* Mobile Card Layout */
        .mobile-product-card {
            display: none;
            background: var(--primary-white);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
            transition: transform 0.2s ease, box-shadow 0.3s;
        }

        .mobile-product-card:hover {
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

        .mobile-product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .mobile-product-placeholder {
            width: 60px;
            height: 60px;
            background: #f0f0f0;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            color: var(--dark-gray);
        }

        .mobile-product-image-large {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .mobile-product-placeholder-large {
            width: 60px;
            height: 60px;
            background: #f0f0f0;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            color: var(--dark-gray);
            font-size: 1.2rem;
            margin: 0 auto;
        }

        .mobile-cards-container {
            display: none;
        }

        @media (max-width: 768px) {
            .table-responsive {
                display: none !important;
            }
            
            .mobile-product-card {
                display: flex;
                flex-direction: column;
            }

            .mobile-cards-container {
                display: block !important;
            }
        }

        @media (max-width:576px) {
            .container-fluid {
                padding: 0.25rem
            }

            .row {
                margin: 0 -0.25rem
            }

            .col-md-4, .col-md-3, .col-md-6 {
                padding: 0 0.25rem
            }

            .search-container .row {
                margin: 0
            }

            .search-container .col-12 {
                padding: 0;
                margin-bottom: 0.5rem
            }

            .product-card {
                margin-bottom: 0.75rem
            }

            .product-image {
                height: 120px;
                font-size: 2rem
            }

            .product-card-body {
                padding: 0.75rem
            }

            .navbar-toggler {
                font-size: .75rem;
                padding: 0.25rem 0.5rem
            }

            .mobile-product-card {
                margin-bottom: 0.75rem;
            }

            .mobile-card-header, .mobile-card-body {
                padding: 0.6rem;
            }

            .mobile-product-image, .mobile-product-placeholder {
                width: 50px;
                height: 50px;
            }

            .mobile-product-image-large {
                width: 50px;
                height: 50px;
            }

            .mobile-product-placeholder-large {
                width: 50px;
                height: 50px;
                font-size: 1rem;
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
                <a href="<?= base_url('user/transactions') ?>" style="color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; text-decoration: none; transition: all 0.3s;">
                    <i class="fas fa-receipt" style="margin-right: 0.25rem;"></i><span>Transactions</span>
                </a>
                <a href="<?= base_url('user/profile') ?>" style="color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; text-decoration: none; transition: all 0.3s;">
                    <i class="fas fa-user" style="margin-right: 0.25rem;"></i><span>Profile</span>
                </a>
                <a href="<?= base_url('user/products') ?>" style="color: white; padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500; background-color: rgba(255,255,255,0.15); text-decoration: none; transition: all 0.3s;">
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
            <a href="<?= base_url('user/transactions') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-receipt" style="margin-right: 0.5rem;"></i>Transactions
            </a>
            <a href="<?= base_url('user/profile') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-user" style="margin-right: 0.5rem;"></i>Profile
            </a>
            <a href="<?= base_url('user/products') ?>" style="display: block; color: white; padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500; background-color: rgba(255,255,255,0.15); margin-bottom: 0.25rem; text-decoration: none;">
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

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuOpen = document.getElementById('menu-open');
            const menuClose = document.getElementById('menu-close');
            
            mobileMenu.classList.toggle('hidden');
            menuOpen.classList.toggle('hidden');
            menuClose.classList.toggle('hidden');
        });
    </script>

    <div class="container mt-4">
        <!-- Page Header -->
        <div class="page-header">
            <h1><i class="fas fa-box-open me-2"></i>Products Catalog</h1>
            <p class="mb-0">Browse our complete product collection</p>
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

        <!-- Search and Filter Bar -->
        <div class="search-container">
            <form method="get" action="<?= base_url('user/products') ?>">
                <div class="row g-3" id="searchContainer">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" name="search" id="searchInput" 
                                   placeholder="Search products by name or description..." 
                                   value="<?= esc($search ?? '') ?>" maxlength="255" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="sort" name="sort">
                            <option value="product_name" <?= ($sortBy ?? '') === 'product_name' ? 'selected' : '' ?>>Sort by Name</option>
                            <option value="price" <?= ($sortBy ?? '') === 'price' ? 'selected' : '' ?>>Sort by Price</option>
                            <option value="stock_quantity" <?= ($sortBy ?? '') === 'stock_quantity' ? 'selected' : '' ?>>Sort by Stock</option>
                            <option value="created_at" <?= ($sortBy ?? '') === 'created_at' ? 'selected' : '' ?>>Sort by Date</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" id="order" name="order">
                            <option value="asc" <?= ($order ?? '') === 'asc' ? 'selected' : '' ?>>Ascending</option>
                            <option value="desc" <?= ($order ?? '') === 'desc' ? 'selected' : '' ?>>Descending</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <?php if (!empty($search)): ?>
                            <a href="<?= base_url('user/products') ?>" class="btn btn-outline-black w-100">
                                <i class="fas fa-times me-2"></i>Clear
                            </a>
                        <?php else: ?>
                            <button type="submit" class="btn btn-black w-100">
                                <i class="fas fa-filter me-1"></i>Filter
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>

        <!-- Products Table -->
        <div class="card">
            <div class="card-header bg-black text-white d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <h5 class="mb-0"><i class="fas fa-table me-2"></i>Products Catalog</h5>
                </div>
                <div class="d-flex align-items-center">
                    <small class="me-3" id="productCount">
                        <i class="fas fa-list me-1"></i>
                        <span id="productCountText">
                            <?php if (!empty($products)): ?>
                                Showing <?= count($products) ?> product(s)
                                <?php if (isset($pager)): ?>
                                    (Page <?= $pager->getCurrentPage() ?> of <?= $pager->getPageCount() ?>)
                                <?php endif; ?>
                            <?php else: ?>
                                No products
                            <?php endif; ?>
                        </span>
                    </small>
                </div>
            </div>
            <div class="card-body p-0">
                <?php if (empty($products)): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h4>No Products Found</h4>
                        <?php if (!empty($search)): ?>
                            <p class="text-muted">No products match your search criteria "<?= esc($search) ?>".</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= base_url('user/products') ?>" class="btn btn-outline-black">
                                    <i class="fas fa-list me-2"></i>View All Products
                                </a>
                            </div>
                        <?php else: ?>
                            <p class="text-muted">No products available at the moment.</p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <!-- Desktop Table View -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"><i class="fas fa-hashtag me-1"></i>ID</th>
                                    <th scope="col"><i class="fas fa-image me-1"></i>Image</th>
                                    <th scope="col"><i class="fas fa-tag me-1"></i>Product Name</th>
                                    <th scope="col"><i class="fas fa-align-left me-1"></i>Description</th>
                                    <th scope="col"><i class="fas fa-peso-sign me-1"></i>Price</th>
                                    <th scope="col"><i class="fas fa-boxes me-1"></i>Stock</th>
                                    <th scope="col"><i class="fas fa-cogs me-1"></i>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $index => $product): ?>
                                    <tr>
                                        <td><strong>#<?= $product['id'] ?></strong></td>
                                        <td>
                                            <?php if (!empty($product['product_image'])): ?>
                                                <img src="<?= base_url('writable/uploads/' . $product['product_image']) ?>" 
                                                     alt="<?= esc($product['product_name']) ?>" 
                                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 4px; display: none; align-items: center; justify-content: center; border: 1px solid #ddd;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            <?php else: ?>
                                                <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 4px; display: flex; align-items: center; justify-content: center; border: 1px solid #ddd;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="fw-semibold"><?= esc($product['product_name']) ?></span></td>
                                        <td>
                                            <?php if (!empty($product['description'])): ?>
                                                <span title="<?= esc($product['description']) ?>">
                                                    <?= esc(substr($product['description'], 0, 50)) ?>
                                                    <?= strlen($product['description']) > 50 ? '...' : '' ?>
                                                </span>
                                            <?php else: ?>
                                                <em class="text-muted">No description</em>
                                            <?php endif; ?>
                                        </td>
                                        <td><strong class="text-success">₱<?= number_format($product['price'], 2) ?></strong></td>
                                        <td>
                                            <span class="badge <?= ($product['stock_quantity'] ?? 0) > 10 ? 'bg-success' : (($product['stock_quantity'] ?? 0) > 0 ? 'bg-warning text-dark' : 'bg-danger') ?>" style="font-size: 0.7rem;">
                                                <?= $product['stock_quantity'] ?? 0 ?> units
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('user/product/' . $product['id']) ?>" class="btn btn-outline-primary btn-sm" title="View Product Details">
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
        <?php if (!empty($products)): ?>
            <div class="mobile-cards-container">
                <div class="row g-2">
                    <?php foreach ($products as $product): ?>
                        <div class="col-4">
                            <div class="mobile-product-card h-100">
                                <div class="mobile-card-header text-center">
                                    <div class="mb-2">
                                        <a href="<?= base_url('user/product/' . $product['id']) ?>" class="text-decoration-none">
                                            <?php if (!empty($product['product_image'])): ?>
                                                <img src="<?= base_url('writable/uploads/' . $product['product_image']) ?>" 
                                                     alt="<?= esc($product['product_name']) ?>" 
                                                     class="mobile-product-image-large"
                                                     style="transition: transform 0.2s ease; cursor: pointer;"
                                                     onmouseover="this.style.transform='scale(1.05)'"
                                                     onmouseout="this.style.transform='scale(1)'"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="mobile-product-placeholder-large" style="display: none; transition: transform 0.2s ease; cursor: pointer;"
                                                     onmouseover="this.style.transform='scale(1.05)'"
                                                     onmouseout="this.style.transform='scale(1)'">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            <?php else: ?>
                                                <div class="mobile-product-placeholder-large" style="transition: transform 0.2s ease; cursor: pointer;"
                                                     onmouseover="this.style.transform='scale(1.05)'"
                                                     onmouseout="this.style.transform='scale(1)'">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <h6 class="mb-1 fw-semibold" style="font-size: 0.75rem; line-height: 1.2; height: 2.4rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= esc($product['product_name']) ?></h6>
                                </div>
                                <div class="mobile-card-body">
                                    <div class="text-center mb-2">
                                        <div class="fw-bold text-success" style="font-size: 0.8rem;">₱<?= number_format($product['price'], 2) ?></div>
                                        <span class="badge <?= ($product['stock_quantity'] ?? 0) > 10 ? 'bg-success' : (($product['stock_quantity'] ?? 0) > 0 ? 'bg-warning text-dark' : 'bg-danger') ?>" style="font-size: 0.5rem;">
                                            <?= $product['stock_quantity'] ?? 0 ?>
                                        </span>
                                    </div>
                                    <div class="mt-auto">
                                        <a href="<?= base_url('user/product/' . $product['id']) ?>" class="btn btn-outline-primary btn-sm w-100" style="font-size: 0.6rem; padding: 0.2rem 0.3rem;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
            </div>
        </div>

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
                        <?php if (isset($total_products) && $total_products > 0): ?>
                            Showing <?= count($products) ?> of <?= $total_products ?> products
                        <?php endif; ?>
                    </small>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
