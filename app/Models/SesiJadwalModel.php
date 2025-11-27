<?php namespace App\Models;
use CodeIgniter\Model;

class SesiJadwalModel extends Model {
    protected $table = 'sesi_jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_hari','nomor_sesi','rentang_waktu','mata_pelajaran','tingkat_kelas','catatan'];
}
