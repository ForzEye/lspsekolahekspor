<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name'       => 'Agus Hermawan',
                'position'   => 'Owner',
                'company'    => 'CV Nusantara Export',
                'content'    => 'Program sertifikasi di Sekolah Ekspor Nasional benar-benar membuka wawasan saya. Sekarang bisnis ekspor saya sudah menembus pasar Eropa dengan omset 3x lipat dari sebelumnya!',
                'rating'     => 5,
                'is_active'  => true,
                'sort_order' => 1,
            ],
            [
                'name'       => 'Rina Puspitasari',
                'position'   => 'Export Manager',
                'company'    => 'PT Maju Bersama',
                'content'    => 'Materi pelatihannya sangat praktis dan langsung bisa diterapkan. Para asesornya sangat berpengalaman dan membantu. Sertifikat BNSP yang saya dapatkan menjadi nilai tambah yang sangat signifikan.',
                'rating'     => 5,
                'is_active'  => true,
                'sort_order' => 2,
            ],
            [
                'name'       => 'Denny Prasetyo',
                'position'   => 'Direktur',
                'company'    => 'PT Global Ekspor Indonesia',
                'content'    => 'Sangat direkomendasikan bagi siapapun yang ingin terjun serius di dunia ekspor. Sistemnya terstruktur, pengajar berkompeten, dan hasil sertifikasinya diakui di tingkat nasional.',
                'rating'     => 5,
                'is_active'  => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
