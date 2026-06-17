@extends('layouts.app')

@section('title', 'Daftar Program')
@section('meta_description', 'Daftarkan diri Anda ke program sertifikasi dan pelatihan ekspor LSP/LPK Sekolah Ekspor Nasional.')

@section('content')

{{-- Hero --}}
<section class="bg-gradient-to-br from-primary to-primary-mid pt-44 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <span class="inline-block bg-white/10 border border-white/20 text-white/80 text-xs uppercase font-semibold tracking-widest rounded-full px-4 py-1.5 mb-5">Pendaftaran</span>
        <h1 class="font-display text-4xl lg:text-5xl font-extrabold mb-4">Daftar Program</h1>
        <p class="text-white/75 text-lg max-w-xl mx-auto">Mulai perjalanan menuju sertifikasi ekspor profesional Anda bersama kami.</p>
    </div>
</section>

<section class="py-20 bg-soft">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <x-section-header label="CARA DAFTAR" heading="Pilih Jalur Pendaftaran" subheading="Daftarkan diri melalui WhatsApp atau Google Form untuk kemudahan proses." />

        <div class="grid md:grid-cols-2 gap-6 mb-16">
            {{-- WhatsApp Registration --}}
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm text-center hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 rounded-2xl bg-green-50 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </div>
                <h3 class="font-display font-bold text-gray-900 text-xl mb-2">Via WhatsApp</h3>
                <p class="text-gray-500 text-sm mb-6 leading-relaxed">Daftar langsung via WhatsApp dan dapatkan respons cepat dari tim kami.</p>
                <a href="{{ $contact && $contact->whatsapp ? 'https://wa.me/' . $contact->whatsapp . '?text=' . urlencode('Halo, saya ingin mendaftar program sertifikasi di Sekolah Ekspor Nasional. Mohon informasinya.') : '#' }}"
                   target="_blank" rel="noopener"
                   id="daftar-wa-btn"
                   class="inline-flex items-center justify-center gap-2 w-full bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl py-3.5 text-sm transition-all duration-200">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    Daftar via WhatsApp
                </a>
            </div>

            {{-- Google Form Registration --}}
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm text-center hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="font-display font-bold text-gray-900 text-xl mb-2">Via Google Form</h3>
                <p class="text-gray-500 text-sm mb-6 leading-relaxed">Isi formulir pendaftaran online dengan lengkap untuk proses yang terstruktur.</p>
                <a href="{{ $globalSettings->get('google_form_url', '#') }}"
                   target="_blank" rel="noopener"
                   id="daftar-form-btn"
                   class="inline-flex items-center justify-center gap-2 w-full bg-primary hover:bg-primary-mid text-white font-bold rounded-xl py-3.5 text-sm transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Buka Formulir Pendaftaran
                </a>
            </div>
        </div>

        {{-- Steps --}}
        <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
            <h3 class="font-display font-bold text-primary text-xl mb-6 text-center">Alur Pendaftaran</h3>
            <div class="grid sm:grid-cols-4 gap-4">
                @foreach([
                    ['icon' => '📝', 'step' => '01', 'title' => 'Isi Formulir', 'desc' => 'Lengkapi data diri dan pilih program'],
                    ['icon' => '✅', 'step' => '02', 'title' => 'Verifikasi', 'desc' => 'Tim kami memverifikasi pendaftaran'],
                    ['icon' => '💳', 'step' => '03', 'title' => 'Pembayaran', 'desc' => 'Lakukan pembayaran program'],
                    ['icon' => '🎓', 'step' => '04', 'title' => 'Mulai Program', 'desc' => 'Ikuti program dan sertifikasi'],
                ] as $step)
                    <div class="text-center p-4">
                        <div class="w-12 h-12 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-3">
                            <span class="text-xl">{{ $step['icon'] }}</span>
                        </div>
                        <div class="text-xs font-bold text-accent mb-1">{{ $step['step'] }}</div>
                        <h4 class="font-display font-bold text-gray-900 text-sm mb-1">{{ $step['title'] }}</h4>
                        <p class="text-gray-500 text-xs">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
