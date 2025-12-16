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

        .product-image-large {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, var(--light-gray) 0%, #e0e0e0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: var(--dark-gray);
            font-size: 5rem;
            margin-bottom: 1.5rem;
            border: 2px solid var(--border-color);
        }

        .product-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-black);
            margin-bottom: .75rem;
        }

        .product-price-large {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-black);
            margin-bottom: 1rem;
        }

        .info-row {
            padding: .75rem 0;
            border-bottom: 1px solid var(--border-color);
            font-size: .8rem;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 0.25rem;
            font-size: .75rem;
        }

        .info-value {
            font-size: .85rem;
            color: var(--primary-black);
        }

        .stock-badge {
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: .7rem;
            display: inline-block;
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

        @media (max-width:768px) {
            .container-fluid {
                padding: 0.5rem
            }

            .row {
                margin: 0 -0.25rem
            }

            .col-md-6 {
                padding: 0 0.25rem;
                margin-bottom: 1rem
            }

            .product-image-large {
                height: 220px;
                font-size: 3.5rem;
                margin-bottom: 1rem
            }

            .product-title {
                font-size: 1.4rem;
                margin-bottom: 0.5rem
            }

            .product-price-large {
                font-size: 1.7rem;
                margin-bottom: 0.75rem
            }

            .info-row {
                padding: .6rem 0
            }

            .info-label {
                font-size: .7rem
            }

            .info-value {
                font-size: .8rem
            }

            .card {
                margin-bottom: 1rem
            }

            .card-header {
                padding: .75rem 1rem;
                font-size: .85rem
            }

            .stock-badge {
                font-size: .65rem;
                padding: 0.35rem 0.7rem
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

            .d-grid {
                gap: 0.75rem !important
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

            .col-md-6 {
                padding: 0 0.15rem
            }

            .product-image-large {
                height: 180px;
                font-size: 2.8rem
            }

            .product-title {
                font-size: 1.2rem
            }

            .product-price-large {
                font-size: 1.5rem
            }

            .info-row {
                padding: .4rem 0
            }

            .card-header {
                padding: .6rem .8rem
            }

            .card-body {
                padding: .75rem
            }

            .navbar-toggler {
                font-size: .75rem;
                padding: 0.25rem 0.5rem
            }

            .btn-lg {
                font-size: .75rem;
                padding: .5rem 1rem
            }
        }

        .qr-code-display {
            text-align: center;
            padding: 1rem;
            background: var(--primary-white);
            border-radius: 4px;
        }

        .qr-code-display img {
            max-width: 150px;
            height: auto;
        }

        .badge-custom {
            font-size: 0.7rem;
            padding: 0.4rem 0.8rem;
        }

        .status-badge {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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

    <div class="container mt-4">
        <div class="mb-3">
            <a href="<?= base_url('user/products') ?>" class="btn btn-outline-black">
                <i class="fas fa-arrow-left me-2"></i>Back to Products
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

        <div class="row">
            <!-- Product Image and Info -->
            <div class="col-md-6">
                <!-- Product Image -->
                <?php if (!empty($product['product_image'])): ?>
                <div class="card mb-3" id="productImageCard">
                    <div class="card-header">
                        <i class="fas fa-image me-2"></i>Product Image
                    </div>
                    <div class="card-body p-2 text-center">
                        <img src="<?= base_url('writable/uploads/' . $product['product_image']) ?>" 
                             alt="<?= esc($product['product_name']) ?>" 
                             class="img-fluid" 
                             style="max-width: 100%; max-height: 300px; border-radius: 4px; border: 1px solid var(--border-color);"
                             onerror="document.getElementById('productImageCard').style.display='none'; document.getElementById('fallback-image').style.display='flex';">
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="product-image-large mb-3" id="fallback-image" style="<?= !empty($product['product_image']) ? 'display: none;' : 'display: flex;' ?>">
                    <i class="fas fa-box"></i>
                </div>
                
                <!-- Price Card -->
                <div class="text-center">
                    <div class="card mb-3" style="background: var(--primary-black); color: var(--primary-white); border: none;">
                        <div class="card-body">
                            <i class="fas fa-peso-sign fa-3x mb-3"></i>
                            <div style="font-size: 2rem; font-weight: bold;">₱<?= number_format($product['price'], 2) ?></div>
                            <p class="mb-0 opacity-75">Current Retail Price</p>
                        </div>
                    </div>
                </div>
                
                <!-- QR Code Section -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-qrcode me-2"></i>QR Code
                    </div>
                    <div class="card-body p-2 text-center">
                        <?php if (isset($qrCodeDataUri) && $qrCodeDataUri): ?>
                            <div class="qr-code-display">
                                <img src="<?= $qrCodeDataUri ?>" 
                                     alt="QR Code for <?= esc($product['product_name']) ?>" 
                                     class="img-fluid" 
                                     style="max-width: 150px; max-height: 150px;">
                            </div>
                        <?php elseif (!empty($product['qr_code'])): ?>
                            <div class="qr-code-display">
                                <img src="<?= base_url('writable/uploads/' . $product['qr_code']) ?>" 
                                     alt="Product QR Code"
                                     class="img-fluid" 
                                     style="max-width: 150px; max-height: 150px;"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                <p style="display:none;" class="text-muted mb-0">
                                    <i class="fas fa-qrcode fa-3x mb-2"></i><br>
                                    QR Code not available
                                </p>
                            </div>
                        <?php else: ?>
                            <div class="text-muted">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                QR Code not available
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <!-- Product Information Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-box me-2"></i><?= esc($product['product_name']) ?></h5>
                            <span class="badge" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); font-size: 0.7rem; padding: 0.4rem 0.8rem;">
                                <i class="fas fa-check-circle me-1"></i>Active Product
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="info-row">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="info-label"><i class="fas fa-hashtag me-2"></i>Product ID:</span>
                                </div>
                                <div class="col-md-8">
                                    <span class="badge bg-dark" style="font-size: 0.7rem; padding: 0.4rem 0.8rem;">#<?= $product['id'] ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="info-label"><i class="fas fa-tag me-2"></i>Product Name:</span>
                                </div>
                                <div class="col-md-8">
                                    <span class="info-value"><?= esc($product['product_name']) ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="info-label"><i class="fas fa-align-left me-2"></i>Description:</span>
                                </div>
                                <div class="col-md-8">
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
                                <div class="col-md-4">
                                    <span class="info-label"><i class="fas fa-peso-sign me-2"></i>Price:</span>
                                </div>
                                <div class="col-md-8">
                                    <span class="info-value fw-bold text-success" style="font-size: 1.1rem;">₱<?= number_format($product['price'], 2) ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="info-label"><i class="fas calendar-plus me-2"></i>Date Created:</span>
                                </div>
                                <div class="col-md-8">
                                    <div class="info-value">
                                        <?= date('F d, Y \a\t g:i A', strtotime($product['created_at'])) ?>
                                        <br><small class="text-muted"><?= date('Y-m-d H:i:s', strtotime($product['created_at'])) ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="info-label"><i class="fas fa-calendar-edit me-2"></i>Last Modified:</span>
                                </div>
                                <div class="col-md-8">
                                    <div class="info-value">
                                        <?= date('F d, Y \a\t g:i A', strtotime($product['updated_at'])) ?>
                                        <br><small class="text-muted"><?= date('Y-m-d H:i:s', strtotime($product['updated_at'])) ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="info-label"><i class="fas fa-boxes me-2"></i>Stock Quantity:</span>
                                </div>
                                <div class="col-md-8">
                                    <div class="info-value">
                                        <span class="badge <?= ($product['stock_quantity'] ?? 0) > 10 ? 'bg-success' : (($product['stock_quantity'] ?? 0) > 0 ? 'bg-warning' : 'bg-danger') ?>" style="font-size: 0.7rem; padding: 0.4rem 0.8rem;">
                                            <?= $product['stock_quantity'] ?? 0 ?> units
                                        </span>
                                        <?php if (($product['stock_quantity'] ?? 0) <= 5 && ($product['stock_quantity'] ?? 0) > 0): ?>
                                            <small class="text-warning ms-2"><i class="fas fa-exclamation-triangle me-1"></i>Low stock</small>
                                        <?php elseif (($product['stock_quantity'] ?? 0) == 0): ?>
                                            <small class="text-danger ms-2"><i class="fas fa-times-circle me-1"></i>Out of stock</small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 mt-3">
                    <a href="<?= base_url('user/products') ?>" class="btn btn-black btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
