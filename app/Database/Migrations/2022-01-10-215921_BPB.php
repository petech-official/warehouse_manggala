<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BPB extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bpb'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_bpb'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'no_surat_jalan'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'no_po'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'tgl_bpb'       => [
                'type'       => 'DATE',
            ],
            'id_barang'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'no_mobil'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);
        $this->forge->addKey('id_bpb', true);
        $this->forge->createTable('bpb');
    }

    public function down()
    {
        $this->forge->dropTable('bpb');
    }
}
