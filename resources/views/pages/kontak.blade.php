@extends('layouts.app')

@section('title', 'Kontak Kami')
@section('meta_description', 'Hubungi LSP/LPK Sekolah Ekspor Nasional. Kami siap membantu pertanyaan seputar sertifikasi dan pelatihan ekspor Anda.')

@section('content')

{{-- Hero Mini: Premium Light --}}
<section class="bg-white pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-50">
        <div class="absolute top-0 left-0 w-1/3 h-full bg-gradient-to-r from-soft to-transparent rounded-r-[100px]"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-accent/10 rounded-full blur-[100px]"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
             :class="show ? 'animate-spring-up' : 'opacity-0'">
            <span class="inline-block bg-primary/5 text-accent font-bold text-[10px] uppercase tracking-[0.3em] rounded-full px-5 py-2 mb-6 border border-primary/5">KONTAK KAMI</span>
            <h1 class="font-display text-5xl lg:text-7xl font-black text-primary mb-6 leading-tight">
                Hubungi Kami<br><span class="text-accent underline decoration-accent/10 underline-offset-12">Sekolah Ekspor</span>
            </h1>
            <p class="text-gray-500 text-lg lg:text-xl max-w-3xl mx-auto mb-10">
                Kami siap membantu setiap pertanyaan Anda seputar sertifikasi dan pelatihan ekspor.
            </p>
            
            <nav class="flex justify-center items-center gap-3 text-sm font-bold">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-primary transition-colors">Beranda</a>
                <div class="w-1.5 h-1.5 rounded-full bg-gray-200"></div>
                <span class="text-primary">Hubungi Kami</span>
            </nav>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16">

            {{-- Contact Form --}}
            <div>
                <h2 class="font-display text-2xl font-bold text-primary mb-6">Kirim Pesan</h2>

                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 flex items-center gap-2 mb-6">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('kontak.kirim') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                   placeholder="Nama Anda"
                                   class="w-full border {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors outline-none">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                   placeholder="email@contoh.com"
                                   class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors outline-none">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1.5">Nomor WhatsApp</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                   placeholder="08xx-xxxx-xxxx"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors outline-none">
                        </div>
                        <div>
                            <label for="keperluan" class="block text-sm font-medium text-gray-700 mb-1.5">Keperluan</label>
                            <select id="keperluan" name="keperluan"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors outline-none bg-white">
                                <option value="">-- Pilih Keperluan --</option>
                                <option value="info_sertifikasi" {{ old('keperluan') === 'info_sertifikasi' ? 'selected' : '' }}>Info Sertifikasi</option>
                                <option value="info_pelatihan" {{ old('keperluan') === 'info_pelatihan' ? 'selected' : '' }}>Info Pelatihan</option>
                                <option value="konsultasi" {{ old('keperluan') === 'konsultasi' ? 'selected' : '' }}>Konsultasi</option>
                                <option value="lainnya" {{ old('keperluan') === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1.5">Pesan <span class="text-red-500">*</span></label>
                        <textarea id="message" name="message" rows="5" required
                                  placeholder="Tuliskan pertanyaan atau pesan Anda di sini..."
                                  class="w-full border {{ $errors->has('message') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary transition-colors outline-none resize-none">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" id="kontak-submit-btn"
                            class="w-full bg-accent hover:bg-accent-dark text-white font-bold py-3.5 rounded-xl text-sm transition-all duration-200 hover:shadow-md">
                        Kirim Pesan
                    </button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div>
                <h2 class="font-display text-2xl font-bold text-primary mb-6">Info Kontak</h2>

                <div class="space-y-4">
                    @foreach([
                        ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Alamat', 'val' => $contact->address ?? 'Jakarta, Indonesia'],
                        ['icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Email', 'val' => $contact->email ?? 'info@sekolahekspor.id'],
                        ['icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'label' => 'WhatsApp', 'val' => $contact->whatsapp ? '0' . ltrim($contact->whatsapp, '62') : '0812-3456-7890'],
                        ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Jam Operasional', 'val' => $contact->office_hours ?? 'Senin - Jumat: 08.00 - 17.00 WIB'],
                    ] as $info)
                        <div class="flex gap-4 p-5 bg-soft rounded-2xl border border-gray-100">
                            <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $info['icon'] }}"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-0.5">{{ $info['label'] }}</p>
                                <p class="text-gray-800 text-sm font-medium">{{ $info['val'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- WhatsApp CTA --}}
                @if($contact && $contact->whatsapp)
                <div class="mt-6">
                    <a href="https://wa.me/{{ $contact->whatsapp }}"
                       target="_blank" rel="noopener"
                       id="wa-kontak-btn"
                       class="flex items-center justify-center gap-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl py-4 px-6 transition-all duration-200 hover:shadow-lg text-sm">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Chat WhatsApp Sekarang
                    </a>
                </div>
                @endif
            </div>
        </div>

        {{-- Google Maps Embed Section --}}
        @if($contact && $contact->maps_embed_url)
            <div x-data="{ show: false }" x-intersect="show = true"
                 :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                 class="mt-16 bg-white p-4 rounded-3xl border border-white/60 shadow-xl shadow-gray-150/40 relative z-10 transition-all duration-500 hover:shadow-2xl">
                <div class="rounded-2xl overflow-hidden aspect-[21/9] min-h-[350px] w-full relative" id="google-maps-embed-container">
                    @if(str_contains($contact->maps_embed_url, '<iframe'))
                        {!! $contact->maps_embed_url !!}
                    @else
                        <iframe src="{{ $contact->maps_embed_url }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @endif
                </div>
                <style>
                    #google-maps-embed-container iframe {
                        width: 100% !important;
                        height: 100% !important;
                        border: 0 !important;
                        position: absolute;
                        top: 0;
                        left: 0;
                    }
                </style>
            </div>
        @endif
    </div>
</section>

@endsection
