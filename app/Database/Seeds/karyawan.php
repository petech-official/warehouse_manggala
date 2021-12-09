<?php

namespace App\Database\Seeds;

use CodeIgniter\Config\Factory;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class karyawan extends Seeder
{
  public function run()
  {
    for ($i = 0; $i < 50; $i++) {
      $faker = \Faker\Factory::create('id_ID');
      $data = [
        'nama' => $faker->name,
        'jabatan' => 'Boss',
        'telp'  => '083822011677',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
      ];

      // Simple Queries
      // $this->db->query("INSERT INTO karyawan (nama, jabatan, telp, created_at, updated_at) VALUES(:nama:, :jabatan:, :telp:, :created_at:, :updated_at:)", $data);

      // Using Query Builder
      $this->db->table('karyawan')->insert($data);
    }
  }
}
