<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangGrade extends Migration
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
            'grade'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_grade');
    }

    public function down()
    {
        $this->forge->dropTable('barang_grade');
    }
}
