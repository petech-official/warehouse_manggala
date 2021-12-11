<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kenek extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 7; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'nama' => $faker->name($gender =  'male'),
                'telp' => $faker->phoneNumber,
                'status' => $faker->randomElements(['Ada', 'Tidak Ada', 'Perjalanan'])
            ];
            // Using Query Builder
            $this->db->table('kenek')->insert($data);
        }
    }
}
