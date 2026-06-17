<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'icon'        => '📦',
                'title'       => 'Pelatihan Ekspor Dasar',
                'description' => 'Program pelatihan komprehensif untuk pemula yang ingin memulai bisnis ekspor. Mencakup prosedur ekspor, regulasi, dokumen, dan strategi pemasaran internasional.',
                'duration'    => '3 Hari',
                'mode'        => 'Offline',
                'slug'        => 'pelatihan-ekspor-dasar',
                'sort_order'  => 1,
                'is_featured' => true,
                'is_active'   => true,
            ],
            [
                'icon'        => '🏆',
                'title'       => 'Sertifikasi BNSP Ekspor',
                'description' => 'Program sertifikasi kompetensi resmi dari BNSP di bidang ekspor impor. Dapatkan sertifikat yang diakui secara nasional dan internasional.',
                'duration'    => '2 Hari Uji Kompetensi',
                'mode'        => 'Offline',
                'slug'        => 'sertifikasi-bnsp-ekspor',
                'sort_order'  => 2,
                'is_featured' => true,
                'is_active'   => true,
            ],
            [
                'icon'        => '💻',
                'title'       => 'Pelatihan Ekspor Online',
                'description' => 'Akses program pelatihan ekspor dari mana saja. Materi lengkap, belajar mandiri dengan bimbingan mentor berpengalaman via platform digital.',
                'duration'    => '30 Hari Akses',
                'mode'        => 'Online',
                'slug'        => 'pelatihan-ekspor-online',
                'sort_order'  => 3,
                'is_featured' => true,
                'is_active'   => true,
            ],
            [
                'icon'        => '🩺',
                'title'       => 'Klinik Ekspor',
                'description' => 'Konsultasi intensif one-on-one dengan pakar ekspor. Solusi khusus untuk tantangan ekspor bisnis Anda — mulai dari regulasi hingga strategi penetrasi pasar.',
                'duration'    => 'Fleksibel',
                'mode'        => 'Hybrid',
                'slug'        => 'klinik-ekspor',
                'sort_order'  => 4,
                'is_featured' => false,
                'is_active'   => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
