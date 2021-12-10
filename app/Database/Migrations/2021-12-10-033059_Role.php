<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
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
            'status'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
