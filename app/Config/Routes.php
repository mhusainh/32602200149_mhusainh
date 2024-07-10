<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');
$routes->get('/edit_menu.php', 'edit_menu::index');
$routes->post('/edit_menu.php', 'edit_menu::index');
$routes->get('/delete_menu.php', 'delete_menu::index');
$routes->post('/delete_menu.php', 'delete_menu::index');
$routes->get('/create_menu.php', 'create_menu::index');
$routes->post('/create_menu.php', 'create_menu::index');
$routes->get('/edit_transaksi.php', 'edit_transaksi::index');
$routes->post('/edit_transaksi.php', 'edit_transaksi::index');
$routes->get('/delete_transaksi.php', 'delete_transaksi::index');
$routes->post('/delete_transaksi.php', 'delete_transaksi::index');
$routes->get('/create_transaksi.php', 'create_transaksi::index');
$routes->post('/create_transaksi.php', 'create_transaksi::index');
