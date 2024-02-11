<?php

namespace Database\Seeders;

use App\Models\Sosmed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sosmed::insert([
            [
                'nama' => 'Instagram',
                'link' => 'instagram.com',
                'icon' => 'instagram-icon.png',
                'status' => 1,
            ],
            [
                'nama' => 'Facebook',
                'link' => 'facebook.com',
                'icon' => 'facebook-icon.png',
                'status' => 1,
            ],
            [
                'nama' => 'Youtube',
                'link' => 'youtube.com',
                'icon' => 'youtube-icon.png',
                'status' => 0,
            ],
        ]);
    }
}
