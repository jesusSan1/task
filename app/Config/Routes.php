<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);
$routes->post('guardar', [Home::class, 'guardar']);
$routes->get('editar-tarea/(:num)', [Home::class, 'editar/$1']);
$routes->post('update/(:num)', [Home::class, 'update/$1']);
$routes->get('eliminar-tarea/(:num)', [Home::class, 'delete/$1']);
