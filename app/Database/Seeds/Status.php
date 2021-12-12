<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Status extends Seeder
{
    public function run()
    {
        $data = [
            'status' => 'Ada'
        ];
        $data = [
            'status' => 'Tidak Ada'
        ];
        $data = [
            'status' => 'Perjalanan'
        ];
        // Using Query Builder
        $this->db->table('status')->insert($data);
    }
}
