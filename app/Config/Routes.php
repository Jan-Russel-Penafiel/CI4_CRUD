<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Set Products page (index.php) as the default landing page
$routes->get('/', 'ProductController::index');

// Authentication routes
$routes->group('auth', function ($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('processLogin', 'AuthController::processLogin');
    $routes->get('register', 'AuthController::register');
    $routes->post('processRegister', 'AuthController::processRegister');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('check', 'AuthController::checkAuth'); // AJAX endpoint
});

// Legacy login routes (for backward compatibility)
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');

// User Portal Routes
$routes->group('user', function ($routes) {
    $routes->get('dashboard', 'UserController::dashboard');
    $routes->get('profile', 'UserController::profile');
    $routes->post('update-profile', 'UserController::updateProfile');
    $routes->get('transactions', 'UserController::transactions');
    $routes->get('transaction/(:num)', 'UserController::viewTransaction/$1');
    $routes->get('products', 'UserController::products');
    $routes->get('product/(:num)', 'UserController::viewProduct/$1');
});

// POS System Routes
$routes->group('pos', function ($routes) {
    $routes->get('dashboard', 'PosController::dashboard');
    $routes->get('scanner', 'PosController::scanner');
    $routes->post('process-scan', 'PosController::processScan');
    $routes->post('update-cart', 'PosController::updateCart');
    $routes->get('cart', 'PosController::getCart');
    $routes->get('cart-count', 'PosController::cartCount');
    $routes->get('checkout', 'PosController::checkout');
    $routes->post('process-checkout', 'PosController::processCheckout');
    $routes->get('receipt/(:num)', 'PosController::receipt/$1');
    $routes->post('resend-sms/(:num)', 'PosController::resendSms/$1');
    $routes->post('search-products', 'PosController::searchProducts');
    $routes->post('add-product', 'PosController::addProduct');
    $routes->post('check-customer', 'PosController::checkCustomer');
});

// Product CRUD routes
$routes->get('products', 'ProductController::index');
$routes->get('products/create', 'ProductController::showCreateForm');
$routes->post('products/create', 'ProductController::create');
$routes->get('products/view/(:num)', 'ProductController::view/$1');
$routes->get('products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('products/update/(:num)', 'ProductController::update/$1');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');

// Serve uploaded product images
$routes->get('writable/uploads/(:any)', 'ProductController::serveImage/$1');

// Trash management routes
$routes->get('trash', 'ProductController::trash');
$routes->get('products/restore/(:num)', 'ProductController::restore/$1');
$routes->get('products/permanent-delete/(:num)', 'ProductController::permanentDelete/$1');

// Bulk operation routes
$routes->post('products/bulk-delete', 'ProductController::bulkDelete');
$routes->post('products/bulk-restore', 'ProductController::bulkRestore');
$routes->post('products/bulk-permanent-delete', 'ProductController::bulkPermanentDelete');

// Statistics route
$routes->get('api/statistics', 'ProductController::statistics');

// Optional: Keep original home and lecture routes for reference
$routes->get('home', 'Home::index');
$routes->get('lecture', 'Home::lectureNotes');

