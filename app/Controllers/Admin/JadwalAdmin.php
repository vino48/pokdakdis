<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalModel;

class JadwalAdmin extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new JadwalModel();
    }

    protected function cekAuth()
    {
        return session()->has('pengguna');
    }

    public function index()
    {
        if (! $this->cekAuth()) return redirect()->to('/admin');
        $jadwal = $this->model->orderBy('tanggal','ASC')->findAll();
        echo view('tata_letak/admin', ['konten' => view('admin/jadwal_index', ['jadwal' => $jadwal])]);
    }

    public function tambah()
    {
        if (! $this->cekAuth()) return redirect()->to('/admin');
        echo view('tata_letak/admin', ['konten' => view('admin/jadwal_tambah')]);
    }

    public function simpan()
    {
        if (! $this->cekAuth()) return redirect()->to('/admin');
        $this->model->save([
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal'   => $this->request->getPost('tanggal'),
            'jam'       => $this->request->getPost('jam'),
            'lokasi'    => $this->request->getPost('lokasi'),
            'keterangan'=> $this->request->getPost('keterangan'),
        ]);
        return redirect()->to('/admin/jadwal')->with('success','Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if (! $this->cekAuth()) return redirect()->to('/admin');
        $data = $this->model->find($id);
        echo view('tata_letak/admin', ['konten' => view('admin/jadwal_edit', ['data' => $data])]);
    }

    public function update($id)
    {
        if (! $this->cekAuth()) return redirect()->to('/admin');
        $this->model->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal'   => $this->request->getPost('tanggal'),
            'jam'       => $this->request->getPost('jam'),
            'lokasi'    => $this->request->getPost('lokasi'),
            'keterangan'=> $this->request->getPost('keterangan'),
        ]);
        return redirect()->to('/admin/jadwal')->with('success','Jadwal diperbarui.');
    }

    public function hapus($id)
    {
        if (! $this->cekAuth()) return redirect()->to('/admin');
        $this->model->delete($id);
        return redirect()->to('/admin/jadwal')->with('success','Jadwal dihapus.');
    }

    public function data()
    {
        if (! $this->cekAuth()) return redirect()->to('/admin');
        $jadwals = $this->model->orderBy('tanggal','ASC')->findAll();
        echo view('tata_letak/admin', ['konten' => view('admin/jadwal_data', ['jadwals' => $jadwals])]);
    }
}