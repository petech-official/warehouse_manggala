<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_jenis'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_ukuran'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_keterangan'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_supplier'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_lot'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_grade'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'berat'       => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => true
            ]
        ]);
        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
