<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');
$routes->get('/kamar', 'Home::kamar');
$routes->get('/fasilitas', 'Home::fasilitas');
$routes->get('/reservasi', 'Home::reservasi');
$routes->post('/reservasi', 'Home::reservasi');
$routes->get('/reservasi/print', 'Home::print');
$routes->get('/inv/(:num)', 'Home::invoice/$1');
$routes->get('/cek', 'Home::cari');
$routes->post('/cek', 'Home::cari');

$routes->get('/login', 'PetugasController::index');
$routes->post('/auth', 'PetugasController::login');
$routes->get('/logout', 'PetugasController::logout');
$routes->get('/petugas/dashboard', 'Dashboardpetugas::index',['filter'=>'otentifikasi']);

// route Reservasi Petugas
$routes->get('/reservasi/petugas', 'ReservasiController::index',['filter'=>'otentifikasi']);
$routes->post('/reservasi/petugas', 'ReservasiController::index',['filter'=>'otentifikasi']);
$routes->get('/reservasi/edit/(:num)', 'ReservasiController::edit/$1',['filter'=>'otentifikasi']);
$routes->get('/reservasi/in/(:num)', 'ReservasiController::in/$1',['filter'=>'otentifikasi']);
$routes->get('/reservasi/out/(:num)', 'ReservasiController::out/$1',['filter'=>'otentifikasi']);
$routes->post('/reservasi/out', 'ReservasiController::out',['filter'=>'otentifikasi']);

// route CRUD Kamar
$routes->get('/kamar/tampil', 'KamarController::index',['filter'=>'otentifikasi']);
$routes->get('/kamar/tambah', 'KamarController::tambahKamar',['filter'=>'otentifikasi']);
$routes->post('/kamar/tambah', 'KamarController::tambahKamar',['filter'=>'otentifikasi']);
$routes->get('/kamar/edit/(:num)', 'KamarController::editKamar/$1',['filter'=>'otentifikasi']);
$routes->post('/kamar/edit', 'KamarController::editKamar',['filter'=>'otentifikasi']);
$routes->get('/kamar/hapus/(:num)', 'KamarController::hapusKamar/$1',['filter'=>'otentifikasi']);

// route CRUD Fasilitas Kamar
$routes->get('/fasilitas/tampil', 'FasilitasKamarController::index',['filter'=>'otentifikasi']);
$routes->get('/fasilitas/tambah', 'FasilitasKamarController::tambah',['filter'=>'otentifikasi']);
$routes->post('/fasilitas/tambah', 'FasilitasKamarController::tambah',['filter'=>'otentifikasi']);
$routes->get('/fasilitas/edit/(:num)', 'FasilitasKamarController::edit/$1',['filter'=>'otentifikasi']);
$routes->post('/fasilitas/edit', 'FasilitasKamarController::edit',['filter'=>'otentifikasi']);
$routes->get('/fasilitas/hapus/(:num)', 'FasilitasKamarController::hapus/$1',['filter'=>'otentifikasi']);

// route CRUD Fasilitas Hotel
$routes->get('/fasilitashotel', 'FasilitasHotelController::index',['filter'=>'otentifikasi']);
$routes->get('/fasilitashotel/tambah', 'FasilitasHotelController::tambah',['filter'=>'otentifikasi']);
$routes->post('/fasilitashotel/tambah', 'FasilitasHotelController::tambah',['filter'=>'otentifikasi']);
$routes->get('/fasilitashotel/edit/(:num)', 'FasilitasHotelController::edit/$1',['filter'=>'otentifikasi']);
$routes->post('/fasilitashotel/edit', 'FasilitasHotelController::edit',['filter'=>'otentifikasi']);
$routes->get('/fasilitashotel/hapus/(:num)', 'FasilitasHotelController::hapus/$1',['filter'=>'otentifikasi']);




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
