<?php

namespace Database\Seeders;

use App\Models\SertifikasiSkema;
use App\Models\SertifikasiAlur;
use Illuminate\Database\Seeder;

class SertifikasiSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate old data
        SertifikasiSkema::truncate();
        SertifikasiAlur::truncate();

        // Skema
        $skemas = [
            [
                'kode'               => '0125.1/LSP-SEN/I/2023',
                'nama'               => 'Pengelolaan Bisnis Ekspor Digital',
                'description'        => 'Skema sertifikasi kompetensi untuk membekali tenaga kerja profesional di bidang pengelolaan bisnis ekspor yang terintegrasi dengan teknologi digital.',
                'level'              => 'Muda',
                'requirements'       => [
                    'Fotokopi KTP yang masih berlaku',
                    'Ijazah minimal SMA/sederajat',
                    'Pas foto 3×4 (berwarna) 2 lembar',
                    'Sertifikat Pelatihan ekspor/sertifikat kompetensi dasar',
                ],
                'metode_pelaksanaan' => 'Tatap Muka / Jarak Jauh',
                'masa_berlaku'       => '3 Tahun',
                'jumlah_unit'        => 4,
                'units'              => [
                    ['kode' => 'LOG.ED.001', 'nama' => 'Mengidentifikasi Peluang Pasar Ekspor Digital'],
                    ['kode' => 'LOG.ED.002', 'nama' => 'Mengelola Media Pemasaran Online Internasional'],
                    ['kode' => 'LOG.ED.003', 'nama' => 'Menangani Transaksi E-Commerce Ekspor'],
                    ['kode' => 'LOG.ED.004', 'nama' => 'Melakukan Komunikasi Bisnis dengan Buyer Internasional'],
                ],
                'sort_order'         => 1,
                'is_active'          => true,
            ],
            [
                'kode'               => '0125.2/LSP-SEN/I/2023',
                'nama'               => 'Pengembangan Pasar Ekspor',
                'description'        => 'Skema sertifikasi kompetensi untuk profesi yang berfokus pada analisis, riset, dan strategi perluasan pangsa pasar ekspor komoditas nasional ke kancah global.',
                'level'              => 'Muda',
                'requirements'       => [
                    'Fotokopi KTP yang masih berlaku',
                    'Ijazah minimal SMA/sederajat',
                    'Pas foto 3×4 (berwarna) 2 lembar',
                    'Portofolio riset pasar atau rencana bisnis ekspor sederhana',
                ],
                'metode_pelaksanaan' => 'Jarak Jauh',
                'masa_berlaku'       => '3 Tahun',
                'jumlah_unit'        => 4,
                'units'              => [
                    ['kode' => 'LOG.PE.001', 'nama' => 'Melakukan Riset Pasar Ekspor Potensial'],
                    ['kode' => 'LOG.PE.002', 'nama' => 'Menyusun Rencana Pemasaran Ekspor'],
                    ['kode' => 'LOG.PE.003', 'nama' => 'Mengikuti Pameran Dagang Internasional'],
                    ['kode' => 'LOG.PE.004', 'nama' => 'Melakukan Negosiasi Kontrak Dagang dengan Buyer'],
                ],
                'sort_order'         => 2,
                'is_active'          => true,
            ],
            [
                'kode'               => '0125.3/LSP-SEN/I/2023',
                'nama'               => 'Penerapan Prosedur Ekspor',
                'description'        => 'Skema sertifikasi yang menguji pemahaman taktis dan operasional mengenai tata cara, perizinan, dan kepatuhan hukum transaksi ekspor.',
                'level'              => 'Muda',
                'requirements'       => [
                    'Fotokopi KTP yang masih berlaku',
                    'Ijazah minimal D3/sederajat',
                    'Pas foto 3×4 (berwarna) 2 lembar',
                    'Surat keterangan kerja atau rekomendasi dari perusahaan ekspor',
                ],
                'metode_pelaksanaan' => 'Tatap Muka',
                'masa_berlaku'       => '3 Tahun',
                'jumlah_unit'        => 4,
                'units'              => [
                    ['kode' => 'LOG.PP.001', 'nama' => 'Mempersiapkan Dokumen Legalitas Ekspor'],
                    ['kode' => 'LOG.PP.002', 'nama' => 'Memproses Surat Keterangan Asal (SKA)'],
                    ['kode' => 'LOG.PP.003', 'nama' => 'Melaksanakan Kepabeanan Ekspor (PEB)'],
                    ['kode' => 'LOG.PP.004', 'nama' => 'Mengurus Administrasi Sertifikat Ekspor Khusus'],
                ],
                'sort_order'         => 3,
                'is_active'          => true,
            ],
            [
                'kode'               => '0125.4/LSP-SEN/I/2023',
                'nama'               => 'Pelaksanaan Prosedur dan Dokumen Kepabeanan',
                'description'        => 'Sertifikasi keahlian khusus dalam penanganan dokumen Bea Cukai (Customs clearance), klasifikasi HS Code, dan regulasi perdagangan luar negeri.',
                'level'              => 'Muda',
                'requirements'       => [
                    'Fotokopi KTP yang masih berlaku',
                    'Ijazah minimal D3/sederajat',
                    'Pas foto 3×4 (berwarna) 2 lembar',
                    'CV atau sertifikat kepabeanan dasar',
                ],
                'metode_pelaksanaan' => 'Tatap Muka / Jarak Jauh',
                'masa_berlaku'       => '3 Tahun',
                'jumlah_unit'        => 4,
                'units'              => [
                    ['kode' => 'LOG.DK.001', 'nama' => 'Menentukan Klasifikasi Barang (HS Code)'],
                    ['kode' => 'LOG.DK.002', 'nama' => 'Mengisi Dokumen Pemberitahuan Ekspor Barang (PEB)'],
                    ['kode' => 'LOG.DK.003', 'nama' => 'Mengurus Pengeluaran Barang Ekspor di Pelabuhan'],
                    ['kode' => 'LOG.DK.004', 'nama' => 'Melaksanakan Prosedur Karantina dan Cukai'],
                ],
                'sort_order'         => 4,
                'is_active'          => true,
            ],
            [
                'kode'               => '0125.5/LSP-SEN/I/2023',
                'nama'               => 'Penanganan dan Pengiriman Barang',
                'description'        => 'Sertifikasi untuk logistik ekspor, pengelolaan rantai pasok (supply chain), pengemasan kargo internasional, dan pengapalan (shipping).',
                'level'              => 'Muda',
                'requirements'       => [
                    'Fotokopi KTP yang masih berlaku',
                    'Ijazah minimal SMA/sederajat',
                    'Pas foto 3×4 (berwarna) 2 lembar',
                    'Portofolio di bidang pergudangan/logistik',
                ],
                'metode_pelaksanaan' => 'Jarak Jauh',
                'masa_berlaku'       => '3 Tahun',
                'jumlah_unit'        => 4,
                'units'              => [
                    ['kode' => 'LOG.PB.001', 'nama' => 'Merencanakan Pengiriman Cargo Ekspor'],
                    ['kode' => 'LOG.PB.002', 'nama' => 'Memilih Jasa Forwarder dan Maskapai Pelayaran'],
                    ['kode' => 'LOG.PB.003', 'nama' => 'Mengawasi Pengemasan Barang Ekspor (Stuffing)'],
                    ['kode' => 'LOG.PB.004', 'nama' => 'Mengelola Dokumen Bill of Lading (B/L)'],
                ],
                'sort_order'         => 5,
                'is_active'          => true,
            ],
            [
                'kode'               => '0125.6/LSP-SEN/I/2023',
                'nama'               => 'Penyiapan Produk Ekspor',
                'description'        => 'Sertifikasi kompetensi dalam penyesuaian standar kualitas produk, pelabelan, pengemasan, dan kesiapan produksi untuk pasar ekspor.',
                'level'              => 'Muda',
                'requirements'       => [
                    'Fotokopi KTP yang masih berlaku',
                    'Ijazah minimal SMA/sederajat',
                    'Pas foto 3×4 (berwarna) 2 lembar',
                    'Bukti kepemilikan/pengembangan produk lokal',
                ],
                'metode_pelaksanaan' => 'Tatap Muka / Jarak Jauh',
                'masa_berlaku'       => '3 Tahun',
                'jumlah_unit'        => 3,
                'units'              => [
                    ['kode' => 'LOG.SP.001', 'nama' => 'Melakukan Quality Control Produk Ekspor'],
                    ['kode' => 'LOG.SP.002', 'nama' => 'Menyesuaikan Standar Kemasan Negara Tujuan'],
                    ['kode' => 'LOG.SP.003', 'nama' => 'Mengelola Ketersediaan Pasokan Produk Ekspor'],
                ],
                'sort_order'         => 6,
                'is_active'          => true,
            ],
            [
                'kode'               => '07/LSP-SEN/VI/2024',
                'nama'               => 'Perencanaan Bisnis Ekspor',
                'description'        => 'Sertifikasi tingkat strategis dalam penyusunan studi kelayakan ekspor, analisis risiko, dan pembiayaan perdagangan internasional (trade finance).',
                'level'              => 'Muda',
                'requirements'       => [
                    'Fotokopi KTP yang masih berlaku',
                    'Ijazah minimal D3/sederajat',
                    'Pas foto 3×4 (berwarna) 2 lembar',
                    'Studi kelayakan bisnis atau proposal ekspor lengkap',
                ],
                'metode_pelaksanaan' => 'Tatap Muka',
                'masa_berlaku'       => '3 Tahun',
                'jumlah_unit'        => 4,
                'units'              => [
                    ['kode' => 'LOG.BE.001', 'nama' => 'Menyusun Analisis Kelayakan Usaha Ekspor'],
                    ['kode' => 'LOG.BE.002', 'nama' => 'Merancang Struktur Biaya dan Harga Ekspor'],
                    ['kode' => 'LOG.BE.003', 'nama' => 'Mengelola Manajemen Risiko Ekspor'],
                    ['kode' => 'LOG.BE.004', 'nama' => 'Menentukan Metode Pembayaran Ekspor Aman (L/C, CAD)'],
                ],
                'sort_order'         => 7,
                'is_active'          => true,
            ],
        ];

        foreach ($skemas as $skema) {
            SertifikasiSkema::create($skema);
        }

        // Alur Tatap Muka
        $alurTatapMuka = [
            ['step_number' => 1, 'title' => 'Pendaftaran Calon Peserta', 'description' => 'Peserta mengisi formulir pendaftaran yang disediakan oleh LSP secara online atau langsung ke kantor.', 'icon' => '📋', 'extra_label' => 'Dokumen yang diperlukan', 'extra_content' => 'Fotokopi KTP, Pas foto 3×4 berwarna, Ijazah terakhir, CV atau daftar riwayat hidup'],
            ['step_number' => 2, 'title' => 'Verifikasi Dokumen', 'description' => 'Tim LSP memverifikasi dokumen yang telah diserahkan untuk memastikan kelayakan peserta mengikuti sertifikasi.', 'icon' => '✅', 'extra_label' => 'Tujuan', 'extra_content' => 'Memastikan peserta memenuhi kriteria persyaratan sesuai dengan skema sertifikasi yang dipilih.'],
            ['step_number' => 3, 'title' => 'Pembekalan dan Asesmen Mandiri', 'description' => 'Peserta diberikan panduan dan informasi tentang skema sertifikasi serta panduan asesmen mandiri.', 'icon' => '📚', 'extra_label' => 'Tujuan', 'extra_content' => 'Membantu peserta memahami unit kompetensi yang akan diujikan dan melakukan penilaian terhadap diri sendiri.'],
            ['step_number' => 4, 'title' => 'Pelaksanaan Uji Kompetensi', 'description' => 'Asesor melaksanakan uji kompetensi sesuai dengan skema yang dipilih, meliputi tes tertulis, observasi, dan wawancara.', 'icon' => '🎯', 'extra_label' => 'Metode Uji', 'extra_content' => 'Tes tertulis (portofolio), observasi langsung, wawancara dengan asesor kompeten BNSP.'],
            ['step_number' => 5, 'title' => 'Keputusan Sertifikasi', 'description' => 'Hasil uji kompetensi dievaluasi oleh asesor untuk menentukan apakah peserta kompeten (K) atau belum kompeten (BK).', 'icon' => '⚖️', 'extra_label' => 'Dokumentasi', 'extra_content' => 'Peserta yang dinyatakan kompeten akan diusulkan untuk mendapatkan sertifikat BNSP.'],
            ['step_number' => 6, 'title' => 'Penerbitan Sertifikat BNSP', 'description' => 'Sertifikat diterbitkan oleh BNSP dan diserahkan kepada peserta melalui LSP sebagai bukti pengakuan resmi atas kompetensi.', 'icon' => '🏆', 'extra_label' => 'Estimasi Waktu', 'extra_content' => 'Penerbitan biasanya memakan waktu 2-4 minggu setelah keputusan kompetensi.'],
        ];

        foreach ($alurTatapMuka as $alur) {
            SertifikasiAlur::create(array_merge($alur, ['type' => 'tatap_muka']));
        }

        // Alur Jarak Jauh
        $alurJarakJauh = [
            ['step_number' => 1, 'title' => 'Pendaftaran Online', 'description' => 'Peserta mendaftar melalui platform digital LSP, mengisi formulir dan mengunggah dokumen persyaratan secara online.', 'icon' => '💻'],
            ['step_number' => 2, 'title' => 'Verifikasi & Penugasan Asesor', 'description' => 'Tim admin memverifikasi pendaftaran dan menugaskan asesor yang akan mendampingi proses sertifikasi jarak jauh.', 'icon' => '✅'],
            ['step_number' => 3, 'title' => 'Pra Asesmen Online', 'description' => 'Asesor mengadakan sesi online meeting untuk verifikasi APL-02, membuat rekomendasi pelaksanaan, dan menjelaskan mekanisme banding.', 'icon' => '🎥'],
            ['step_number' => 4, 'title' => 'Pelaksanaan Asesmen Online', 'description' => 'Asesor and Asesi menjalani proses asesmen melalui online meeting. Asesor membuat rekomendasi hasil dan asesi mengisi form umpan balik.', 'icon' => '📹'],
            ['step_number' => 5, 'title' => 'Keputusan & Penerbitan Sertifikat', 'description' => 'Asesor mengajukan rekomendasi keputusan. Peserta yang kompeten mendapatkan sertifikat BNSP yang dikirimkan secara fisik.', 'icon' => '🏆'],
        ];

        foreach ($alurJarakJauh as $alur) {
            SertifikasiAlur::create(array_merge($alur, ['type' => 'jarak_jauh']));
        }
    }
}
