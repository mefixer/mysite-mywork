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
$routes->get('/usuarios/logout', 'Usuarios::logout');
$routes->post('/usuarios/valida', 'Usuarios::valida');
$routes->get('/usuarios', 'Usuarios::index');
$routes->get('/usuarios/nuevo', 'Usuarios::nuevo');
$routes->post('/usuarios/insertar', 'Usuarios::insertar');
$routes->get('/usuarios/editar/(:any)', 'Usuarios::editar/$1');


$routes->get('/rolusuarios', 'RolUsuarios::index');
$routes->get('/rolusuarios/nuevo', 'RolUsuarios::nuevo');
$routes->post('/rolusuarios/insertar', 'RolUsuarios::insertar');
$routes->get('/rolusuarios/editar/(:any)', 'RolUsuarios::editar/$1');
$routes->post('/rolusuarios/actualizar', 'RolUsuarios::actualizar');

//ADMINISTRADOR
$routes->get('/productos', 'Productos::index');
$routes->get('/productos/imagen/(:any)', 'Productos::imagen/$1');
$routes->get('/productos/editar/(:any)', 'Productos::editar/$1');
$routes->get('/productos/eliminar/(:any)', 'Productos::eliminar/$1');

$routes->get('/categorias', 'Categorias::index');
$routes->get('/categorias/nuevo', 'Categorias::nuevo');
$routes->get('/categorias/eliminados', 'Categorias::eliminados');
$routes->post('/categorias/insertar', 'Categorias::insertar');
$routes->get('/categorias/editar/(:any)', 'Categorias::editar/$1');
$routes->post('/categorias/actualizar', 'Categorias::actualizar');

$routes->get('/unidades', 'Unidades::index');
$routes->get('/unidades/nuevo', 'Unidades::nuevo');
$routes->get('/unidades/eliminados', 'Unidades::eliminados');
$routes->post('/unidades/insertar', 'Unidades::insertar');
$routes->get('/unidades/editar/(:any)', 'Unidades::editar/$1');
$routes->post('/unidades/actualizar', 'Unidades::actualizar');

$routes->get('/portadas', 'Portadas::index');
$routes->get('/portadas/nuevo', 'Portadas::nuevo');
$routes->post('/portadas/insertar', 'Portadas::insertar');
$routes->get('/portadas/editar/(:any)', 'Portadas::editar/$1');
$routes->post('/portadas/activar', 'Portadas::activar');
$routes->post('/portadas/actualizar', 'Portadas::actualizar');

$routes->get('/post','Post::index');
$routes->get('/post/nuevo', 'Post::nuevo');
$routes->post('/post/insertar', 'Post::insertar');
$routes->get('/post/editar/(:any)', 'Post::editar/$1');
$routes->post('/post/actualizar', 'Post::actualizar');
$routes->get('/post/eliminar/(:any)', 'Post::eliminar/$1');
$routes->get('/post/eliminados', 'Post::eliminados');

$routes->get('/destacados','Destacados::index');
$routes->post('/destacados/destacar', 'Destacados::destacar');

$routes->get('/anuncios','Anuncios::index');
$routes->get('/anuncios/nuevo', 'Anuncios::nuevo');
$routes->post('/anuncios/insertar', 'Anuncios::insertar');
$routes->get('/anuncios/editar/(:any)', 'Anuncios::editar/$1');
$routes->post('/anuncios/actualizar', 'Anuncios::actualizar');

$routes->get('/posteos','Posteos::index');
$routes->get('/posteos/nuevo', 'Posteos::nuevo');
$routes->post('/posteos/insertar', 'Posteos::insertar');
$routes->get('/posteos/editar/(:any)', 'Posteos::editar/$1');

$routes->get('/pedidos','Pedidos::index');
$routes->get('/pedidos/detalle/(:any)', 'Pedidos::detalle/$1');
$routes->get('/mascomprados','Mascomprados::index');
$routes->post('/mascomprados/actualiza_estado', 'Mascomprados::actualiza_estado');


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
