<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
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
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '12',
            ],
            'status'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
