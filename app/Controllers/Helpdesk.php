<?php
namespace App\Controllers;

class Helpdesk extends BaseController
{
    public function index()
    {
        echo view('tata_letak/utama', ['konten' => view('depan/helpdesk')]);
    }
}
