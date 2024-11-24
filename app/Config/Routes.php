<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('signup', 'User::register');
$routes->get('register', 'User::register');
$routes->post('save_user', 'User::store');
$routes->post('update-profile/(:num)', 'User::update/$1');
$routes->get('login', 'User::index', ['filter' => 'checkProfileLogin']);
$routes->get('profile', 'User::index', ['filter' => 'checkProfile']);
$routes->get('view-profile', 'User::viewProfile');
$routes->post('login', 'User::login');
$routes->get('logout', 'User::logout');


$routes->get('store/search', 'Products::search');
$routes->get('store/liveSearch', 'Products::liveSearch');


// cart routes
$routes->get('cart', 'Cart::index');
$routes->post('cart/add', 'Cart::addToCart');
$routes->post('cart/update', 'Cart::update');
$routes->get('cart/remove/(:num)', 'Cart::removeFromCart/$1');
$routes->get('cart/clear', 'Cart::clearCart');

// checkout routes
$routes->get('checkout', 'Checkout::index');
$routes->post('checkout/process', 'Checkout::process');
$routes->get('order-success', 'Checkout::success');
$routes->get('order-confirmed', 'Checkout::order_confirmed');


$routes->get('store', 'Home::store');
$routes->get('product-details/(:num)', 'Products::detail/$1');

$routes->group('admin',  ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    //dashboard route
    $routes->get('/', 'Admin::index', ['filter' => 'checkAuth']);

    // products route
    $routes->get('products', 'Products::index', ['filter' => 'checkAuth']);
    $routes->get('add_product', 'Products::add_product', ['filter' => 'checkAuth']);
    $routes->post('product/create', 'Products::create', ['filter' => 'checkAuth']);
    $routes->get('product/edit/(:num)', 'Products::edit/$1', ['filter' => 'checkAuth']);
    $routes->post('product/update/(:num)', 'Products::update/$1', ['filter' => 'checkAuth']);
    $routes->get('product/delete/(:num)', 'Products::delete/$1', ['filter' => 'checkAuth']);

    // orders route
    $routes->get('orders', 'Orders::orders', ['filter' => 'checkAuth']);
    $routes->post('updateOrderStatus', 'Orders::updateOrderStatus', ['filter' => 'checkAuth']);

    // users route
    $routes->get('users', 'Users::users', ['filter' => 'checkAuth']);
    $routes->post('updateUser', 'Users::updateUser', ['filter' => 'checkAuth']);
    $routes->get('deleteUser/(:num)', 'Users::deleteUser/$1', ['filter' => 'checkAuth']);

    // sales route
    $routes->get('sales', 'Sales::sales', ['filter' => 'checkAuth']);

    // settings route
    $routes->get('settings', 'Admin::settings', ['filter' => 'checkAuth']);
    $routes->post('update_account', 'Admin::update_account', ['filter' => 'checkAuth']);
    $routes->post('update_site_settings', 'Admin::update_site_settings', ['filter' => 'checkAuth']);
    $routes->post('update_other_settings', 'Admin::update_other_settings', ['filter' => 'checkAuth']);

    //login routes
    $routes->get('login', 'Admin::login',  ['filter' => 'checkLogin']);
    $routes->post('auth', 'Admin::auth',  ['filter' => 'checkLogin']);
    $routes->get('logout', 'Admin::logout', ['filter' => 'checkAuth']);
});
