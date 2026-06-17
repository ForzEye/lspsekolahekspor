<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            HeroSeeder::class,
            AboutSeeder::class,
            ProgramSeeder::class,
            SertifikasiSeeder::class,
            PersonnelSeeder::class,
            TestimonialSeeder::class,
            ContactAndSettingSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
