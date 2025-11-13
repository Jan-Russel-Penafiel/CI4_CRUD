<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - POS System</title>
    <meta name="author" content="Jan Russel E. Peñafiel">
    <meta name="description" content="POS System Checkout - Created by Jan Russel E. Peñafiel">
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
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            transition: transform .2s ease;
            font-size: .75rem
        }

        .card-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
            border-bottom: none;
            font-weight: 600;
            border-radius: 2px 2px 0 0;
        }

        .card-body {
            border-radius: 0 0 2px 2px;
            padding: 1rem;
        }

        .payment-card .card-body {
            padding: 0.75rem;
        }

        .card-header h4,
        .card-header h5,
        .card-header h6 {
            font-size: .9rem
        }

        .payment-option {
            border: 2px solid var(--border-color);
            border-radius: 6px;
            padding: 6px 4px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            background-color: var(--primary-white);
            font-size: 0.6rem;
            min-height: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .payment-option:hover {
            border-color: var(--primary-black);
            background-color: var(--light-gray);
        }

        .payment-option.selected {
            border-color: var(--primary-black);
            background-color: var(--light-gray);
        }

        .payment-option input[type="radio"] {
            display: none;
        }

        .payment-option i {
            font-size: 1rem !important;
            margin-bottom: 0.2rem;
        }

        .payment-option h6 {
            font-size: 0.6rem;
            margin: 0;
            line-height: 1;
        }

        .order-summary {
            background: var(--light-gray);
            border-radius: 6px;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            font-size: 0.75rem;
        }

        .cart-item {
            border-bottom: 1px solid var(--border-color);
            padding: 10px 0;
        }

        .cart-item:last-child {
            border-bottom: none;
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

        .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .25)
        }

        .form-control.is-valid {
            border-color: #28a745;
            box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .25)
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

        .navbar-brand {
            font-weight: 600;
            font-size: 1.1rem
        }

        .nav-link {
            font-size: .8rem
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

        @media (max-width: 768px) {
            .card-body {
                padding: 1rem
            }
            
            .payment-option {
                padding: 15px
            }
            
            .order-summary {
                padding: 15px
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
                    <h1 class="mb-1"><i class="fas fa-cash-register me-2"></i>POS System - Checkout</h1>
                    <p class="mb-0 opacity-75">Secure payment processing</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <nav>
                        <a href="<?= base_url('pos/dashboard') ?>" class="text-white me-3 text-decoration-none">
                            <i class="fas fa-home me-1"></i>Dashboard
                        </a>
                        <a href="<?= base_url('pos/scanner') ?>" class="text-white text-decoration-none">
                            <i class="fas fa-qrcode me-1"></i>Scanner
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row">
            <!-- Order Summary -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fas fa-receipt me-2"></i>Order Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $item): ?>
                                    <tr>
                                        <td>
                                            <strong><?= esc($item['product_name']) ?></strong>
                                        </td>
                                        <td>₱<?= number_format($item['price'], 2) ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td>₱<?= number_format($item['subtotal'], 2) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="table-success">
                                        <th colspan="3">Total Amount</th>
                                        <th>₱<?= number_format($cart_total, 2) ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Form -->
            <div class="col-12">
                <div class="card payment-card">
                    <div class="card-header py-2">
                        <h5 class="mb-0"><i class="fas fa-credit-card me-2"></i>Payment</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('pos/process-checkout') ?>">
                            <div class="row g-3">
                                <!-- Payment Methods -->
                                <div class="col-md-4">
                                    <label class="form-label mb-1">Payment Method</label>
                                    <div class="row g-1">
                                        <div class="col-4">
                                            <label class="payment-option w-100" for="cash">
                                                <input type="radio" name="payment_method" value="cash" id="cash" required>
                                                <i class="fas fa-money-bill-wave text-success"></i>
                                                <h6>Cash</h6>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label class="payment-option w-100" for="card">
                                                <input type="radio" name="payment_method" value="card" id="card" required>
                                                <i class="fas fa-credit-card text-primary"></i>
                                                <h6>Card</h6>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label class="payment-option w-100" for="digital">
                                                <input type="radio" name="payment_method" value="digital" id="digital" required>
                                                <i class="fas fa-mobile-alt text-info"></i>
                                                <h6>Digital</h6>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Customer Phone -->
                                <div class="col-md-4">
                                    <label for="customer_phone" class="form-label mb-1">
                                        <i class="fas fa-phone me-1"></i>Customer Phone <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control form-control-sm" id="customer_phone" name="customer_phone" 
                                           placeholder="09XX-XXX-XXXX" value="<?= old('customer_phone') ?>" required>
                                    <div class="form-text small">
                                        <i class="fas fa-sms me-1"></i>Receipt via SMS
                                    </div>
                                    <div id="phoneValidation" class="mt-1" style="display: none;"></div>
                                </div>

                                <!-- Total & Actions -->
                                <div class="col-md-4">
                                    <!-- Total Display -->
                                    <div class="order-summary small mb-2">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Subtotal:</span>
                                            <span>₱<?= number_format($cart_total, 2) ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Tax:</span>
                                            <span>₱0.00</span>
                                        </div>
                                        <hr class="my-1">
                                        <div class="d-flex justify-content-between">
                                            <strong>Total:</strong>
                                            <strong class="text-success">₱<?= number_format($cart_total, 2) ?></strong>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-grid gap-1">
                                        <button type="submit" class="btn btn-black btn-sm">
                                            <i class="fas fa-check-circle me-1"></i>Process Payment
                                        </button>
                                        <a href="<?= base_url('pos/dashboard') ?>" class="btn btn-outline-black btn-sm">
                                            <i class="fas fa-arrow-left me-1"></i>Continue Shopping
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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

        // Initialize notifications on page load
        document.addEventListener('DOMContentLoaded', function() {
            NotificationService.initializeFlashMessages();
        });

        // Payment method selection
        document.querySelectorAll('.payment-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                document.querySelectorAll('.payment-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Check the radio button
                const radio = this.querySelector('input[type="radio"]');
                if (radio) {
                    radio.checked = true;
                }
            });
        });

        // Phone number validation
        const phoneInput = document.getElementById('customer_phone');
        const phoneValidation = document.getElementById('phoneValidation');

        phoneInput.addEventListener('input', function() {
            const phone = this.value.trim();
            
            if (!phone) {
                this.classList.remove('is-valid', 'is-invalid');
                phoneValidation.innerHTML = `
                    <div class="alert alert-danger alert-sm py-1">
                        <i class="fas fa-exclamation-circle me-1"></i>Phone number is required
                    </div>
                `;
                phoneValidation.style.display = 'block';
                return;
            }
            
            // Basic Philippine phone number validation
            const phoneRegex = /^(09|\+639|639)[0-9]{9}$/;
            const isValid = phoneRegex.test(phone.replace(/[-\s]/g, ''));
            
            if (isValid) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                phoneValidation.innerHTML = `
                    <div class="alert alert-success alert-sm py-1">
                        <i class="fas fa-check-circle me-1"></i>Valid phone number
                    </div>
                `;
                phoneValidation.style.display = 'block';
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
                phoneValidation.innerHTML = `
                    <div class="alert alert-warning alert-sm py-1">
                        <i class="fas fa-exclamation-triangle me-1"></i>Please enter a valid Philippine phone number
                    </div>
                `;
                phoneValidation.style.display = 'block';
            }
        });

        // Format phone number on blur
        phoneInput.addEventListener('blur', function() {
            let phone = this.value.replace(/[-\s]/g, '');
            
            if (phone.startsWith('63')) {
                phone = '0' + phone.substring(2);
            } else if (phone.startsWith('+63')) {
                phone = '0' + phone.substring(3);
            }
            
            // Format as 09XX-XXX-XXXX
            if (phone.length === 11 && phone.startsWith('09')) {
                this.value = phone.substring(0, 4) + '-' + phone.substring(4, 7) + '-' + phone.substring(7);
            }
        });

        // Form validation before submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
            const phoneInput = document.getElementById('customer_phone');
            const phone = phoneInput.value.trim();
            
            if (!paymentMethod) {
                e.preventDefault();
                NotificationService.showError('Please select a payment method');
                return;
            }
            
            if (!phone) {
                e.preventDefault();
                NotificationService.showError('Please enter a customer phone number');
                phoneInput.focus();
                return;
            }
            
            if (phoneInput.classList.contains('is-invalid')) {
                e.preventDefault();
                NotificationService.showError('Please enter a valid phone number');
                phoneInput.focus();
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
            submitBtn.disabled = true;
        });

        // Auto-select cash payment method by default
        document.addEventListener('DOMContentLoaded', function() {
            const cashOption = document.querySelector('#cash').closest('.payment-option');
            cashOption.click();
        });
    </script>
</body>
</html>