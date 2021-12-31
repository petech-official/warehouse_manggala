<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PODetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_po_detail'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_po'       => [
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
            ],
            'keterangan_po_detail' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ]
        ]);
        $this->forge->addKey('id_po_detail', true);
        $this->forge->createTable('po_detail');
    }

    public function down()
    {
        $this->forge->dropTable('po_detail');
    }
}
