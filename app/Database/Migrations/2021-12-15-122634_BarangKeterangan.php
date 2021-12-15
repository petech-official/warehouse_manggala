<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangKeterangan extends Migration
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
            'keterangan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_keterangan');
    }

    public function down()
    {
        $this->forge->dropTable('barang_keterangan');
    }
}
