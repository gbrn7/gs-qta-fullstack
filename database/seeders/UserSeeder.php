<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'Bagus',
            'email' => 'Bagus@gmail.com',
            'password' =>Crypt::encryptString('admin123'),
            'no_telepon' => '082132679938',
            'role' => 'admin',
        ]);
    }
}
