<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'badge_text'       => 'Lembaga Resmi Terakreditasi BNSP',
            'headline'         => 'Jadi The Next Level #Professional Bersertifikasi BNSP dan Percepat Karir Profesional Anda!',
            'subheadline'      => 'LSP/LPK Sekolah Ekspor Nasional adalah lembaga sertifikasi profesi dan pelatihan ekspor berlisensi BNSP yang berpengalaman membentuk eksportir profesional Indonesia.',
            'btn_primary_text' => 'Daftar Program',
            'btn_primary_url'  => '/daftar',
            'btn_secondary_text' => 'Ikuti Sertifikasi',
            'btn_secondary_url'  => '/sertifikasi',
            'stat_1_value'     => '500+',
            'stat_1_label'     => 'Peserta Tersertifikasi',
            'stat_2_value'     => '10+',
            'stat_2_label'     => 'Skema Sertifikasi',
            'stat_3_value'     => '98%',
            'stat_3_label'     => 'Tingkat Kelulusan',
            'is_active'        => true,
        ]);
    }
}
