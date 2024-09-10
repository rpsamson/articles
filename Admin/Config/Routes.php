<?php
namespace Admin\Config;

$routes->group("admin", ['namespace' => '\Admin\Controllers'], static function($routes) {
    $routes->get('users', 'Users::index');
    $routes->get('users/(:num)', 'Users::show/$1');
    $routes->post('users/(:num)/toggle-ban', 'Users::toggleBan/$1');
});