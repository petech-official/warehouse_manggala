<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SO extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_so'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_so'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'tgl_so'       => [
                'type'       => 'DATE',
            ],
            'id_customer'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'alamat_kirim'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id_so', true);
        $this->forge->createTable('so');
    }

    public function down()
    {
        $this->forge->dropTable('so');
    }
}
