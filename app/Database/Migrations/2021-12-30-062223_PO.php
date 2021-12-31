<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PO extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_po'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_po'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'tgl_po'       => [
                'type'       => 'DATE',
            ],
            'id_supplier'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'keterangan_po'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_po', true);
        $this->forge->createTable('po');
    }

    public function down()
    {
        $this->forge->dropTable('po');
    }
}
