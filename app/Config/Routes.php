<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('home/product', 'Home::product');
$routes->get('cart', 'Cart::index');
$routes->match(['get','post'],'address', 'Address::index');

$routes->get('category', 'Category::index');
$routes->get('category/(:any)', 'Category::index/$1');

$routes->get('product/(:any)', 'Product::index/$1');

$routes->match(['get','post'],'payment', 'Payment::index');
$routes->get('payment/success', 'Payment::success');
$routes->get('payment/failure', 'Payment::failure');

$routes->group('administrator', function($routes){
    $routes->get('/', 'Administrator\Home::index');
    $routes->match(['get','post'],'login', 'Administrator\Login::index');
    $routes->get('logout', 'Administrator\Login::logout');
    $routes->get('category', 'Administrator\Category::index');
    $routes->match(['get','post'],'category/create', 'Administrator\Category::create');
    $routes->match(['get','post'],'category/update/(:num)', 'Administrator\Category::update/$1');
    $routes->post('category/delete', 'Administrator\Category::delete');
    $routes->post('category/update_index', 'Administrator\Category::update_index');

    $routes->get('products', 'Administrator\Products::index');
    $routes->match(['get','post'],'products/create', 'Administrator\Products::create');
    $routes->get('products/all_hide_product', 'Administrator\Products::all_hide_product');
    $routes->get('products/all_show_product', 'Administrator\Products::all_show_product');
    $routes->get('products/remove_all_product', 'Administrator\Products::remove_all_product');
    $routes->post('products/delete', 'Administrator\Products::delete');
    $routes->post('products/update_index', 'Administrator\Products::update_index');
    $routes->post('products/update_verient_price', 'Administrator\Products::update_verient_price');
    $routes->post('products/update_hide_show', 'Administrator\Products::update_hide_show');
    $routes->post('products/update_category', 'Administrator\Products::update_category');

    $routes->get('settings', 'Administrator\Settings::index');
});

