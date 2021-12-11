<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kendaraan extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 8; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'nopol' => $faker->regexify('[D]{1}' . " " . '[0-9]{4}' . " " . '[A-Z]{2}'),
                'tipe' => $faker->randomElements(['Dobel', 'Engkel', 'Losbak', 'SS']),
                'km' => $faker->randomNumber(5, false),
                'status' => $faker->randomElements(['Ada', 'Tidak Ada', 'Perjalanan'])
            ];
            // Using Query Builder
            $this->db->table('kendaraan')->insert($data);
        }
    }
}
