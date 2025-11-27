<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwalAndSettings extends Migration
{
    public function up()
    {
        // jadwal
        $this->forge->addField([
            'id'          => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'judul'       => ['type'=>'VARCHAR','constraint'=>255,'null'=>false],
            'deskripsi'   => ['type'=>'TEXT','null'=>true],
            'tanggal'     => ['type'=>'DATE','null'=>false],
            'sesi'        => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
            'durasi'      => ['type'=>'INT','null'=>true],
            'peserta'     => ['type'=>'INT','null'=>true],
            'status'      => ['type'=>'TINYINT','constraint'=>1,'default'=>1],
            'banner'      => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
            'created_at'  => ['type'=>'DATETIME','null'=>true],
            'updated_at'  => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jadwal', true);

        // settings
        $this->forge->addField([
            'id' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
            'k'  => ['type'=>'VARCHAR','constraint'=>150,'null'=>false],
            'v'  => ['type'=>'TEXT','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings', true);
    }

    public function down()
    {
        $this->forge->dropTable('jadwal', true);
        $this->forge->dropTable('settings', true);
    }
}