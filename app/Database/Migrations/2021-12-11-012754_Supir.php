<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Supir extends Migration
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
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('supir');
    }

    public function down()
    {
        $this->forge->dropTable('supir');
    }
}
