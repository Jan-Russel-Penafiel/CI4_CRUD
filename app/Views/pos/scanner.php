<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - POS System</title>
    <meta name="author" content="Jan Russel E. Peñafiel">
    <meta name="description" content="POS System QR Scanner - Created by Jan Russel E. Peñafiel">
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

        .card-header h4,
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

        #scanner-container {
            max-width: 500px;
            margin: 0 auto;
            position: relative;
        }

        #scanner {
            width: 100%;
            max-width: 500px;
            border: 3px solid var(--primary-black);
            border-radius: 10px;
        }

        .scanner-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px;
            height: 200px;
            border: 2px solid var(--primary-black);
            border-radius: 10px;
            pointer-events: none;
        }

        .scanner-corner {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 3px solid var(--primary-black);
        }

        .scanner-corner.top-left {
            top: -3px;
            left: -3px;
            border-right: none;
            border-bottom: none;
        }

        .scanner-corner.top-right {
            top: -3px;
            right: -3px;
            border-left: none;
            border-bottom: none;
        }

        .scanner-corner.bottom-left {
            bottom: -3px;
            left: -3px;
            border-right: none;
            border-top: none;
        }

        .scanner-corner.bottom-right {
            bottom: -3px;
            right: -3px;
            border-left: none;
            border-top: none;
        }

        .manual-input {
            background: var(--light-gray);
            border: 2px dashed var(--primary-black);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .scan-result {
            background: var(--light-gray);
            border: 2px solid var(--primary-black);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }

        .scan-error {
            background: var(--light-gray);
            border: 2px solid var(--primary-black);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }

        .alert-info {
            background-color: var(--primary-white);
            border-color: var(--primary-black);
            color: var(--primary-black)
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

        .alert-secondary {
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
            #scanner-container {
                max-width: 100%;
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
                    <h1 class="mb-1"><i class="fas fa-qrcode me-2"></i>POS System - QR Scanner</h1>
                    <p class="mb-0 opacity-75">Scan products to add to cart</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <nav>
                        <a href="<?= base_url('pos/dashboard') ?>" class="text-white me-3 text-decoration-none">
                            <i class="fas fa-home me-1"></i>Dashboard
                        </a>
                        <a href="<?= base_url('products') ?>" class="text-white me-3 text-decoration-none">
                            <i class="fas fa-box me-1"></i>Products
                        </a>
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
        <!-- Scanner Section -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4><i class="fas fa-qrcode me-2"></i>QR Code Scanner</h4>
                        <p class="mb-0 text-muted">Position the QR code within the scanner area</p>
                    </div>
                    <div class="card-body text-center">
                        <div id="scanner-container">
                            <video id="scanner" autoplay playsinline></video>
                            <div class="scanner-overlay" id="scannerOverlay" style="display: none;">
                                <div class="scanner-corner top-left"></div>
                                <div class="scanner-corner top-right"></div>
                                <div class="scanner-corner bottom-left"></div>
                                <div class="scanner-corner bottom-right"></div>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <button id="startScan" class="btn btn-black me-2">
                                <i class="fas fa-play me-1"></i>Start Scanning
                            </button>
                            <button id="stopScan" class="btn btn-outline-black me-2" disabled>
                                <i class="fas fa-stop me-1"></i>Stop Scanning
                            </button>
                            <button class="btn btn-outline-black" data-bs-toggle="modal" data-bs-target="#manualModal">
                                <i class="fas fa-keyboard me-1"></i>Manual Entry
                            </button>
                        </div>

                        <!-- Scan Status -->
                        <div id="scanStatus" class="mt-3">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>Click "Start Scanning" to begin
                            </div>
                        </div>

                        <!-- Scan Result -->
                        <div id="scanResult" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Cart Preview -->
        <?php if (!empty($cart)): ?>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Current Cart</h5>
                        <a href="<?= base_url('pos/checkout') ?>" class="btn btn-black">
                            <i class="fas fa-credit-card me-1"></i>Checkout
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php $total = 0; ?>
                            <?php foreach ($cart as $productId => $item): ?>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title"><?= esc($item['product_name']) ?></h6>
                                        <p class="card-text">
                                            Qty: <?= $item['quantity'] ?><br>
                                            Price: ₱<?= number_format($item['price'], 2) ?><br>
                                            <strong>Subtotal: ₱<?= number_format($item['subtotal'], 2) ?></strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php $total += $item['subtotal']; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="text-end">
                            <h4>Total: ₱<?= number_format($total, 2) ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Manual Entry Modal -->
    <div class="modal fade" id="manualModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manual QR Code Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="manual-input">
                        <i class="fas fa-keyboard fa-2x mb-3"></i>
                        <h6>Enter QR Code Data</h6>
                        <textarea class="form-control mt-3" id="manualQrData" rows="4" 
                                  placeholder='Enter QR code data here (e.g., {"type":"product","id":1,"name":"Product Name","price":100})' ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-black" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-black" id="processManualQr">Process QR Data</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.js"></script>
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

        let stream = null;
        let scanning = false;
        const video = document.getElementById('scanner');
        const scanStatus = document.getElementById('scanStatus');
        const scanResult = document.getElementById('scanResult');
        const startBtn = document.getElementById('startScan');
        const stopBtn = document.getElementById('stopScan');
        const cartCounter = document.getElementById('cartCounter');

        // Start camera
        async function startCamera() {
            try {
                scanStatus.innerHTML = `
                    <div class="alert alert-info">
                        <i class="fas fa-spinner fa-spin me-2"></i>Starting camera...
                    </div>
                `;

                stream = await navigator.mediaDevices.getUserMedia({
                    video: { 
                        facingMode: 'environment',  // Use back camera
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    }
                });
                
                video.srcObject = stream;
                video.play();
                
                startBtn.disabled = true;
                stopBtn.disabled = false;
                scanning = true;
                
                // Show scanner overlay when scanning starts
                document.getElementById('scannerOverlay').style.display = 'block';
                
                scanStatus.innerHTML = `
                    <div class="alert alert-success">
                        <i class="fas fa-camera me-2"></i>Camera active - Scanning for QR codes...
                    </div>
                `;

                // Start scanning
                requestAnimationFrame(scanFrame);
                
            } catch (error) {
                console.error('Camera error:', error);
                scanStatus.innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>Camera access denied or not available
                    </div>
                `;
            }
        }

        // Stop camera
        function stopCamera() {
            scanning = false;
            
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
            
            video.srcObject = null;
            startBtn.disabled = false;
            stopBtn.disabled = true;
            
            // Hide scanner overlay when scanning stops
            document.getElementById('scannerOverlay').style.display = 'none';
            
            scanStatus.innerHTML = `
                <div class="alert alert-secondary">
                    <i class="fas fa-stop me-2"></i>Scanning stopped
                </div>
            `;
            
            scanResult.style.display = 'none';
        }

        // Scan frame for QR codes
        function scanFrame() {
            if (!scanning) return;

            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            
            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                context.drawImage(video, 0, 0);
                
                const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                const code = jsQR(imageData.data, imageData.width, imageData.height);
                
                if (code) {
                    processQrCode(code.data);
                    return; // Stop scanning after successful read
                }
            }
            
            requestAnimationFrame(scanFrame);
        }

        // Process QR code data
        function processQrCode(qrData) {
            scanning = false; // Stop scanning temporarily
            
            scanResult.innerHTML = `
                <div class="scan-result">
                    <i class="fas fa-qrcode me-2"></i>QR Code detected! Processing...
                </div>
            `;
            scanResult.style.display = 'block';

            fetch('<?= base_url('pos/process-scan') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    qr_data: qrData
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    scanResult.innerHTML = `
                        <div class="scan-result">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>${data.message}</strong><br>
                            Product: ${escapeHtml(data.product.product_name)}<br>
                            Price: ₱${parseFloat(data.product.price).toFixed(2)}
                        </div>
                    `;
                    
                    // Update cart counter
                    cartCounter.textContent = data.cart_count;
                    
                    // Auto-hide result and resume scanning after 3 seconds
                    setTimeout(() => {
                        scanResult.style.display = 'none';
                        if (stream && startBtn.disabled) {
                            scanning = true;
                            requestAnimationFrame(scanFrame);
                        }
                    }, 3000);
                    
                } else {
                    scanResult.innerHTML = `
                        <div class="scan-error">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            ${data.message}
                        </div>
                    `;
                    
                    // Resume scanning after 2 seconds
                    setTimeout(() => {
                        scanResult.style.display = 'none';
                        if (stream && startBtn.disabled) {
                            scanning = true;
                            requestAnimationFrame(scanFrame);
                        }
                    }, 2000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                scanResult.innerHTML = `
                    <div class="scan-error">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Error processing QR code
                    </div>
                `;
                
                // Resume scanning after 2 seconds
                setTimeout(() => {
                    scanResult.style.display = 'none';
                    if (stream && startBtn.disabled) {
                        scanning = true;
                        requestAnimationFrame(scanFrame);
                    }
                }, 2000);
            });
        }

        // Event listeners
        startBtn.addEventListener('click', startCamera);
        stopBtn.addEventListener('click', stopCamera);

        // Manual QR processing
        document.getElementById('processManualQr').addEventListener('click', function() {
            const qrData = document.getElementById('manualQrData').value.trim();
            
            if (!qrData) {
                NotificationService.showError('Please enter QR code data');
                return;
            }
            
            processQrCode(qrData);
            
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('manualModal'));
            modal.hide();
            
            // Clear input
            document.getElementById('manualQrData').value = '';
        });

        // Utility function
        function escapeHtml(unsafe) {
            return unsafe
                 .replace(/&/g, "&amp;")
                 .replace(/</g, "&lt;")
                 .replace(/>/g, "&gt;")
                 .replace(/"/g, "&quot;")
                 .replace(/'/g, "&#039;");
        }

        // Cleanup on page unload
        window.addEventListener('beforeunload', function() {
            stopCamera();
        });
    </script>
</body>
</html>