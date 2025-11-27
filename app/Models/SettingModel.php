<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['k', 'v'];

    public function getAllAsArray()
    {
        $rows = $this->findAll();
        $out  = [];
        foreach ($rows as $r) {
            $out[$r['k']] = $r['v'];
        }
        return $out;
    }
}