<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Supplier extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'nama' => $faker->company,
                'telp' => $faker->phoneNumber,
                'alamat' => $faker->address,
            ];
            // Using Query Builder
            $this->db->table('supplier')->insert($data);
        }
    }
}
