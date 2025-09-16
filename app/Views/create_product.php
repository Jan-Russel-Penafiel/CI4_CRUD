<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-black: #000000;
            --primary-white: #ffffff;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
            --border-color: #dee2e6;
        }
        
        body {
            background-color: var(--light-gray);
            color: var(--primary-black);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.8rem;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            padding: 1.5rem 0;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            font-size: 1.5rem;
        }
        
        .header p {
            font-size: 0.7rem;
        }
        
        .card {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-size: 0.75rem;
        }
        
        .card-header h5, .card-header h6 {
            font-size: 0.9rem;
        }
        
        .btn {
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
        }
        
        .btn-lg {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
        
        .form-label {
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .form-control {
            font-size: 0.75rem;
        }
        
        .form-text {
            font-size: 0.65rem;
        }
        
        .alert {
            font-size: 0.75rem;
        }
        
        .invalid-feedback {
            font-size: 0.7rem;
        }
        
        .btn-black {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white);
        }
        
        .btn-black:hover {
            background-color: var(--dark-gray);
            border-color: var(--dark-gray);
            color: var(--primary-white);
        }
        
        .btn-outline-black {
            border-color: var(--primary-black);
            color: var(--primary-black);
        }
        
        .btn-outline-black:hover {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white);
        }
        
        .form-control:focus {
            border-color: var(--primary-black);
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
        }
        
        .is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-0"><i class="fas fa-plus me-3"></i>Create New Product</h1>
                    <p class="mb-0 mt-2">Add a new product to your inventory</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="<?= base_url() ?>" class="btn btn-light btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-black text-white">
                        <h5 class="mb-0"><i class="fas fa-box me-2"></i>Product Information</h5>
                    </div>
                    <div class="card-body">
                        <?php if (isset($validation) && $validation->getErrors()): ?>
                            <div class="alert alert-danger">
                                <h6><i class="fas fa-exclamation-circle me-2"></i>Please correct the following errors:</h6>
                                <ul class="mb-0">
                                    <?php foreach ($validation->getErrors() as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('products/create') ?>" method="POST" id="createProductForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">
                                            <i class="fas fa-tag me-2"></i>Product Name *
                                        </label>
                                        <input type="text" 
                                               class="form-control <?= isset($validation) && $validation->hasError('product_name') ? 'is-invalid' : '' ?>" 
                                               id="product_name" 
                                               name="product_name" 
                                               value="<?= old('product_name') ?>"
                                               placeholder="Enter product name"
                                               required>
                                        <?php if (isset($validation) && $validation->hasError('product_name')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('product_name') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">
                                            <i class="fas fa-align-left me-2"></i>Description
                                        </label>
                                        <textarea class="form-control <?= isset($validation) && $validation->hasError('description') ? 'is-invalid' : '' ?>" 
                                                  id="description" 
                                                  name="description" 
                                                  rows="4"
                                                  placeholder="Enter product description"><?= old('description') ?></textarea>
                                        <?php if (isset($validation) && $validation->hasError('description')): ?>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('description') ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-text">
                                            <span id="charCount">0</span>/1000 characters
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">
                                            <i class="fas fa-peso-sign me-2"></i>Price *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">₱</span>
                                            <input type="number" 
                                                   step="0.01" 
                                                   min="0.01"
                                                   class="form-control <?= isset($validation) && $validation->hasError('price') ? 'is-invalid' : '' ?>" 
                                                   id="price" 
                                                   name="price" 
                                                   value="<?= old('price') ?>"
                                                   placeholder="0.00"
                                                   required>
                                            <?php if (isset($validation) && $validation->hasError('price')): ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('price') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Preview Price</label>
                                        <div class="form-control-plaintext bg-light rounded p-2">
                                            <strong id="pricePreview">₱0.00</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?= base_url() ?>" class="btn btn-outline-black btn-lg w-100">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-black btn-lg w-100">
                                        <i class="fas fa-save me-2"></i>Create Product
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Form Help -->
              
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Character counter for description
        document.getElementById('description').addEventListener('input', function() {
            const charCount = this.value.length;
            document.getElementById('charCount').textContent = charCount;
            
            if (charCount > 1000) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });

        // Price preview
        document.getElementById('price').addEventListener('input', function() {
            const price = parseFloat(this.value) || 0;
            document.getElementById('pricePreview').textContent = '₱' + price.toFixed(2);
        });

        // Form validation
        document.getElementById('createProductForm').addEventListener('submit', function(e) {
            const productName = document.getElementById('product_name').value.trim();
            const price = parseFloat(document.getElementById('price').value);
            
            if (productName.length < 3) {
                e.preventDefault();
                alert('Product name must be at least 3 characters long.');
                return;
            }
            
            if (price <= 0) {
                e.preventDefault();
                alert('Price must be greater than 0.');
                return;
            }
        });

        // Initialize character count
        document.addEventListener('DOMContentLoaded', function() {
            const description = document.getElementById('description');
            document.getElementById('charCount').textContent = description.value.length;
            
            const price = document.getElementById('price');
            if (price.value) {
                document.getElementById('pricePreview').textContent = '₱' + parseFloat(price.value).toFixed(2);
            }
        });
    </script>
</body>
</html>