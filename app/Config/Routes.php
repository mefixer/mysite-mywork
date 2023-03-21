<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Tienda');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// LOGIN
$routes->get('/login', 'Login::index');
$routes->post('/usuarios/valida', 'Usuarios::index');



// TIENDA
$routes->get('/', 'Tienda::index');
$routes->get('/tienda', 'Tienda::index');
$routes->get('/tienda/lista', 'Tienda::lista');
$routes->get('/tienda/ver', 'Tienda::ver');
$routes->get('/tienda/realizar', 'Tienda::realizar');
$routes->post('/tienda/continuar', 'Tienda::continuar');
$routes->post('/tienda/finalizar', 'Tienda::finalizar');
$routes->post('/tienda/ciudad', 'Tienda::ciudad');
$routes->post('/tienda/buscarut', 'Tienda::buscarut');
$routes->get('/tienda/producto/(:num)', 'Tienda::producto/$1');
$routes->get('/tienda/insertar/(:num)', 'Tienda::insertar/$1');
$routes->get('/tienda/quitar/(:num)', 'Tienda::quitar/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
