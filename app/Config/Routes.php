<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->group('',['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
 });
 $routes->group('',['filter' => 'AlreadyLoggedIn'], function ($routes) {
    $routes->get('auth', 'Auth::index');
    $routes->get('auth/register', 'Auth::register',  ['as' => 'register']);
    $routes->post('auth/save', 'Auth::save');
    $routes->post('auth/check', 'Auth::check');
    $routes->get('auth/logout', 'Auth::logout');
 });