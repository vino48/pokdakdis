<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class Masuk extends BaseController
{
    public function index()
    {
        echo view('tata_letak/admin', ['konten'=>view('admin/masuk')]);
    }

    public function proses()
    {
        $m = new PenggunaModel();
        $u = $this->request->getPost('nama_pengguna');
        $p = $this->request->getPost('kata_sandi');
        $user = $m->where('nama_pengguna',$u)->first();
        if ($user && password_verify($p, $user['kata_sandi'])) {
            session()->set('pengguna', ['id'=>$user['id'],'nama_pengguna'=>$user['nama_pengguna'],'nama_lengkap'=>$user['nama_lengkap']]);
            return redirect()->to('/admin/dasbor');
        }
        return redirect()->back()->with('error','Nama pengguna atau kata sandi salah.');
    }

    public function keluar()
    {
        session()->remove('pengguna');
        return redirect()->to('/admin');
    }
}
