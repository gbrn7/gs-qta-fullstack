<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontenPelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('konten_pelayanan')->insert([
            [
                'judul' => 'Layanan kami',
                'deskripsi' => '',
                'thumbnail' => '',
            ],
            [
                'judul' => 'Pengobatan Akupuntur yang Aman dan Efektif',
                'deskripsi' => 'Kami menawarkan layanan akupuntur yang aman dan efektif untuk membantu Anda meredakan berbagai jenis sakit dan ketidaknyamanan. Selain itu Akupuntur dapat membantu Anda meredakan ketegangan dan merilekskan pikiran dan tubuh Anda',
                'thumbnail' => 'acupuncture-5849146_1920.jpg',
            ],
            [
                'judul' => 'Sembuhkan Cedera Anda dengan Fisioterapi yang Tepat',
                'deskripsi' => 'Kami menawarkan layanan fisioterapi yang tepat untuk membantu pasien mencapai kesehatan yang optimal. Tim kami terdiri dari fisioterapis berpengalaman yang siap membantu pasien dalam memulihkan kondisi fisik mereka.',
                'thumbnail' => 'sincerely-media-ohMu8-iQfmY-unsplash.jpg',
            ],
            [
                'judul' => 'Kurangi Berat Badan Anda dengan Treatment Pelangsing yang Aman dan Efektif',
                'deskripsi' => 'Kami memahami bahwa kelebihan berat badan dapat memengaruhi kesehatan dan kepercayaan diri Anda. Oleh karena itu, kami menawarkan treatment pelangsing yang aman dan efektif untuk membantu Anda mencapai tubuh impian Anda.',
                'thumbnail' => 'sincerely-media-ohMu8-iQfmY-unsplash.jpg',
            ],
            [
                'judul' => 'Perawatan Estetik',
                'deskripsi' => 'Kami menawarkan kepada anda pelayanan perawatan estetik atau perawatan kecantikan, termasuk perawatan tubuh, dan lain-lain.',
                'thumbnail' => 'acupuncture-5849146_1920.jpg',
            ],
        ]);
    }
}
