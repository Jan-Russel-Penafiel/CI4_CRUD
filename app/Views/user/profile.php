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

        .profile-header {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: var(--primary-white);
            color: var(--primary-black);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1rem;
            border: 3px solid var(--primary-white);
        }

        .info-item {
            padding: .75rem;
            border-bottom: 1px solid var(--border-color);
            font-size: .8rem;
        }

        .info-item:last-child {
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

        .form-control {
            font-size: .75rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out
        }

        .form-control:focus {
            border-color: var(--primary-black);
            box-shadow: 0 0 0 .2rem rgba(0, 0, 0, .25);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .25);
            font-size: .75rem
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: .25rem;
            font-size: .7rem;
            color: #dc3545
        }

        .form-text {
            font-size: .65rem
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

            .profile-header {
                padding: 1rem;
                margin-bottom: 1rem
            }

            .profile-avatar {
                width: 90px;
                height: 90px;
                font-size: 2.2rem
            }

            .info-item {
                padding: .6rem;
                border-bottom: 1px solid var(--border-color)
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

            .form-control {
                font-size: .7rem;
                padding: 0.6rem
            }

            .form-label {
                font-size: .7rem;
                margin-bottom: 0.4rem
            }

            .navbar-brand {
                font-size: .85rem
            }

            .navbar-nav .nav-link {
                font-size: .7rem;
                padding: 0.5rem 0.75rem
            }

            .btn {
                font-size: .65rem;
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

            .row {
                margin: 0 -0.25rem
            }

            .col-md-8, .col-md-4 {
                padding: 0 0.25rem
            }

            .profile-header {
                padding: 0.75rem;
                text-align: center
            }

            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 2rem
            }

            .info-item {
                padding: .5rem
            }

            .card-header {
                padding: .6rem .8rem
            }

            .form-control {
                padding: 0.5rem
            }

            .navbar-toggler {
                font-size: .75rem;
                padding: 0.25rem 0.5rem
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
                <a href="<?= base_url('user/profile') ?>" style="color: white; padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500; background-color: rgba(255,255,255,0.15); text-decoration: none; transition: all 0.3s;">
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
            <a href="<?= base_url('user/transactions') ?>" style="display: block; color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; margin-bottom: 0.25rem; text-decoration: none;">
                <i class="fas fa-receipt" style="margin-right: 0.5rem;"></i>Transactions
            </a>
            <a href="<?= base_url('user/profile') ?>" style="display: block; color: white; padding: 0.5rem 0.75rem; border-radius: 4px; font-size: 0.875rem; font-weight: 500; background-color: rgba(255,255,255,0.15); margin-bottom: 0.25rem; text-decoration: none;">
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
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <h2><?= esc($user['username']) ?></h2>
            <p class="mb-0"><i class="fas fa-calendar me-2"></i>Member since <?= date('F Y', strtotime($user['created_at'])) ?></p>
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
            <!-- Account Information -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-info-circle me-2"></i>Account Information
                    </div>
                    <div class="card-body p-0">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-user me-2"></i>Username
                            </div>
                            <div class="info-value"><?= esc($user['username']) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-fingerprint me-2"></i>User ID
                            </div>
                            <div class="info-value">#<?= esc($user['id']) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar-plus me-2"></i>Account Created
                            </div>
                            <div class="info-value"><?= date('F d, Y h:i A', strtotime($user['created_at'])) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-sync me-2"></i>Last Updated
                            </div>
                            <div class="info-value"><?= date('F d, Y h:i A', strtotime($user['updated_at'])) ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-lock me-2"></i>Change Password
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('user/update-profile') ?>">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">
                                    <i class="fas fa-key me-1"></i>Current Password
                                </label>
                                <input type="password" class="form-control" id="current_password" 
                                       name="current_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>New Password
                                </label>
                                <input type="password" class="form-control" id="new_password" 
                                       name="new_password" required minlength="6">
                                <small class="text-muted">Minimum 6 characters</small>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Confirm Password
                                </label>
                                <input type="password" class="form-control" id="confirm_password" 
                                       name="confirm_password" required>
                            </div>
                            <button type="submit" class="btn btn-black w-100">
                                <i class="fas fa-save me-2"></i>Update Password
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Account Actions -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-cog me-2"></i>Account Actions
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('user/dashboard') ?>" class="btn btn-outline-dark w-100 mb-2">
                            <i class="fas fa-home me-2"></i>Go to Dashboard
                        </a>
                        <a href="<?= base_url('user/transactions') ?>" class="btn btn-outline-dark w-100 mb-2">
                            <i class="fas fa-history me-2"></i>View Transaction History
                        </a>
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-danger w-100">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (newPassword !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
                document.getElementById('confirm_password').focus();
            }
        });
    </script>
</body>
</html>
