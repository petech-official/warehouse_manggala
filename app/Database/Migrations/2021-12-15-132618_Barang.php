<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
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
            ],
            'keterangan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'lot'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'grade'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'produk'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'dus'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'kg'       => [
                'type'       => 'FLOAT',
                'constraint' => '10',
            ],
            'keterangan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
