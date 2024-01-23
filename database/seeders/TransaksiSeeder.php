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
            'nama_pasien' => "Farhan",
            'alamat' => "Surabaya",
            'no_telepon' => "085625874563",
            'tanggal_reservasi' => date("Y-m-d", strtotime('2024-01-25')),
            ],
            [
            'id_cabang' => 2,
            'id_jam_praktik' => 2,
            'nama_pasien' => "Siti",
            'alamat' => "Jogja",
            'no_telepon' => "087412587458",
            'tanggal_reservasi' => date("Y-m-d", strtotime('2024-01-26')),
            ],
    ]);
    }
}
