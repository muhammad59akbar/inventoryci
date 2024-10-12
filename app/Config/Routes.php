<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');

$routes->get('/ListUser', 'Admin::ListUser',  ['filter' => 'role:Owner']);
$routes->post('/Admin/AddUser', 'Admin::AddUser',  ['filter' => 'role:Owner']);
$routes->get('/DetailUser/(:segment)', 'Admin::detailUser/$1',  ['filter' => 'role:Owner']);
$routes->post('/EditUser/(:num)', 'Admin::editUser/$1',  ['filter' => 'role:Owner']);
$routes->delete('/DeleteUser/(:num)', 'Admin::deleteUser/$1',  ['filter' => 'role:Owner']);


$routes->get('/ListProduct', 'Product::index',  ['filter' => 'role:Owner, Staff Admin']);
$routes->post('/AddProduct', 'Product::AddProduct',  ['filter' => 'role:Owner, Staff Admin']);
$routes->get('/detailProduct/(:segment)', 'Product::detailProduk/$1',  ['filter' => 'role:Owner, Staff Admin']);
$routes->post('/EditProduct/(:num)', 'Product::editProduct/$1',  ['filter' => 'role:Owner, Staff Admin']);
$routes->delete('/DeleteProduk/(:num)', 'Product::deleteProduct/$1',  ['filter' => 'role:Owner, Staff Admin']);
