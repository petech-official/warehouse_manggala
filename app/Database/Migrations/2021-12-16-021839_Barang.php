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
            'id_jenis'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_keterangan'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'lot'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'id_grade'       => [
                'type'       => 'INT',
                'constraint' => '11',
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
            'keterangan_dus'       => [
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
