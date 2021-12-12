<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Role extends Seeder
{
    public function run()
    {
        $data = [
            'status' => 'Admin'
        ];
        $data = [
            'status' => 'User'
        ];

        // Using Query Builder
        $this->db->table('status')->insert($data);
    }
}
