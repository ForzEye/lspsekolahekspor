<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class ContactAndSettingSeeder extends Seeder
{
    public function run(): void
    {
        // Contact Info
        ContactInfo::create([
            'address' => 'Jl. Ekspor Nasional No. 1, Jakarta Selatan, DKI Jakarta 12345',
            'email' => 'info@sekolahekspor.id',
            'whatsapp' => '6281234567890',
            'phone' => '021-12345678',
            'maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2916971919244!2d106.82749931476918!3d-6.208540995494847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3d22efbee07%3A0xb4fbb8d4efa8cf31!2sJakarta!5e0!3m2!1sid!2sid!4v1234567890',
            'instagram' => 'https://instagram.com/sekolah_ekspor',
            'linkedin' => 'https://linkedin.com/company/sekolah-ekspor-nasional',
            'youtube' => 'https://youtube.com/@sekolahekspor',
            'office_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB',
        ]);

        // Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'LSP/LPK Sekolah Ekspor Nasional', 'type' => 'text', 'label' => 'Nama Situs', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Lembaga Sertifikasi & Pelatihan Ekspor Nasional', 'type' => 'text', 'label' => 'Tagline Situs', 'group' => 'general'],
            ['key' => 'meta_description', 'value' => 'LSP/LPK Sekolah Ekspor Nasional — Lembaga sertifikasi profesi dan pelatihan ekspor berlisensi BNSP. Dapatkan sertifikasi ekspor resmi dan tingkatkan karir profesional Anda.', 'type' => 'text', 'label' => 'Meta Deskripsi', 'group' => 'seo'],
            ['key' => 'whatsapp_register_url', 'value' => 'https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20mendaftar%20program%20sertifikasi', 'type' => 'text', 'label' => 'URL WhatsApp Daftar', 'group' => 'general'],
            ['key' => 'google_form_url', 'value' => 'https://forms.google.com', 'type' => 'text', 'label' => 'URL Google Form Daftar', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => null, 'type' => 'image', 'label' => 'Logo Situs', 'group' => 'general'],
            ['key' => 'footer_text', 'value' => '© ' . date('Y') . ' LSP/LPK Sekolah Ekspor Nasional. Semua hak dilindungi.', 'type' => 'text', 'label' => 'Teks Footer', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
