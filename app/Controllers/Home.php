<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\SettingModel;

class Home extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();
        $jadwalModel  = new JadwalModel();

        $cfg = $settingModel->getAllAsArray();

        $data = [
            'title'   => $cfg['site_title'] ?? 'PUSMENDIK',
            'data'    => $cfg,
            'jadwals' => $jadwalModel->orderBy('tanggal','ASC')->findAll(),
        ];

        return view('tata_letak/frontend', $data);
    }
}
