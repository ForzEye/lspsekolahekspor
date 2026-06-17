<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Sertifikasi Kompetensi Ekspor BNSP 2024',
                'category' => 'Sertifikasi',
                'type' => 'image',
                'media_path' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070&auto=format&fit=crop', // Temporary online placeholder
                'description' => 'Pelaksanaan uji kompetensi skema Manager Ekspor tahap pertama di tahun 2024.',
                'date' => '2024-03-15',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Workshop Strategi Penetrasi Pasar Global',
                'category' => 'Pelatihan',
                'type' => 'image',
                'media_path' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2070&auto=format&fit=crop',
                'description' => 'Membahas tuntas cara memasuki pasar Eropa dan Amerika untuk produk UMKM.',
                'date' => '2024-04-10',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'LSP Sekolah Ekspor Integrated System Training',
                'category' => 'Internal',
                'type' => 'image',
                'media_path' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=2070&auto=format&fit=crop',
                'description' => 'Pelatihan penggunaan platform manajemen LSP untuk seluruh asesor dan admin.',
                'date' => '2024-04-05',
                'is_featured' => true,
                'order' => 3,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}
