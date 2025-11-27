<?php
namespace App\Controllers;
use App\Models\HalamanUtamaModel;

class Beranda extends BaseController
{
    public function index()
    {
        $model = new \App\Models\HalamanUtamaModel();
        $data = $model->ambilData();
        echo view('tata_letak/utama', ['konten' => view('depan/beranda', ['data'=>$data])]);
    }

    public function helpdesk()
    {
        echo view('tata_letak/utama', ['konten' => view('depan/helpdesk')]);
    }
}
