<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        .table-striped>tbody>tr:nth-of-type(odd)>td {
            background-color: var(--primary-white)
        }

        .table-striped>tbody>tr:nth-of-type(even)>td {
            background-color: var(--light-gray)
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

        .search-container {
            background-color: var(--primary-white);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 2px solid var(--border-color)
        }

        .card {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            transition: transform .2s ease;
            font-size: .75rem
        }

        .card-header h5,
        .card-header h6 {
            font-size: .9rem
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

        .modal-content {
            border: 2px solid var(--primary-black);
            border-radius: 10px
        }

        .modal-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
            border-bottom: none
        }

        .btn:disabled {
            opacity: .6;
            cursor: not-allowed
        }

        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, .05)
        }

        .pagination-info {
            font-size: .7rem
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

        .form-control {
            font-size: .75rem
        }

        .form-text {
            font-size: .65rem
        }

        .alert {
            font-size: .75rem
        }

        .alert.position-fixed {
            box-shadow: 0 4px 6px rgba(0, 0, 0, .1);
            border: 2px solid var(--primary-black)
        }

        @media (max-width:768px) {
            .btn-group {
                display: flex;
                flex-direction: column;
                gap: 2px
            }

            .btn-group .btn {
                border-radius: .375rem !important
            }

            .pagination-info {
                text-align: center;
                margin-bottom: 1rem
            }
        }

        .spinner-border {
            width: 3rem;
            height: 3rem
        }

        .tooltip {
            font-size: .75rem;
            opacity: 0;
            transition: opacity .3s ease-in-out;
            pointer-events: none
        }

        .tooltip.show {
            opacity: 1
        }

        .tooltip.fade {
            transition: opacity .3s ease-in-out
        }

        .btn[data-bs-toggle="tooltip"] {
            position: relative
        }

        .btn[data-bs-toggle="tooltip"]:hover {
            z-index: 1
        }

        .login-form-container {
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .login-card {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .15);
            border: none
        }

        .login-card .card-header {
            border-radius: 10px 10px 0 0
        }

        .login-card .form-control {
            border-radius: 6px;
            font-size: .85rem
        }

        .login-card .form-control:focus {
            border-color: var(--primary-black);
            box-shadow: 0 0 0 .2rem rgba(0, 0, 0, .25)
        }

        .deleted-product {
            opacity: .7;
            background-color: #f8f8f8
        }

        .trash-empty {
            padding: 3rem 1rem
        }

        .trash-table {
            font-size: .7rem
        }

        .trash-table th {
            font-size: .65rem;
            padding: .5rem
        }

        .trash-table td {
            padding: .5rem
        }

        .auto-refresh-indicator {
            display: inline-flex;
            align-items: center;
            font-size: .65rem;
            color: #28a745
        }

        .auto-refresh-indicator.updating {
            color: #ffc107
        }

        .auto-refresh-indicator.error {
            color: #dc3545
        }

        .product-row-new {
            animation: highlightNew 2s ease-in-out
        }

        .product-row-updated {
            animation: highlightUpdated 2s ease-in-out
        }

        @keyframes highlightNew {
            0% {
                background-color: #d4edda
            }

            100% {
                background-color: transparent
            }
        }

        @keyframes highlightUpdated {
            0% {
                background-color: #fff3cd
            }

            100% {
                background-color: transparent
            }
        }

        .status-indicator {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            padding: .5rem 1rem;
            border-radius: 20px;
            font-size: .7rem;
            display: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .1)
        }

        .status-indicator.connected {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb
        }

        .status-indicator.updating {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7
        }

        .status-indicator.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb
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

        .select-checkbox {
            cursor: pointer;
            transform: scale(1.1)
        }

        .product-row.selected {
            background-color: rgba(0, 123, 255, .1) !important
        }

        .product-row.selected:hover {
            background-color: rgba(0, 123, 255, .15) !important
        }

        .bulk-select-header {
            background-color: var(--light-gray);
            border-bottom: 1px solid var(--border-color)
        }

        .floating-bulk-actions {
            position: fixed;
            bottom: 10px;
            right: 20px;
            z-index: 1050;
            display: none
        }

        .floating-bulk-actions.show {
            display: block;
            animation: slideInUp 0.3s ease-out
        }

        .floating-bulk-actions .card {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .15);
            border: 2px solid var(--primary-black);
            min-width: 280px
        }

        .floating-bulk-actions .card-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
            font-size: .75rem;
            padding: .25rem .5rem
        }

        .floating-bulk-actions .card-body {
            padding: .35rem
        }

        .floating-bulk-actions .btn {
            font-size: .65rem;
            padding: .2rem .4rem
        }

        @keyframes slideInUp {
            from {
                transform: translateY(100%);
                opacity: 0
            }

            to {
                transform: translateY(0);
                opacity: 1
            }
        }

        @media (max-width: 768px) {
            .floating-bulk-actions {
                bottom: 10px;
                right: 10px;
                left: 10px
            }

            .floating-bulk-actions .card {
                min-width: auto
            }
        }

        .modal-overlay-panel {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1060;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px
        }

        .modal-overlay-panel.show {
            display: flex;
            animation: fadeIn 0.3s ease-out
        }

        .nested-modal-content {
            background: white;
            border-radius: 8px;
            border: 2px solid var(--primary-black);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            max-height: 70vh;
            overflow-y: auto
        }

        .nested-modal-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .nested-modal-body {
            padding: 1.5rem
        }

        .nested-modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            gap: 0.5rem;
            justify-content: end
        }

        .trash-bulk-actions {
            position: fixed;
            bottom: 10px;
            right: 20px;
            z-index: 1055;
            display: none;
            min-width: 280px
        }

        .trash-bulk-actions.show {
            display: block;
            animation: slideInUp 0.3s ease-out
        }

        .trash-bulk-actions .card {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .15);
            border: 2px solid var(--primary-black);
            background: var(--primary-white)
        }

        .trash-bulk-actions .card-header {
            background-color: var(--primary-black);
            color: var(--primary-white);
            font-size: .75rem;
            padding: .25rem .5rem
        }

        .trash-bulk-actions .card-body {
            padding: .35rem
        }

        .trash-bulk-actions .btn {
            font-size: .65rem;
            padding: .2rem .4rem
        }

        @keyframes fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
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

        .toast.hiding {
            animation: slideOutBottom .3s ease-in
        }
    </style>
</head>

