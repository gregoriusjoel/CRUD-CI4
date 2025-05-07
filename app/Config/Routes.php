<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Homepage::index');
$routes->get('/gallery', 'Gallery::index');
$routes->get('/gallery/create', 'Gallery::create');
$routes->post('/gallery/store', 'Gallery::store');
$routes->get('/gallery/edit/(:num)', 'Gallery::edit/$1');
$routes->post('/gallery/update/(:num)', 'Gallery::update/$1');
$routes->get('/gallery/delete/(:num)', 'Gallery::delete/$1');
$routes->get('gallery/search', 'Gallery::search');


