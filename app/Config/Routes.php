<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');

$routes->get('/ListUser', 'Admin::ListUser',  ['filter' => 'role:Own']);
$routes->get('/ListProduct', 'Admin::Product',  ['filter' => 'role:Own, StaffAdm']);
$routes->post('/AddProduct', 'Admin::AddProduct',  ['filter' => 'role:Own, StaffAdm']);
$routes->get('/detailProduct/(:segment)', 'Admin::detailProduk/$1',  ['filter' => 'role:Own, StaffAdm']);
$routes->post('/EditProduct/(:num)', 'Admin::editProduct/$1',  ['filter' => 'role:Own, StaffAdm']);
$routes->delete('/DeleteProduk/(:num)', 'Admin::deleteProduct/$1',  ['filter' => 'role:Own, StaffAdm']);
