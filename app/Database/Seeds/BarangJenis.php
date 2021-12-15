<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangJenis extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 12; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'jenis' => $faker->randomNumber(3, false) . ' / ' . $faker->randomNumber(3, false),
            ];
            // Using Query Builder
            $this->db->table('barang_jenis')->insert($data);
        }
    }
}
