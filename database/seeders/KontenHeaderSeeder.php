<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontenHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('konten_header')->insert([
                'judul' => 'Griya Sehat Qta',
                'tagline' => 'Relaksasi dan penyembuhan alami <br/> untuk tubuh dan pikiran Anda',
                'deskripsi' => 'Kami menawarkan pelayanan kesehatan yang alami dan efektif <br/> untuk membantu Anda mencapai keseimbangan tubuh dan pikiran.',
                'teks_btn' => 'Reservasi Sekarang'
        ]);
    }
}
