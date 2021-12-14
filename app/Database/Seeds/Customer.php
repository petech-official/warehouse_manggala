<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Customer extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'nama' => $faker->company,
                'telp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                // 'km' => $faker->randomNumber(3, false),
                // 'waktu' => $faker->time()
            ];
            // Using Query Builder
            $this->db->table('customer')->insert($data);
        }
    }
}
