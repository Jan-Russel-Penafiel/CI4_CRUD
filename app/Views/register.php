<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Register - Products Management' ?></title>
    <meta name="author" content="Jan Russel E. Peñafiel">
    <meta name="description" content="User Registration - Products Management System">
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
            background-color: var(--light-gray);
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
            background-color: var(--primary-white);
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
            font-size: 1.25rem;
            font-weight: 600;
        }

        .register-header p {
            margin: 0.25rem 0 0 0;
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .register-body {
            padding: 1.25rem;
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
            background-color: var(--light-gray);
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
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <h1><i class="fas fa-user-plus me-2"></i>Create Account</h1>
                <p>Join the Products Management System</p>
            </div>

            <div class="register-body">
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Validation Errors -->
                <?php if (session()->getFlashdata('validation_errors')): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach (session()->getFlashdata('validation_errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

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
                        <div class="form-text">Username must be 3-50 characters long and unique</div>
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
                        <div class="form-text">Password must be at least 6 characters long</div>
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