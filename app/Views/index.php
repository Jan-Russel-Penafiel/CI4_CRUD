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
            padding: .6rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 2px solid var(--border-color);
            transition: all 0.2s ease-in-out
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
            font-size: .75rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out
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
            
            .search-container .row {
                flex-direction: column;
            }
            
            .search-container .col-md-6,
            .search-container .col-md-4,
            .search-container .col-md-2 {
                margin-bottom: .5rem;
            }
            
            .search-container .btn-group {
                display: flex;
                flex-direction: row;
                gap: 2px;
            }
            
            .search-container .btn-group .btn {
                font-size: .65rem;
                padding: .2rem .4rem;
                flex: 1;
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
            border: 1px solid #f5c6cb;
            cursor: default
        }

        .status-indicator.error small {
            color: #495057;
            font-weight: 600
        }

        .status-indicator.error small:hover {
            color: #212529;
            text-decoration: underline !important
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

        @media print {
            body * {
                visibility: hidden;
            }
            
            .print-area,
            .print-area * {
                visibility: visible;
            }
            
            .print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            
            .no-print {
                display: none !important;
            }
            
            .header,
            .search-container,
            .card-header,
            .pagination,
            .floating-bulk-actions,
            button,
            .btn {
                display: none !important;
            }
            
            .table {
                border-collapse: collapse;
                width: 100%;
            }
            
            .table th,
            .table td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            
            .table th {
                background-color: #f0f0f0;
                font-weight: bold;
            }
            
            .print-title {
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                margin-bottom: 20px;
                color: #000;
            }
            
            .print-date {
                text-align: right;
                font-size: 12px;
                margin-bottom: 10px;
                color: #666;
            }
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

        /* Search optimization styles */
        #productsTableContainer {
            transition: opacity 0.2s ease-in-out;
            min-height: 200px
        }

        .search-loading {
            position: relative
        }

        .search-loading::after {
            content: '';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg) }
            100% { transform: translateY(-50%) rotate(360deg) }
        }

        .table-container-smooth {
            transition: all 0.3s ease-in-out
        }

        .search-state-active {
            border-color: #007bff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important
        }

        /* Statistics Modal Styles - Black & White Theme */
        #statisticsModal .modal-dialog {
            max-width: 1200px;
            margin: 1rem auto;
        }

        #statisticsModal .modal-content {
            font-size: 0.75rem;
            background-color: var(--primary-white);
            border: 1px solid var(--primary-black);
        }

        #statisticsModal .modal-header {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            border-bottom: 1px solid var(--primary-black);
        }

        #statisticsModal .modal-body {
            padding: 0.5rem;
            background-color: var(--light-gray);
        }

        #statisticsModal .container-fluid {
            padding: 0.5rem !important
        }

        #statisticsModal .card {
            border: 1px solid var(--primary-black);
            background-color: var(--primary-white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            font-size: 0.7rem
        }

        #statisticsModal .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15)
        }

        #statisticsModal .card-header {
            font-weight: 600;
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%);
            color: var(--primary-white);
            border-bottom: 1px solid var(--primary-black);
            padding: 0.4rem 0.6rem;
            font-size: 0.7rem
        }

        #statisticsModal .card-body {
            padding: 0.6rem;
            font-size: 0.7rem;
            background-color: var(--primary-white);
            color: var(--primary-black);
        }

        #statisticsModal .bg-primary {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%) !important;
            color: var(--primary-white) !important;
        }

        #statisticsModal .bg-success {
            background: linear-gradient(135deg, var(--primary-black) 0%, var(--dark-gray) 100%) !important;
            color: var(--primary-white) !important;
        }

        #statisticsModal .bg-info {
            background: linear-gradient(135deg, var(--primary-white) 0%, var(--light-gray) 100%) !important;
            color: var(--primary-black) !important;
            border: 1px solid var(--primary-black);
        }

        #statisticsModal .bg-warning {
            background: linear-gradient(135deg, var(--primary-white) 0%, var(--light-gray) 100%) !important;
            color: var(--primary-black) !important;
            border: 1px solid var(--primary-black);
        }

        .statistics-card {
            transition: all 0.3s ease-in-out
        }

        .statistics-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15)
        }

        .activity-item {
            transition: background-color 0.2s ease-in-out
        }

        .activity-item:hover {
            background-color: var(--light-gray) !important
        }

        .chart-container {
            position: relative;
            height: 180px;
            width: 100%
        }

        #statisticsModal canvas {
            font-size: 0.65rem
        }

        .stats-loading {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90px
        }

        .period-selector .btn-check:checked + .btn-outline-primary {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            color: var(--primary-white)
        }

        #statisticsModal .btn {
            font-size: 0.65rem;
            padding: 0.3rem 0.6rem
        }

        #statisticsModal .btn-group .btn {
            font-size: 0.65rem;
            padding: 0.25rem 0.5rem
        }

        #statisticsModal .modal-footer .btn {
            font-size: 0.7rem;
            padding: 0.3rem 0.8rem
        }

        /* Statistics Modal Loading States */
        #statisticsModal .spinner-border {
            width: 1rem;
            height: 1rem;
            border-width: 0.1rem
        }

        #statisticsModal .spinner-border-sm {
            width: 0.8rem;
            height: 0.8rem;
            border-width: 0.1rem
        }

        .summary-card h3 {
            font-weight: 700;
            font-size: 1.1rem
        }

        .summary-card small {
            font-size: 0.6rem;
            opacity: 0.9
        }

        .summary-card .fa-2x {
            font-size: 1.2rem !important
        }



        @media (max-width: 768px) {
            #statisticsModal .modal-dialog {
                max-width: 95%;
                margin: 1rem
            }
            
            #statisticsModal .card-body {
                padding: 1rem
            }
            
            .summary-card h3 {
                font-size: 1.4rem
            }
            
            .btn-group {
                display: flex;
                flex-direction: column;
                gap: 0.25rem
            }
            
            .btn-group .btn {
                border-radius: 0.375rem !important
            }
        }
    </style>
</head>

