<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection.
$routes = Services::routes();

// Router Setup (opsional tapi direkomendasikan)
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false); // set true jika ingin auto-routing

// Frontend
$routes->get('/', 'Home::index');
$routes->get('jadwal', 'Jadwal::index');
$routes->get('jadwal/(:num)', 'Jadwal::detail/$1');

// Jika Anda pakai controller Beranda::helpdesk
$routes->get('helpdesk', 'Beranda::helpdesk');

// Admin Auth
$routes->get('admin', 'Admin\Masuk::index');
$routes->post('admin/masuk', 'Admin\Masuk::proses');
$routes->get('admin/keluar', 'Admin\Masuk::keluar');

// Admin Dashboard
$routes->get('admin/dasbor', 'Admin\Dasbor::index');

// Admin Halaman Utama
$routes->get('admin/halaman-utama', 'Admin\HalamanUtama::index');
$routes->post('admin/halaman-utama', 'Admin\HalamanUtama::simpan');

// Admin Jadwal CRUD
$routes->get('admin/jadwal', 'Admin\JadwalAdmin::index');
$routes->get('admin/jadwal/tambah', 'Admin\JadwalAdmin::tambah');
$routes->post('admin/jadwal/tambah', 'Admin\JadwalAdmin::simpan');
$routes->get('admin/jadwal/edit/(:num)', 'Admin\JadwalAdmin::edit/$1');
$routes->post('admin/jadwal/edit/(:num)', 'Admin\JadwalAdmin::update/$1');
$routes->post('admin/jadwal/hapus/(:num)', 'Admin\JadwalAdmin::hapus/$1');
