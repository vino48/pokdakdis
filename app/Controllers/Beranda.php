<?php
namespace App\Controllers;

use App\Models\HalamanUtamaModel;

class Beranda extends BaseController
{
    protected $halamanModel;

    public function __construct()
    {
        $this->halamanModel = new HalamanUtamaModel();
    }

    public function index()
    {
        $data = $this->halamanModel->ambilData();

        return view('tata_letak/utama', [
            'konten' => view('depan/beranda', ['data' => $data])
        ]);
    }

    public function helpdesk()
    {
        return view('tata_letak/utama', [
            'konten' => view('depan/helpdesk')
        ]);
    }
}
