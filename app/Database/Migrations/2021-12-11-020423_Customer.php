<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
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
            'alamat'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'km'       => [
                'type'       => 'INT',
                'constraint' => '10',
            ],
            'waktu'       => [
                'type'       => 'TIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
