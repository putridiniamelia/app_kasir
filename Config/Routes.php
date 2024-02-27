<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//untuk login
$routes->get('/', 'Login::index');
$routes->post('/','Login::prosesLogin');
$routes->get('/index-login','Login::prosesLogin');
$routes->post('/index-login','Login::prosesLogin');
$routes->post('/dashboard','Dashboard::index');

// registrasi
$routes->get('/signup','Login::signup');
$routes->post('/signup','Login::signup');

//untuk logout
$routes->get('/logout', 'Login::logout');

//untuk tampilan home
$routes->get('dashboard', 'Dashboard::index',['filter'=>'autentifikasi']);
$routes->post('dashboard', 'Dashboard::index',['filter'=>'autentifikasi']);

//untuk user
$routes->get('/lihat-user', 'User::index',['filter'=>'autentifikasi']);
$routes->get('/tambah-user', 'User::tambah',['filter'=>'autentifikasi']);
$routes->post('/simpan-user', 'User::simpanUser',['filter'=>'autentifikasi']);
$routes->get('/edit-user/(:any)', 'User::edit/$1',['filter'=>'autentifikasi']);
$routes->post('/update-user', 'User::updateUser/$1',['filter'=>'autentifikasi']);
$routes->get('/hapus-user/(:any)', 'User::hapus/$1',['filter'=>'autentifikasi']);

//untuk produk
$routes->get('/lihat-produk', 'Produk::index',['filter'=>'autentifikasi']);
$routes->get('/tambah-produk', 'Produk::tambah',['filter'=>'autentifikasi']);
$routes->post('/simpan-produk', 'Produk::simpanProduk',['filter'=>'autentifikasi']);
$routes->get('/edit-produk/(:any)', 'Produk::edit/$1',['filter'=>'autentifikasi']);
$routes->post('/update-produk', 'Produk::updateProduk/$1',['filter'=>'autentifikasi']);
$routes->get('/hapus-produk/(:any)', 'Produk::hapus/$1',['filter'=>'autentifikasi']);

//untuk kategori
$routes->get('/lihat-kategori', 'Kategori::index',['filter'=>'autentifikasi']);
$routes->get('/tambah-kategori', 'Kategori::tambah',['filter'=>'autentifikasi']);
$routes->post('/simpan-kategori', 'Kategori::simpanKategori',['filter'=>'autentifikasi']);
$routes->get('/edit-kategori/(:num)', 'Kategori::edit/$1',['filter'=>'autentifikasi']);
$routes->post('/update-kategori', 'Kategori::updateKategori/$1',['filter'=>'autentifikasi']);
$routes->get('/hapus-kategori/(:num)', 'Kategori::hapus/$1',['filter'=>'autentifikasi']);

//untuk satuan
$routes->get('/lihat-satuan', 'Satuan::index',['filter'=>'autentifikasi']);
$routes->get('/tambah-satuan', 'Satuan::tambah',['filter'=>'autentifikasi']);
$routes->post('/simpan-satuan', 'Satuan::simpanSatuan',['filter'=>'autentifikasi']);
$routes->get('/edit-satuan/(:num)', 'Satuan::edit/$1',['filter'=>'autentifikasi']);
$routes->post('/update-satuan', 'Satuan::updateSatuan/$1',['filter'=>'autentifikasi']);
$routes->get('/hapus-satuan/(:num)', 'Satuan::hapus/$1',['filter'=>'autentifikasi']);

//untuk penjualan
$routes->get('/lihat-penjualan', 'Penjualan::index',['filter'=>'autentifikasi']);
$routes->post('/lihat-penjualan/savePenjualan', 'Penjualan::savePenjualan',['filter'=>'autentifikasi']);
$routes->get('/form-bayar','Penjualan::savePembayaran',['filter'=>'autentifikasi']);
$routes->get('/lihat-penjualan/savePembayaran','Penjualan::savePembayaran',['filter'=>'autentifikasi']);
$routes->post('/lihat-penjualan/savePembayaran','Penjualan::savePembayaran',['filter'=>'autentifikasi']);
$routes->get('/hapus-detail/(:num)', 'Penjualan::hapus/$1',['filter'=>'autentifikasi']);

//untuk laporan
// $routes->get('/lihat-laporan', 'Laporan::index');
$routes->get('/lihat-laporan', 'Laporan::tampilLaporan',['filter'=>'autentifikasi']);
$routes->get('/pdf_view', 'PdfController::index',['filter'=>'autentifikasi']);
$routes->get('/pdf/generate', 'PdfController::generate',['filter'=>'autentifikasi']);