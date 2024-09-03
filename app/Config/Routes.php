<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/articles', 'Articles::index');
$routes->get('/articles/new', 'Articles::New');
$routes->post('/articles/create', 'Articles::create');
$routes->get('/articles/show/(:num)', 'Articles::show/$1');
$routes->get('/articles/edit/(:num)', 'Articles::edit/$1');
$routes->post('/articles/update/(:num)', 'Articles::update/$1');
$routes->get('/articles/delete/(:num)', 'Articles::confirmDelete/$1');
$routes->post('/articles/delete/(:num)', 'Articles::delete/$1');
