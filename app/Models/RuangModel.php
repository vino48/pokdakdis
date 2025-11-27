<?php namespace App\Models;
use CodeIgniter\Model;

class RuangModel extends Model {
    protected $table = 'ruang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_ruang','kapasitas_json'];
}
