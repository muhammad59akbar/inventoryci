<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');

$routes->get('/ListUser', 'Admin::ListUser',  ['filter' => 'role:Own']);
$routes->post('/Admin/AddUser', 'Admin::AddUser',  ['filter' => 'role:Own']);


$routes->get('/ListProduct', 'Product::index',  ['filter' => 'role:Own, StaffAdm']);
$routes->post('/AddProduct', 'Product::AddProduct',  ['filter' => 'role:Own, StaffAdm']);
$routes->get('/detailProduct/(:segment)', 'Product::detailProduk/$1',  ['filter' => 'role:Own, StaffAdm']);
$routes->post('/EditProduct/(:num)', 'Product::editProduct/$1',  ['filter' => 'role:Own, StaffAdm']);
$routes->delete('/DeleteProduk/(:num)', 'Product::deleteProduct/$1',  ['filter' => 'role:Own, StaffAdm']);
