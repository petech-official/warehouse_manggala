<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangGrade extends Seeder
{
    public function run()
    {
        $data = [
            'grade' => 'ASTD'
        ];
        // Using Query Builder
        $this->db->table('barang_grade')->insert($data);
        $data = [
            'grade' => 'ANST'
        ];
        // Using Query Builder
        $this->db->table('barang_grade')->insert($data);
    }
}
