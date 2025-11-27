<?php namespace App\Models;
use CodeIgniter\Model;

class PengawasModel extends Model {
    protected $table = 'pengawas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_pengawas'];
}
