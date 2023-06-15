<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'auth::login');
$routes->get('/auth/login', 'auth::login');
$routes->get('/auth/register', 'auth::register');
$routes->post('/auth/valid_register', 'auth::valid_register');
$routes->post('/auth/valid_login', 'auth::valid_login');
$routes->get('/auth/logout', 'auth::logout');


$routes->get('/admin', 'Admin\Admin::index', ['filter' => 'auth']);
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('categories', 'Admin\Categories::index');
    $routes->get('categories/(:num)', 'Admin\Categories::index/$1');
    $routes->post('categories', 'Admin\Categories::store');
    $routes->put('categories/(:num)', 'Admin\Categories::update/$1');
    $routes->delete('categories/(:num)', 'Admin\Categories::destroy/$1');

    $routes->post('produk/search', 'Admin\Admin::search');
    $routes->get('produk/(:segment)/preview', 'Admin\Admin::preview/$1');
    $routes->add('produk/new', 'Admin\Admin::create');
    $routes->add('produk/(:segment)/edit', 'Admin\Admin::edit/$1');
    $routes->get('produk/(:segment)/delete', 'Admin\Admin::delete/$1');
});


$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'User\Dashboard::index');
    $routes->get('dashboard/(:any)', 'User\Dashboard::detail/$1');
    $routes->post('pembayaran/(:any)', 'User\Dashboard::pembayaran/$1');
    $routes->post('listBarang', 'User\Dashboard::listBarang');
});

$routes->get('/news', 'News::index');
$routes->get('/news/(:any)', 'News::viewNews/$1');

$routes->group('admin', function ($routes) {
    $routes->get('news', 'NewsAdmin::index');
    $routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
    $routes->add('news/new', 'NewsAdmin::create');
    $routes->add('news/(:segment)/edit', 'NewsAdmin::edit/$1');
    $routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');
});

// C:\xampp\htdocs\MeCoffeVersion3\app\Controllers\Admin\Admin.php
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
