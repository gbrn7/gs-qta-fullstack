<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('informasi')->insert([
            'judul' => 'Pemberitahuan',
            'deskripsi' => 'Libur imlek pada tanggal 10 - 12 Februari',
            'status' => false
        ]);
    }
}
