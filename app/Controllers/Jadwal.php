<?php

namespace App\Controllers;

use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
    }

    public function index()
    {
        // Ambil semua jadwal, urutkan berdasarkan tanggal
        $jadwals = $this->jadwalModel
            ->orderBy('tanggal', 'ASC')
            ->findAll();

        $data = [
            'title' => 'Jadwal Asesmen - PUSMENDIK',
            'jadwals' => $jadwals
        ];

        return view('depan/jadwal', $data);
    }

    public function detail($id)
    {
        $jadwal = $this->jadwalModel->find($id);

        if (!$jadwal) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Detail Jadwal - ' . $jadwal['judul'],
            'jadwal' => $jadwal
        ];

        return view('depan/jadwal_detail', $data);
    }

    public function ringkasan()
    {
        // Jadwal untuk hari ini dan besok
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day'));

        $jadwalHariIni = $this->jadwalModel
            ->where('tanggal', $today)
            ->findAll();

        $jadwalBesok = $this->jadwalModel
            ->where('tanggal', $tomorrow)
            ->findAll();

        $data = [
            'title' => 'Ringkasan Jadwal - PUSMENDIK',
            'jadwalHariIni' => $jadwalHariIni,
            'jadwalBesok' => $jadwalBesok
        ];

        return view('depan/jadwal_ringkasan', $data);
    }
}