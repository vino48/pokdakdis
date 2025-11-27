<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dasbor extends BaseController
{
    protected function cekAuth()
    {
        return session()->has('pengguna');
    }

    public function index()
    {
        if (!$this->cekAuth()) return redirect()->to('/admin');
        echo view('tata_letak/admin', ['konten'=>view('admin/dasbor')]);
    }
}
