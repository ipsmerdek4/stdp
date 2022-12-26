<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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


$routes->get('/', 'Home::index');


$routes->get('/iuran', 'Iuran::index');
$routes->post('/iuran', 'Iuran::index');
$routes->get('/iuran/create', 'Iuran::create'); 
$routes->post('/iuran/tambah', 'Iuran::progress'); 
 

$routes->get('/anggota', 'Anggota::index');
$routes->get('/anggota/boxview-anggota', 'Anggota::views_anggota');
$routes->post('/anggota/list-view-anggota', 'Anggota::list_view_anggota');
$routes->get('/anggota/create', 'Anggota::create');
$routes->post('/anggota/tambah', 'Anggota::pogress');
$routes->get('/anggota/edit/(:any)', 'Anggota::edit/$1');
$routes->post('/anggota/ubah/(:any)', 'Anggota::progres_update/$1');
$routes->get('/anggota/hapus/(:any)', 'Anggota::delete/$1');

 

$routes->get('/presensi', 'Presensi::index');
$routes->get('/presensi/create', 'Presensi::create');
$routes->post('/presensi/tambah', 'Presensi::pogress');
$routes->get('/presensi/view', 'Presensi::view');
$routes->get('/presensi/view/boxview-presensi', 'Presensi::views_');
$routes->get('/presensi/edit/(:any)', 'Presensi::edit/$1');
$routes->post('/presensi/ubah/(:any)', 'Presensi::progres_update/$1');
$routes->get('/presensi/hapus/(:any)', 'presensi::delete/$1');



$routes->get('/kegiatan', 'Kegiatan::index');
$routes->get('/kegiatan/boxview-kegiatan', 'Kegiatan::views_kegiatan');
$routes->get('/kegiatan/create', 'Kegiatan::create');
$routes->post('/kegiatan/tambah', 'Kegiatan::pogress');
$routes->get('/kegiatan/edit/(:any)', 'Kegiatan::edit/$1');
$routes->post('/kegiatan/ubah/(:any)', 'Kegiatan::progres_update/$1');
$routes->get('/kegiatan/hapus/(:any)', 'Kegiatan::delete/$1');





// $routes->get('/persediaan', 'Persediaan::index', ['filter' => 'role:admin,'] );    


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
