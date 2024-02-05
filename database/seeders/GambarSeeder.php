<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gambar')->insert([
            [
                'nama' => 'logo', 
                'gambar' => 'logo-1.png',
            ],
            [
                'nama' => 'home-bg', 
                'gambar' => 'relax-686392_1920.jpg',
            ],
        ]);
    }
}
