<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HalamanUtamaModel;

class HalamanUtama extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new HalamanUtamaModel();
    }

    public function index()
    {
        // Ambil data dari JSON
        $data = $this->model->ambilData();

        return view('tata_letak/admin', [
            'konten' => view('admin/halaman-utama', ['data' => $data])
        ]);
    }

    public function simpan()
    {
        $judul        = $this->request->getPost('judul');
        $deskripsi    = $this->request->getPost('deskripsi');
        $teks_tombol  = $this->request->getPost('teks_tombol');
        $link_tombol  = $this->request->getPost('link_tombol');

        // Handle upload banner
        $berkas = $this->request->getFile('banner');
        $bannerLama = $this->model->ambilData()['banner'] ?? null;
        $lokasiUpload = 'asset/banner/';

        if ($berkas && $berkas->isValid() && !$berkas->hasMoved()) {
            $namaBaru = time() . '_' . $berkas->getName();
            $berkas->move(FCPATH . $lokasiUpload, $namaBaru);

            $bannerPath = base_url($lokasiUpload . $namaBaru);
        } else {
            $bannerPath = $bannerLama;
        }

        // Simpan ke JSON
        $this->model->simpan([
            'judul'        => $judul,
            'deskripsi'    => $deskripsi,
            'teks_tombol'  => $teks_tombol,
            'link_tombol'  => $link_tombol,
            'banner'       => $bannerPath,
            'diubah_pada'  => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Perubahan berhasil disimpan.');
    }
}
