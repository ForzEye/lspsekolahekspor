<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    public function up(): void
    {
        $settings = [
            ['key' => 'stats_alumni_value', 'value' => '500+', 'type' => 'text', 'label' => 'Statistik Alumni (Angka)', 'group' => 'statistik'],
            ['key' => 'stats_alumni_label', 'value' => 'Certified Alumni', 'type' => 'text', 'label' => 'Statistik Alumni (Label)', 'group' => 'statistik'],
            ['key' => 'stats_alumni_desc', 'value' => 'Verified by BNSP', 'type' => 'text', 'label' => 'Statistik Alumni (Deskripsi)', 'group' => 'statistik'],

            ['key' => 'stats_success_value', 'value' => '98.5%', 'type' => 'text', 'label' => 'Statistik Success Rate (Angka)', 'group' => 'statistik'],
            ['key' => 'stats_success_label', 'value' => 'Success Rate', 'type' => 'text', 'label' => 'Statistik Success Rate (Label)', 'group' => 'statistik'],
            ['key' => 'stats_success_desc', 'value' => 'Proven training quality', 'type' => 'text', 'label' => 'Statistik Success Rate (Deskripsi)', 'group' => 'statistik'],

            ['key' => 'stats_schemes_value', 'value' => '10+', 'type' => 'text', 'label' => 'Statistik Skema Global (Angka)', 'group' => 'statistik'],
            ['key' => 'stats_schemes_label', 'value' => 'Global Schemes', 'type' => 'text', 'label' => 'Statistik Skema Global (Label)', 'group' => 'statistik'],
            ['key' => 'stats_schemes_desc', 'value' => 'International trade standards', 'type' => 'text', 'label' => 'Statistik Skema Global (Deskripsi)', 'group' => 'statistik'],

            ['key' => 'stats_experience_value', 'value' => '15+', 'type' => 'text', 'label' => 'Statistik Pengalaman (Angka)', 'group' => 'statistik'],
            ['key' => 'stats_experience_label', 'value' => 'Years Experience', 'type' => 'text', 'label' => 'Statistik Pengalaman (Label)', 'group' => 'statistik'],
            ['key' => 'stats_experience_desc', 'value' => 'Trusted market authority', 'type' => 'text', 'label' => 'Statistik Pengalaman (Deskripsi)', 'group' => 'statistik'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }

    public function down(): void
    {
        $keys = [
            'stats_alumni_value', 'stats_alumni_label', 'stats_alumni_desc',
            'stats_success_value', 'stats_success_label', 'stats_success_desc',
            'stats_schemes_value', 'stats_schemes_label', 'stats_schemes_desc',
            'stats_experience_value', 'stats_experience_label', 'stats_experience_desc'
        ];
        Setting::whereIn('key', $keys)->delete();
    }
};
