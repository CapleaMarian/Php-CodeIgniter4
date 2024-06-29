<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'WelcomeController::index');
$routes->get('/contact','WelcomeController::contact');
$routes->match(['get','post'],'/signup','WelcomeController::signup');
$routes->match(['get','post'],'/login','WelcomeController::login');
$routes->get('/logout', 'WelcomeController::logout');


$routes->match(['get','post'],'/admin','ImageController::index');
$routes->get('/upload', 'ImageController::upload');
$routes->post('/save', 'ImageController::save');
$routes->get('/view/(:num)', 'ImageController::view/$1');
$routes->get('/edit/(:num)', 'ImageController::edit/$1');
$routes->post('/update', 'ImageController::update');
$routes->get('/delete/(:num)', 'ImageController::delete/$1');

$routes->get('/seed' , 'PozeController::index');