<body>
    <div class="status-indicator" id="statusIndicator"><i class="fas fa-sync-alt me-1"></i><span id="statusText">Checking for updates...</span></div>
    <div class="toast-container position-fixed bottom-0 start-0 p-2" style="z-index:9999;"></div>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="mb-0"><i class="fas fa-box-open me-3"></i>Products Management</h1>
                    <p class="mb-0 mt-2">Complete CRUD Operations System</p>
                </div>
                <div class="col-md-6 text-end"><?php if (isset($show_login) && $show_login): ?><span class="btn btn-outline-light btn-lg" disabled><i class="fas fa-lock me-2"></i>Login Required</span><?php else: ?><div class="d-flex justify-content-end align-items-center gap-3"><small class="text-light"><i class="fas fa-user me-1"></i>Welcome, Admin!</small>
                            <div class="auto-refresh-indicator" id="autoRefreshStatus" title="Auto-sync is always enabled"><i class="fas fa-circle me-1"></i><span id="autoRefreshText">Auto-sync ON</span></div><a href="#" onclick="openStatisticsModal()" class="btn btn-outline-light"><i class="fas fa-chart-bar me-2"></i>Statistics</a><a href="#" onclick="openTrashModal()" class="btn btn-outline-light"><i class="fas fa-trash me-2"></i>Trash</a><a href="/logout" class="btn btn-outline-light"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
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
                    <div class="col-md-6">
                        <div class="input-group"><span class="input-group-text"><i class="fas fa-search"></i></span><input type="text" class="form-control" name="search" id="searchInput" placeholder="Type to search products (auto-search)..." value="<?= esc($search) ?>" maxlength="255" autocomplete="off">
                            <div class="invalid-feedback" id="searchError"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group w-100" role="group">
                            <button type="button" class="btn btn-outline-black" onclick="printProducts()" title="Print Products List">
                                <i class="fas fa-print me-1"></i>Print
                            </button>
                            <button type="button" class="btn btn-outline-black" onclick="exportToCSV()" title="Export to CSV">
                                <i class="fas fa-file-csv me-1"></i>Export CSV
                            </button>
                            <button type="button" class="btn btn-outline-black" onclick="exportSelectedToCSV()" 
                                    id="exportSelectedBtn" style="display: none;" title="Export Selected to CSV">
                                <i class="fas fa-file-export me-1"></i>Export Selected
                            </button>
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
                        <div class="spinner-border text-white"><span class="visually-hidden">Loading...</span></div>
                        <p class="mt-3 text-white">Loading products...</p>
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
                        <div class="spinner-border text-white"><span class="visually-hidden">Loading...</span></div>
                        <p class="mt-3 text-white">Loading trash...</p>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-black" onclick="refreshTrash()"><i class="fas fa-sync-alt me-2"></i>Refresh</button></div>

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

    <!-- Statistics Modal -->
    <div class="modal fade" id="statisticsModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-chart-bar me-2"></i>Product Statistics Dashboard</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0" id="statisticsModalBody">
                    <div class="container-fluid p-4">
                        <!-- Time Range Selector -->
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0" style="font-size: 0.7rem;"><i class="fas fa-calendar-alt me-1" style="font-size: 0.65rem;"></i>Time Period</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-group period-selector" role="group" aria-label="Time period">
                                            <input type="radio" class="btn-check" name="timePeriod" id="dailyStats" value="daily" checked>
                                            <label class="btn btn-outline-primary" for="dailyStats"><i class="fas fa-calendar-day me-1"></i>Daily</label>
                                            
                                            <input type="radio" class="btn-check" name="timePeriod" id="weeklyStats" value="weekly">
                                            <label class="btn btn-outline-primary" for="weeklyStats"><i class="fas fa-calendar-week me-1"></i>Weekly</label>
                                            
                                            <input type="radio" class="btn-check" name="timePeriod" id="monthlyStats" value="monthly">
                                            <label class="btn btn-outline-primary" for="monthlyStats"><i class="fas fa-calendar-alt me-1"></i>Monthly</label>
                                        </div>
                                        <button class="btn btn-success ms-2" onclick="refreshStatistics()">
                                            <i class="fas fa-sync-alt me-1"></i>Refresh
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Summary Cards -->
                        <div class="row mb-2">
                            <div class="col-md-3 mb-3">
                                <div class="card text-center bg-primary text-white statistics-card summary-card">
                                    <div class="card-body">
                                        <i class="fas fa-box-open fa-2x mb-2"></i>
                                        <h3 id="totalProducts" class="mb-0">0</h3>
                                        <small>Total Products</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-center bg-success text-white statistics-card summary-card">
                                    <div class="card-body">
                                        <i class="fas fa-plus-circle fa-2x mb-2"></i>
                                        <h3 id="productsAdded" class="mb-0">0</h3>
                                        <small>Added <span id="addedPeriod">Today</span></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-center bg-info text-white statistics-card summary-card">
                                    <div class="card-body">
                                        <i class="fas fa-edit fa-2x mb-2"></i>
                                        <h3 id="productsUpdated" class="mb-0">0</h3>
                                        <small>Updated <span id="updatedPeriod">Today</span></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-center bg-warning text-white statistics-card summary-card">
                                    <div class="card-body">
                                        <i class="fas fa-dollar-sign fa-2x mb-2"></i>
                                        <h3 id="totalPrice" class="mb-0">₱0</h3>
                                        <small>Total Value</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row -->
                        <div class="row mb-2">
                            <div class="col-md-8 mb-2">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0" style="font-size: 0.7rem;"><i class="fas fa-chart-line me-1" style="font-size: 0.65rem;"></i>Products Created Over Time</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="productsChart" style="height: 180px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0" style="font-size: 0.7rem;"><i class="fas fa-chart-pie me-1" style="font-size: 0.65rem;"></i>Price Distribution</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="priceChart" style="height: 180px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" onclick="printStatistics()">
                        <i class="fas fa-print me-2"></i>Print Statistics
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Application State Management
        const AppState = {
            isLoading: false,
            searchTimeout: null,
            currentPage: 1,
            currentSearch: '<?= esc($search ?? "") ?>',
            isUserInteracting: false,
            currentRestoreId: null,
            currentPermanentDeleteId: null,
            tooltipInitTimeout: null,
            lastSearchQuery: '',
            searchRequestId: 0,
            isSearching: false
        };

        // Real-time Update Configuration
        const RealTimeConfig = {
            autoRefreshInterval: null,
            productHashes: new Map(),
            lastUpdateTime: new Date().getTime(),
            connectionRetryCount: 0,
            maxRetryAttempts: 5,
            updateCheckInterval: 2000,
            redirectCountdown: null,
            isRedirecting: false
        };

        // Toast Notification Configuration
        const ToastConfig = {
            maxToasts: 5,
            loadingToastId: null
        };

        // Application Initialization
        document.addEventListener('DOMContentLoaded', function() {
            NotificationService.initializeFlashMessages();
            
            const loginForm = document.getElementById('loginForm');
            if (loginForm) {
                LoginManager.initialize();
            } else {
                AppInitializer.initializeMainApp();
            }
        });

        // Flash Message Initialization
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

        // Application Initializer
        const AppInitializer = {
            initializeMainApp() {
                TooltipManager.initialize();
                SearchManager.initialize();
                ProductTableManager.loadInitial();
                setTimeout(() => RealTimeUpdater.start(), 2000);
            }
        };

        // Login Management
        const LoginManager = {
            initialize() {
                const form = document.getElementById('loginForm');
                const username = document.getElementById('username');
                const password = document.getElementById('password');
                
                if (username) username.focus();
                
                this.attachEventListeners(form, username, password);
            },

            attachEventListeners(form, username, password) {
                form.addEventListener('submit', (e) => this.handleSubmit(e, username, password, form));
                username.addEventListener('keypress', (e) => this.handleUsernameKeypress(e, password));
                password.addEventListener('keypress', (e) => this.handlePasswordKeypress(e, form));
            },

            handleSubmit(e, username, password, form) {
                if (!this.validateForm(username, password)) {
                    e.preventDefault();
                    return false;
                }

                const btn = form.querySelector('button[type="submit"]');
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
                btn.disabled = true;
            },

            validateForm(username, password) {
                let isValid = true;
                this.clearErrors();

                if (!this.validateUsername(username)) isValid = false;
                if (!this.validatePassword(password)) isValid = false;

                return isValid;
            },

            validateUsername(username) {
                const value = username.value.trim();
                if (!value) {
                    this.showError(username, 'Username is required.');
                    return false;
                }
                if (value.length < 3) {
                    this.showError(username, 'Username must be at least 3 characters.');
                    return false;
                }
                return true;
            },

            validatePassword(password) {
                const value = password.value;
                if (!value) {
                    this.showError(password, 'Password is required.');
                    return false;
                }
                if (value.length < 6) {
                    this.showError(password, 'Password must be at least 6 characters.');
                    return false;
                }
                return true;
            },

            showError(input, message) {
                input.classList.add('is-invalid');
                const existing = input.parentNode.querySelector('.invalid-feedback');
                if (existing) existing.remove();
                
                const error = document.createElement('div');
                error.className = 'invalid-feedback';
                error.textContent = message;
                input.parentNode.appendChild(error);
            },

            clearErrors() {
                document.querySelectorAll('#loginForm .form-control').forEach(input => {
                    input.classList.remove('is-invalid');
                    const error = input.parentNode.querySelector('.invalid-feedback');
                    if (error) error.remove();
                });
            },

            handleUsernameKeypress(e, password) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    password.focus();
                }
            },

            handlePasswordKeypress(e, form) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    form.querySelector('button[type="submit"]').click();
                }
            }
        };

        // Search Management
        const SearchManager = {
            initialize() {
                const searchInput = document.getElementById('searchInput');
                if (!searchInput) return;

                this.attachEventListeners(searchInput);
            },

            attachEventListeners(searchInput) {
                searchInput.addEventListener('input', (e) => this.handleInput(e));
                searchInput.addEventListener('keydown', (e) => this.handleKeydown(e));
            },

            handleInput(e) {
                clearTimeout(AppState.searchTimeout);
                const query = e.target.value.trim();
                
                this.clearError();
                
                // Skip validation and search if query is the same as last search
                if (query === AppState.lastSearchQuery) {
                    return;
                }
                
                if (query.length > 0 && !this.validateInput(query)) {
                    return;
                }
                
                // Use longer debounce for typing, shorter for clearing
                const debounceTime = query.length === 0 ? 200 : 800;
                AppState.searchTimeout = setTimeout(() => this.performSearch(query), debounceTime);
            },

            handleKeydown(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    clearTimeout(AppState.searchTimeout);
                    const query = e.target.value.trim();
                    
                    if (query.length === 0 || this.validateInput(query)) {
                        this.performSearch(query);
                    }
                }
            },

            validateInput(value) {
                if (value.length < 2) {
                    this.showError('Search term must be at least 2 characters long.');
                    return false;
                }
                if (value.length > 255) {
                    this.showError('Search term cannot exceed 255 characters.');
                    return false;
                }
                if (!/^[a-zA-Z0-9\s\-._]+$/.test(value)) {
                    this.showError('Only letters, numbers, spaces, hyphens, dots, and underscores are allowed.');
                    return false;
                }
                return true;
            },

            showError(message) {
                const input = document.getElementById('searchInput');
                const error = document.getElementById('searchError');
                input.classList.add('is-invalid');
                error.textContent = message;
            },

            clearError() {
                const input = document.getElementById('searchInput');
                const error = document.getElementById('searchError');
                input.classList.remove('is-invalid');
                error.textContent = '';
            },

            performSearch(query, page = 1) {
                // Prevent duplicate searches and rapid firing
                if (AppState.isSearching || query === AppState.lastSearchQuery) {
                    return;
                }
                
                // Generate unique request ID to handle race conditions
                const requestId = ++AppState.searchRequestId;
                AppState.isSearching = true;
                AppState.lastSearchQuery = query;

                const selectedIds = SelectionManager.getSelectedIds('main');
                const selectAllState = SelectionManager.getSelectAllState('main');

                // Show subtle loading indicator instead of aggressive one
                this.showSubtleLoading(query);

                const url = this.buildSearchURL(query, page);

                fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    // Check if this is still the latest request
                    if (requestId !== AppState.searchRequestId) {
                        return Promise.reject('Request superseded');
                    }
                    return response.ok ? response.text() : Promise.reject('Network error');
                })
                .then(html => {
                    // Final check before updating UI
                    if (requestId === AppState.searchRequestId) {
                        this.handleSearchSuccess(html, query, page, selectedIds, selectAllState);
                    }
                })
                .catch(error => {
                    if (requestId === AppState.searchRequestId) {
                        this.handleSearchError(error);
                    }
                })
                .finally(() => {
                    if (requestId === AppState.searchRequestId) {
                        AppState.isSearching = false;
                        this.hideSubtleLoading();
                    }
                });
            },

            buildSearchURL(query, page) {
                const url = new URL(window.location.origin + '/');
                if (query.length > 0) url.searchParams.set('search', query);
                if (page > 1) url.searchParams.set('page', page);
                return url;
            },

            handleSearchSuccess(html, query, page, selectedIds, selectAllState) {
                const temp = document.createElement('div');
                temp.innerHTML = html;
                
                // Only dispose tooltips if content actually changed
                if (this.contentChanged(temp)) {
                    TooltipManager.disposeAll();
                    this.updateUISmooth(temp, query, page);
                    TooltipManager.initialize();
                } else {
                    // Content is the same, just update state
                    AppState.currentSearch = query;
                    AppState.currentPage = page;
                }
                
                this.restoreSelections(selectedIds, selectAllState);
                this.updateHistory(query);
            },

            updateUISmooth(tempDiv, query, page) {
                // Fade out current content slightly for smooth transition
                const container = document.getElementById('productsTableContainer');
                container.style.transition = 'opacity 0.2s ease-in-out';
                container.style.opacity = '0.7';

                // Update content after brief delay to ensure smooth transition
                setTimeout(() => {
                    const newTable = tempDiv.querySelector('#productsTableContainer');
                    if (newTable) {
                        container.innerHTML = newTable.innerHTML;
                    }

                    this.updatePagination(tempDiv);
                    this.updateProductCount(tempDiv);
                    this.updateSearchResults(query, tempDiv);
                    
                    // Fade content back in
                    container.style.opacity = '1';
                    
                    AppState.currentSearch = query;
                    AppState.currentPage = page;
                }, 100);
            },

            contentChanged(tempDiv) {
                const currentTable = document.getElementById('productsTableContainer');
                const newTable = tempDiv.querySelector('#productsTableContainer');
                
                if (!currentTable || !newTable) return true;
                
                // Simple content comparison to avoid unnecessary DOM updates
                return currentTable.innerHTML.trim() !== newTable.innerHTML.trim();
            },

            showSubtleLoading(query) {
                // Show subtle search indicator instead of aggressive loading
                const searchInput = document.getElementById('searchInput');
                if (searchInput) {
                    searchInput.style.borderColor = '#007bff';
                    searchInput.style.boxShadow = '0 0 0 0.2rem rgba(0, 123, 255, 0.25)';
                }
                
                // Only show toast for longer searches
                if (query.length > 3) {
                    setTimeout(() => {
                        if (AppState.isSearching) {
                            NotificationService.showLoading('Searching...');
                        }
                    }, 500);
                }
            },

            hideSubtleLoading() {
                const searchInput = document.getElementById('searchInput');
                if (searchInput) {
                    searchInput.style.borderColor = '';
                    searchInput.style.boxShadow = '';
                }
                NotificationService.hideLoading();
            },

            updatePagination(tempDiv) {
                const newPag = tempDiv.querySelector('.mt-4');
                const currentPag = document.querySelector('.mt-4');
                
                if (newPag && currentPag) {
                    // Only update if content actually changed
                    if (currentPag.innerHTML !== newPag.innerHTML) {
                        currentPag.style.opacity = '0.7';
                        setTimeout(() => {
                            currentPag.innerHTML = newPag.innerHTML;
                            currentPag.style.opacity = '1';
                        }, 50);
                    }
                }
            },

            updateProductCount(tempDiv) {
                const element = tempDiv.querySelector('#productCountText');
                const targetElement = document.getElementById('productCountText');
                if (element && targetElement) {
                    // Only update if content actually changed
                    if (targetElement.innerHTML !== element.innerHTML) {
                        targetElement.style.transition = 'opacity 0.2s ease-in-out';
                        targetElement.style.opacity = '0.7';
                        setTimeout(() => {
                            targetElement.innerHTML = element.innerHTML;
                            targetElement.style.opacity = '1';
                        }, 50);
                    }
                }
            },

            updateSearchResults(query, tempDiv) {
                if (query.length > 2) { // Only show for meaningful searches
                    const count = tempDiv.querySelectorAll('tbody tr').length;
                    // Only show notification if search took more than 1 second or returned no results
                    if (count === 0) {
                        NotificationService.showInfo(`No products found for "${query}"`);
                    } else if (count > 0 && query.length > 5) {
                        // Only show success message for longer queries to avoid spam
                        setTimeout(() => {
                            if (!AppState.isSearching) { // Make sure search is still complete
                                NotificationService.showInfo(`Found ${count} product(s) for "${query}"`);
                            }
                        }, 300);
                    }
                }
            },

            restoreSelections(selectedIds, selectAllState) {
                selectedIds.forEach(id => {
                    const checkbox = document.querySelector(`.product-checkbox[value="${id}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                        const row = checkbox.closest('tr');
                        if (row) row.classList.add('selected');
                    }
                });

                if (selectAllState) {
                    const newSelectAllMain = document.getElementById('selectAllMain');
                    if (newSelectAllMain) {
                        newSelectAllMain.checked = selectAllState.checked;
                        newSelectAllMain.indeterminate = selectAllState.indeterminate;
                    }
                }

                SelectionManager.updateBulkActions('main');
            },

            updateHistory(query) {
                const newUrl = query.length > 0 ? `/?search=${encodeURIComponent(query)}` : '/';
                window.history.pushState({ search: query, page: AppState.currentPage }, '', newUrl);
            },

            handleSearchError(error) {
                console.error('Search error:', error);
                
                // Don't show error for superseded requests
                if (error === 'Request superseded') {
                    return;
                }
                
                // Reset search state
                AppState.isSearching = false;
                AppState.lastSearchQuery = '';
                
                this.hideSubtleLoading();
                
                // Only show error for actual network/server errors
                if (error !== 'Network error') {
                    NotificationService.showError('Error loading products. Please try again.');
                }
            },

            clear() {
                const searchInput = document.getElementById('searchInput');
                if (searchInput) {
                    searchInput.value = '';
                    this.clearError();
                    this.resetSearchState();
                    this.performSearch('');
                }
            },

            resetSearchState() {
                clearTimeout(AppState.searchTimeout);
                AppState.isSearching = false;
                AppState.lastSearchQuery = '';
                AppState.searchRequestId++;
                this.hideSubtleLoading();
            }
        };

        // UI Helper Functions
        const UIHelper = {
            setLoading(loading) {
                AppState.isLoading = loading;
                const icon = document.getElementById('refreshIcon');
                icon.classList.toggle('fa-spin', loading);
            },

            showGlobalStatus(type, message) {
                const indicator = document.getElementById('statusIndicator');
                const statusText = document.getElementById('statusText');
                
                if (indicator && statusText) {
                    indicator.className = `status-indicator ${type}`;
                    statusText.textContent = message;
                    indicator.style.display = 'block';
                    
                    if (type !== 'error') {
                        setTimeout(() => indicator.style.display = 'none', 3000);
                    }
                }
            },

            updateAutoRefreshStatus(status, text) {
                const element = document.getElementById('autoRefreshStatus');
                const textElement = document.getElementById('autoRefreshText');
                
                if (element && textElement) {
                    element.className = `auto-refresh-indicator ${status}`;
                    textElement.textContent = text;
                    element.style.cursor = 'pointer';
                }
            }
        };

        // Product Table Management
        const ProductTableManager = {
            loadInitial() {
                const container = document.getElementById('productsTableContainer');
                if (!container || container.innerHTML.trim()) return;
                // PHP table content will be rendered server-side
            }
        };

        // Event Handlers Setup
        const EventHandlers = {
            initialize() {
                this.setupWindowEvents();
                this.setupKeyboardShortcuts();
            },

            setupWindowEvents() {
                window.addEventListener('popstate', this.handlePopState);
                window.addEventListener('online', () => NotificationService.showNotification('Connection restored.', 'success'));
                window.addEventListener('offline', () => NotificationService.showNotification('Connection lost. Please check your internet connection.', 'error'));
                window.addEventListener('beforeunload', () => TooltipManager.disposeAll());
            },

            setupKeyboardShortcuts() {
                document.addEventListener('keydown', this.handleKeydown);
            },

            handlePopState(e) {
                const searchInput = document.getElementById('searchInput');
                const param = new URLSearchParams(window.location.search).get('search') || '';
                searchInput.value = param;
                AppState.currentSearch = param;
                SearchManager.performSearch(param);
            },

            handleKeydown(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    const searchInput = document.getElementById('searchInput');
                    if (searchInput) {
                        searchInput.focus();
                        searchInput.select();
                    }
                }
                
                if (e.key === 'Escape') {
                    const searchInput = document.getElementById('searchInput');
                    if (searchInput && searchInput === document.activeElement) {
                        SearchManager.clear();
                    }
                }
            }
        };

        // Real-time Update Manager
        const RealTimeUpdater = {
            start() {
                // Check if required DOM elements exist before starting auto-refresh
                if (!this.validateDOMElements()) {
                    console.warn('Required DOM elements not found, retrying in 5 seconds...');
                    setTimeout(() => this.start(), 5000);
                    return;
                }
                
                // Cancel any pending redirect if connection is restored
                if (RealTimeConfig.isRedirecting) {
                    this.cancelRedirect();
                    return; // cancelRedirect will call start() again
                }
                
                UIHelper.updateAutoRefreshStatus('connected', 'Auto-sync ON');
                RealTimeConfig.autoRefreshInterval = setInterval(() => this.checkForUpdates(), RealTimeConfig.updateCheckInterval);
            },

            validateDOMElements() {
                const requiredElements = [
                    'productCountText',
                    'productsTableContainer',
                    'searchInput'
                ];
                
                return requiredElements.every(elementId => {
                    const element = document.getElementById(elementId);
                    if (!element) {
                        console.warn(`Required element not found: ${elementId}`);
                        return false;
                    }
                    return true;
                });
            },

            stop() {
                if (RealTimeConfig.autoRefreshInterval) {
                    clearInterval(RealTimeConfig.autoRefreshInterval);
                    RealTimeConfig.autoRefreshInterval = null;
                }
                UIHelper.updateAutoRefreshStatus('error', 'Reconnecting...');
                UIHelper.showGlobalStatus('error', 'Reconnecting to server');
            },

            checkForUpdates() {
                // Don't update if user is interacting or actively searching
                if (AppState.isUserInteracting || AppState.isSearching) return;
                
                // Additional safety check for DOM elements
                if (!this.validateDOMElements()) {
                    console.warn('DOM elements missing during update check, stopping auto-refresh');
                    this.stop();
                    return;
                }
                
                const searchInput = document.getElementById('searchInput');
                const searchValue = searchInput?.value?.trim() || '';
                const urlParams = new URLSearchParams(window.location.search);
                const currentPageParam = urlParams.get('page') || '1';

                const url = this.buildUpdateCheckURL(searchValue, currentPageParam);

                fetch(url.toString(), {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-Check-Updates': 'true',
                        'X-Last-Update': RealTimeConfig.lastUpdateTime.toString()
                    }
                })
                .then(response => response.ok ? response.text() : Promise.reject('Network error'))
                .then(html => this.handleUpdateResponse(html))
                .catch(error => this.handleUpdateError(error));
            },

            buildUpdateCheckURL(searchValue, currentPageParam) {
                const url = new URL(window.location.origin + '/');
                if (searchValue.length > 0) url.searchParams.set('search', searchValue);
                if (currentPageParam !== '1') url.searchParams.set('page', currentPageParam);
                return url;
            },

            handleUpdateResponse(html) {
                try {
                    // Cancel any pending redirect since we got a successful response
                    if (RealTimeConfig.isRedirecting) {
                        this.clearRedirectCountdown();
                        NotificationService.showSuccess('Connection restored successfully!');
                    }
                    
                    const temp = document.createElement('div');
                    temp.innerHTML = html;
                    const hasChanges = this.detectChanges(temp);
                    
                    if (hasChanges && !AppState.isUserInteracting) {
                        this.updateProductsTable(temp);
                        RealTimeConfig.lastUpdateTime = new Date().getTime();
                        RealTimeConfig.connectionRetryCount = 0;
                        UIHelper.updateAutoRefreshStatus('connected', 'Auto-sync ON');
                    } else {
                        UIHelper.updateAutoRefreshStatus('connected', 'Auto-sync ON');
                        this.updatePaginationAndCounts(temp);
                    }
                    
                    // Reset connection retry count on successful response
                    RealTimeConfig.connectionRetryCount = 0;
                } catch (error) {
                    console.error('Error processing update response:', error);
                    this.handleUpdateError(error);
                }
            },

            handleUpdateError(error) {
                console.error('Auto-refresh error:', error);
                RealTimeConfig.connectionRetryCount++;
                
                if (RealTimeConfig.connectionRetryCount >= RealTimeConfig.maxRetryAttempts) {
                    this.stop();
                    this.showConnectionLostMessage();
                } else {
                    UIHelper.updateAutoRefreshStatus('error', `Retry ${RealTimeConfig.connectionRetryCount}/${RealTimeConfig.maxRetryAttempts}`);
                }
            },

            showConnectionLostMessage() {
                // Prevent multiple redirect countdowns
                if (RealTimeConfig.isRedirecting) return;
                
                RealTimeConfig.isRedirecting = true;
                this.updateConnectionLostStatus(30);
                this.showConnectionLostToast();
                
                // Start countdown timer
                let countdown = 30;
                RealTimeConfig.redirectCountdown = setInterval(() => {
                    countdown--;
                    if (countdown > 0 && RealTimeConfig.isRedirecting) {
                        this.updateConnectionLostStatus(countdown);
                    } else {
                        this.clearRedirectCountdown();
                        if (countdown <= 0) {
                            this.redirectToLogin();
                        }
                    }
                }, 1000);
            },

            updateConnectionLostStatus(seconds) {
                const indicator = document.getElementById('statusIndicator');
                const statusText = document.getElementById('statusText');
                
                if (indicator && statusText) {
                    indicator.className = 'status-indicator error';
                    statusText.innerHTML = `
                        Connection lost - Redirecting to login in ${seconds} seconds
                        <br><small style="cursor: pointer; text-decoration: underline;" onclick="cancelLoginRedirect()">
                            Click here to stay logged in
                        </small>
                    `;
                    indicator.style.display = 'block';
                }
            },

            showConnectionLostToast() {
                NotificationService.showError(`
                    Connection lost. You will be redirected to login page in 30 seconds.
                    <br><small><strong>Click "Stay Logged In" in the red banner above to cancel.</strong></small>
                `);
            },

            clearRedirectCountdown() {
                if (RealTimeConfig.redirectCountdown) {
                    clearInterval(RealTimeConfig.redirectCountdown);
                    RealTimeConfig.redirectCountdown = null;
                }
                RealTimeConfig.isRedirecting = false;
            },

            cancelRedirect() {
                this.clearRedirectCountdown();
                
                // Hide the status indicator
                const indicator = document.getElementById('statusIndicator');
                if (indicator) {
                    indicator.style.display = 'none';
                }
                
                NotificationService.showSuccess('Redirect cancelled. Attempting to reconnect...');
                
                // Reset retry count and restart updates
                RealTimeConfig.connectionRetryCount = 0;
                
                // Try to reconnect immediately
                this.checkForUpdates();
                
                // Restart the auto-refresh
                this.start();
            },

            redirectToLogin() {
                if (!RealTimeConfig.isRedirecting) return;
                
                console.log('Redirecting to login due to connection timeout');
                NotificationService.showInfo('Redirecting to login page...');
                
                // Clear all intervals and timeouts
                this.stop();
                this.clearRedirectCountdown();
                clearTimeout(AppState.searchTimeout);
                
                // Redirect to login page
                setTimeout(() => {
                    // First try common login routes
                    const loginRoutes = ['/login', '/auth/login', '/?login=1'];
                    
                    // Try the first route, others as fallback
                    try {
                        console.log('Attempting redirect to:', window.location.origin + loginRoutes[0]);
                        window.location.href = window.location.origin + loginRoutes[0];
                    } catch (error) {
                        console.log('Fallback redirect to:', window.location.origin + '/?login=1');
                        // Fallback: reload page with login parameter
                        window.location.href = window.location.origin + '/?login=1';
                    }
                }, 1000);
            },

            detectChanges(tempDiv) {
                return this.hasTableChanges(tempDiv) || this.hasCountChanges(tempDiv) || this.hasPaginationChanges(tempDiv);
            },

            hasTableChanges(tempDiv) {
                const newContent = tempDiv.querySelector('#productsTableContainer');
                const currentContent = document.querySelector('#productsTableContainer');
                
                if (!newContent || !currentContent) {
                    return !currentContent;
                }
                
                return currentContent.innerHTML.replace(/\s+/g, ' ').trim() !== newContent.innerHTML.replace(/\s+/g, ' ').trim();
            },

            hasCountChanges(tempDiv) {
                const newCount = tempDiv.querySelector('#productCountText');
                const currentCount = document.querySelector('#productCountText');
                
                if (newCount && currentCount) {
                    return currentCount.innerHTML.trim() !== newCount.innerHTML.trim();
                }
                return false;
            },

            hasPaginationChanges(tempDiv) {
                const newPagination = tempDiv.querySelector('.mt-4');
                const currentPagination = document.querySelector('.mt-4');
                
                if (newPagination && currentPagination) {
                    return currentPagination.innerHTML.replace(/\s+/g, ' ').trim() !== newPagination.innerHTML.replace(/\s+/g, ' ').trim();
                }
                return !!(newPagination || currentPagination);
            },

            updateProductsTable(tempDiv) {
                const selectedIds = SelectionManager.getSelectedIds('main');
                const selectAllState = SelectionManager.getSelectAllState('main');

                this.updateTableContent(tempDiv);
                this.updatePaginationAndCounts(tempDiv);
                
                SelectionManager.restoreSelections(selectedIds, selectAllState, 'main');
                SelectionManager.updateBulkActions('main');

                setTimeout(() => TooltipManager.initialize(), 300);
            },

            updateTableContent(tempDiv) {
                const newContent = tempDiv.querySelector('#productsTableContainer');
                const container = document.getElementById('productsTableContainer');
                
                if (!newContent || !container) return;

                const currentHTML = container.innerHTML.replace(/\s+/g, ' ').trim();
                const newHTML = newContent.innerHTML.replace(/\s+/g, ' ').trim();
                
                if (currentHTML !== newHTML) {
                    TooltipManager.hideAllTooltips();
                    container.innerHTML = newContent.innerHTML;
                    this.animateUpdatedRows();
                }
            },

            animateUpdatedRows() {
                const container = document.getElementById('productsTableContainer');
                container.querySelectorAll('tbody tr').forEach(row => {
                    row.classList.add('product-row-updated');
                    setTimeout(() => row.classList.remove('product-row-updated'), 2000);
                });
            },

            updatePaginationAndCounts(tempDiv) {
                this.updatePagination(tempDiv);
                this.updateProductCount(tempDiv);
                this.updatePageTitle(tempDiv);
            },

            updatePagination(tempDiv) {
                const newPag = tempDiv.querySelector('.mt-4');
                const currentPag = document.querySelector('.mt-4');
                
                if (newPag && currentPag) {
                    currentPag.innerHTML = newPag.innerHTML;
                } else if (newPag && !currentPag) {
                    const productsCard = document.querySelector('.card');
                    if (productsCard && productsCard.parentNode) {
                        const newPagElement = newPag.cloneNode(true);
                        productsCard.parentNode.insertBefore(newPagElement, productsCard.nextSibling);
                    }
                } else if (!newPag && currentPag) {
                    currentPag.remove();
                }
            },

            updateProductCount(tempDiv) {
                const count = tempDiv.querySelector('#productCountText');
                const targetElement = document.getElementById('productCountText');
                if (count && targetElement) {
                    targetElement.innerHTML = count.innerHTML;
                }
            },

            updatePageTitle(tempDiv) {
                const newTitle = tempDiv.querySelector('.card-header .me-3');
                const currentTitle = document.querySelector('.card-header .me-3');
                if (newTitle && currentTitle) {
                    currentTitle.innerHTML = newTitle.innerHTML;
                }
            }
        };

        // Tooltip Management
        const TooltipManager = {
            initialize() {
                if (AppState.tooltipInitTimeout) {
                    clearTimeout(AppState.tooltipInitTimeout);
                }
                
                AppState.tooltipInitTimeout = setTimeout(() => {
                    this.cleanupExistingTooltips();
                    this.initializeNewTooltips();
                }, 150);
            },

            cleanupExistingTooltips() {
                try {
                    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                        if (el && el.isConnected) {
                            const existing = bootstrap.Tooltip.getInstance(el);
                            if (existing) {
                                this.safeDisposeTooltip(existing);
                            }
                        }
                    });

                    document.querySelectorAll('.tooltip').forEach(el => {
                        this.safeRemoveElement(el);
                    });
                } catch (error) {
                    console.error('Tooltip cleanup error:', error);
                }
            },

            initializeNewTooltips() {
                document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                    if (el && el.isConnected && !bootstrap.Tooltip.getInstance(el)) {
                        this.createTooltip(el);
                    }
                });
            },

            createTooltip(element) {
                try {
                    const tooltip = new bootstrap.Tooltip(element, {
                        trigger: 'hover focus',
                        delay: { show: 500, hide: 200 },
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

                    this.attachTooltipEvents(element);
                } catch (e) {
                    console.warn('Tooltip creation failed:', e);
                }
            },

            attachTooltipEvents(element) {
                element.addEventListener('mouseenter', () => AppState.isUserInteracting = true);
                element.addEventListener('mouseleave', () => setTimeout(() => AppState.isUserInteracting = false, 1000));
                element.addEventListener('focus', () => AppState.isUserInteracting = true);
                element.addEventListener('blur', () => setTimeout(() => AppState.isUserInteracting = false, 500));
            },

            safeDisposeTooltip(tooltip) {
                try {
                    tooltip.hide();
                    tooltip.dispose();
                } catch (e) {
                    console.warn('Tooltip dispose error:', e);
                }
            },

            safeRemoveElement(element) {
                if (element && element.parentNode) {
                    try {
                        element.parentNode.removeChild(element);
                    } catch (e) {
                        console.warn('Tooltip removal error:', e);
                    }
                }
            },

            hideAllTooltips() {
                document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                    const tooltip = bootstrap.Tooltip.getInstance(el);
                    if (tooltip) {
                        try {
                            tooltip.hide();
                        } catch (e) {
                            console.warn('Hide tooltip error:', e);
                        }
                    }
                });
            },

            disposeAll() {
                try {
                    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                        if (el) {
                            const tooltip = bootstrap.Tooltip.getInstance(el);
                            if (tooltip) {
                                this.safeDisposeTooltip(tooltip);
                            }
                        }
                    });

                    document.querySelectorAll('.tooltip, body > .tooltip, .tooltip-inner, .tooltip-arrow').forEach(el => {
                        if (el && (!el.closest('[data-bs-toggle="tooltip"]') || el.matches('.tooltip, body > .tooltip'))) {
                            this.safeRemoveElement(el);
                        }
                    });
                } catch (error) {
                    console.error('Dispose all tooltips error:', error);
                }
            }
        };

        // Product Action Handlers
        const ProductActions = {
            view(id) {
                if (!this.validateId(id)) return;
                TooltipManager.disposeAll();
                window.location.href = '/products/view/' + id;
            },

            edit(id) {
                if (!this.validateId(id)) return;
                TooltipManager.disposeAll();
                window.location.href = '/products/edit/' + id;
            },

            delete(id, name) {
                if (!this.validateId(id)) return;
                
                const productName = name && name.trim() !== '' ? name : 'this product';
                
                try {
                    document.getElementById('deleteProductName').textContent = productName;
                    document.getElementById('confirmDeleteBtn').href = '/products/delete/' + id;
                    new bootstrap.Modal(document.getElementById('deleteModal')).show();
                } catch (error) {
                    console.error('Error showing delete modal:', error);
                    NotificationService.showError('Error opening delete confirmation. Please try again.');
                }
            },

            validateId(id) {
                if (!id || id <= 0) {
                    NotificationService.showError('Invalid product ID.');
                    return false;
                }
                return true;
            }
        };

        // Selection Management
        const SelectionManager = {
            toggleSelectAll(context = 'main') {
                const selectAllId = this.getSelectAllId(context);
                const checkboxClass = this.getCheckboxClass(context);
                const selectAll = document.getElementById(selectAllId);
                const checkboxes = document.querySelectorAll(`.${checkboxClass}`);
                
                checkboxes.forEach(cb => {
                    cb.checked = selectAll.checked;
                    const row = cb.closest('tr');
                    if (row) {
                        row.classList.toggle('selected', cb.checked);
                    }
                });
                
                this.updateBulkActions(context);
            },

            updateBulkActions(context = 'main') {
                const config = this.getContextConfig(context);
                const checkboxes = document.querySelectorAll(`.${config.checkboxClass}`);
                const selectedCheckboxes = document.querySelectorAll(`.${config.checkboxClass}:checked`);
                const bulkActions = document.getElementById(config.actionsId);
                const selectedCount = document.getElementById(config.selectedCountId);
                const selectAll = document.getElementById(config.selectAllId);
                
                if (selectedCount) {
                    selectedCount.textContent = selectedCheckboxes.length;
                }
                
                this.updateSelectAllState(selectAll, checkboxes, selectedCheckboxes);
                this.toggleBulkActions(bulkActions, selectedCheckboxes.length > 0);
                this.updateRowStyling(checkboxes);
                
                // Show/hide export selected button for main context
                if (context === 'main') {
                    const exportSelectedBtn = document.getElementById('exportSelectedBtn');
                    if (exportSelectedBtn) {
                        if (selectedCheckboxes.length > 0) {
                            exportSelectedBtn.style.display = 'inline-block';
                            exportSelectedBtn.style.visibility = 'visible';
                        } else {
                            exportSelectedBtn.style.display = 'none';
                            exportSelectedBtn.style.visibility = 'hidden';
                        }
                    }
                }
            },

            updateSelectAllState(selectAll, checkboxes, selectedCheckboxes) {
                if (selectAll) {
                    selectAll.indeterminate = selectedCheckboxes.length > 0 && selectedCheckboxes.length < checkboxes.length;
                    selectAll.checked = selectedCheckboxes.length === checkboxes.length && checkboxes.length > 0;
                }
            },

            toggleBulkActions(bulkActions, show) {
                if (bulkActions) {
                    bulkActions.classList.toggle('show', show);
                }
            },

            updateRowStyling(checkboxes) {
                checkboxes.forEach(cb => {
                    const row = cb.closest('tr');
                    if (row) {
                        row.classList.toggle('selected', cb.checked);
                    }
                });
            },

            clearAllSelections(context = 'main') {
                const config = this.getContextConfig(context);
                
                document.querySelectorAll(`.${config.checkboxClass}`).forEach(cb => {
                    cb.checked = false;
                    const row = cb.closest('tr');
                    if (row) row.classList.remove('selected');
                });
                
                const selectAll = document.getElementById(config.selectAllId);
                if (selectAll) {
                    selectAll.checked = false;
                    selectAll.indeterminate = false;
                }
                
                // Hide export selected button for main context
                if (context === 'main') {
                    const exportSelectedBtn = document.getElementById('exportSelectedBtn');
                    if (exportSelectedBtn) {
                        exportSelectedBtn.style.display = 'none';
                    }
                }
                
                this.updateBulkActions(context);
            },

            getSelectedIds(context = 'main') {
                const checkboxClass = this.getCheckboxClass(context);
                return Array.from(document.querySelectorAll(`.${checkboxClass}:checked`))
                    .map(cb => cb.value);
            },

            getSelectedProductNames(context = 'main') {
                const checkboxClass = this.getCheckboxClass(context);
                const selectedCheckboxes = document.querySelectorAll(`.${checkboxClass}:checked`);
                const names = [];
                
                selectedCheckboxes.forEach(cb => {
                    const row = cb.closest('tr');
                    if (row) {
                        const nameCell = context === 'main' ? row.cells[2] : row.cells[1];
                        if (nameCell) {
                            const nameText = nameCell.textContent.trim();
                            names.push(nameText);
                        }
                    }
                });
                
                return names;
            },

            getSelectAllState(context = 'main') {
                const selectAllId = this.getSelectAllId(context);
                const selectAll = document.getElementById(selectAllId);
                
                return selectAll ? {
                    checked: selectAll.checked,
                    indeterminate: selectAll.indeterminate
                } : null;
            },

            restoreSelections(selectedIds, selectAllState, context = 'main') {
                selectedIds.forEach(id => {
                    const checkbox = document.querySelector(`.${this.getCheckboxClass(context)}[value="${id}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                        const row = checkbox.closest('tr');
                        if (row) row.classList.add('selected');
                    }
                });

                if (selectAllState) {
                    const selectAll = document.getElementById(this.getSelectAllId(context));
                    if (selectAll) {
                        selectAll.checked = selectAllState.checked;
                        selectAll.indeterminate = selectAllState.indeterminate;
                    }
                }
            },

            getContextConfig(context) {
                const configs = {
                    'main': {
                        checkboxClass: 'product-checkbox',
                        actionsId: 'floatingBulkActions',
                        selectedCountId: 'selectedCount',
                        selectAllId: 'selectAllMain'
                    },
                    'trash': {
                        checkboxClass: 'trash-checkbox',
                        actionsId: 'trashBulkActions',
                        selectedCountId: 'selectedCountTrash',
                        selectAllId: 'selectAllTrash'
                    }
                };
                
                return configs[context] || configs['main'];
            },

            getCheckboxClass(context) {
                return context === 'main' ? 'product-checkbox' : 'trash-checkbox';
            },

            getSelectAllId(context) {
                return context === 'main' ? 'selectAllMain' : 'selectAllTrash';
            }
        };

        // Utility Functions
        const UtilityFunctions = {
            escapeHtml(text) {
                const map = {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                };
                return text.replace(/[&<>"']/g, m => map[m]);
            },

            refreshProducts() {
                NotificationService.showLoading('Refreshing products...');
                
                // Simple reload the screen after brief delay
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            },

            initializeAlerts() {
                console.log('Alert system initialized - using toast notifications');
            }
        };

        // Initialize Event Handlers
        EventHandlers.initialize();

        // Trash Management
        const TrashManager = {
            openModal() {
                const modal = new bootstrap.Modal(document.getElementById('trashModal'));
                
                document.getElementById('trashModal').addEventListener('hidden.bs.modal', () => {
                    this.handleModalClose();
                }, { once: true });
                
                modal.show();
                this.loadData();
            },

            handleModalClose() {
                TooltipManager.disposeAll();
                this.hideBulkActions();
                this.hideNestedPanels();
                SelectionManager.clearAllSelections('trash');
            },

            hideBulkActions() {
                const trashBulkActions = document.getElementById('trashBulkActions');
                if (trashBulkActions) {
                    trashBulkActions.classList.remove('show');
                }
            },

            hideNestedPanels() {
                document.getElementById('nestedBulkRestorePanel').classList.remove('show');
                document.getElementById('nestedBulkPermanentDeletePanel').classList.remove('show');
            },

            loadData() {
                const body = document.getElementById('trashModalBody');
                TooltipManager.disposeAll();
                NotificationService.showLoading('Loading deleted products...');
                
                body.innerHTML = this.getLoadingHTML();

                fetch('/trash', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.ok ? response.json() : Promise.reject('Network error'))
                .then(data => this.handleLoadSuccess(data))
                .catch(error => this.handleLoadError(error, body));
            },

            getLoadingHTML() {
                return `<div class="text-center py-5">
                    <div class="spinner-border text-primary">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3 text-muted">Loading trash...</p>
                </div>`;
            },

            handleLoadSuccess(data) {
                NotificationService.hideLoading();
                this.displayData(data);
            },

            handleLoadError(error, body) {
                NotificationService.hideLoading();
                console.error('Trash load error:', error);
                NotificationService.showError('Failed to load trash data. Please try again.');
                
                body.innerHTML = this.getErrorHTML();
            },

            getErrorHTML() {
                return `<div class="text-center py-5">
                    <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                    <h4 class="text-danger">Error Loading Trash</h4>
                    <p class="text-muted">Unable to load deleted products.</p>
                    <button class="btn btn-outline-danger" onclick="TrashManager.loadData()">
                        <i class="fas fa-redo me-2"></i>Try Again
                    </button>
                </div>`;
            },

            displayData(data) {
                const body = document.getElementById('trashModalBody');
                
                if (!data.products || !data.products.length) {
                    body.innerHTML = this.getEmptyHTML();
                    return;
                }

                body.innerHTML = this.buildProductsHTML(data);
                SelectionManager.updateBulkActions('trash');
                setTimeout(() => TooltipManager.initialize(), 100);
            },

            getEmptyHTML() {
                return `<div class="text-center trash-empty">
                    <i class="fas fa-trash fa-3x text-muted mb-3"></i>
                    <h4>Trash is Empty</h4>
                    <p class="text-muted">No deleted products found.</p>
                </div>`;
            },

            buildProductsHTML(data) {
                let html = this.getTableHeader();
                html += this.buildTableRows(data.products);
                html += this.getTableFooter(data);
                return html;
            },

            getTableHeader() {
                return `<div class="table-responsive">
                    <table class="table table-striped mb-0 trash-table">
                        <thead class="table-dark">
                            <tr>
                                <th style="width:40px">
                                    <input type="checkbox" class="form-check-input select-checkbox" 
                                           id="selectAllTrash" onchange="SelectionManager.toggleSelectAll('trash')">
                                </th>
                                <th><i class="fas fa-tag me-1"></i>Product Name</th>
                                <th><i class="fas fa-align-left me-1"></i>Description</th>
                                <th><i class="fas fa-peso-sign me-1"></i>Price</th>
                                <th><i class="fas fa-calendar me-1"></i>Deleted At</th>
                                <th><i class="fas fa-cogs me-1"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>`;
            },

            buildTableRows(products) {
                return products.map(product => this.buildProductRow(product)).join('');
            },

            buildProductRow(product) {
                const description = this.formatDescription(product.description);
                const { dateStr, timeStr } = this.formatDate(product.updated_at);
                const price = this.formatPrice(product.price);
                const escapedName = UtilityFunctions.escapeHtml(product.product_name);

                return `<tr class="deleted-product" id="trash-row-${product.id}">
                    <td>
                        <input type="checkbox" class="form-check-input select-checkbox trash-checkbox" 
                               value="${product.id}" onchange="SelectionManager.updateBulkActions('trash')">
                    </td>
                    <td><span class="fw-semibold text-muted">${escapedName}</span></td>
                    <td>${description}</td>
                    <td><strong class="text-muted">₱${price}</strong></td>
                    <td><small>${dateStr}</small><br><small class="text-muted">${timeStr}</small></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-outline-success btn-sm" 
                                    onclick="TrashManager.restoreProduct(${product.id}, '${escapedName}')" 
                                    title="Restore Product" data-bs-toggle="tooltip">
                                <i class="fas fa-undo"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-sm" 
                                    onclick="TrashManager.permanentDeleteProduct(${product.id}, '${escapedName}')" 
                                    title="Permanently Delete" data-bs-toggle="tooltip">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>`;
            },

            formatDescription(description) {
                if (!description) {
                    return '<em class="text-muted">No description</em>';
                }
                return description.length > 50 
                    ? description.substring(0, 50) + '...' 
                    : description;
            },

            formatDate(dateString) {
                const date = new Date(dateString);
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
                return { dateStr, timeStr };
            },

            formatPrice(price) {
                return parseFloat(price).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            },

            getTableFooter(data) {
                const totalText = data.total_products ? ` of ${data.total_products} total` : '';
                return `</tbody>
                    </table>
                </div>
                <div class="p-3 bg-light border-top">
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Showing ${data.products.length} deleted product(s)${totalText}
                    </small>
                </div>`;
            },

            refresh() {
                NotificationService.showLoading('Refreshing trash data...');
                this.loadData();
            },

            restoreProduct(id, name) {
                if (!ProductActions.validateId(id)) return;
                
                AppState.currentRestoreId = id;
                document.getElementById('restoreProductName').textContent = name || 'this product';
                new bootstrap.Modal(document.getElementById('restoreModal')).show();
            },

            permanentDeleteProduct(id, name) {
                if (!ProductActions.validateId(id)) return;
                
                AppState.currentPermanentDeleteId = id;
                document.getElementById('permanentDeleteProductName').textContent = name || 'this product';
                new bootstrap.Modal(document.getElementById('permanentDeleteModal')).show();
            },

            confirmRestore() {
                if (!AppState.currentRestoreId) return;
                
                const btn = event.target;
                const originalText = btn.innerHTML;
                this.setButtonLoading(btn, 'Restoring...');

                fetch(`/products/restore/${AppState.currentRestoreId}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => this.handleRestoreResponse(data))
                .catch(error => this.handleRestoreError(error))
                .finally(() => this.resetButton(btn, originalText));
            },

            confirmPermanentDelete() {
                if (!AppState.currentPermanentDeleteId) return;
                
                const btn = event.target;
                const originalText = btn.innerHTML;
                this.setButtonLoading(btn, 'Deleting...');

                fetch(`/products/permanent-delete/${AppState.currentPermanentDeleteId}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => this.handlePermanentDeleteResponse(data))
                .catch(error => this.handlePermanentDeleteError(error))
                .finally(() => this.resetButton(btn, originalText));
            },

            setButtonLoading(btn, text) {
                btn.innerHTML = `<i class="fas fa-spinner fa-spin me-2"></i>${text}`;
                btn.disabled = true;
            },

            resetButton(btn, originalText) {
                btn.innerHTML = originalText;
                btn.disabled = false;
            },

            handleRestoreResponse(data) {
                if (data.success) {
                    NotificationService.showNotification(data.message, 'success');
                    this.removeProductRow(AppState.currentRestoreId);
                    setTimeout(() => UtilityFunctions.refreshProducts(), 500);
                } else {
                    NotificationService.showNotification(data.message, 'error');
                }
                
                AppState.currentRestoreId = null;
                bootstrap.Modal.getInstance(document.getElementById('restoreModal')).hide();
            },

            handleRestoreError(error) {
                console.error('Restore error:', error);
                NotificationService.showError('Error restoring product. Please try again.');
                AppState.currentRestoreId = null;
                bootstrap.Modal.getInstance(document.getElementById('restoreModal')).hide();
            },

            handlePermanentDeleteResponse(data) {
                if (data.success) {
                    NotificationService.showNotification(data.message, 'success');
                    this.removeProductRow(AppState.currentPermanentDeleteId);
                } else {
                    NotificationService.showNotification(data.message, 'error');
                }
                
                AppState.currentPermanentDeleteId = null;
                bootstrap.Modal.getInstance(document.getElementById('permanentDeleteModal')).hide();
            },

            handlePermanentDeleteError(error) {
                console.error('Permanent delete error:', error);
                NotificationService.showError('Error permanently deleting product. Please try again.');
                AppState.currentPermanentDeleteId = null;
                bootstrap.Modal.getInstance(document.getElementById('permanentDeleteModal')).hide();
            },

            removeProductRow(productId) {
                const row = document.getElementById(`trash-row-${productId}`);
                if (row) {
                    row.style.transition = 'opacity 0.3s';
                    row.style.opacity = '0';
                    setTimeout(() => row.remove(), 300);
                }
            }
        };

        // Bulk Operations Manager
        const BulkOperations = {
            // Nested panel functions for trash modal
            showNestedBulkRestore() {
                const selectedIds = SelectionManager.getSelectedIds('trash');
                if (!this.validateSelection(selectedIds, 'restore')) return;
                
                const selectedNames = SelectionManager.getSelectedProductNames('trash');
                this.populateNestedPanel('nestedRestoreCount', 'nestedRestoreList', selectedIds, selectedNames);
                document.getElementById('nestedBulkRestorePanel').classList.add('show');
            },

            showNestedBulkPermanentDelete() {
                const selectedIds = SelectionManager.getSelectedIds('trash');
                if (!this.validateSelection(selectedIds, 'permanently delete')) return;
                
                const selectedNames = SelectionManager.getSelectedProductNames('trash');
                this.populateNestedPanel('nestedPermanentDeleteCount', 'nestedPermanentDeleteList', selectedIds, selectedNames);
                document.getElementById('nestedBulkPermanentDeletePanel').classList.add('show');
            },

            hideNestedPanel(panelId) {
                document.getElementById(panelId).classList.remove('show');
            },

            // Modal trigger functions
            showBulkDeleteModal() {
                const selectedIds = SelectionManager.getSelectedIds('main');
                if (!this.validateSelection(selectedIds, 'delete')) return;
                
                const selectedNames = SelectionManager.getSelectedProductNames('main');
                this.populateModal('bulkDeleteCount', 'bulkDeleteList', selectedIds, selectedNames, 'bulkDeleteModal');
            },

            showBulkRestoreModal() {
                const selectedIds = SelectionManager.getSelectedIds('trash');
                if (!this.validateSelection(selectedIds, 'restore')) return;
                
                const selectedNames = SelectionManager.getSelectedProductNames('trash');
                this.populateModal('bulkRestoreCount', 'bulkRestoreList', selectedIds, selectedNames, 'bulkRestoreModal');
            },

            showBulkPermanentDeleteModal() {
                const selectedIds = SelectionManager.getSelectedIds('trash');
                if (!this.validateSelection(selectedIds, 'permanently delete')) return;
                
                const selectedNames = SelectionManager.getSelectedProductNames('trash');
                this.populateModal('bulkPermanentDeleteCount', 'bulkPermanentDeleteList', selectedIds, selectedNames, 'bulkPermanentDeleteModal');
            },

            // Confirmation functions
            confirmBulkDelete() {
                this.executeBulkOperation('main', '/products/bulk-delete', 'Moving to trash...', 'moving', 'delete');
            },

            confirmBulkRestore() {
                this.executeBulkOperation('trash', '/products/bulk-restore', 'Restoring...', 'restoring', 'restore', () => {
                    TrashManager.loadData();
                    UtilityFunctions.refreshProducts();
                });
            },

            confirmBulkPermanentDelete() {
                this.executeBulkOperation('trash', '/products/bulk-permanent-delete', 'Deleting...', 'permanently deleting', 'permanent-delete', () => {
                    TrashManager.loadData();
                });
            },

            // Nested panel confirmations
            confirmNestedBulkRestore() {
                const selectedIds = SelectionManager.getSelectedIds('trash');
                if (selectedIds.length === 0) return;
                
                const btn = event.target;
                const originalText = btn.innerHTML;
                TrashManager.setButtonLoading(btn, 'Restoring...');
                
                this.hideNestedPanel('nestedBulkRestorePanel');
                NotificationService.showLoading(`Restoring ${selectedIds.length} product(s)...`);
                
                this.performBulkRequest('/products/bulk-restore', selectedIds)
                    .then(data => this.handleBulkSuccess(data, 'restore', () => {
                        TrashManager.loadData();
                        UtilityFunctions.refreshProducts();
                    }))
                    .catch(error => this.handleBulkError(error, 'restoring'))
                    .finally(() => TrashManager.resetButton(btn, originalText));
            },

            confirmNestedBulkPermanentDelete() {
                const selectedIds = SelectionManager.getSelectedIds('trash');
                if (selectedIds.length === 0) return;
                
                const btn = event.target;
                const originalText = btn.innerHTML;
                TrashManager.setButtonLoading(btn, 'Deleting...');
                
                this.hideNestedPanel('nestedBulkPermanentDeletePanel');
                NotificationService.showLoading(`Permanently deleting ${selectedIds.length} product(s)...`);
                
                this.performBulkRequest('/products/bulk-permanent-delete', selectedIds)
                    .then(data => this.handleBulkSuccess(data, 'permanent-delete', () => TrashManager.loadData()))
                    .catch(error => this.handleBulkError(error, 'permanently deleting'))
                    .finally(() => TrashManager.resetButton(btn, originalText));
            },

            // Helper methods
            validateSelection(selectedIds, action) {
                if (selectedIds.length === 0) {
                    NotificationService.showError(`Please select products to ${action}.`);
                    return false;
                }
                return true;
            },

            populateModal(countId, listId, selectedIds, selectedNames, modalId) {
                document.getElementById(countId).textContent = selectedIds.length;
                this.populateList(listId, selectedNames);
                new bootstrap.Modal(document.getElementById(modalId)).show();
            },

            populateNestedPanel(countId, listId, selectedIds, selectedNames) {
                document.getElementById(countId).textContent = selectedIds.length;
                this.populateList(listId, selectedNames);
            },

            populateList(listId, names) {
                const list = document.getElementById(listId);
                list.innerHTML = '';
                names.forEach(name => {
                    const li = document.createElement('li');
                    li.textContent = name;
                    list.appendChild(li);
                });
            },

            executeBulkOperation(context, endpoint, loadingText, progressText, operation, successCallback) {
                const selectedIds = SelectionManager.getSelectedIds(context);
                if (selectedIds.length === 0) return;
                
                const btn = event.target;
                const originalText = btn.innerHTML;
                TrashManager.setButtonLoading(btn, loadingText);
                
                const modalId = this.getModalIdByOperation(operation);
                if (modalId) {
                    bootstrap.Modal.getInstance(document.getElementById(modalId)).hide();
                }
                
                NotificationService.showLoading(`${progressText.charAt(0).toUpperCase() + progressText.slice(1)} ${selectedIds.length} product(s)...`);
                
                this.performBulkRequest(endpoint, selectedIds)
                    .then(data => {
                        this.handleBulkSuccess(data, operation, successCallback);
                        SelectionManager.clearAllSelections(context);
                    })
                    .catch(error => this.handleBulkError(error, progressText))
                    .finally(() => TrashManager.resetButton(btn, originalText));
            },

            getModalIdByOperation(operation) {
                const modalMap = {
                    'delete': 'bulkDeleteModal',
                    'restore': 'bulkRestoreModal',
                    'permanent-delete': 'bulkPermanentDeleteModal'
                };
                return modalMap[operation];
            },

            performBulkRequest(endpoint, ids) {
                return fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ ids })
                }).then(response => response.json());
            },

            handleBulkSuccess(data, operation, successCallback) {
                NotificationService.hideLoading();
                
                if (data.success) {
                    NotificationService.showNotification(data.message, 'success');
                    if (successCallback) {
                        setTimeout(successCallback, 500);
                    } else if (operation === 'delete') {
                        setTimeout(() => UtilityFunctions.refreshProducts(), 500);
                    }
                } else {
                    NotificationService.showNotification(data.message || `Error ${operation}ing products.`, 'error');
                }
            },

            handleBulkError(error, operation) {
                NotificationService.hideLoading();
                console.error(`Bulk ${operation} error:`, error);
                NotificationService.showError(`Error ${operation} products. Please try again.`);
            }
        };

        // Global Function Wrappers for HTML onclick handlers
        // These maintain backward compatibility with existing HTML
        function openTrashModal() { TrashManager.openModal(); }
        function refreshTrash() { TrashManager.refresh(); }
        function confirmRestore() { TrashManager.confirmRestore(); }
        function confirmPermanentDelete() { TrashManager.confirmPermanentDelete(); }
        function restoreProduct(id, name) { TrashManager.restoreProduct(id, name); }
        function permanentDeleteProduct(id, name) { TrashManager.permanentDeleteProduct(id, name); }
        
        function viewProduct(id) { ProductActions.view(id); }
        function editProduct(id) { ProductActions.edit(id); }
        function deleteProduct(id, name) { ProductActions.delete(id, name); }
        
        function toggleSelectAll(context) { SelectionManager.toggleSelectAll(context); }
        function updateBulkActions(context) { SelectionManager.updateBulkActions(context); }
        function clearAllSelections(context) { SelectionManager.clearAllSelections(context); }
        function getSelectedIds(context) { return SelectionManager.getSelectedIds(context); }
        function getSelectedProductNames(context) { return SelectionManager.getSelectedProductNames(context); }
        
        function showBulkDeleteModal() { BulkOperations.showBulkDeleteModal(); }
        function showBulkRestoreModal() { BulkOperations.showBulkRestoreModal(); }
        function showBulkPermanentDeleteModal() { BulkOperations.showBulkPermanentDeleteModal(); }
        function showNestedBulkRestore() { BulkOperations.showNestedBulkRestore(); }
        function showNestedBulkPermanentDelete() { BulkOperations.showNestedBulkPermanentDelete(); }
        function hideNestedPanel(panelId) { BulkOperations.hideNestedPanel(panelId); }
        
        function confirmBulkDelete() { BulkOperations.confirmBulkDelete(); }
        function confirmBulkRestore() { BulkOperations.confirmBulkRestore(); }
        function confirmBulkPermanentDelete() { BulkOperations.confirmBulkPermanentDelete(); }
        function confirmNestedBulkRestore() { BulkOperations.confirmNestedBulkRestore(); }
        function confirmNestedBulkPermanentDelete() { BulkOperations.confirmNestedBulkPermanentDelete(); }
        
        function showNotification(message, type) { NotificationService.showNotification(message, type); }
        function showSuccessToast(message) { NotificationService.showSuccess(message); }
        function showErrorToast(message) { NotificationService.showError(message); }
        function showInfoToast(message) { NotificationService.showInfo(message); }
        function showLoadingToast(message) { return NotificationService.showLoading(message); }
        function hideLoadingToast() { NotificationService.hideLoading(); }
        function clearAllToasts() { NotificationService.clearAll(); }
        
        function clearSearch() { SearchManager.clear(); }
        function performSearch(query, page) { SearchManager.performSearch(query, page); }
        function refreshProducts() { UtilityFunctions.refreshProducts(); }
        function initializeAlerts() { UtilityFunctions.initializeAlerts(); }
        function escapeHtml(text) { return UtilityFunctions.escapeHtml(text); }
        
        function initializeTooltips() { TooltipManager.initialize(); }
        function disposeAllTooltips() { TooltipManager.disposeAll(); }
        
        function setLoading(loading) { UIHelper.setLoading(loading); }
        function startGlobalRealTimeUpdates() { RealTimeUpdater.start(); }
        function stopGlobalRealTimeUpdates() { RealTimeUpdater.stop(); }
        function cancelLoginRedirect() { RealTimeUpdater.cancelRedirect(); }

        // Print and Export Manager - Clean, optimized implementation
        const PrintExportManager = {
            // Constants
            PRINT_STYLES: `
                body { font-family: Arial, sans-serif; margin: 20px; }
                .print-title { font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 10px; }
                .print-date { text-align: right; font-size: 14px; margin-bottom: 20px; color: #666; }
                .print-search { font-size: 16px; margin-bottom: 20px; font-style: italic; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #000; padding: 8px; text-align: left; }
                th { background-color: #f0f0f0; font-weight: bold; }
                .print-summary { margin-top: 20px; font-size: 14px; }
                .no-products { text-align: center; font-style: italic; color: #666; }
            `,

            CSV_HEADERS: ['ID', 'Product Name', 'Description', 'Price', 'Created Date', 'Updated Date'],

            // Public API
            printProducts() {
                try {
                    const products = this._getVisibleProducts();
                    const printContent = this._generatePrintHTML(products);
                    this._executePrint(printContent);
                } catch (error) {
                    console.error('Print error:', error);
                }
            },

            exportToCSV(selectedOnly = false) {
                try {
                    const products = selectedOnly ? this._getSelectedProducts() : this._getVisibleProducts();
                    
                    if (!this._validateProductsForExport(products, selectedOnly)) {
                        return;
                    }

                    const csvContent = this._generateCSV(products);
                    const filename = this._createFilename(selectedOnly);
                    
                    this._downloadFile(csvContent, filename, 'text/csv');
                } catch (error) {
                    console.error('Export error:', error);
                }
            },

            // Private methods - Print functionality
            _generatePrintHTML(products) {
                const context = this._createPrintContext();
                const header = this._buildPrintHeader(context);
                const content = products.length > 0 
                    ? this._buildProductTable(products) 
                    : this._buildEmptyState();
                
                return this._assemblePrintDocument(context.title, header, content);
            },

            _createPrintContext() {
                const searchTerm = this._getSearchTerm();
                return {
                    title: searchTerm ? `Products List - Search Results for "${searchTerm}"` : 'Products List',
                    date: new Date().toLocaleDateString(),
                    time: new Date().toLocaleTimeString(),
                    searchTerm
                };
            },

            _buildPrintHeader(context) {
                let header = `
                    <div class="print-title">${context.title}</div>
                    <div class="print-date">Generated on ${context.date} at ${context.time}</div>
                `;
                
                if (context.searchTerm) {
                    header += `<div class="print-search">Search Term: "${context.searchTerm}"</div>`;
                }
                
                return header;
            },

            _buildProductTable(products) {
                const tableHeader = this._buildTableHeader();
                const tableBody = this._buildTableBody(products);
                const summary = `<div class="print-summary">Total Products: ${products.length}</div>`;
                
                return `<table>${tableHeader}${tableBody}</table>${summary}`;
            },

            _buildTableHeader() {
                return `
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                `;
            },

            _buildTableBody(products) {
                const rows = products.map(product => this._buildTableRow(product)).join('');
                return `<tbody>${rows}</tbody>`;
            },

            _buildTableRow(product) {
                return `
                    <tr>
                        <td>${this._escapeHtml(product.id)}</td>
                        <td>${this._escapeHtml(product.name)}</td>
                        <td>${this._escapeHtml(product.description || 'N/A')}</td>
                        <td>₱${this._escapeHtml(product.price)}</td>
                        <td>${this._escapeHtml(product.created_at)}</td>
                    </tr>
                `;
            },

            _buildEmptyState() {
                return '<div class="no-products">No products found</div>';
            },

            _assemblePrintDocument(title, header, content) {
                return `
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>${title}</title>
                        <style>${this.PRINT_STYLES}</style>
                    </head>
                    <body>
                        ${header}
                        ${content}
                    </body>
                    </html>
                `;
            },

            _executePrint(htmlContent) {
                const printWindow = window.open('', '_blank');
                if (!printWindow) {
                    throw new Error('Popup blocked. Please allow popups for printing.');
                }

                printWindow.document.write(htmlContent);
                printWindow.document.close();
                
                printWindow.onload = () => {
                    printWindow.focus();
                    printWindow.print();
                    printWindow.close();
                };
            },

            // Private methods - CSV functionality
            _validateProductsForExport(products, selectedOnly) {
                if (products.length === 0) {
                    const message = selectedOnly 
                        ? 'No products selected for export.' 
                        : 'No products available to export.';
                    NotificationService.showError(message);
                    return false;
                }
                return true;
            },

            _generateCSV(products) {
                const header = this.CSV_HEADERS.join(',') + '\n';
                const rows = products.map(product => this._buildCSVRow(product)).join('\n');
                return header + rows;
            },

            _buildCSVRow(product) {
                return [
                    product.id,
                    this._escapeCSV(product.name),
                    this._escapeCSV(product.description || ''),
                    product.price,
                    this._escapeCSV(product.created_at),
                    this._escapeCSV(product.updated_at || product.created_at)
                ].join(',');
            },

            _createFilename(selectedOnly) {
                const parts = ['products'];
                
                if (selectedOnly) parts.push('selected');
                
                const searchTerm = this._getSearchTerm();
                if (searchTerm) {
                    const sanitized = searchTerm.replace(/[^a-zA-Z0-9]/g, '_').substring(0, 20);
                    parts.push('search', sanitized);
                }
                
                parts.push(new Date().toISOString().split('T')[0]);
                return parts.join('_') + '.csv';
            },

            _downloadFile(content, filename, mimeType) {
                const blob = new Blob([content], { type: `${mimeType};charset=utf-8;` });
                const url = URL.createObjectURL(blob);
                
                try {
                    const link = this._createDownloadLink(url, filename);
                    this._triggerDownload(link);
                } finally {
                    URL.revokeObjectURL(url);
                }
            },

            _createDownloadLink(url, filename) {
                const link = document.createElement('a');
                link.setAttribute('href', url);
                link.setAttribute('download', filename);
                link.style.visibility = 'hidden';
                return link;
            },

            _triggerDownload(link) {
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },

            // Private methods - Data extraction
            _getVisibleProducts() {
                const tableRows = document.querySelectorAll('#productsTableContainer tbody tr');
                return Array.from(tableRows)
                    .map(row => this._extractProductFromRow(row))
                    .filter(product => product !== null);
            },

            _getSelectedProducts() {
                const selectedCheckboxes = document.querySelectorAll('.product-checkbox:checked');
                return Array.from(selectedCheckboxes)
                    .map(checkbox => this._extractProductFromRow(checkbox.closest('tr')))
                    .filter(product => product !== null);
            },

            _extractProductFromRow(row) {
                const cells = row.querySelectorAll('td');
                if (cells.length < 5) return null;

                const hasCheckbox = row.querySelector('.select-checkbox');
                const offset = hasCheckbox ? 1 : 0;

                return {
                    id: this._getCellText(cells[0 + offset]),
                    name: this._getCellText(cells[1 + offset]),
                    description: this._getCellText(cells[2 + offset]),
                    price: this._cleanPrice(this._getCellText(cells[3 + offset])),
                    created_at: this._getCellText(cells[4 + offset]),
                    updated_at: this._getCellText(cells[4 + offset]) // Using created_at as fallback
                };
            },

            _getCellText(cell) {
                return cell?.textContent?.trim() || '';
            },

            _cleanPrice(priceText) {
                return priceText.replace(/₱|,/g, '');
            },

            _getSearchTerm() {
                return document.getElementById('searchInput')?.value?.trim() || '';
            },

            // Private methods - Utilities
            _escapeHtml(text) {
                if (!text) return '';
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            },

            _escapeCSV(value) {
                if (value === null || value === undefined) return '';
                const stringValue = String(value);
                
                if (this._needsCSVEscaping(stringValue)) {
                    return `"${stringValue.replace(/"/g, '""')}"`;
                }
                
                return stringValue;
            },

            _needsCSVEscaping(value) {
                return value.includes(',') || value.includes('"') || value.includes('\n');
            }
        };

        // Global functions for HTML onclick handlers
        function printProducts() { PrintExportManager.printProducts(); }
        function exportToCSV() { PrintExportManager.exportToCSV(); }
        function exportSelectedToCSV() { PrintExportManager.exportToCSV(true); }

        // Initialize the complete application
        setTimeout(() => {
            AppInitializer.initializeMainApp();
            EventHandlers.initialize();
        }, 100);

        // Statistics Management System
        const StatisticsManager = {
            charts: {
                productsChart: null,
                priceChart: null
            },
            
            currentPeriod: 'daily',
            isLoading: false,

            openModal() {
                const modal = new bootstrap.Modal(document.getElementById('statisticsModal'));
                modal.show();
                this.loadStatistics();
            },

            closeModal() {
                const modal = bootstrap.Modal.getInstance(document.getElementById('statisticsModal'));
                if (modal) modal.hide();
            },

            loadStatistics() {
                if (this.isLoading) return;
                
                this.isLoading = true;
                this.showLoading();
                
                // Get selected time period
                const selectedPeriod = document.querySelector('input[name="timePeriod"]:checked');
                this.currentPeriod = selectedPeriod ? selectedPeriod.value : 'daily';
                
                // Simulate API call - replace with actual endpoint
                this.fetchStatisticsData()
                    .then(data => this.renderStatistics(data))
                    .catch(error => this.handleError(error))
                    .finally(() => this.isLoading = false);
            },

            async fetchStatisticsData() {
                try {
                    const response = await fetch(`/api/statistics?period=${this.currentPeriod}`);
                    const result = await response.json();
                    
                    if (result.success) {
                        return result.data;
                    } else {
                        throw new Error(result.message || 'Failed to fetch statistics');
                    }
                } catch (error) {
                    console.error('Error fetching statistics:', error);
                    NotificationService.showError('Failed to load statistics: ' + error.message);
                    throw error;
                }
            },

            renderStatistics(data) {
                // Update summary cards
                document.getElementById('totalProducts').textContent = data.summary.totalProducts;
                document.getElementById('productsAdded').textContent = data.summary.productsAdded;
                document.getElementById('productsUpdated').textContent = data.summary.productsUpdated;
                document.getElementById('totalPrice').textContent = `₱${data.summary.totalPrice.toLocaleString()}`;

                // Update period labels
                const periodText = this.currentPeriod === 'daily' ? 'Today' : 
                                 this.currentPeriod === 'weekly' ? 'This Week' : 'This Month';
                document.getElementById('addedPeriod').textContent = periodText;
                document.getElementById('updatedPeriod').textContent = periodText;

                // Render charts
                this.renderProductsChart(data.chartData);
                this.renderPriceChart(data.priceDistribution);
            },

            renderProductsChart(chartData) {
                const ctx = document.getElementById('productsChart').getContext('2d');
                
                // Destroy existing chart if it exists
                if (this.charts.productsChart) {
                    this.charts.productsChart.destroy();
                }

                this.charts.productsChart = new Chart(ctx, {
                    type: 'line',
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Products: ${context.parsed.y}`;
                                    }
                                }
                            }
                        }
                    }
                });
            },

            renderPriceChart(priceData) {
                const ctx = document.getElementById('priceChart').getContext('2d');
                
                // Destroy existing chart if it exists
                if (this.charts.priceChart) {
                    this.charts.priceChart.destroy();
                }

                this.charts.priceChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: priceData.labels,
                        datasets: [{
                            data: priceData.data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 205, 86, 0.8)',
                                'rgba(75, 192, 192, 0.8)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.parsed;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            },

            showLoading() {
                const elements = ['totalProducts', 'productsAdded', 'productsUpdated', 'totalPrice'];
                elements.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.innerHTML = '<div class="spinner-border spinner-border-sm text-secondary" role="status" style="width: 0.7rem; height: 0.7rem; border-width: 0.08rem;"><span class="visually-hidden">Loading...</span></div>';
                });
            },

            handleError(error) {
                console.error('Statistics error:', error);
                NotificationService.showError('Failed to load statistics. Please try again.');
                
                // Reset to default values
                ['totalProducts', 'productsAdded', 'productsUpdated'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.textContent = '0';
                });
                
                document.getElementById('totalPrice').textContent = '₱0';
            },

            refresh() {
                NotificationService.showInfo('Refreshing data...');
                this.loadStatistics();
            },

            printData() {
                NotificationService.showInfo('Preparing charts for print...');
                
                // Create a new window for printing charts only
                const printWindow = window.open('', '_blank', 'width=800,height=600');
                
                const selectedPeriod = document.querySelector('input[name="timePeriod"]:checked');
                const periodText = selectedPeriod ? selectedPeriod.value.charAt(0).toUpperCase() + selectedPeriod.value.slice(1) : 'Daily';
                
                // Create print-friendly HTML for charts only
                const printContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Charts - ${periodText}</title>
                    <style>
                        body { 
                            font-family: Arial, sans-serif; 
                            margin: 20px;
                            text-align: center; 
                        }
                        .header { 
                            margin-bottom: 20px; 
                        }
                        .chart-container { 
                            margin: 30px 0; 
                            page-break-inside: avoid;
                            text-align: center;
                        }
                        .chart-title { 
                            font-weight: bold; 
                            margin-bottom: 15px; 
                            font-size: 18px; 
                            color: #333;
                        }
                        .chart-image {
                            max-width: 90%;
                            height: auto;
                            border: 1px solid #ddd;
                            border-radius: 8px;
                            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                        }
                        @media print {
                            body { margin: 10px; }
                            .chart-container { page-break-inside: avoid; }
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h2>Statistics Charts - ${periodText}</h2>
                        <p>Generated: ${new Date().toLocaleDateString()} ${new Date().toLocaleTimeString()}</p>
                    </div>
                    <div id="printContent"></div>
                </body>
                </html>`;
                
                printWindow.document.write(printContent);
                printWindow.document.close();
                
                // Wait for the window to load then extract and print only charts
                printWindow.onload = () => {
                    const printBody = printWindow.document.getElementById('printContent');
                    
                    // Get only canvas elements (charts)
                    const canvases = document.querySelectorAll('#statisticsModal canvas');
                    
                    if (canvases.length === 0) {
                        printBody.innerHTML = '<p>No charts available to print.</p>';
                        setTimeout(() => {
                            printWindow.print();
                            NotificationService.showSuccess('Print dialog opened!');
                        }, 500);
                        return;
                    }
                    
                    // Process each chart
                    canvases.forEach((canvas, index) => {
                        const chartContainer = printWindow.document.createElement('div');
                        chartContainer.className = 'chart-container';
                        
                        // Get chart title from the closest chart container
                        const chartParent = canvas.closest('.chart-container') || canvas.parentElement;
                        const titleElement = chartParent.querySelector('.chart-title, h6, .fw-bold');
                        const chartTitle = titleElement ? titleElement.textContent : `Chart ${index + 1}`;
                        
                        // Create title
                        const title = printWindow.document.createElement('div');
                        title.className = 'chart-title';
                        title.textContent = chartTitle;
                        
                        // Convert canvas to image
                        const img = printWindow.document.createElement('img');
                        img.src = canvas.toDataURL('image/png');
                        img.className = 'chart-image';
                        img.alt = chartTitle;
                        
                        chartContainer.appendChild(title);
                        chartContainer.appendChild(img);
                        printBody.appendChild(chartContainer);
                    });
                    
                    setTimeout(() => {
                        printWindow.print();
                        NotificationService.showSuccess('Charts ready for print!');
                    }, 1000);
                };
            }
        };

        // Event listeners for statistics
        document.addEventListener('DOMContentLoaded', function() {
            // Time period change handlers
            document.querySelectorAll('input[name="timePeriod"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (document.getElementById('statisticsModal').classList.contains('show')) {
                        StatisticsManager.loadStatistics();
                    }
                });
            });
        });

        // Global function declarations for HTML onclick handlers
        function openStatisticsModal() { StatisticsManager.openModal(); }
        function refreshStatistics() { StatisticsManager.refresh(); }
        function printStatistics() { StatisticsManager.printData(); }
    </script>
</body>

</html>