<body>
    <div class="status-indicator" id="statusIndicator"><i class="fas fa-sync-alt me-1"></i><span id="statusText">Checking for updates...</span></div>
    <div class="toast-container position-fixed bottom-0 end-0 p-2" style="z-index:9999;"></div>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-0"><i class="fas fa-box-open me-3"></i>Products Management</h1>
                    <p class="mb-0 mt-2">Complete CRUD Operations System</p>
                </div>
                <div class="col-md-6 text-end"><?php if (isset($show_login) && $show_login): ?><span class="btn btn-outline-light btn-lg" disabled><i class="fas fa-lock me-2"></i>Login Required</span><?php else: ?><div class="d-flex justify-content-end align-items-center gap-3"><small class="text-light"><i class="fas fa-user me-1"></i>Welcome, Admin!</small>
                            <div class="auto-refresh-indicator" id="autoRefreshStatus" title="Auto-sync is always enabled"><i class="fas fa-circle me-1"></i><span id="autoRefreshText">Auto-sync ON</span></div><a href="#" onclick="openTrashModal()" class="btn btn-outline-light"><i class="fas fa-trash me-2"></i>Trash</a><a href="/logout" class="btn btn-outline-light"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                        </div><?php endif; ?></div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php if (isset($show_login) && $show_login): ?>
            <div class="login-form-container">
                <div class="col-md-6 col-lg-4">
                    <div class="card login-card">
                        <div class="card-header bg-black text-white text-center">
                            <h4 class="mb-1"><i class="fas fa-shield-alt me-2"></i>Admin Portal</h4><small>Secure access required</small>
                        </div>
                        <div class="card-body p-4">
                            <form action="/login" method="post" id="loginForm">
                                <div class="mb-3"><label for="username" class="form-label"><i class="fas fa-user me-1"></i>Username</label><input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required maxlength="50" autocomplete="username" value=""></div>
                                <div class="mb-4"><label for="password" class="form-label"><i class="fas fa-key me-1"></i>Password</label><input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required maxlength="100" autocomplete="current-password"></div>
                                <div class="d-grid"><button type="submit" class="btn btn-black btn-lg"><i class="fas fa-sign-in-alt me-2"></i>Access System</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>

            <div class="search-container">
                <div class="row g-3" id="searchContainer">
                    <div class="col-md-10">
                        <div class="input-group"><span class="input-group-text"><i class="fas fa-search"></i></span><input type="text" class="form-control" name="search" id="searchInput" placeholder="Type to search products (auto-search)..." value="<?= esc($search) ?>" maxlength="255" autocomplete="off">
                            <div class="invalid-feedback" id="searchError"></div>
                        </div>
                    </div>
                    <div class="col-md-2"><?php if (!empty($search)): ?><button type="button" class="btn btn-outline-black w-100" onclick="clearSearch()"><i class="fas fa-times me-2"></i>Clear</button><?php else: ?><a href="/products/create" class="btn btn-black w-100"><i class="fas fa-plus me-2"></i>Add Product</a><?php endif; ?></div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-black text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-table me-2"></i>Products List</h5>
                    <div class="d-flex align-items-center"><small class="me-3" id="productCount"><i class="fas fa-list me-1"></i><span id="productCountText"><?php if (!empty($products)): ?>Showing <?= count($products) ?> product(s)<?php if (isset($pager)): ?> (Page <?= $pager->getCurrentPage() ?> of <?= $pager->getPageCount() ?>)<?php endif; ?><?php else: ?>No products<?php endif; ?></span></small><button class="btn btn-outline-light btn-sm" onclick="refreshProducts()" title="Refresh"><i class="fas fa-sync-alt" id="refreshIcon"></i></button></div>
                </div>
                <div class="card-body p-0" id="productsTableContainer">
                    <div id="loadingState" class="text-center py-5" style="display:none;">
                        <div class="spinner-border text-primary"><span class="visually-hidden">Loading...</span></div>
                        <p class="mt-3 text-muted">Loading products...</p>
                    </div>

                    <?php if (isset($error_message)): ?>
                        <div class="text-center py-5"><i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                            <h4 class="text-danger">Error Loading Products</h4>
                            <p class="text-muted"><?= esc($error_message) ?></p><button class="btn btn-outline-danger" onclick="window.location.reload()"><i class="fas fa-redo me-2"></i>Try Again</button>
                        </div>
                    <?php elseif (empty($products)): ?>
                        <div class="text-center py-5"><i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <h4>No Products Found</h4><?php if (!empty($search)): ?><p class="text-muted">No products match your search criteria "<?= esc($search) ?>".</p>
                                <div class="d-flex justify-content-center gap-2"><a href="/" class="btn btn-outline-black"><i class="fas fa-list me-2"></i>View All Products</a><a href="/products/create" class="btn btn-black"><i class="fas fa-plus me-2"></i>Add Product</a></div><?php else: ?><p class="text-muted">Start by adding your first product!</p><a href="/products/create" class="btn btn-black"><i class="fas fa-plus me-2"></i>Add Product</a><?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" style="width:40px"><input type="checkbox" class="form-check-input select-checkbox" id="selectAllMain" onchange="toggleSelectAll('main')"></th>
                                        <th scope="col"><i class="fas fa-hashtag me-1"></i>ID</th>
                                        <th scope="col"><i class="fas fa-tag me-1"></i>Product Name</th>
                                        <th scope="col"><i class="fas fa-align-left me-1"></i>Description</th>
                                        <th scope="col"><i class="fas fa-peso-sign me-1"></i>Price</th>
                                        <th scope="col"><i class="fas fa-calendar me-1"></i>Created At</th>
                                        <th scope="col"><i class="fas fa-cogs me-1"></i>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $index => $product): ?>
                                        <tr id="product-row-<?= $product['id'] ?>" class="product-row">
                                            <td><input type="checkbox" class="form-check-input select-checkbox product-checkbox" value="<?= $product['id'] ?>" onchange="updateBulkActions()"></td>
                                            <td><strong>#<?= $start_number + $index + 1 ?></strong></td>
                                            <td><span class="fw-semibold"><?= esc($product['product_name']) ?></span></td>
                                            <td><?php if (!empty($product['description'])): ?><span title="<?= esc($product['description']) ?>"><?= esc(substr($product['description'], 0, 50)) ?><?= strlen($product['description']) > 50 ? '...' : '' ?></span><?php else: ?><em class="text-muted">No description</em><?php endif; ?></td>
                                            <td><strong class="text-success">₱<?= number_format($product['price'], 2) ?></strong></td>
                                            <td><small><?= date('M d, Y', strtotime($product['created_at'])) ?></small><br><small class="text-muted"><?= date('g:i A', strtotime($product['created_at'])) ?></small></td>
                                            <td>
                                                <div class="btn-group"><button type="button" class="btn btn-outline-primary btn-sm" onclick="viewProduct(<?= $product['id'] ?>)" title="View Product Details" data-bs-toggle="tooltip"><i class="fas fa-eye"></i></button><button type="button" class="btn btn-outline-black btn-sm" onclick="editProduct(<?= $product['id'] ?>)" title="Edit Product" data-bs-toggle="tooltip"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteProduct(<?= $product['id'] ?>, '<?= esc($product['product_name']) ?>')" title="Delete Product" data-bs-toggle="tooltip"><i class="fas fa-trash"></i></button></div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (isset($pager) && $pager->getPageCount() > 1): ?>
                <div class="mt-4">
                    <div class="d-flex justify-content-center align-items-center"><?php if ($pager->getCurrentPage() > 1): ?><a href="<?= $pager->getPreviousPageURI() ?>" class="btn btn-outline-black me-3"><i class="fas fa-chevron-left me-1"></i>Previous</a><?php endif; ?><span class="mx-3"><strong>Page <?= $pager->getCurrentPage() ?> of <?= $pager->getPageCount() ?></strong></span><?php if ($pager->getCurrentPage() < $pager->getPageCount()): ?><a href="<?= $pager->getNextPageURI() ?>" class="btn btn-outline-black ms-3">Next<i class="fas fa-chevron-right ms-1"></i></a><?php endif; ?></div>
                    <div class="text-center mt-2"><small class="text-muted"><?php if (isset($total_products) && $total_products > 0): ?>Showing <?= count($products) ?> of <?= $total_products ?> products<?php endif; ?></small></div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>

    <!-- Floating Bulk Actions for Main Products -->
    <div class="floating-bulk-actions" id="floatingBulkActions">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-check-square me-2"></i><span id="selectedCount">0</span> product(s) selected
            </div>
            <div class="card-body">
                <div class="d-grid gap-1">
                    <button class="btn btn-warning btn-sm" onclick="showBulkDeleteModal()"><i class="fas fa-trash me-2"></i>Move to Trash</button>
                    <button class="btn btn-outline-secondary btn-sm" onclick="clearAllSelections()"><i class="fas fa-times me-2"></i>Clear Selection</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="trashModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="position: relative;">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="fas fa-trash me-2"></i>Trash - Deleted Products</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" id="trashModalBody">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary"><span class="visually-hidden">Loading...</span></div>
                        <p class="mt-3 text-muted">Loading trash...</p>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-outline-black" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-black" onclick="refreshTrash()"><i class="fas fa-sync-alt me-2"></i>Refresh</button></div>

                <!-- Nested Bulk Restore Panel -->
                <div class="modal-overlay-panel" id="nestedBulkRestorePanel">
                    <div class="nested-modal-content">
                        <div class="nested-modal-header bg-success text-white">
                            <h6 class="mb-0"><i class="fas fa-undo me-2"></i>Restore Products</h6>
                            <button type="button" class="btn-close btn-close-white" onclick="hideNestedPanel('nestedBulkRestorePanel')"></button>
                        </div>
                        <div class="nested-modal-body">
                            <p>Are you sure you want to restore <strong><span id="nestedRestoreCount">0</span> product(s)</strong>?</p>
                            <p class="text-muted">Selected products will be moved back to the active products list.</p>
                            <div class="alert alert-success">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Selected Products:</strong>
                                <ul id="nestedRestoreList" class="mb-0 mt-2"></ul>
                            </div>
                        </div>
                        <div class="nested-modal-footer">
                            <button type="button" class="btn btn-outline-secondary" onclick="hideNestedPanel('nestedBulkRestorePanel')">Cancel</button>
                            <button type="button" class="btn btn-success" onclick="confirmNestedBulkRestore()"><i class="fas fa-undo me-2"></i>Restore Products</button>
                        </div>
                    </div>
                </div>

                <!-- Nested Bulk Permanent Delete Panel -->
                <div class="modal-overlay-panel" id="nestedBulkPermanentDeletePanel">
                    <div class="nested-modal-content">
                        <div class="nested-modal-header bg-danger text-white">
                            <h6 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Permanent Delete</h6>
                            <button type="button" class="btn-close btn-close-white" onclick="hideNestedPanel('nestedBulkPermanentDeletePanel')"></button>
                        </div>
                        <div class="nested-modal-body">
                            <p><strong>⚠️ WARNING:</strong> Are you sure you want to permanently delete <strong><span id="nestedPermanentDeleteCount">0</span> product(s)</strong>?</p>
                            <p class="text-danger"><strong>This action cannot be undone and will remove all data permanently!</strong></p>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Products to be PERMANENTLY DELETED:</strong>
                                <ul id="nestedPermanentDeleteList" class="mb-0 mt-2"></ul>
                            </div>
                        </div>
                        <div class="nested-modal-footer">
                            <button type="button" class="btn btn-outline-secondary" onclick="hideNestedPanel('nestedBulkPermanentDeletePanel')">Cancel</button>
                            <button type="button" class="btn btn-danger" onclick="confirmNestedBulkPermanentDelete()"><i class="fas fa-times me-2"></i>Delete Forever</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Bulk Actions for Trash Modal -->
    <div class="trash-bulk-actions" id="trashBulkActions">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-check-square me-2"></i><span id="selectedCountTrash">0</span> product(s) selected</span>
            </div>
            <div class="card-body">
                <div class="d-grid gap-1">
                    <button class="btn btn-success btn-sm" onclick="showNestedBulkRestore()"><i class="fas fa-undo me-1"></i>Restore</button>
                    <button class="btn btn-danger btn-sm" onclick="showNestedBulkPermanentDelete()"><i class="fas fa-times me-1"></i>Delete Forever</button>
                    <button class="btn btn-outline-secondary btn-sm" onclick="clearAllSelections('trash')"><i class="fas fa-times me-1"></i>Clear Selection</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="restoreModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fas fa-undo me-2"></i>Restore Product</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to restore the product "<span id="restoreProductName"></span>"?</p>
                    <p class="text-muted">The product will be moved back to the active products list.</p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-outline-black" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" onclick="confirmRestore()"><i class="fas fa-undo me-2"></i>Restore Product</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="permanentDeleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Permanent Delete</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Warning:</strong> Are you sure you want to permanently delete the product "<span id="permanentDeleteProductName"></span>"?</p>
                    <p class="text-danger"><strong>This action cannot be undone and will remove all data permanently!</strong></p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-outline-black" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-danger" onclick="confirmPermanentDelete()"><i class="fas fa-times me-2"></i>Permanently Delete</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title"><i class="fas fa-trash me-2"></i>Move to Trash</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to move the product "<span id="deleteProductName"></span>" to trash?</p>
                    <p class="text-muted">The product will be moved to trash and can be restored later if needed.</p>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-outline-black" data-bs-dismiss="modal">Cancel</button><a href="#" id="confirmDeleteBtn" class="btn btn-warning"><i class="fas fa-trash me-2"></i>Move to Trash</a></div>
            </div>
        </div>
    </div>

    <!-- Bulk Delete Modal -->
    <div class="modal fade" id="bulkDeleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title"><i class="fas fa-trash me-2"></i>Bulk Move to Trash</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to move <strong><span id="bulkDeleteCount">0</span> product(s)</strong> to trash?</p>
                    <p class="text-muted">Selected products will be moved to trash and can be restored later if needed.</p>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Selected Products:</strong>
                        <ul id="bulkDeleteList" class="mb-0 mt-2"></ul>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-outline-black" data-bs-dismiss="modal">Cancel</button><button type="button" class="btn btn-warning" onclick="confirmBulkDelete()"><i class="fas fa-trash me-2"></i>Move to Trash</button></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let isLoading = false,
            searchTimeout = null,
            currentPage = 1,
            currentSearch = '<?= esc($search ?? "") ?>',
            globalAutoRefreshInterval = null,
            globalProductHashes = new Map(),
            globalLastUpdateTime = new Date().getTime(),
            globalConnectionRetryCount = 0,
            globalMaxRetryAttempts = 5,
            globalUpdateCheckInterval = 1000,
            isUserInteracting = false,
            maxToasts = 5,
            loadingToastId = null,
            currentRestoreId = null,
            currentPermanentDeleteId = null,
            tooltipInitTimeout = null;

        document.addEventListener('DOMContentLoaded', function() {
            <?php if (session()->getFlashdata('success')): ?>showNotification('<?= addslashes(session()->getFlashdata('success')) ?>', 'success');
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>showNotification('<?= addslashes(session()->getFlashdata('error')) ?>', 'error');
        <?php endif; ?>

        const loginForm = document.getElementById('loginForm');
        if (loginForm) {
            initializeLoginForm();
        } else {
            initializeTooltips();
            initializeAutoSearch();
            loadProductsTable();
            setTimeout(() => startGlobalRealTimeUpdates(), 2000);
        }
        });

        function initializeLoginForm() {
            const f = document.getElementById('loginForm'),
                u = document.getElementById('username'),
                p = document.getElementById('password');
            if (u) u.focus();

            f.addEventListener('submit', function(e) {
                let valid = true;
                clearLoginErrors();

                if (!u.value.trim()) {
                    showLoginError(u, 'Username is required.');
                    valid = false;
                } else if (u.value.trim().length < 3) {
                    showLoginError(u, 'Username must be at least 3 characters.');
                    valid = false;
                }

                if (!p.value) {
                    showLoginError(p, 'Password is required.');
                    valid = false;
                } else if (p.value.length < 6) {
                    showLoginError(p, 'Password must be at least 6 characters.');
                    valid = false;
                }

                if (!valid) {
                    e.preventDefault();
                    return false;
                }

                const btn = f.querySelector('button[type="submit"]');
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
                btn.disabled = true;
            });

            u.addEventListener('keypress', e => e.key === 'Enter' && (e.preventDefault(), p.focus()));
            p.addEventListener('keypress', e => e.key === 'Enter' && (e.preventDefault(), f.querySelector('button[type="submit"]').click()));
        }

        function showLoginError(input, message) {
            input.classList.add('is-invalid');
            const existing = input.parentNode.querySelector('.invalid-feedback');
            if (existing) existing.remove();
            const error = document.createElement('div');
            error.className = 'invalid-feedback';
            error.textContent = message;
            input.parentNode.appendChild(error);
        }

        function clearLoginErrors() {
            document.querySelectorAll('#loginForm .form-control').forEach(input => {
                input.classList.remove('is-invalid');
                const error = input.parentNode.querySelector('.invalid-feedback');
                if (error) error.remove();
            });
        }

        function initializeAutoSearch() {
            const search = document.getElementById('searchInput');
            if (!search) return;

            search.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const query = this.value.trim();
                clearSearchError();
                if (query.length > 0 && !validateSearchInput(query)) return;
                searchTimeout = setTimeout(() => performSearch(query), 500);
            });

            search.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    clearTimeout(searchTimeout);
                    const query = this.value.trim();
                    if (query.length === 0 || validateSearchInput(query)) performSearch(query);
                }
            });
        }

        function performSearch(query, page = 1) {
            if (isLoading) return;
            showLoadingToast(query.length > 0 ? 'Searching...' : 'Loading all products...');
            setLoading(true);

            // Store current selections and select all state before search
            const selectedIds = getSelectedIds('main');
            const selectAllMain = document.getElementById('selectAllMain');
            const selectAllState = selectAllMain ? {
                checked: selectAllMain.checked,
                indeterminate: selectAllMain.indeterminate
            } : null;

            const url = new URL(window.location.origin + '/');
            if (query.length > 0) url.searchParams.set('search', query);
            if (page > 1) url.searchParams.set('page', page);

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.ok ? response.text() : Promise.reject('Network error'))
                .then(html => {
                    const temp = document.createElement('div');
                    temp.innerHTML = html;
                    disposeAllTooltips();

                    const newTable = temp.querySelector('#productsTableContainer');
                    if (newTable) document.getElementById('productsTableContainer').innerHTML = newTable.innerHTML;

                    const newPag = temp.querySelector('.mt-4'),
                        currentPag = document.querySelector('.mt-4');
                    if (newPag && currentPag) currentPag.innerHTML = newPag.innerHTML;

                    updateProductCount(temp);
                    updateSearchResults(query, temp);
                    currentSearch = query;
                    currentPage = page;

                    // Restore individual selections after search if products still exist
                    selectedIds.forEach(id => {
                        const checkbox = document.querySelector(`.product-checkbox[value="${id}"]`);
                        if (checkbox) {
                            checkbox.checked = true;
                            const row = checkbox.closest('tr');
                            if (row) row.classList.add('selected');
                        }
                    });

                    // Restore select all state
                    if (selectAllState) {
                        const newSelectAllMain = document.getElementById('selectAllMain');
                        if (newSelectAllMain) {
                            newSelectAllMain.checked = selectAllState.checked;
                            newSelectAllMain.indeterminate = selectAllState.indeterminate;
                        }
                    }

                    const newUrl = query.length > 0 ? `/?search=${encodeURIComponent(query)}` : '/';
                    window.history.pushState({
                        search: query,
                        page: page
                    }, '', newUrl);
                    
                    // Update bulk actions after restoring selections
                    updateBulkActions('main');
                    initializeTooltips();
                    hideLoadingToast();
                })
                .catch(error => {
                    console.error('Search error:', error);
                    hideLoadingToast();
                    showNotification('Error loading products. Please try again.', 'error');
                })
                .finally(() => setLoading(false));
        }

        function updateProductCount(div) {
            const el = div.querySelector('#productCountText');
            if (el) document.getElementById('productCountText').innerHTML = el.innerHTML;
        }

        function updateSearchResults(query, div) {
            if (query.length > 0) {
                const count = div.querySelectorAll('tbody tr').length;
                showInfoToast(`Search completed for "${query}"${count > 0 ? ` - Found ${count} product(s).` : ' - No products found.'}`);
            }
        }

        function loadProductsTable() {
            const container = document.getElementById('productsTableContainer');
            if (!container || container.innerHTML.trim()) return;
            // PHP table content will be rendered server-side
        }

        function validateSearchInput(value) {
            if (value.length < 2) return showSearchError('Search term must be at least 2 characters long.'), false;
            if (value.length > 255) return showSearchError('Search term cannot exceed 255 characters.'), false;
            if (!/^[a-zA-Z0-9\s\-._]+$/.test(value)) return showSearchError('Only letters, numbers, spaces, hyphens, dots, and underscores are allowed.'), false;
            return true;
        }

        function showSearchError(message) {
            const input = document.getElementById('searchInput'),
                error = document.getElementById('searchError');
            input.classList.add('is-invalid');
            error.textContent = message;
        }

        function clearSearchError() {
            const input = document.getElementById('searchInput'),
                error = document.getElementById('searchError');
            input.classList.remove('is-invalid');
            error.textContent = '';
        }

        function setLoading(loading) {
            isLoading = loading;
            const icon = document.getElementById('refreshIcon');
            icon.classList.toggle('fa-spin', loading);
        }

        // Event handlers
        window.addEventListener('popstate', e => {
            const search = document.getElementById('searchInput');
            const param = new URLSearchParams(window.location.search).get('search') || '';
            search.value = param;
            currentSearch = param;
            performSearch(param);
        });

        window.addEventListener('online', () => showNotification('Connection restored.', 'success'));
        window.addEventListener('offline', () => showNotification('Connection lost. Please check your internet connection.', 'error'));
        window.addEventListener('beforeunload', () => disposeAllTooltips());

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                const search = document.getElementById('searchInput');
                if (search) search.focus(), search.select();
            }
            if (e.key === 'Escape') {
                const search = document.getElementById('searchInput');
                if (search && search === document.activeElement) clearSearch();
            }
        });

        // Real-time updates
        function startGlobalRealTimeUpdates() {
            updateGlobalAutoRefreshStatus('connected', 'Auto-sync ON');
            globalAutoRefreshInterval = setInterval(checkGlobalForUpdates, globalUpdateCheckInterval);
        }

        function stopGlobalRealTimeUpdates() {
            if (globalAutoRefreshInterval) clearInterval(globalAutoRefreshInterval), globalAutoRefreshInterval = null;
            updateGlobalAutoRefreshStatus('error', 'Reconnecting...');
            showGlobalStatus('error', 'Reconnecting to server');
        }

        function checkGlobalForUpdates() {
            if (isUserInteracting) return;
            const search = document.getElementById('searchInput')?.value?.trim() || '';
            
            // Get current page from URL or default to 1
            const urlParams = new URLSearchParams(window.location.search);
            const currentPageParam = urlParams.get('page') || '1';

            // Build URL with both search and page parameters
            const url = new URL(window.location.origin + '/');
            if (search.length > 0) url.searchParams.set('search', search);
            if (currentPageParam !== '1') url.searchParams.set('page', currentPageParam);

            fetch(url.toString(), {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-Check-Updates': 'true',
                        'X-Last-Update': globalLastUpdateTime.toString()
                    }
                })
                .then(response => response.ok ? response.text() : Promise.reject('Network error'))
                .then(html => {
                    const temp = document.createElement('div');
                    temp.innerHTML = html;
                    const hasChanges = detectGlobalProductChanges(temp);
                    if (hasChanges && !isUserInteracting) {
                        updateGlobalProductsTable(temp);
                        globalLastUpdateTime = new Date().getTime();
                        globalConnectionRetryCount = 0;
                        updateGlobalAutoRefreshStatus('connected', 'Auto-sync ON');
                    } else {
                        updateGlobalAutoRefreshStatus('connected', 'Auto-sync ON');
                        // Force update pagination and counts even if no table changes detected
                        updatePaginationAndCounts(temp);
                    }
                })
                .catch(error => {
                    console.error('Auto-refresh error:', error);
                    globalConnectionRetryCount++;
                    if (globalConnectionRetryCount >= globalMaxRetryAttempts) {
                        stopGlobalRealTimeUpdates();
                        showGlobalStatus('error', 'Connection lost - Retrying in 30 seconds');
                        setTimeout(() => {
                            globalConnectionRetryCount = 0;
                            startGlobalRealTimeUpdates();
                        }, 500);
                    } else {
                        updateGlobalAutoRefreshStatus('error', `Retry ${globalConnectionRetryCount}/${globalMaxRetryAttempts}`);
                    }
                });
        }

        function detectGlobalProductChanges(div) {
            // Check for changes in products table
            const newContent = div.querySelector('#productsTableContainer'),
                currentContent = document.querySelector('#productsTableContainer');
            
            let hasTableChanges = false;
            if (!newContent || !currentContent) {
                hasTableChanges = !currentContent;
            } else {
                hasTableChanges = currentContent.innerHTML.replace(/\s+/g, ' ').trim() !== newContent.innerHTML.replace(/\s+/g, ' ').trim();
            }
            
            // Check for changes in product count (header)
            const newCount = div.querySelector('#productCountText'),
                currentCount = document.querySelector('#productCountText');
            let hasCountChanges = false;
            if (newCount && currentCount) {
                hasCountChanges = currentCount.innerHTML.trim() !== newCount.innerHTML.trim();
            }
            
            // Check for changes in pagination
            const newPagination = div.querySelector('.mt-4'),
                currentPagination = document.querySelector('.mt-4');
            let hasPaginationChanges = false;
            if (newPagination && currentPagination) {
                hasPaginationChanges = currentPagination.innerHTML.replace(/\s+/g, ' ').trim() !== newPagination.innerHTML.replace(/\s+/g, ' ').trim();
            } else if (newPagination || currentPagination) {
                hasPaginationChanges = true; // One exists, other doesn't
            }
            
            return hasTableChanges || hasCountChanges || hasPaginationChanges;
        }

        function updateGlobalProductsTable(div) {
            const newContent = div.querySelector('#productsTableContainer'),
                container = document.getElementById('productsTableContainer');
            if (!newContent || !container) return;

            // Store current selections and select all state
            const selectedIds = getSelectedIds('main');
            const selectAllMain = document.getElementById('selectAllMain');
            const selectAllState = selectAllMain ? {
                checked: selectAllMain.checked,
                indeterminate: selectAllMain.indeterminate
            } : null;

            // Check if table content has changed
            const currentHTML = container.innerHTML.replace(/\s+/g, ' ').trim(),
                newHTML = newContent.innerHTML.replace(/\s+/g, ' ').trim();
            
            // Update table content only if it has changed
            if (currentHTML !== newHTML) {
                document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                    const tooltip = bootstrap.Tooltip.getInstance(el);
                    if (tooltip) tooltip.hide();
                });

                container.innerHTML = newContent.innerHTML;
                container.querySelectorAll('tbody tr').forEach(row => {
                    row.classList.add('product-row-updated');
                    setTimeout(() => row.classList.remove('product-row-updated'), 2000);
                });

                // Restore individual product selections
                selectedIds.forEach(id => {
                    const checkbox = document.querySelector(`.product-checkbox[value="${id}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                        const row = checkbox.closest('tr');
                        if (row) row.classList.add('selected');
                    }
                });

                // Restore select all state
                if (selectAllState) {
                    const newSelectAllMain = document.getElementById('selectAllMain');
                    if (newSelectAllMain) {
                        newSelectAllMain.checked = selectAllState.checked;
                        newSelectAllMain.indeterminate = selectAllState.indeterminate;
                    }
                }
            }

            // Always update pagination and counts (these can change independently of table content)
            const newPag = div.querySelector('.mt-4'),
                currentPag = document.querySelector('.mt-4');
            
            // Handle pagination updates - covers all scenarios
            if (newPag && currentPag) {
                // Both exist - update content
                currentPag.innerHTML = newPag.innerHTML;
            } else if (newPag && !currentPag) {
                // New pagination exists but current doesn't - add it after the products card
                const productsCard = document.querySelector('.card');
                if (productsCard && productsCard.parentNode) {
                    const newPagElement = newPag.cloneNode(true);
                    productsCard.parentNode.insertBefore(newPagElement, productsCard.nextSibling);
                }
            } else if (!newPag && currentPag) {
                // Current pagination exists but new doesn't - remove it
                currentPag.remove();
            }

            // Update product count in header
            const count = div.querySelector('#productCountText');
            if (count) document.getElementById('productCountText').innerHTML = count.innerHTML;

            // Update page title/count if present
            const newTitle = div.querySelector('.card-header .me-3');
            const currentTitle = document.querySelector('.card-header .me-3');
            if (newTitle && currentTitle) {
                currentTitle.innerHTML = newTitle.innerHTML;
            }

            // Update bulk actions after restoring all selections
            updateBulkActions('main');

            setTimeout(() => initializeTooltips(), 300);
        }

        function updatePaginationAndCounts(div) {
            // Update pagination section
            const newPag = div.querySelector('.mt-4'),
                currentPag = document.querySelector('.mt-4');
            
            if (newPag && currentPag) {
                // Both exist - update content
                currentPag.innerHTML = newPag.innerHTML;
            } else if (newPag && !currentPag) {
                // New pagination exists but current doesn't - add it after the products card
                const productsCard = document.querySelector('.card');
                if (productsCard && productsCard.parentNode) {
                    const newPagElement = newPag.cloneNode(true);
                    productsCard.parentNode.insertBefore(newPagElement, productsCard.nextSibling);
                }
            } else if (!newPag && currentPag) {
                // Current pagination exists but new doesn't - remove it
                currentPag.remove();
            }

            // Update product count in header
            const count = div.querySelector('#productCountText');
            if (count) document.getElementById('productCountText').innerHTML = count.innerHTML;

            // Update page title/count if present
            const newTitle = div.querySelector('.card-header .me-3');
            const currentTitle = document.querySelector('.card-header .me-3');
            if (newTitle && currentTitle) {
                currentTitle.innerHTML = newTitle.innerHTML;
            }
        }

        function updateGlobalAutoRefreshStatus(status, text) {
            const el = document.getElementById('autoRefreshStatus'),
                textEl = document.getElementById('autoRefreshText');
            if (el && textEl) el.className = `auto-refresh-indicator ${status}`, textEl.textContent = text, el.style.cursor = 'pointer';
        }

        function showGlobalStatus(type, message) {
            const indicator = document.getElementById('statusIndicator'),
                statusText = document.getElementById('statusText');
            if (indicator && statusText) {
                indicator.className = `status-indicator ${type}`;
                statusText.textContent = message;
                indicator.style.display = 'block';
                if (type !== 'error') setTimeout(() => indicator.style.display = 'none', 3000);
            }
        }

        // Product actions
        function viewProduct(id) {
            if (!id || id <= 0) return showNotification('Invalid product ID.', 'error');
            disposeAllTooltips();
            window.location.href = '/products/view/' + id;
        }

        function editProduct(id) {
            if (!id || id <= 0) return showNotification('Invalid product ID.', 'error');
            disposeAllTooltips();
            window.location.href = '/products/edit/' + id;
        }

        function deleteProduct(id, name) {
            if (!id || id <= 0) return showNotification('Invalid product ID.', 'error');
            if (!name || name.trim() === '') name = 'this product';
            try {
                document.getElementById('deleteProductName').textContent = name;
                document.getElementById('confirmDeleteBtn').href = '/products/delete/' + id;
                new bootstrap.Modal(document.getElementById('deleteModal')).show();
            } catch (error) {
                console.error('Error showing delete modal:', error);
                showNotification('Error opening delete confirmation. Please try again.', 'error');
            }
        }

        // Toast notifications
        function showNotification(message, type = 'info') {
            const container = document.querySelector('.toast-container');
            if (!container) return console.error('Toast container not found');

            const toasts = container.querySelectorAll('.toast');
            if (toasts.length >= maxToasts) {
                const oldest = toasts[0],
                    bsToast = bootstrap.Toast.getInstance(oldest);
                if (bsToast) bsToast.hide();
                else oldest.remove();
            }

            const toastId = 'toast-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
            const config = {
                'success': {
                    bgClass: 'bg-success',
                    icon: 'fas fa-check-circle',
                    title: 'Success',
                    delay: 4000
                },
                'error': {
                    bgClass: 'bg-danger',
                    icon: 'fas fa-exclamation-circle',
                    title: 'Error',
                    delay: 6000
                },
                'info': {
                    bgClass: 'bg-info',
                    icon: 'fas fa-info-circle',
                    title: 'Information',
                    delay: 5000
                },
                'loading': {
                    bgClass: 'bg-primary',
                    icon: 'fas fa-spinner fa-spin',
                    title: 'Loading',
                    delay: 0
                }
            } [type] || {
                bgClass: 'bg-info',
                icon: 'fas fa-info-circle',
                title: 'Information',
                delay: 5000
            };

            const html = `<div class="toast ${config.bgClass}" id="${toastId}" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header"><i class="${config.icon} me-2"></i><strong class="me-auto">${config.title}</strong>
                ${type !== 'loading' ? '<button type="button" class="btn-close" data-bs-dismiss="toast"></button>' : ''}</div>
                <div class="toast-body">${message}</div></div>`;

            container.insertAdjacentHTML('beforeend', html);
            const toastEl = document.getElementById(toastId),
                toast = new bootstrap.Toast(toastEl, {
                    delay: config.delay,
                    autohide: config.delay > 0
                });

            toastEl.addEventListener('hidden.bs.toast', function() {
                toastEl.remove();
                if (loadingToastId === toastId) loadingToastId = null;
            });

            toast.show();
            toastEl.style.animation = 'slideInBottom 0.3s ease-out';
            if (type === 'loading') loadingToastId = toastId;
            return {
                toast,
                toastId
            };
        }

        function showSuccessToast(message) {
            showNotification(message, 'success');
        }

        function showErrorToast(message) {
            showNotification(message, 'error');
        }

        function showInfoToast(message) {
            showNotification(message, 'info');
        }

        function showLoadingToast(message) {
            hideLoadingToast();
            return showNotification(message, 'loading');
        }

        function hideLoadingToast() {
            if (loadingToastId) {
                const toast = document.getElementById(loadingToastId);
                if (toast) {
                    const bs = bootstrap.Toast.getInstance(toast);
                    if (bs) bs.hide();
                }
                loadingToastId = null;
            }
        }

        function clearAllToasts() {
            document.querySelectorAll('.toast').forEach(t => {
                const bs = bootstrap.Toast.getInstance(t);
                if (bs) bs.hide();
            });
        }

        // Utility functions
        function clearSearch() {
            const search = document.getElementById('searchInput');
            if (search) {
                search.value = '';
                if (typeof clearSearchError === 'function') clearSearchError();
                if (typeof performSearch === 'function') performSearch('');
            }
        }

        function refreshProducts() {
            const search = document.getElementById('searchInput');
            if (search && typeof performSearch === 'function') {
                showLoadingToast('Refreshing products...');
                performSearch(search.value.trim());
            }
        }

        function initializeAlerts() {
            console.log('Alert system initialized - using toast notifications');
        }

        // Tooltip management
        function initializeTooltips() {
            if (tooltipInitTimeout) clearTimeout(tooltipInitTimeout);
            tooltipInitTimeout = setTimeout(() => {
                try {
                    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                        if (el && el.isConnected) {
                            const existing = bootstrap.Tooltip.getInstance(el);
                            if (existing) try {
                                existing.hide();
                                existing.dispose();
                            } catch (e) {
                                console.warn('Tooltip dispose error:', e);
                            }
                        }
                    });

                    document.querySelectorAll('.tooltip').forEach(el => {
                        if (el && el.parentNode) try {
                            el.parentNode.removeChild(el);
                        } catch (e) {
                            console.warn('Tooltip removal error:', e);
                        }
                    });

                    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                        if (el && el.isConnected && !bootstrap.Tooltip.getInstance(el)) {
                            try {
                                const tooltip = new bootstrap.Tooltip(el, {
                                    trigger: 'hover focus',
                                    delay: {
                                        show: 500,
                                        hide: 200
                                    },
                                    placement: 'top',
                                    boundary: 'viewport',
                                    animation: false,
                                    sanitize: false,
                                    template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
                                    allowList: {
                                        'div': ['class', 'role'],
                                        'span': [],
                                        'i': ['class']
                                    }
                                });

                                el.addEventListener('mouseenter', () => isUserInteracting = true);
                                el.addEventListener('mouseleave', () => setTimeout(() => isUserInteracting = false, 1000));
                                el.addEventListener('focus', () => isUserInteracting = true);
                                el.addEventListener('blur', () => setTimeout(() => isUserInteracting = false, 500));
                            } catch (e) {
                                console.warn('Tooltip creation failed:', e);
                            }
                        }
                    });
                } catch (error) {
                    console.error('Tooltip init error:', error);
                }
            }, 150);
        }

        function disposeAllTooltips() {
            try {
                document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                    if (el) {
                        const tooltip = bootstrap.Tooltip.getInstance(el);
                        if (tooltip) try {
                            tooltip.hide();
                            tooltip.dispose();
                        } catch (e) {
                            console.warn('Dispose error:', e);
                        }
                    }
                });

                document.querySelectorAll('.tooltip, body > .tooltip, .tooltip-inner, .tooltip-arrow').forEach(el => {
                    if (el && (!el.closest('[data-bs-toggle="tooltip"]') || el.matches('.tooltip, body > .tooltip'))) {
                        try {
                            el.remove();
                        } catch (e) {
                            console.warn('Element removal error:', e);
                        }
                    }
                });
            } catch (error) {
                console.error('Dispose all tooltips error:', error);
            }
        }

        // Trash modal functionality
        function openTrashModal() {
            const modal = new bootstrap.Modal(document.getElementById('trashModal'));
            document.getElementById('trashModal').addEventListener('hidden.bs.modal', () => {
                disposeAllTooltips();
                // Hide trash bulk actions and nested panels when modal is closed
                const trashBulkActions = document.getElementById('trashBulkActions');
                if (trashBulkActions) trashBulkActions.classList.remove('show');
                
                // Hide any open nested panels
                document.getElementById('nestedBulkRestorePanel').classList.remove('show');
                document.getElementById('nestedBulkPermanentDeletePanel').classList.remove('show');
                
                clearAllSelections('trash');
            }, {
                once: true
            });
            modal.show();
            loadTrashData();
        }

        function loadTrashData() {
            const body = document.getElementById('trashModalBody');
            disposeAllTooltips();
            showLoadingToast('Loading deleted products...');
            body.innerHTML = '<div class="text-center py-5"><div class="spinner-border text-primary"><span class="visually-hidden">Loading...</span></div><p class="mt-3 text-muted">Loading trash...</p></div>';

            fetch('/trash', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.ok ? response.json() : Promise.reject('Network error'))
                .then(data => {
                    hideLoadingToast();
                    displayTrashData(data);
                })
                .catch(error => {
                    hideLoadingToast();
                    console.error('Trash load error:', error);
                    showErrorToast('Failed to load trash data. Please try again.');
                    body.innerHTML = '<div class="text-center py-5"><i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i><h4 class="text-danger">Error Loading Trash</h4><p class="text-muted">Unable to load deleted products.</p><button class="btn btn-outline-danger" onclick="loadTrashData()"><i class="fas fa-redo me-2"></i>Try Again</button></div>';
                });
        }

        function displayTrashData(data) {
            const body = document.getElementById('trashModalBody');
            if (!data.products || !data.products.length) {
                body.innerHTML = '<div class="text-center trash-empty"><i class="fas fa-trash fa-3x text-muted mb-3"></i><h4>Trash is Empty</h4><p class="text-muted">No deleted products found.</p></div>';
                return;
            }

            let html = '<div class="table-responsive"><table class="table table-striped mb-0 trash-table"><thead class="table-dark"><tr><th style="width:40px"><input type="checkbox" class="form-check-input select-checkbox" id="selectAllTrash" onchange="toggleSelectAll(\'trash\')"></th><th><i class="fas fa-tag me-1"></i>Product Name</th><th><i class="fas fa-align-left me-1"></i>Description</th><th><i class="fas fa-peso-sign me-1"></i>Price</th><th><i class="fas fa-calendar me-1"></i>Deleted At</th><th><i class="fas fa-cogs me-1"></i>Actions</th></tr></thead><tbody>';

            data.products.forEach(p => {
                const desc = p.description ? (p.description.length > 50 ? p.description.substring(0, 50) + '...' : p.description) : '<em class="text-muted">No description</em>';
                const date = new Date(p.updated_at);
                const dateStr = date.toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });
                const timeStr = date.toLocaleTimeString('en-US', {
                    hour: 'numeric',
                    minute: '2-digit',
                    hour12: true
                });

                html += `<tr class="deleted-product" id="trash-row-${p.id}"><td><input type="checkbox" class="form-check-input select-checkbox trash-checkbox" value="${p.id}" onchange="updateBulkActions('trash')"></td><td><span class="fw-semibold text-muted">${escapeHtml(p.product_name)}</span></td><td>${desc}</td><td><strong class="text-muted">₱${parseFloat(p.price).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</strong></td><td><small>${dateStr}</small><br><small class="text-muted">${timeStr}</small></td><td><div class="btn-group"><button class="btn btn-outline-success btn-sm" onclick="restoreProduct(${p.id}, '${escapeHtml(p.product_name)}')" title="Restore Product" data-bs-toggle="tooltip"><i class="fas fa-undo"></i></button><button class="btn btn-outline-danger btn-sm" onclick="permanentDeleteProduct(${p.id}, '${escapeHtml(p.product_name)}')" title="Permanently Delete" data-bs-toggle="tooltip"><i class="fas fa-times"></i></button></div></td></tr>`;
            });

            html += '</tbody></table></div><div class="p-3 bg-light border-top"><small class="text-muted"><i class="fas fa-info-circle me-1"></i>Showing ' + data.products.length + ' deleted product(s)' + (data.total_products ? ' of ' + data.total_products + ' total' : '') + '</small></div>';
            body.innerHTML = html;
            
            // Initialize bulk actions for trash
            updateBulkActions('trash');
            setTimeout(() => initializeTooltips(), 100);
        }

        function refreshTrash() {
            showLoadingToast('Refreshing trash data...');
            loadTrashData();
        }

        function restoreProduct(id, name) {
            if (!id || id <= 0) return showNotification('Invalid product ID.', 'error');
            currentRestoreId = id;
            document.getElementById('restoreProductName').textContent = name || 'this product';
            new bootstrap.Modal(document.getElementById('restoreModal')).show();
        }

        function confirmRestore() {
            if (!currentRestoreId) return;
            const btn = event.target,
                originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Restoring...';
            btn.disabled = true;

            fetch(`/products/restore/${currentRestoreId}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                        const row = document.getElementById(`trash-row-${currentRestoreId}`);
                        if (row) row.style.transition = 'opacity 0.3s', row.style.opacity = '0', setTimeout(() => row.remove(), 300);
                        if (typeof refreshProducts === 'function') setTimeout(refreshProducts, 500);
                    } else showNotification(data.message, 'error');
                })
                .catch(error => {
                    console.error('Restore error:', error);
                    showNotification('Error restoring product. Please try again.', 'error');
                })
                .finally(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    currentRestoreId = null;
                    bootstrap.Modal.getInstance(document.getElementById('restoreModal')).hide();
                });
        }

        function permanentDeleteProduct(id, name) {
            if (!id || id <= 0) return showNotification('Invalid product ID.', 'error');
            currentPermanentDeleteId = id;
            document.getElementById('permanentDeleteProductName').textContent = name || 'this product';
            new bootstrap.Modal(document.getElementById('permanentDeleteModal')).show();
        }

        function confirmPermanentDelete() {
            if (!currentPermanentDeleteId) return;
            const btn = event.target,
                originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Deleting...';
            btn.disabled = true;

            fetch(`/products/permanent-delete/${currentPermanentDeleteId}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                        const row = document.getElementById(`trash-row-${currentPermanentDeleteId}`);
                        if (row) row.style.transition = 'opacity 0.3s', row.style.opacity = '0', setTimeout(() => row.remove(), 300);
                    } else showNotification(data.message, 'error');
                })
                .catch(error => {
                    console.error('Permanent delete error:', error);
                    showNotification('Error permanently deleting product. Please try again.', 'error');
                })
                .finally(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    currentPermanentDeleteId = null;
                    bootstrap.Modal.getInstance(document.getElementById('permanentDeleteModal')).hide();
                });
        }

        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, m => map[m]);
        }

        // Nested panel confirmation functions
        function confirmNestedBulkRestore() {
            const selectedIds = getSelectedIds('trash');
            if (selectedIds.length === 0) return;
            
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Restoring...';
            btn.disabled = true;
            
            hideNestedPanel('nestedBulkRestorePanel');
            showLoadingToast(`Restoring ${selectedIds.length} product(s)...`);
            
            fetch('/products/bulk-restore', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                hideLoadingToast();
                if (data.success) {
                    showNotification(data.message, 'success');
                    clearAllSelections('trash');
                    setTimeout(() => {
                        loadTrashData();
                        refreshProducts();
                    }, 500);
                } else {
                    showNotification(data.message || 'Error restoring products.', 'error');
                }
            })
            .catch(error => {
                hideLoadingToast();
                console.error('Bulk restore error:', error);
                showNotification('Error restoring products. Please try again.', 'error');
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }

        function confirmNestedBulkPermanentDelete() {
            const selectedIds = getSelectedIds('trash');
            if (selectedIds.length === 0) return;
            
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Deleting...';
            btn.disabled = true;
            
            hideNestedPanel('nestedBulkPermanentDeletePanel');
            showLoadingToast(`Permanently deleting ${selectedIds.length} product(s)...`);
            
            fetch('/products/bulk-permanent-delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                hideLoadingToast();
                if (data.success) {
                    showNotification(data.message, 'success');
                    clearAllSelections('trash');
                    setTimeout(() => loadTrashData(), 500);
                } else {
                    showNotification(data.message || 'Error permanently deleting products.', 'error');
                }
            })
            .catch(error => {
                hideLoadingToast();
                console.error('Bulk permanent delete error:', error);
                showNotification('Error permanently deleting products. Please try again.', 'error');
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }

        // Bulk Selection Functions
        function toggleSelectAll(context = 'main') {
            const selectAllId = context === 'main' ? 'selectAllMain' : 'selectAllTrash';
            const checkboxClass = context === 'main' ? 'product-checkbox' : 'trash-checkbox';
            const selectAll = document.getElementById(selectAllId);
            const checkboxes = document.querySelectorAll(`.${checkboxClass}`);
            
            checkboxes.forEach(cb => {
                cb.checked = selectAll.checked;
                const row = cb.closest('tr');
                if (row) {
                    row.classList.toggle('selected', cb.checked);
                }
            });
            
            updateBulkActions(context);
        }

        function updateBulkActions(context = 'main') {
            const checkboxClass = context === 'main' ? 'product-checkbox' : 'trash-checkbox';
            const actionsId = context === 'main' ? 'floatingBulkActions' : 'trashBulkActions';
            const selectedCountId = context === 'main' ? 'selectedCount' : 'selectedCountTrash';
            const selectAllId = context === 'main' ? 'selectAllMain' : 'selectAllTrash';
            
            const checkboxes = document.querySelectorAll(`.${checkboxClass}`);
            const selectedCheckboxes = document.querySelectorAll(`.${checkboxClass}:checked`);
            const bulkActions = document.getElementById(actionsId);
            const selectedCount = document.getElementById(selectedCountId);
            const selectAll = document.getElementById(selectAllId);
            
            if (selectedCount) selectedCount.textContent = selectedCheckboxes.length;
            
            // Update select all checkbox state
            if (selectAll) {
                selectAll.indeterminate = selectedCheckboxes.length > 0 && selectedCheckboxes.length < checkboxes.length;
                selectAll.checked = selectedCheckboxes.length === checkboxes.length && checkboxes.length > 0;
            }
            
            // Show/hide bulk actions
            if (bulkActions) {
                bulkActions.classList.toggle('show', selectedCheckboxes.length > 0);
            }
            
            // Update row selection styling
            checkboxes.forEach(cb => {
                const row = cb.closest('tr');
                if (row) {
                    row.classList.toggle('selected', cb.checked);
                }
            });
        }

        function clearAllSelections(context = 'main') {
            const checkboxClass = context === 'main' ? 'product-checkbox' : 'trash-checkbox';
            const selectAllId = context === 'main' ? 'selectAllMain' : 'selectAllTrash';
            
            document.querySelectorAll(`.${checkboxClass}`).forEach(cb => {
                cb.checked = false;
                const row = cb.closest('tr');
                if (row) row.classList.remove('selected');
            });
            
            const selectAll = document.getElementById(selectAllId);
            if (selectAll) {
                selectAll.checked = false;
                selectAll.indeterminate = false;
            }
            
            updateBulkActions(context);
        }

        function getSelectedIds(context = 'main') {
            const checkboxClass = context === 'main' ? 'product-checkbox' : 'trash-checkbox';
            return Array.from(document.querySelectorAll(`.${checkboxClass}:checked`)).map(cb => cb.value);
        }

        function getSelectedProductNames(context = 'main') {
            const checkboxClass = context === 'main' ? 'product-checkbox' : 'trash-checkbox';
            const selectedCheckboxes = document.querySelectorAll(`.${checkboxClass}:checked`);
            const names = [];
            
            selectedCheckboxes.forEach(cb => {
                const row = cb.closest('tr');
                if (row) {
                    // Find product name in the row
                    const nameCell = context === 'main' ? row.cells[2] : row.cells[1]; // Adjust index based on table structure
                    if (nameCell) {
                        const nameText = nameCell.textContent.trim();
                        names.push(nameText);
                    }
                }
            });
            
            return names;
        }

        // Modal trigger functions
        function showBulkDeleteModal() {
            const selectedIds = getSelectedIds('main');
            if (selectedIds.length === 0) {
                showNotification('Please select products to delete.', 'error');
                return;
            }
            
            const selectedNames = getSelectedProductNames('main');
            document.getElementById('bulkDeleteCount').textContent = selectedIds.length;
            
            const list = document.getElementById('bulkDeleteList');
            list.innerHTML = '';
            selectedNames.forEach(name => {
                const li = document.createElement('li');
                li.textContent = name;
                list.appendChild(li);
            });
            
            new bootstrap.Modal(document.getElementById('bulkDeleteModal')).show();
        }

        function showBulkRestoreModal() {
            const selectedIds = getSelectedIds('trash');
            if (selectedIds.length === 0) {
                showNotification('Please select products to restore.', 'error');
                return;
            }
            
            const selectedNames = getSelectedProductNames('trash');
            document.getElementById('bulkRestoreCount').textContent = selectedIds.length;
            
            const list = document.getElementById('bulkRestoreList');
            list.innerHTML = '';
            selectedNames.forEach(name => {
                const li = document.createElement('li');
                li.textContent = name;
                list.appendChild(li);
            });
            
            new bootstrap.Modal(document.getElementById('bulkRestoreModal')).show();
        }

        function showBulkPermanentDeleteModal() {
            const selectedIds = getSelectedIds('trash');
            if (selectedIds.length === 0) {
                showNotification('Please select products to permanently delete.', 'error');
                return;
            }
            
            const selectedNames = getSelectedProductNames('trash');
            document.getElementById('bulkPermanentDeleteCount').textContent = selectedIds.length;
            
            const list = document.getElementById('bulkPermanentDeleteList');
            list.innerHTML = '';
            selectedNames.forEach(name => {
                const li = document.createElement('li');
                li.textContent = name;
                list.appendChild(li);
            });
            
            new bootstrap.Modal(document.getElementById('bulkPermanentDeleteModal')).show();
        }

        // Nested panel functions for trash modal
        function showNestedBulkRestore() {
            const selectedIds = getSelectedIds('trash');
            if (selectedIds.length === 0) {
                showNotification('Please select products to restore.', 'error');
                return;
            }
            
            const selectedNames = getSelectedProductNames('trash');
            document.getElementById('nestedRestoreCount').textContent = selectedIds.length;
            
            const list = document.getElementById('nestedRestoreList');
            list.innerHTML = '';
            selectedNames.forEach(name => {
                const li = document.createElement('li');
                li.textContent = name;
                list.appendChild(li);
            });
            
            document.getElementById('nestedBulkRestorePanel').classList.add('show');
        }

        function showNestedBulkPermanentDelete() {
            const selectedIds = getSelectedIds('trash');
            if (selectedIds.length === 0) {
                showNotification('Please select products to permanently delete.', 'error');
                return;
            }
            
            const selectedNames = getSelectedProductNames('trash');
            document.getElementById('nestedPermanentDeleteCount').textContent = selectedIds.length;
            
            const list = document.getElementById('nestedPermanentDeleteList');
            list.innerHTML = '';
            selectedNames.forEach(name => {
                const li = document.createElement('li');
                li.textContent = name;
                list.appendChild(li);
            });
            
            document.getElementById('nestedBulkPermanentDeletePanel').classList.add('show');
        }

        function hideNestedPanel(panelId) {
            document.getElementById(panelId).classList.remove('show');
        }

        // Confirmation functions (called from modals)
        function confirmBulkDelete() {
            const selectedIds = getSelectedIds('main');
            if (selectedIds.length === 0) return;
            
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Moving to trash...';
            btn.disabled = true;
            
            bootstrap.Modal.getInstance(document.getElementById('bulkDeleteModal')).hide();
            showLoadingToast(`Moving ${selectedIds.length} product(s) to trash...`);
            
            fetch('/products/bulk-delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                hideLoadingToast();
                if (data.success) {
                    showNotification(data.message, 'success');
                    clearAllSelections('main');
                    setTimeout(() => refreshProducts(), 500);
                } else {
                    showNotification(data.message || 'Error deleting products.', 'error');
                }
            })
            .catch(error => {
                hideLoadingToast();
                console.error('Bulk delete error:', error);
                showNotification('Error deleting products. Please try again.', 'error');
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }

        function confirmBulkRestore() {
            const selectedIds = getSelectedIds('trash');
            if (selectedIds.length === 0) return;
            
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Restoring...';
            btn.disabled = true;
            
            bootstrap.Modal.getInstance(document.getElementById('bulkRestoreModal')).hide();
            showLoadingToast(`Restoring ${selectedIds.length} product(s)...`);
            
            fetch('/products/bulk-restore', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                hideLoadingToast();
                if (data.success) {
                    showNotification(data.message, 'success');
                    clearAllSelections('trash');
                    setTimeout(() => {
                        loadTrashData();
                        refreshProducts();
                    }, 500);
                } else {
                    showNotification(data.message || 'Error restoring products.', 'error');
                }
            })
            .catch(error => {
                hideLoadingToast();
                console.error('Bulk restore error:', error);
                showNotification('Error restoring products. Please try again.', 'error');
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }

        function confirmBulkPermanentDelete() {
            const selectedIds = getSelectedIds('trash');
            if (selectedIds.length === 0) return;
            
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Deleting...';
            btn.disabled = true;
            
            bootstrap.Modal.getInstance(document.getElementById('bulkPermanentDeleteModal')).hide();
            showLoadingToast(`Permanently deleting ${selectedIds.length} product(s)...`);
            
            fetch('/products/bulk-permanent-delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                hideLoadingToast();
                if (data.success) {
                    showNotification(data.message, 'success');
                    clearAllSelections('trash');
                    setTimeout(() => loadTrashData(), 500);
                } else {
                    showNotification(data.message || 'Error permanently deleting products.', 'error');
                }
            })
            .catch(error => {
                hideLoadingToast();
                console.error('Bulk permanent delete error:', error);
                showNotification('Error permanently deleting products. Please try again.', 'error');
            })
            .finally(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }
    </script>

    </script>
</body>

</html>