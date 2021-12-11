<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kendaraan extends Migration
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
            'nopol'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'tipe'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'km'       => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'status'       => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kendaraan');
    }

    public function down()
    {
        $this->forge->dropTable('kendaraan');
    }
}
