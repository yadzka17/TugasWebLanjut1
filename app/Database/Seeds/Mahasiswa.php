<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
class Mahasiswa extends Seeder
{
    public function run()
    {
        $mahasiswa_data = [
            [
                'npm' => '2017051066',
                'nama' => 'M. Yadzka Affan Fadhila',
                'alamat' => 'Jl. Mawar No 21',
                'deskripsi' => 'Mahasiswa',
                'created_at' => Time::now(),
                'updated_at' =>Time::now()
            ],
            [
                'npm' => '2017051077',
                'nama' => 'M. Anton',
                'alamat' => 'Jl. Mawar No 22',
                'deskripsi' => 'Mahasiswa',
                'created_at' => Time::now(),
                'updated_at' =>Time::now()
            ],
            [
                'npm' => '2017051069',
                'nama' => 'M. Acron',
                'alamat' => 'Jl. Mawar No 23',
                'deskripsi' => 'Mahasiswa',
                'created_at' => Time::now(),
                'updated_at' =>Time::now()
            ]
        ];
        // Using Query Builder
        foreach ($mahasiswa_data as $data){
            
            $this->db->table('mahasiswa')->insert($data);

        }
    }
}

