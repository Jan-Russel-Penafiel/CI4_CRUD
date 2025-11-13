<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - POS System</title>
    <meta name="author" content="Jan Russel E. Peñafiel">
    <meta name="description" content="POS System Receipt - Created by Jan Russel E. Peñafiel">
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

        .action-buttons {
            margin-top: 20px;
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

        .btn {
            font-size: .7rem;
            padding: .25rem .5rem
        }

        .btn-lg {
            font-size: .8rem;
            padding: .4rem .8rem
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
    <!-- Header -->
    <div class="header no-print">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-1"><i class="fas fa-receipt me-2"></i>POS System - Receipt</h1>
                    <p class="mb-0 opacity-75">Transaction completed successfully</p>
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
                        <button class="btn btn-sm btn-outline-black ms-2 resend-sms no-print" 
                                data-transaction-id="<?= $transaction['id'] ?>">
                            <i class="fas fa-paper-plane me-1"></i>Resend
                        </button>
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

        <!-- Action Buttons (no-print) -->
        <div class="action-buttons text-center no-print">
            <button class="btn btn-black me-2" onclick="window.print()">
                <i class="fas fa-print me-1"></i>Print Receipt
            </button>
            <a href="<?= base_url('pos/dashboard') ?>" class="btn btn-black me-2">
                <i class="fas fa-plus me-1"></i>New Transaction
            </a>
            <a href="<?= base_url('pos/scanner') ?>" class="btn btn-outline-black">
                <i class="fas fa-qrcode me-1"></i>Continue Scanning
            </a>
        </div>
    </div>

    <!-- Transaction Summary Modal -->
    <div class="modal fade no-print" id="summaryModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transaction Summary</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Transaction Details</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td>Transaction Number:</td>
                                    <td><?= esc($transaction['transaction_number']) ?></td>
                                </tr>
                                <tr>
                                    <td>Date:</td>
                                    <td><?= date('Y-m-d H:i:s', strtotime($transaction['created_at'])) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Amount:</td>
                                    <td>₱<?= number_format($transaction['total_amount'], 2) ?></td>
                                </tr>
                                <tr>
                                    <td>Payment Method:</td>
                                    <td><?= ucfirst($transaction['payment_method']) ?></td>
                                </tr>
                                <tr>
                                    <td>Customer Phone:</td>
                                    <td><?= $transaction['customer_phone'] ?: 'Not provided' ?></td>
                                </tr>
                                <tr>
                                    <td>SMS Status:</td>
                                    <td><?= $transaction['sms_sent'] ? 'Sent' : 'Not sent' ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Items (<?= count($transaction['items']) ?>)</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($transaction['items'] as $item): ?>
                                        <tr>
                                            <td><?= esc($item['product_name']) ?></td>
                                            <td><?= $item['quantity'] ?></td>
                                            <td>₱<?= number_format($item['price'], 2) ?></td>
                                            <td>₱<?= number_format($item['subtotal'], 2) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            }
        };

        // Initialize notifications on page load
        document.addEventListener('DOMContentLoaded', function() {
            NotificationService.initializeFlashMessages();
        });

        // Resend SMS functionality
        document.querySelectorAll('.resend-sms').forEach(button => {
            button.addEventListener('click', function() {
                const transactionId = this.dataset.transactionId;
                const btn = this;
                
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Sending...';
                btn.disabled = true;
                
                fetch(`<?= base_url('pos/resend-sms/') ?>${transactionId}`, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        btn.closest('.sms-status').className = 'sms-status sms-sent';
                        btn.closest('.sms-status').innerHTML = `
                            <i class="fas fa-sms me-2"></i>
                            Receipt sent via SMS to <?= esc($transaction['customer_phone'] ?? '') ?>
                        `;
                        
                        // Show success message
                        NotificationService.showSuccess('SMS receipt sent successfully!');
                    } else {
                        btn.innerHTML = '<i class="fas fa-paper-plane me-1"></i>Resend';
                        btn.disabled = false;
                        
                        NotificationService.showError(data.message || 'Failed to send SMS');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    btn.innerHTML = '<i class="fas fa-paper-plane me-1"></i>Resend';
                    btn.disabled = false;
                    
                    NotificationService.showError('Error sending SMS');
                });
            });
        });

        // Auto-print option (uncomment if needed)
        // window.addEventListener('load', function() {
        //     setTimeout(() => {
        //         window.print();
        //     }, 1000);
        // });

        // Summary modal (if you want to add this feature)
        function showSummary() {
            const modal = new bootstrap.Modal(document.getElementById('summaryModal'));
            modal.show();
        }
    </script>
</body>
</html>