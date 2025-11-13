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

        .card-header h4,
        .card-header h5,
        .card-header h6 {
            font-size: .9rem
        }

        .payment-option {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            background-color: var(--primary-white)
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

        .order-summary {
            background: var(--light-gray);
            border-radius: 10px;
            padding: 20px;
            border: 1px solid var(--border-color)
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
            <!-- Order Summary -->
            <div class="col-lg-8">
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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-credit-card me-2"></i>Payment</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('pos/process-checkout') ?>">
                            <!-- Payment Methods -->
                            <div class="mb-4">
                                <label class="form-label">Payment Method</label>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="payment-option w-100" for="cash">
                                            <input type="radio" name="payment_method" value="cash" id="cash" required>
                                            <i class="fas fa-money-bill-wave fa-2x text-success mb-2"></i>
                                            <h6>Cash</h6>
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <label class="payment-option w-100" for="card">
                                            <input type="radio" name="payment_method" value="card" id="card" required>
                                            <i class="fas fa-credit-card fa-2x text-primary mb-2"></i>
                                            <h6>Card</h6>
                                        </label>
                                    </div>
                                    <div class="col-12">
                                        <label class="payment-option w-100" for="digital">
                                            <input type="radio" name="payment_method" value="digital" id="digital" required>
                                            <i class="fas fa-mobile-alt fa-2x text-info mb-2"></i>
                                            <h6>Digital Payment</h6>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Phone -->
                            <div class="mb-4">
                                <label for="customer_phone" class="form-label">
                                    <i class="fas fa-phone me-1"></i>Customer Phone <span class="text-danger">*</span>
                                </label>
                                <input type="tel" class="form-control" id="customer_phone" name="customer_phone" 
                                       placeholder="09XX-XXX-XXXX" value="<?= old('customer_phone') ?>" required>
                                <div class="form-text">
                                    <i class="fas fa-sms me-1"></i>Receipt will be sent via SMS
                                </div>
                                <div id="phoneValidation" class="mt-2" style="display: none;"></div>
                            </div>

                            <!-- Total Display -->
                            <div class="order-summary mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span>₱<?= number_format($cart_total, 2) ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Tax:</span>
                                    <span>₱0.00</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Discount:</span>
                                    <span>₱0.00</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <strong>Total:</strong>
                                    <strong class="text-success fs-4">₱<?= number_format($cart_total, 2) ?></strong>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-black btn-lg">
                                    <i class="fas fa-check-circle me-2"></i>Process Payment
                                </button>
                                <a href="<?= base_url('pos/dashboard') ?>" class="btn btn-outline-black">
                                    <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
                alert('Please select a payment method');
                return;
            }
            
            if (!phone) {
                e.preventDefault();
                alert('Please enter a customer phone number');
                phoneInput.focus();
                return;
            }
            
            if (phoneInput.classList.contains('is-invalid')) {
                e.preventDefault();
                alert('Please enter a valid phone number');
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