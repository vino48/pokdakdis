<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // settings
        $db->table('settings')->insertBatch([
            ['k'=>'site_title','v'=>'PUSMENDIK - Pusat Informasi Asesmen'],
            ['k'=>'judul','v'=>'PUSMENDIK – Pusat Informasi Asesmen'],
            ['k'=>'deskripsi','v'=>'Sumber Informasi Asesmen SMK Darut Taqwa'],
            ['k'=>'teks_tombol','v'=>'Lihat Jadwal Ujian'],
            ['k'=>'link_tombol','v'=>'/jadwal'],
            ['k'=>'banner','v'=>'/assets/images/banner-default.png'],
        ]);

        // contoh jadwal
        $db->table('jadwal')->insertBatch([
            [
                'judul'=>'Ujian Kompetensi Teknik Mesin',
                'deskripsi'=>'Ujian teori dan praktik.',
                'tanggal'=>date('Y-m-d', strtotime('+7 days')),
                'sesi'=>'Sesi 1',
                'durasi'=>120,
                'peserta'=>30,
                'status'=>1,
                'banner'=>'/assets/images/jadwal1.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
                'judul'=>'Ujian Asesmen Elektronika',
                'deskripsi'=>'Sesi CBT laboratorium.',
                'tanggal'=>date('Y-m-d', strtotime('+14 days')),
                'sesi'=>'Sesi 2',
                'durasi'=>90,
                'peserta'=>25,
                'status'=>1,
                'banner'=>'/assets/images/jadwal2.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}