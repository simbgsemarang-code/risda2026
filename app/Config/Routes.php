<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Welcome/drainase', 'Welcome::drainase');
$routes->get('Welcome/digital/layer/(:segment)', 'DigitalMap::layer/$1');
$routes->get('Welcome/digital', 'Welcome::digital');
$routes->get('Welcome/layer_di/(:segment)', 'Welcome::layer_di/$1');
$routes->get('Welcome/cari/(:segment)', 'Welcome::cari/$1');
$routes->get('Welcome/cari_di/(:segment)', 'Welcome::cari_di/$1');
$routes->get('Welcome/cari_iri/(:segment)/(:segment)/(:segment)', 'Welcome::cari_iri/$1/$2/$3');
$routes->get('Welcome/cari_pel/(:segment)', 'Welcome::cari_pel/$1');
$routes->get('Welcome/cari_desa1/(:segment)', 'Welcome::cari_desa1/$1');
$routes->get('Welcome/cari_kemantren1/(:segment)', 'Welcome::cari_kemantren1/$1');
$routes->get('Welcome/cari_di_desa/(:segment)', 'Welcome::cari_di_desa/$1');
$routes->get('Welcome/cari_di_kemantren/(:segment)', 'Welcome::cari_di_kemantren/$1');
$routes->get('Welcome/cari_irigasi/(:segment)', 'Welcome::cari_irigasi/$1');
$routes->get('Welcome/cari_pirigasi/(:segment)', 'Welcome::cari_pirigasi/$1');
$routes->match(['GET', 'POST'], 'Welcome/buku_petunjuk', 'Welcome::buku_petunjuk');
$routes->get('Welcome/manual_book', 'Welcome::manual_book');
$routes->get('Welcome/login', 'Welcome::login');
$routes->post('Admin/Login/authentication', 'AdminAuth::authentication');
$routes->get('Admin/Login/sign_out', 'AdminAuth::sign_out');
$routes->get('Admin/Index', 'AdminDashboard::index', ['filter' => 'admin']);
$routes->get('Detail/drainase/(:segment)', 'Detail::drainase/$1');
$routes->get('Detail/pembuang/(:segment)', 'Detail::pembuang/$1');
$routes->get('Detail/p_pembuang/(:segment)', 'Detail::p_pembuang/$1');
$routes->get('Detail/air_baku/(:segment)', 'Detail::air_baku/$1');
$routes->get('Detail/p_irigasi/(:segment)', 'Detail::p_irigasi/$1');
$routes->get('Detail/sawah/(:segment)', 'Detail::sawah/$1');
