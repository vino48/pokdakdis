<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\HalamanUtamaModel;

class Beranda extends BaseController
{
    protected $jadwalModel;
    protected $halamanUtamaModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->halamanUtamaModel = new HalamanUtamaModel();
    }

    public function index()
    {
        // Ambil data halaman utama dari JSON
        $halamanUtama = $this->halamanUtamaModel->getData();
        
        // Ambil 3 jadwal terbaru untuk ditampilkan di beranda
        $jadwalTerbaru = $this->jadwalModel
            ->orderBy('tanggal', 'DESC')
            ->limit(3)
            ->findAll();

        $data = [
            'title' => 'PUSMENDIK - Beranda',
            'halamanUtama' => $halamanUtama,
            'jadwalTerbaru' => $jadwalTerbaru
        ];

        return view('depan/beranda', $data);
    }
}