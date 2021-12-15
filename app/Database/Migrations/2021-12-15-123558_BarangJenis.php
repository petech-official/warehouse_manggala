<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangJenis extends Migration
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
            'jenis'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_jenis');
    }

    public function down()
    {
        $this->forge->dropTable('barang_jenis');
    }
}
