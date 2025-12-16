<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Register - Products Management' ?></title>
    <meta name="author" content="Jan Russel E. Peñafiel">
    <meta name="description" content="User Registration - Products Management System">
    <link href="<?= base_url('css/output.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-black: #000;
            --primary-white: #fff;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
            --border-color: #dee2e6;
        }

        body {
            background-image: url('<?= base_url('nsx.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: var(--primary-black);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.85rem;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 0;
            margin: 0;
        }

        .register-container {
            width: 100%;
            max-width: 420px;
            padding: 10px;
        }

        .register-card {
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 2px solid var(--primary-black);
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .register-header {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            padding: 1rem;
            text-align: center;
        }

        .register-header h1 {
            margin: 0;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .register-header p {
            margin: 0.25rem 0 0 0;
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .register-body {
            padding: 1.25rem;
            background-color: transparent;
        }

        .form-control {
            font-size: 0.85rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.6rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: var(--primary-black);
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.8rem;
            color: #dc3545;
        }

        .btn-black {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white);
            font-weight: 500;
            padding: 0.6rem;
            font-size: 0.85rem;
            border-radius: 6px;
            transition: all 0.15s ease-in-out;
        }

        .btn-black:hover {
            background-color: var(--dark-gray);
            border-color: var(--dark-gray);
            color: var(--primary-white);
        }

        .btn-black:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .btn-outline-black {
            border-color: var(--primary-black);
            color: var(--primary-black);
            background-color: transparent;
            font-weight: 500;
            padding: 0.6rem;
            font-size: 0.85rem;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.15s ease-in-out;
        }

        .btn-outline-black:hover {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white);
            text-decoration: none;
        }

        .alert {
            font-size: 0.85rem;
            border-radius: 6px;
            border: 1px solid transparent;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .form-text {
            font-size: 0.8rem;
            color: var(--dark-gray);
        }

        .input-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--dark-gray);
            cursor: pointer;
            z-index: 10;
            padding: 0;
            font-size: 0.9rem;
        }

        .password-toggle:hover {
            color: var(--primary-black);
        }

        .register-footer {
            padding: 0.75rem 1.25rem 1rem;
            text-align: center;
            border-top: 1px solid var(--border-color);
            background-color: rgba(248, 249, 250, 0.5);
        }

        .register-footer p {
            margin: 0;
            font-size: 0.85rem;
        }

        .register-footer a {
            color: var(--primary-black) !important;
        }

        .register-footer a:hover {
            color: var(--dark-gray) !important;
        }

        .loading-spinner {
            display: none;
            margin-right: 0.5rem;
        }

        /* Toast Notification Styles */
        .toast {
            background-color: var(--primary-black);
            border: 2px solid var(--primary-white);
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            font-size: 0.8rem;
            min-width: 200px;
            max-width: 320px;
            margin-bottom: 0.25rem;
            color: var(--primary-white);
        }

        .toast-header {
            background-color: var(--primary-black);
            border-bottom: 1px solid var(--primary-white);
            padding: 0.5rem;
            font-weight: 600;
            color: var(--primary-white);
            font-size: 0.75rem;
        }

        .toast-body {
            padding: 0.75rem;
            color: var(--primary-white);
            background-color: var(--primary-black);
            font-size: 0.8rem;
            line-height: 1.3;
            white-space: pre-line;
        }

        .toast.bg-success,
        .toast.bg-danger,
        .toast.bg-info {
            background-color: var(--primary-black);
            border-color: var(--primary-white);
        }

        .toast.bg-success .toast-header,
        .toast.bg-danger .toast-header,
        .toast.bg-info .toast-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
        }

        .toast .btn-close {
            font-size: 0.7rem;
            padding: 0.25rem;
            filter: invert(1);
        }

        .toast .toast-header i {
            font-size: 0.75rem;
        }

        .toast-container {
            max-height: 100vh;
            overflow-y: auto;
        }

        .toast-container::-webkit-scrollbar {
            width: 4px;
        }

        .toast-container::-webkit-scrollbar-track {
            background: transparent;
        }

        .toast-container::-webkit-scrollbar-thumb {
            background: var(--primary-white);
            border-radius: 2px;
        }

        .toast-container::-webkit-scrollbar-thumb:hover {
            background: var(--dark-gray);
        }

        @keyframes slideInBottom {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideOutBottom {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(100%);
                opacity: 0;
            }
        }

        .toast.hiding {
            animation: slideOutBottom 0.3s ease-in;
        }

        /* Toggle Background Button */
        .toggle-bg-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            color: var(--primary-white);
            border: 2px solid var(--primary-white);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .toggle-bg-btn:hover {
            background-color: rgba(0, 0, 0, 0.9);
            transform: scale(1.1);
        }

        .toggle-bg-btn i {
            font-size: 1.2rem;
        }

        .register-container.hidden {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .register-container {
            transition: opacity 0.3s ease;
        }

        @media (max-width: 576px) {
            .register-container {
                padding: 5px;
            }

            .register-body {
                padding: 1rem;
            }

            .register-header {
                padding: 0.75rem;
            }

            .register-header h1 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Toggle Background Button -->
    <button class="toggle-bg-btn" id="toggleBgBtn" title="Toggle form visibility">
        <i class="fas fa-eye-slash"></i>
    </button>

    <!-- Toast Container for notifications -->
    <div class="toast-container position-fixed bottom-0 start-0 p-2" style="z-index:9999;"></div>
    
    <div class="register-container" id="registerContainer">
        <div class="register-card">
            <div class="register-header">
                <h1><i class="fas fa-user-plus me-2"></i>Create Account</h1>
                <p>Join the Products Management System</p>
            </div>

            <div class="register-body">

                <form id="registerForm" action="<?= base_url('auth/processRegister') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-2">
                        <label for="username" class="form-label">
                            <i class="fas fa-user me-1"></i>Username
                        </label>
                        <input type="text" 
                               class="form-control <?= (session()->getFlashdata('validation_errors') && isset(session()->getFlashdata('validation_errors')['username'])) ? 'is-invalid' : '' ?>" 
                               id="username" 
                               name="username" 
                               value="<?= old('username') ?>" 
                               placeholder="Enter your username"
                               required>
                        <div class="form-text">3-50 characters, letters/numbers/punctuation only</div>
                        <?php if (session()->getFlashdata('validation_errors') && isset(session()->getFlashdata('validation_errors')['username'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('validation_errors')['username'] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-1"></i>Password
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   class="form-control <?= (session()->getFlashdata('validation_errors') && isset(session()->getFlashdata('validation_errors')['password'])) ? 'is-invalid' : '' ?>" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Enter your password"
                                   required>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="form-text">6+ characters: uppercase, lowercase, number, special character</div>
                        <div class="password-strength mt-1" id="passwordStrength" style="display: none;">
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
                            </div>
                            <small class="password-strength-text"></small>
                        </div>
                        <?php if (session()->getFlashdata('validation_errors') && isset(session()->getFlashdata('validation_errors')['password'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('validation_errors')['password'] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-2">
                        <label for="confirm_password" class="form-label">
                            <i class="fas fa-lock me-1"></i>Confirm Password
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   class="form-control <?= (session()->getFlashdata('validation_errors') && isset(session()->getFlashdata('validation_errors')['confirm_password'])) ? 'is-invalid' : '' ?>" 
                                   id="confirm_password" 
                                   name="confirm_password" 
                                   placeholder="Confirm your password"
                                   required>
                            <button type="button" class="password-toggle" id="toggleConfirmPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <?php if (session()->getFlashdata('validation_errors') && isset(session()->getFlashdata('validation_errors')['confirm_password'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('validation_errors')['confirm_password'] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-black" id="registerBtn">
                            <span class="loading-spinner spinner-border spinner-border-sm" role="status"></span>
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </div>
                </form>
            </div>

            <div class="register-footer">
                <small class="text-muted">
                    Already have an account? 
                    <a href="<?= base_url('auth/login') ?>" class="text-decoration-none">
                        <strong>Sign in here</strong>
                    </a>
                </small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toast Notification Service
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

                const toastId = this.generateToastId();
                const config = this.getToastConfig(type);
                const html = this.buildToastHTML(toastId, config, message, type);

                container.insertAdjacentHTML('beforeend', html);
                return this.showToast(toastId, config, type);
            },

            generateToastId() {
                return 'toast-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
            },

            getToastConfig(type) {
                const configs = {
                    'success': { bgClass: 'bg-success', icon: 'fas fa-check-circle', title: 'Success', delay: 4000 },
                    'error': { bgClass: 'bg-danger', icon: 'fas fa-exclamation-circle', title: 'Error', delay: 6000 },
                    'info': { bgClass: 'bg-info', icon: 'fas fa-info-circle', title: 'Information', delay: 5000 }
                };
                return configs[type] || configs['info'];
            },

            buildToastHTML(toastId, config, message, type) {
                return `<div class="toast ${config.bgClass}" id="${toastId}" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="${config.icon} me-2"></i>
                        <strong class="me-auto">${config.title}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
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
                });

                toast.show();
                toastEl.style.animation = 'slideInBottom 0.3s ease-out';
                
                return { toast, toastId };
            }
        };

        // Initialize notifications on page load
        document.addEventListener('DOMContentLoaded', function() {
            NotificationService.initializeFlashMessages();
        });

        // Toggle background visibility
        document.getElementById('toggleBgBtn').addEventListener('click', function() {
            const container = document.getElementById('registerContainer');
            const icon = this.querySelector('i');
            
            if (container.classList.contains('hidden')) {
                container.classList.remove('hidden');
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                this.title = 'Hide form to view background';
            } else {
                container.classList.add('hidden');
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                this.title = 'Show form';
            }
        });

        // Password visibility toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPassword = document.getElementById('confirm_password');
            const icon = this.querySelector('i');
            
            if (confirmPassword.type === 'password') {
                confirmPassword.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPassword.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form submission handling
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const btn = document.getElementById('registerBtn');
            const spinner = btn.querySelector('.loading-spinner');
            
            // Show loading state
            btn.disabled = true;
            spinner.style.display = 'inline-block';
            
            // Client-side validation
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (username.length < 3) {
                alert('Username must be at least 3 characters long');
                btn.disabled = false;
                spinner.style.display = 'none';
                e.preventDefault();
                return;
            }
            
            if (password.length < 6) {
                alert('Password must be at least 6 characters long');
                btn.disabled = false;
                spinner.style.display = 'none';
                e.preventDefault();
                return;
            }

            // Check password strength requirements
            const passwordErrors = [];
            if (!/[A-Z]/.test(password)) {
                passwordErrors.push('one uppercase letter');
            }
            if (!/[a-z]/.test(password)) {
                passwordErrors.push('one lowercase letter');
            }
            if (!/[0-9]/.test(password)) {
                passwordErrors.push('one number');
            }
            if (!/[^A-Za-z0-9]/.test(password)) {
                passwordErrors.push('one special character');
            }

            if (passwordErrors.length > 0) {
                alert('Password must contain at least: ' + passwordErrors.join(', '));
                btn.disabled = false;
                spinner.style.display = 'none';
                e.preventDefault();
                return;
            }
            
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                btn.disabled = false;
                spinner.style.display = 'none';
                e.preventDefault();
                return;
            }
        });

        // Real-time password matching validation
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword && password !== confirmPassword) {
                this.classList.add('is-invalid');
                let feedback = this.parentNode.parentNode.querySelector('.invalid-feedback');
                if (!feedback) {
                    feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    this.parentNode.parentNode.appendChild(feedback);
                }
                feedback.textContent = 'Passwords do not match';
            } else {
                this.classList.remove('is-invalid');
                const feedback = this.parentNode.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.remove();
                }
            }
        });

        // Password strength checking
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('passwordStrength');
            const progressBar = strengthIndicator.querySelector('.progress-bar');
            const strengthText = strengthIndicator.querySelector('.password-strength-text');

            if (password.length === 0) {
                strengthIndicator.style.display = 'none';
                return;
            }

            strengthIndicator.style.display = 'block';
            
            let score = 0;
            let feedback = [];

            // Length check
            if (password.length >= 6) {
                score += 20;
            } else {
                feedback.push('6+ characters');
            }

            // Uppercase check
            if (/[A-Z]/.test(password)) {
                score += 20;
            } else {
                feedback.push('uppercase letter');
            }

            // Lowercase check
            if (/[a-z]/.test(password)) {
                score += 20;
            } else {
                feedback.push('lowercase letter');
            }

            // Number check
            if (/[0-9]/.test(password)) {
                score += 20;
            } else {
                feedback.push('number');
            }

            // Special character check
            if (/[^A-Za-z0-9]/.test(password)) {
                score += 20;
            } else {
                feedback.push('special character');
            }

            // Update progress bar
            progressBar.style.width = score + '%';
            
            // Set color and text based on strength
            progressBar.classList.remove('bg-danger', 'bg-warning', 'bg-success');
            
            if (score < 60) {
                progressBar.classList.add('bg-danger');
                strengthText.textContent = 'Weak - Need: ' + feedback.join(', ');
                strengthText.style.color = '#dc3545';
            } else if (score < 100) {
                progressBar.classList.add('bg-warning');
                strengthText.textContent = 'Fair - Need: ' + feedback.join(', ');
                strengthText.style.color = '#ffc107';
            } else {
                progressBar.classList.add('bg-success');
                strengthText.textContent = 'Strong password';
                strengthText.style.color = '#28a745';
            }
        });

        // Username availability check (optional enhancement)
        let usernameTimeout;
        document.getElementById('username').addEventListener('input', function() {
            const username = this.value;
            
            clearTimeout(usernameTimeout);
            
            if (username.length >= 3) {
                usernameTimeout = setTimeout(() => {
                    // You can add AJAX call here to check username availability
                    // For now, we'll rely on server-side validation
                }, 500);
            }
        });
    </script>
</body>

</html>