<?php

namespace Database\Seeders;

use App\Models\Asesor;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class PersonnelSeeder extends Seeder
{
    public function run(): void
    {
        // Asesors
        $asesors = [
            [
                'name'         => 'Dr. Sari Dewi Rahayu, S.E., M.M.',
                'title'        => 'Asesor Kompetensi BNSP',
                'expertise'    => 'Ekspor Produk Pertanian',
                'bio'          => 'Pengalaman lebih dari 15 tahun di bidang ekspor pertanian dan perdagangan internasional. Terlibat dalam lebih dari 200 sesi asesmen kompetensi.',
                'asesor_badge' => 'MET.OO01.017.01',
                'sort_order'   => 1,
                'is_active'    => true,
            ],
            [
                'name'         => 'Budi Santoso Wijaya, S.T., M.Sc.',
                'title'        => 'Asesor Kompetensi BNSP',
                'expertise'    => 'Ekspor Produk Manufaktur',
                'bio'          => 'Praktisi ekspor manufaktur berpengalaman dengan track record 12 tahun di industri tekstil dan garmen ekspor internasional.',
                'asesor_badge' => 'MET.OO01.018.01',
                'sort_order'   => 2,
                'is_active'    => true,
            ],
            [
                'name'         => 'Riya Natasya Putri, S.H., M.H.',
                'title'        => 'Asesor Kompetensi BNSP',
                'expertise'    => 'Hukum & Regulasi Ekspor',
                'bio'          => 'Ahli hukum perdagangan internasional dan regulasi ekspor impor. Konsultan terpercaya bagi lebih dari 50 perusahaan eksportir.',
                'asesor_badge' => 'MET.OO01.019.01',
                'sort_order'   => 3,
                'is_active'    => true,
            ],
        ];

        foreach ($asesors as $asesor) {
            Asesor::create($asesor);
        }

        // Team Members
        $team = [
            ['name' => 'Ahmad Pratama', 'position' => 'Direktur Utama', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Siti Nurhaliza', 'position' => 'Direktur LSP', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Rizal Fadli', 'position' => 'Manajer Sertifikasi', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Dewi Anggraini', 'position' => 'Manajer Mutu', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'Nur Azizah', 'position' => 'Manajer Administrasi', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'Fikri Ramadhan', 'position' => 'Komite Skema', 'sort_order' => 6, 'is_active' => true],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }
    }
}
