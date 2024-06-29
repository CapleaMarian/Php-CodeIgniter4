<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PozeSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'image'=>'/images/1.jpeg',
                'title'=>'Peisaj artistic',
                
            ],
            [
                'image'=>'/images/2.jpeg',
                'title'=>'Copac albastrui-negru',
               
            ],
            [
                'image'=>'/images/3.jpeg',
                'title'=>'Copac Minunat',
                
            ]
            ];
            $this->db->table('Poze')->insertBatch($data);
    }
}
