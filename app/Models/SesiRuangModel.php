<?php namespace App\Models;
use CodeIgniter\Model;

class SesiRuangModel extends Model {
    protected $table = 'sesi_ruang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_sesi','id_ruang','id_pengawas','kapasitas'];
}
