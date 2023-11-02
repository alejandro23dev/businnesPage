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
$routes->get('Admin', 'Admin::index');


//Authentication
$routes->post('Authentication/login', 'Authentication::login');
