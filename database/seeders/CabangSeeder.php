<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabang')->insert([
            [
            'nama' => 'Klinik A',
            'alamat' => 'Jl. Rw. Indah No.2, RT.005/RW.009, Kec. Bekasi Tim., Kota Bks, Jawa Barat',
            'no_telepon' => '0821568957892',
            'status' => 1,
            ],
            [
            'nama' => 'Klinik B',
            'alamat' => 'Jl. Raya Mercedes 10 RT 001 RW 004 Desa Cicadas, Kecamatan Gunung Putri Kabupaten Bogor',
            'no_telepon' => '085587455236',
            'status' => 1,
            ],
    ]);
    }
}
