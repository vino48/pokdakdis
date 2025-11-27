<?php
namespace App\Controllers;
use App\Models\JadwalModel;

class Jadwal extends BaseController
{
    public function index()
    {
        $m = new JadwalModel();
        $daftar = $m->orderBy('tanggal','ASC')->findAll();
        echo view('tata_letak/utama', ['konten' => view('depan/jadwal', ['daftar'=>$daftar])]);
    }

    public function detail($id=null)
    {
        $m = new JadwalModel();
        $item = $m->find($id);
        if (!$item) return redirect()->to('/jadwal');
        echo view('tata_letak/utama', ['konten' => view('depan/jadwal_detail', ['item'=>$item])]);
    }
}
