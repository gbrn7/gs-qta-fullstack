<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
            'id_cabang' => 1,
            'id_jam_praktik' => 1,
            'jam_mulai' => date("H:i:s", strtotime('09.00')),
            'jam_selesai' => date("H:i:s", strtotime('11.00')),           
            'nama_pasien' => "Farhan",
            'alamat' => "Surabaya",
            'no_telepon' => "085625874563",
            'tanggal_reservasi' => date("Y-m-d", strtotime('2024-01-26')),
            'keluhan' => 'Nyeri Pinggang',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'id_cabang' => 1,
            'id_jam_praktik' => 2,
            'jam_mulai' => date("H:i:s", strtotime('13.00')),
            'jam_selesai' => date("H:i:s", strtotime('14.00')),
            'nama_pasien' => "Koko",
            'alamat' => "Malang",
            'no_telepon' => "074596325874",
            'tanggal_reservasi' => date("Y-m-d", strtotime('2024-01-26')),
            'keluhan' => 'Nyeri Pinggang',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'id_cabang' => 2,
            'id_jam_praktik' => 2,
            'jam_mulai' => date("H:i:s", strtotime('13.00')),
            'jam_selesai' => date("H:i:s", strtotime('14.00')),
            'nama_pasien' => "Siti",
            'alamat' => "Jogja",
            'no_telepon' => "085625874563",
            'tanggal_reservasi' => date("Y-m-d", strtotime('2024-01-27')),
            'keluhan' => 'Nyeri Pinggang',
            'created_at' => now(),
            'updated_at' => now(),
            ],
    ]);
    }
}
