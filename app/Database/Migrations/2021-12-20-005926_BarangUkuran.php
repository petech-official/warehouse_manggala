<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangUkuran extends Migration
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
            'ukuran'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_ukuran');
    }

    public function down()
    {
        $this->forge->dropTable('barang_ukuran');
    }
}
