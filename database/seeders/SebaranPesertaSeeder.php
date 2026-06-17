<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SebaranPeserta;

class SebaranPesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_wilayah' => 'Banda Aceh', 'latitude' => 5.548292, 'longitude' => 95.323756, 'jumlah_peserta' => 45],
            ['nama_wilayah' => 'Medan', 'latitude' => 3.595196, 'longitude' => 98.672223, 'jumlah_peserta' => 180],
            ['nama_wilayah' => 'Pekanbaru', 'latitude' => 0.507068, 'longitude' => 101.447779, 'jumlah_peserta' => 65],
            ['nama_wilayah' => 'Padang', 'latitude' => -0.947075, 'longitude' => 100.417181, 'jumlah_peserta' => 55],
            ['nama_wilayah' => 'Palembang', 'latitude' => -2.976074, 'longitude' => 104.775431, 'jumlah_peserta' => 95],
            ['nama_wilayah' => 'Bandar Lampung', 'latitude' => -5.397140, 'longitude' => 105.266792, 'jumlah_peserta' => 70],
            ['nama_wilayah' => 'DKI Jakarta', 'latitude' => -6.208763, 'longitude' => 106.845599, 'jumlah_peserta' => 1250],
            ['nama_wilayah' => 'Bandung', 'latitude' => -6.917464, 'longitude' => 107.619123, 'jumlah_peserta' => 840],
            ['nama_wilayah' => 'Semarang', 'latitude' => -6.966667, 'longitude' => 110.416664, 'jumlah_peserta' => 530],
            ['nama_wilayah' => 'Yogyakarta', 'latitude' => -7.795580, 'longitude' => 110.369490, 'jumlah_peserta' => 420],
            ['nama_wilayah' => 'Surabaya', 'latitude' => -7.257472, 'longitude' => 112.752088, 'jumlah_peserta' => 950],
            ['nama_wilayah' => 'Denpasar', 'latitude' => -8.670458, 'longitude' => 115.212629, 'jumlah_peserta' => 140],
            ['nama_wilayah' => 'Pontianak', 'latitude' => -0.026330, 'longitude' => 109.342503, 'jumlah_peserta' => 110],
            ['nama_wilayah' => 'Banjarmasin', 'latitude' => -3.316694, 'longitude' => 114.590111, 'jumlah_peserta' => 125],
            ['nama_wilayah' => 'Samarinda', 'latitude' => -0.494860, 'longitude' => 117.143615, 'jumlah_peserta' => 160],
            ['nama_wilayah' => 'Makassar', 'latitude' => -5.147665, 'longitude' => 119.432732, 'jumlah_peserta' => 310],
            ['nama_wilayah' => 'Palu', 'latitude' => -0.891700, 'longitude' => 119.870700, 'jumlah_peserta' => 48],
            ['nama_wilayah' => 'Manado', 'latitude' => 1.482180, 'longitude' => 124.848624, 'jumlah_peserta' => 85],
            ['nama_wilayah' => 'Kupang', 'latitude' => -10.177200, 'longitude' => 123.607800, 'jumlah_peserta' => 35],
            ['nama_wilayah' => 'Ambon', 'latitude' => -3.695400, 'longitude' => 128.181400, 'jumlah_peserta' => 40],
            ['nama_wilayah' => 'Sorong', 'latitude' => -0.875600, 'longitude' => 131.251400, 'jumlah_peserta' => 30],
            ['nama_wilayah' => 'Jayapura', 'latitude' => -2.591600, 'longitude' => 140.718100, 'jumlah_peserta' => 65],
        ];

        // Clear existing to avoid duplicate name constraint errors
        SebaranPeserta::truncate();

        foreach ($data as $item) {
            SebaranPeserta::create($item);
        }
    }
}
