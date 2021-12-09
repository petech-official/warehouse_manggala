<?php

namespace App\Database\Seeds;

use CodeIgniter\Config\Factory;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class user extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'username' => $faker->name,
                'password' => '1234',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];
            // Using Query Builder
            $this->db->table('user')->insert($data);
        }
    }
}
