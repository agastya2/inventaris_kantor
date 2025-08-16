<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/dashboard', 'Pages::dashboard');


$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/store', 'Barang::store');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang/delete/(:num)', 'Barang::delete/$1');

$routes->get('barang-masuk', 'BarangMasuk::index');

$routes->get('barang-keluar', 'BarangKeluar::index');



$routes->get('/peminjaman', 'Peminjaman::index');
$routes->get('/peminjaman/create', 'Peminjaman::create');
$routes->post('/peminjaman/store', 'Peminjaman::store');
$routes->get('/peminjaman/edit/(:num)', 'Peminjaman::edit/$1');
$routes->post('/peminjaman/update/(:num)', 'Peminjaman::update/$1');
$routes->get('/peminjaman/delete/(:num)', 'Peminjaman::delete/$1');

$routes->get('/pengembalian', 'Pengembalian::index');
$routes->get('/pengembalian/proses/(:num)', 'Pengembalian::proses/$1');

$routes->get('/logout', 'Auth::index');
$routes->get('/laporan', 'Laporan::index');
$routes->get('/laporan/export-excel', 'Laporan::exportExcel');



