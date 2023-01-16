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
$routes->post('/views-home', 'Home::view_home'); 

$routes->get('/profil', 'Profil::index');



$routes->get('/kas', 'Iuran::index', ['filter' => 'role:bendahara, user, ']);
$routes->post('/kas', 'Iuran::index', ['filter' => 'role:bendahara, user, ']); 
$routes->get('/kas/create/(:any)', 'Iuran::create/$1', ['filter' => 'role:bendahara']);
$routes->post('/kas/tambah', 'Iuran::progress', ['filter' => 'role:bendahara']);
$routes->get('/kas/edit/(:any)', 'Iuran::edit/$1', ['filter' => 'role:bendahara']);
$routes->post('/kas/ubah/(:any)', 'Iuran::progres_update/$1', ['filter' => 'role:bendahara']);
$routes->get('/kas/hapus/(:any)', 'Iuran::delete/$1', ['filter' => 'role:bendahara']);


$routes->get('/laporan', 'Laporan::index', ['filter' => 'role:sekretaris,']);
$routes->get('/laporan/boxview-laporan', 'Laporan::views_', ['filter' => 'role:sekretaris,']);
$routes->get('/laporan/create', 'Laporan::create', ['filter' => 'role:sekretaris,']); 
$routes->post('/laporan/tambah', 'Laporan::progress', ['filter' => 'role:sekretaris,']); 
$routes->get('/laporan/edit/(:any)', 'laporan::edit/$1', ['filter' => 'role:sekretaris,']);
$routes->post('/laporan/ubah/(:any)', 'laporan::progres_update/$1', ['filter' => 'role:sekretaris,']);
$routes->get('/laporan/hapus/(:any)', 'laporan  ::delete/$1', ['filter' => 'role:sekretaris,']);




$routes->get('/anggota', 'Anggota::index', ['filter' => 'role:sekretaris, ketuadanwakil']);
$routes->get('/anggota/boxview-anggota', 'Anggota::views_anggota', ['filter' => 'role:sekretaris, ketuadanwakil']);
$routes->post('/anggota/list-view-anggota', 'Anggota::list_view_anggota', ['filter' => 'role:sekretaris, ketuadanwakil']);
$routes->get('/anggota/create', 'Anggota::create', ['filter' => 'role:sekretaris, ketuadanwakil']);
$routes->post('/anggota/tambah', 'Anggota::pogress', ['filter' => 'role:sekretaris, ketuadanwakil']);
$routes->get('/anggota/edit/(:any)', 'Anggota::edit/$1');
$routes->post('/anggota/ubah/(:any)', 'Anggota::progres_update/$1');
$routes->get('/anggota/hapus/(:any)', 'Anggota::delete/$1', ['filter' => 'role:sekretaris, ketuadanwakil']);

 
$routes->get('/presensi', 'Presensi::index', ['filter' => 'role:sekretaris, user']);
$routes->get('/presensi/create', 'Presensi::create', ['filter' => 'role:sekretaris, ']);
$routes->post('/presensi/tambah', 'Presensi::pogress', ['filter' => 'role:sekretaris, ']);
$routes->get('/presensi/view', 'Presensi::view', ['filter' => 'role:sekretaris, ']);
$routes->get('/presensi/view/boxview-presensi', 'Presensi::views_', ['filter' => 'role:sekretaris, user']);
$routes->get('/presensi/edit/(:any)', 'Presensi::edit/$1', ['filter' => 'role:sekretaris, ']);
$routes->post('/presensi/ubah/(:any)', 'Presensi::progres_update/$1', ['filter' => 'role:sekretaris, ']);
$routes->get('/presensi/hapus/(:any)', 'presensi::delete/$1', ['filter' => 'role:sekretaris, ']);



$routes->get('/kegiatan', 'Kegiatan::index', ['filter' => 'role:sekretaris, user']);
$routes->get('/kegiatan/boxview-kegiatan', 'Kegiatan::views_kegiatan', ['filter' => 'role:sekretaris, user']);
$routes->get('/kegiatan/create', 'Kegiatan::create', ['filter' => 'role:sekretaris']);
$routes->post('/kegiatan/tambah', 'Kegiatan::pogress', ['filter' => 'role:sekretaris']);
$routes->get('/kegiatan/edit/(:any)', 'Kegiatan::edit/$1', ['filter' => 'role:sekretaris']);
$routes->post('/kegiatan/ubah/(:any)', 'Kegiatan::progres_update/$1', ['filter' => 'role:sekretaris']);
$routes->get('/kegiatan/hapus/(:any)', 'Kegiatan::delete/$1', ['filter' => 'role:sekretaris']);





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
