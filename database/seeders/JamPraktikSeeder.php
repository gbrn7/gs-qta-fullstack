<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JamPraktikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jam_praktik')->insert([
            [
            'id_cabang' => 1,
            'jam_mulai' => date("h:i:s", strtotime('09.00')),
            'jam_selesai' => date("h:i:s", strtotime('11.00')),
            'kuota' =>  2,
            'status' =>  1,
            ],
            [
            'id_cabang' => 1,
            'jam_mulai' => date("h:i:s", strtotime('13.00')),
            'jam_selesai' => date("h:i:s", strtotime('14.00')),
            'kuota' =>  2,
            'status' =>  1,
            ],
            [
            'id_cabang' => 2,
            'jam_mulai' => date("h:i:s", strtotime('09.00')),
            'jam_selesai' => date("h:i:s", strtotime('11.00')),
            'kuota' =>  3,
            'status' =>  1,
            ],
            [
            'id_cabang' => 2,
            'jam_mulai' => date("h:i:s", strtotime('13.00')),
            'jam_selesai' => date("h:i:s", strtotime('14.00')),
            'kuota' =>  4,
            'status' =>  0,
            ],
    ]);
    }
}
