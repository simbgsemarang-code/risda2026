<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Welcome/digital/layer/(:segment)', 'DigitalMap::layer/$1');
