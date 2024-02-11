<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CabangSeeder::class,
            JamPraktikSeeder::class,
            TransaksiSeeder::class,
            KontenPelayananSeeder::class,
            KontenHeaderSeeder::class,
            GambarSeeder::class,
            InformasiSeeder::class,
            SosmedSeeder::class,
        ]);
    }
}
