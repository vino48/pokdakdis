<?php
namespace App\Models;

use CodeIgniter\Model;

class HalamanUtamaModel extends Model
{
    protected $filePath;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = WRITEPATH . 'halaman_utama.json';

        if (!file_exists($this->filePath)) {
            $this->buatFileDefault();
        }
    }

    private function buatFileDefault()
    {
        $this->simpan([
            'judul'       => 'Selamat Datang di PUSMENDIK',
            'deskripsi'   => 'Pusat Informasi Asesmen',
            'teks_tombol' => 'Lihat Jadwal',
            'link_tombol' => base_url('jadwal'),
            'banner'      => '',
            'diubah_pada' => date('Y-m-d H:i:s')
        ]);
    }

    public function ambilData()
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $json = file_get_contents($this->filePath);
        return json_decode($json, true) ?: [];
    }

    public function simpan(array $data)
    {
        return file_put_contents(
            $this->filePath,
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
    }
}
