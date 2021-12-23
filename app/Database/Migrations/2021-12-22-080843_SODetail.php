<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SODetail extends Migration
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
            'id_so'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_barang'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'quantitas'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('so_detail');
    }

    public function down()
    {
        $this->forge->dropTable('so_detail');
    }
}
