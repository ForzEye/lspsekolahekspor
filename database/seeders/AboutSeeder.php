<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'label'         => 'TENTANG KAMI',
            'heading'       => 'LSP/LPK Sekolah Ekspor Nasional',
            'description'   => 'Kami adalah lembaga sertifikasi profesi (LSP) dan lembaga pelatihan kerja (LPK) yang berfokus pada bidang ekspor-impor di Indonesia. Berlisensi resmi dari Badan Nasional Sertifikasi Profesi (BNSP), kami berkomitmen mencetak tenaga profesional ekspor yang kompeten dan berdaya saing global.',
            'highlights'    => [
                'Berlisensi resmi BNSP',
                'Lebih dari 10 tahun pengalaman di bidang ekspor',
                '500+ alumni tersertifikasi di seluruh Indonesia',
                'Jaringan mitra industri ekspor terpercaya',
                'Pengajar berpengalaman & praktisi ekspor aktif',
            ],
            'vision_title'   => 'Visi Kami',
            'vision_content' => 'Menjadi lembaga sertifikasi dan pelatihan ekspor terkemuka di Indonesia yang melahirkan eksportir profesional berstandar internasional guna mendukung pertumbuhan ekspor nasional.',
            'mission_title'  => 'Misi Kami',
            'mission_items'  => [
                'Menyelenggarakan program sertifikasi profesi ekspor berstandar BNSP yang berkualitas tinggi',
                'Memberikan pelatihan praktis dan berbasis kompetensi nyata di dunia ekspor',
                'Membangun ekosistem kolaborasi antara pelaku usaha ekspor, pemerintah, dan akademisi',
                'Mendorong lahirnya generasi eksportir muda Indonesia yang kompeten dan inovatif',
                'Memperluas akses sertifikasi ekspor hingga ke seluruh pelosok Indonesia',
            ],
            'history_title'   => 'Sejarah Singkat',
            'history_content' => 'Sekolah Ekspor Nasional berdiri dengan semangat memajukan ekspor Indonesia. Diawali dari program pelatihan kecil, kini kami telah berkembang menjadi lembaga sertifikasi profesi berlisensi BNSP yang dipercaya oleh ratusan eksportir dan pelaku usaha di seluruh nusantara.',
            'values'          => [
                ['icon' => '🎯', 'title' => 'Profesionalisme', 'desc' => 'Standar tinggi dalam setiap program sertifikasi'],
                ['icon' => '🤝', 'title' => 'Integritas', 'desc' => 'Kejujuran dan transparansi dalam setiap proses'],
                ['icon' => '💡', 'title' => 'Inovasi', 'desc' => 'Metode pembelajaran modern & relevan industri'],
                ['icon' => '🌟', 'title' => 'Keunggulan', 'desc' => 'Komitmen untuk hasil terbaik bagi peserta'],
            ],
        ]);
    }
}
