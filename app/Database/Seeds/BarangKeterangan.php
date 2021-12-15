<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangKeterangan extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'keterangan' => 'SDY',
                'keterangan' => 'ITY',
                'keterangan' =>  'DTY',
            ];
            // Using Query Builder
            $this->db->table('barang_keterangan')->insert($data);
        }
    }
}
