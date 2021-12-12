<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerDetail extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'id_customer' => $faker->randomNumber(1, true),
                'alamat' => $faker->address,
                'km' => $faker->randomNumber(3, false),
                'waktu' => $faker->time()
            ];
            // Using Query Builder
            $this->db->table('customer_detail')->insert($data);
        }
    }
}
