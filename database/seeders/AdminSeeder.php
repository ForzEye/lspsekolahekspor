<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sekolahekspor.id'],
            [
                'name'     => 'Administrator',
                'email'    => 'admin@sekolahekspor.id',
                'password' => Hash::make('admin123'),
                // NOTE: Ganti password ini di .env untuk production!
            ]
        );
    }
}
