<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//CLIENT
$routes->get('/', 'Client::index');
$routes->get('Client/showSignUp', 'Client::showSignUp');
$routes->get('Client/showSignIn', 'Client::showSignIn');
$routes->post('Client/registerUser', 'Client::registerUser');

//ADMIN
$routes->get('Admin', 'Authentication::signIn');
$routes->get('Admin/main', 'Admin::index');
$routes->get('Admin/showViewProducts', 'Admin::showViewProducts');
$routes->get('Admin/showViewEmployees', 'Admin::showViewEmployees');
$routes->get('Admin/showViewSales', 'Admin::showViewSales');
$routes->get('Admin/showViewSales', 'Admin::showViewSales');
$routes->get('Admin/showViewCreateProduct', 'Admin::showViewCreateProduct');
$routes->post('Admin/createProduct', 'Admin::createProduct');


//Authentication
$routes->post('Authentication/login', 'Authentication::login');
$routes->post('Authentication/signInProcess', 'Authentication::signInProcess');
