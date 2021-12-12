<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kenek extends Migration
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
            'telp'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'status'       => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ], 'keterangan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kenek');
    }

    public function down()
    {
        $this->forge->dropTable('kenek');
    }
}
