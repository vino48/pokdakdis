<?php

namespace App\Models;

class HalamanUtamaModel
{
    protected $filePath;

    public function __construct()
    {
        $this->filePath = WRITEPATH . 'halaman_utama.json';
        
        // Buat file default jika belum ada
        if (!file_exists($this->filePath)) {
            $this->createDefaultFile();
        }
    }

    public function getData()
    {
        $json = file_get_contents($this->filePath);
        return json_decode($json, true);
    }

    public function saveData($data)
    {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        return file_put_contents($this->filePath, $json);
    }

    protected function createDefaultFile()
    {
        $defaultData = [
            'hero_title' => 'PUSMENDIK – Pusat Informasi Asesmen',
            'hero_subtitle' => 'Sumber Informasi Resmi Asesmen Sekolah SMK Darut Taqwa',
            'sambutan_ketua' => 'Selamat datang di sistem asesmen PUSMENDIK...',
            'banner_image' => '',
            'statistik' => [
                'peserta' => '1200+',
                'kompetensi' => '15',
                'kelulusan' => '98%'
            ]
        ];
        
        $this->saveData($defaultData);
    }
}
