<?php

namespace App\Database\Migrations;

use CodeIgniter\Config\Factory;
use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class MigrateKaryawan extends Migration
{
    public function up()
    {
        
        
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jabatan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'telp' => [
                'type' => 'INT',                
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
