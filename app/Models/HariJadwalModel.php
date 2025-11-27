<?php namespace App\Models;
use CodeIgniter\Model;

class HariJadwalModel extends Model {
    protected $table = 'hari_jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomor_hari','nama_hari','tanggal','keterangan'];
}
