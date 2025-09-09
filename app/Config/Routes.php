<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Set Products Management as the default landing page
$routes->get('/', 'ProductController::index');

// Authentication routes
$routes->post('login', 'ProductController::login');
$routes->get('logout', 'ProductController::logout');

// Alternative route for products (optional)
$routes->get('products', 'ProductController::index');

// Product CRUD routes
$routes->get('products/create', 'ProductController::showCreateForm');
$routes->post('products/create', 'ProductController::create');
$routes->get('products/view/(:num)', 'ProductController::view/$1');
$routes->get('products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('products/update/(:num)', 'ProductController::update/$1');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');

// Trash management routes
$routes->get('trash', 'ProductController::trash');
$routes->get('products/restore/(:num)', 'ProductController::restore/$1');
$routes->get('products/permanent-delete/(:num)', 'ProductController::permanentDelete/$1');

// Bulk operation routes
$routes->post('products/bulk-delete', 'ProductController::bulkDelete');
$routes->post('products/bulk-restore', 'ProductController::bulkRestore');
$routes->post('products/bulk-permanent-delete', 'ProductController::bulkPermanentDelete');

// Optional: Keep original home and lecture routes for reference
$routes->get('home', 'Home::index');
$routes->get('lecture', 'Home::lectureNotes');

