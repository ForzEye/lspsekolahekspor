<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SertifikasiStatistic;

class SertifikasiStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_program' => 'PENENTUAN KEBUTUHAN PELATIHAN KERJA', 'peserta_kompeten' => 98, 'peserta_belum_kompeten' => 0, 'sort_order' => 1],
            ['nama_program' => 'PERANCANGAN PROGRAM PELATIHAN KERJA', 'peserta_kompeten' => 215, 'peserta_belum_kompeten' => 0, 'sort_order' => 2],
            ['nama_program' => 'PELAKSANAAN PROGRAM PELATIHAN', 'peserta_kompeten' => 2781, 'peserta_belum_kompeten' => 18, 'sort_order' => 3],
            ['nama_program' => 'PELAKSANAAN COACHING DIMENSI INTELEKTUAL', 'peserta_kompeten' => 83, 'peserta_belum_kompeten' => 0, 'sort_order' => 4],
            ['nama_program' => 'PELAKSANAAN COACHING DIMENSI EMOSIONAL & SPIRITUAL', 'peserta_kompeten' => 837, 'peserta_belum_kompeten' => 4, 'sort_order' => 5],
            ['nama_program' => 'PELAKSANAAN COACHING BISNIS', 'peserta_kompeten' => 3, 'peserta_belum_kompeten' => 0, 'sort_order' => 6],
            ['nama_program' => 'PELAKSANAAN HIPNOTERAPI', 'peserta_kompeten' => 175, 'peserta_belum_kompeten' => 0, 'sort_order' => 7],
            ['nama_program' => 'OKUPASI INSTRUKTUR JUNIOR (LEVEL 3)', 'peserta_kompeten' => 841, 'peserta_belum_kompeten' => 0, 'sort_order' => 8],
            ['nama_program' => 'OKUPASI PELATIH DI TEMPAT KERJA (LEVEL 3)', 'peserta_kompeten' => 8, 'peserta_belum_kompeten' => 0, 'sort_order' => 9],
            ['nama_program' => 'OKUPASI PENYELENGGARA PELATIHAN (LEVEL 3)', 'peserta_kompeten' => 2, 'peserta_belum_kompeten' => 0, 'sort_order' => 10],
            ['nama_program' => 'OKUPASI INSTRUKTUR (LEVEL 4)', 'peserta_kompeten' => 260, 'peserta_belum_kompeten' => 2, 'sort_order' => 11],
            ['nama_program' => 'OKUPASI INSTRUKTUR PENYELIA (LEVEL 4)', 'peserta_kompeten' => 5, 'peserta_belum_kompeten' => 0, 'sort_order' => 12],
            ['nama_program' => 'OKUPASI PENGAJAR VOKASI (LEVEL 4)', 'peserta_kompeten' => 4, 'peserta_belum_kompeten' => 0, 'sort_order' => 13],
            ['nama_program' => 'OKUPASI INSTRUKTUR SENIOR (LEVEL 5)', 'peserta_kompeten' => 28, 'peserta_belum_kompeten' => 0, 'sort_order' => 14],
            ['nama_program' => 'OKUPASI INSTRUKTUR MASTER (LEVEL 6)', 'peserta_kompeten' => 39, 'peserta_belum_kompeten' => 0, 'sort_order' => 15],
        ];

        foreach ($data as $item) {
            SertifikasiStatistic::updateOrCreate(
                ['nama_program' => $item['nama_program']],
                $item
            );
        }
    }
}
