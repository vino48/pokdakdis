<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table            = 'jadwal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'deskripsi',
        'tanggal',
        'jam',
        'lokasi',
        'keterangan',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'judul'     => 'required|min_length[3]|max_length[255]',
        'tanggal'   => 'required|valid_date',
        'jam'       => 'required',
        'lokasi'    => 'required'
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul jadwal harus diisi',
            'min_length' => 'Judul minimal 3 karakter'
        ],
        'tanggal' => [
            'required' => 'Tanggal harus diisi',
            'valid_date' => 'Format tanggal tidak valid'
        ]
    ];

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Custom Methods
    public function getJadwalAktif()
    {
        return $this->where('status', 'aktif')
            ->orderBy('tanggal', 'ASC')
            ->findAll();
    }

    public function getJadwalByTanggal($tanggal)
    {
        return $this->where('tanggal', $tanggal)->findAll();
    }

    public function getJadwalMendatang()
    {
        return $this->where('tanggal >=', date('Y-m-d'))
            ->orderBy('tanggal', 'ASC')
            ->findAll();
    }
}