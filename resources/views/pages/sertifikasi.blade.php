@extends('layouts.app')

@section('title', 'Sertifikasi BNSP')
@section('meta_description', 'Program sertifikasi kompetensi ekspor berlisensi BNSP. Lihat skema, alur, dan asesor kompetensi Sekolah Ekspor Nasional.')

@section('content')

{{-- Hero Mini: Premium Light --}}
<section class="bg-white pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-50">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-soft to-transparent rounded-l-[100px]"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-accent/10 rounded-full blur-[100px]"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
             :class="show ? 'animate-spring-up' : 'opacity-0'">
            <span class="inline-block bg-primary/5 text-accent font-bold text-[10px] uppercase tracking-[0.3em] rounded-full px-5 py-2 mb-6 border border-primary/5">CERTIFICATION CENTER</span>
            <h1 class="font-display text-5xl lg:text-7xl font-black text-primary mb-6 leading-tight">
                Validasi Keahlian Anda<br><span class="text-accent underline decoration-accent/10 underline-offset-12">Berlisensi Nasional</span>
            </h1>
            <p class="text-gray-500 text-lg lg:text-xl max-w-3xl mx-auto mb-10">
                Pilih skema sertifikasi kompetensi sesuai standar BNSP untuk memperkuat daya saing Anda di pasar global.
            </p>
            
            <nav class="flex justify-center items-center gap-3 text-sm font-bold">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-primary transition-colors">Beranda</a>
                <div class="w-1.5 h-1.5 rounded-full bg-gray-200"></div>
                <span class="text-primary">Sertifikasi</span>
            </nav>
        </div>
    </div>
</section>

{{-- Section 2: Skema Sertifikasi (Bento-ish Grid) --}}
@if($skemas->isNotEmpty())
@php
    $onlineSkemas = $skemas->filter(fn($s) => in_array(strtolower($s->metode_pelaksanaan), ['online', 'jarak jauh']));
    $offlineSkemas = $skemas->filter(fn($s) => !in_array(strtolower($s->metode_pelaksanaan), ['online', 'jarak jauh']));
@endphp
<section id="skema-sertifikasi" class="py-24 bg-soft" x-data="{ currentTab: 'offline' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mb-6">Skema Sertifikasi Tersedia</h2>
            <p class="text-gray-500 mb-10">Program sertifikasi kami dirancang khusus untuk mencakup seluruh aspek ekspor modern.</p>

            {{-- Tab Switch Modern --}}
            <div class="flex justify-center">
                <div class="bg-gray-100/50 p-2 rounded-[32px] inline-flex gap-2 border border-white relative shadow-inner">
                    <button @click="currentTab = 'offline'"
                            class="relative z-10 px-10 py-4 rounded-[26px] text-sm font-black transition-all duration-500"
                            :class="currentTab === 'offline' ? 'text-white' : 'text-gray-400 hover:text-primary'">
                        Offline / Tatap Muka
                    </button>
                    <button @click="currentTab = 'online'"
                            class="relative z-10 px-10 py-4 rounded-[26px] text-sm font-black transition-all duration-500"
                            :class="currentTab === 'online' ? 'text-white' : 'text-gray-400 hover:text-primary'">
                        Online / Sertifikasi Jarak Jauh
                    </button>
                    {{-- Slider Background --}}
                    <div class="absolute inset-y-2 bg-primary rounded-[26px] transition-all duration-500 ease-spring shadow-lg shadow-primary/20"
                         :style="currentTab === 'offline' ? 'left: 8px; width: calc(50% - 12px)' : 'left: calc(50% + 4px); width: calc(50% - 12px)'"></div>
                </div>
            </div>
        </div>

        {{-- Offline Schemes --}}
        <div x-show="currentTab === 'offline'" x-transition class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($offlineSkemas as $index => $skema)
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     :style="`transition-delay: {{ $index * 100 }}ms`"
                     class="bg-white rounded-[40px] shadow-sm hover:shadow-premium transition-all duration-500 group relative overflow-hidden flex flex-col h-full">
                    
                    {{-- Card Image --}}
                    <a href="{{ route('sertifikasi.detail', $skema->id) }}" class="relative aspect-video overflow-hidden w-full bg-primary-dark block">
                        @if($skema->image_url)
                            <img src="{{ $skema->image_url }}" alt="{{ $skema->nama }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary to-primary-light flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-cover bg-center opacity-10 group-hover:scale-110 transition-transform duration-700" style="background-image: url('{{ asset('img/hero-illustration.png') }}')"></div>
                                <img src="{{ asset('img/site-logo.png') }}" class="h-12 w-auto object-contain filter brightness-0 invert opacity-20 group-hover:scale-110 transition-transform duration-700 relative z-10">
                            </div>
                        @endif
                    </a>

                    {{-- Card Content --}}
                    <div class="p-8 flex-1 flex flex-col justify-between relative">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-accent/5 rounded-full blur-2xl group-hover:bg-accent/20 transition-all pointer-events-none"></div>

                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-mono text-gray-400 font-bold tracking-widest">{{ $skema->kode }}</span>
                                @if($skema->metode_pelaksanaan)
                                    <span class="px-3 py-1 rounded-lg text-[10px] font-black tracking-wider uppercase bg-orange-50 text-orange-600 border border-orange-100">
                                        {{ $skema->metode_pelaksanaan }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="font-display font-extrabold text-primary text-xl mb-4 group-hover:text-accent transition-colors leading-tight">
                                <a href="{{ route('sertifikasi.detail', $skema->id) }}">{{ $skema->nama }}</a>
                            </h3>

                            <div class="mb-6 bg-gray-50/50 p-4 rounded-2xl border border-gray-100/50">
                                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest block mb-1">Biaya Investasi</span>
                                @if($skema->harga)
                                    <span class="text-lg font-black text-accent">Rp {{ number_format($skema->harga, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-sm font-bold text-gray-400">Hubungi Kami</span>
                                @endif
                            </div>

                            @if($skema->description)
                                <p class="text-gray-500 text-sm leading-relaxed mb-6">{{ $skema->description }}</p>
                            @endif

                            @if($skema->requirements)
                                <div class="space-y-3 mb-6">
                                    <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Prasyarat Utama</h4>
                                    @foreach($skema->requirements as $req)
                                        <div class="flex items-start gap-3">
                                            <div class="w-5 h-5 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0 mt-0.5">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </div>
                                            <span class="text-xs font-bold text-gray-600">{{ $req }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="mt-auto flex gap-3">
                            <a href="{{ route('sertifikasi.detail', $skema->id) }}"
                               class="flex-1 text-center bg-gray-50 hover:bg-primary hover:text-white text-primary font-bold px-4 py-3 rounded-2xl text-xs transition-all duration-300">
                                Detail Skema
                            </a>
                            <a href="{{ route('daftar') }}"
                               class="flex-1 text-center bg-accent hover:bg-accent-dark text-white font-bold px-4 py-3 rounded-2xl text-xs transition-all duration-300 shadow-sm">
                                Daftar
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-[40px] border border-gray-100">
                    <p class="text-gray-400 font-bold">Tidak ada skema sertifikasi offline saat ini.</p>
                </div>
            @endforelse
        </div>

        {{-- Online Schemes --}}
        <div x-show="currentTab === 'online'" x-transition class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" x-cloak>
            @forelse($onlineSkemas as $index => $skema)
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     :style="`transition-delay: {{ $index * 100 }}ms`"
                     class="bg-white rounded-[40px] shadow-sm hover:shadow-premium transition-all duration-500 group relative overflow-hidden flex flex-col h-full">
                    
                    {{-- Card Image --}}
                    <a href="{{ route('sertifikasi.detail', $skema->id) }}" class="relative aspect-video overflow-hidden w-full bg-primary-dark block">
                        @if($skema->image_url)
                            <img src="{{ $skema->image_url }}" alt="{{ $skema->nama }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary to-primary-light flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-cover bg-center opacity-10 group-hover:scale-110 transition-transform duration-700" style="background-image: url('{{ asset('img/hero-illustration.png') }}')"></div>
                                <img src="{{ asset('img/site-logo.png') }}" class="h-12 w-auto object-contain filter brightness-0 invert opacity-20 group-hover:scale-110 transition-transform duration-700 relative z-10">
                            </div>
                        @endif
                    </a>

                    {{-- Card Content --}}
                    <div class="p-8 flex-1 flex flex-col justify-between relative">
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-accent/5 rounded-full blur-2xl group-hover:bg-accent/20 transition-all pointer-events-none"></div>

                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-gray-50 rounded-lg text-[10px] font-mono text-gray-400 font-bold tracking-widest">{{ $skema->kode }}</span>
                                @if($skema->metode_pelaksanaan)
                                    <span class="px-3 py-1 rounded-lg text-[10px] font-black tracking-wider uppercase bg-blue-50 text-blue-600 border border-blue-100">
                                        {{ $skema->metode_pelaksanaan }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="font-display font-extrabold text-primary text-xl mb-4 group-hover:text-accent transition-colors leading-tight">
                                <a href="{{ route('sertifikasi.detail', $skema->id) }}">{{ $skema->nama }}</a>
                            </h3>

                            <div class="mb-6 bg-gray-50/50 p-4 rounded-2xl border border-gray-100/50">
                                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest block mb-1">Biaya Investasi</span>
                                @if($skema->harga)
                                    <span class="text-lg font-black text-accent">Rp {{ number_format($skema->harga, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-sm font-bold text-gray-400">Hubungi Kami</span>
                                @endif
                            </div>

                            @if($skema->description)
                                <p class="text-gray-500 text-sm leading-relaxed mb-6">{{ $skema->description }}</p>
                            @endif

                            @if($skema->requirements)
                                <div class="space-y-3 mb-6">
                                    <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Prasyarat Utama</h4>
                                    @foreach($skema->requirements as $req)
                                        <div class="flex items-start gap-3">
                                            <div class="w-5 h-5 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0 mt-0.5">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </div>
                                            <span class="text-xs font-bold text-gray-600">{{ $req }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="mt-auto flex gap-3">
                            <a href="{{ route('sertifikasi.detail', $skema->id) }}"
                               class="flex-1 text-center bg-gray-50 hover:bg-primary hover:text-white text-primary font-bold px-4 py-3 rounded-2xl text-xs transition-all duration-300">
                                Detail Skema
                            </a>
                            <a href="{{ route('daftar') }}"
                               class="flex-1 text-center bg-accent hover:bg-accent-dark text-white font-bold px-4 py-3 rounded-2xl text-xs transition-all duration-300 shadow-sm">
                                Daftar
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-[40px] border border-gray-100">
                    <p class="text-gray-400 font-bold">Tidak ada skema sertifikasi online saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endif

{{-- Section 3: Alur Sertifikasi (Modern Vertical Timeline) --}}
<section id="alur-sertifikasi" class="py-24 bg-white overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-accent font-bold tracking-[0.2em] text-xs uppercase">MODERN WORKFLOW</span>
            <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mt-4">Alur Pelaksanaan</h2>
        </div>

        <div x-data="{ activeTab: 'tatap_muka' }" class="relative">
             {{-- Tab Switch Modern --}}
            <div class="flex justify-center mb-20">
                <div class="bg-gray-100/50 p-2 rounded-[32px] inline-flex gap-2 border border-white relative shadow-inner">
                    <button @click="activeTab = 'tatap_muka'"
                            class="relative z-10 px-10 py-4 rounded-[26px] text-sm font-black transition-all duration-500"
                            :class="activeTab === 'tatap_muka' ? 'text-white' : 'text-gray-400 hover:text-primary'">
                        Offline / Tatap Muka
                    </button>
                    <button @click="activeTab = 'jarak_jauh'"
                            class="relative z-10 px-10 py-4 rounded-[26px] text-sm font-black transition-all duration-500"
                            :class="activeTab === 'jarak_jauh' ? 'text-white' : 'text-gray-400 hover:text-primary'">
                        Online / Sertifikasi Jarak Jauh
                    </button>
                    {{-- Slider Background --}}
                    <div class="absolute inset-y-2 bg-primary rounded-[26px] transition-all duration-500 ease-spring shadow-lg shadow-primary/20"
                         :style="activeTab === 'tatap_muka' ? 'left: 8px; width: calc(50% - 12px)' : 'left: calc(50% + 4px); width: calc(50% - 12px)'"></div>
                </div>
            </div>

            {{-- Timeline Content --}}
            <div class="relative">
                {{-- Shared Vertical Line - More Visible --}}
                <div class="absolute left-10 top-0 bottom-0 w-1.5 bg-gradient-to-b from-primary via-accent to-gray-200 rounded-full opacity-30 hidden sm:block"></div>

                {{-- Offline Steps --}}
                <template x-if="activeTab === 'tatap_muka'">
                    <div class="space-y-16 relative">
                        @foreach($alurTatap as $index => $alur)
                            <div class="flex flex-col sm:flex-row gap-10 relative group"
                                 x-data="{ show: false }" x-intersect="show = true"
                                 :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'"
                                 style="transition-delay: {{ $index * 150 }}ms">
                                
                                {{-- Number Bubble --}}
                                <div class="hidden sm:flex shrink-0 w-20 h-20 rounded-[32px] bg-white border-4 border-gray-50 shadow-premium items-center justify-center relative z-10 transition-transform group-hover:scale-110">
                                    <div class="absolute inset-0 bg-primary/5 rounded-[32px] blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    <span class="relative text-3xl font-display font-black text-primary">{{ $alur->step_number }}</span>
                                </div>

                                {{-- Content Card --}}
                                <div class="flex-1 glass p-10 rounded-[40px] shadow-sm hover:shadow-premium transition-all duration-500 border-none">
                                    <div class="flex items-center gap-5 mb-6">
                                        <div class="w-14 h-14 rounded-2xl bg-primary text-white flex items-center justify-center shadow-lg transition-transform group-hover:rotate-6">
                                            @if($index == 0) <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2" stroke-linecap="round"/></svg>
                                            @elseif($index == 1) <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-width="2" stroke-linecap="round"/></svg>
                                            @elseif($index == 2) <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-width="2" stroke-linecap="round"/></svg>
                                            @else <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" stroke-width="2" stroke-linecap="round"/></svg> @endif
                                        </div>
                                        <h3 class="font-display font-black text-primary text-2xl tracking-tight">{{ $alur->title }}</h3>
                                    </div>
                                    <p class="text-gray-500 text-base leading-relaxed mb-8">{{ $alur->description }}</p>
                                    
                                    @if($alur->extra_label)
                                        <div class="inline-flex items-center gap-3 py-3 px-6 bg-soft rounded-3xl border border-primary/5">
                                            <div class="w-3 h-3 rounded-full bg-accent animate-pulse"></div>
                                            <span class="text-xs font-black text-primary uppercase tracking-widest">{{ $alur->extra_label }}: {{ $alur->extra_content }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </template>

                 {{-- Online Steps --}}
                <template x-if="activeTab === 'jarak_jauh'">
                    <div class="space-y-16 relative">
                        @foreach($alurJauh as $index => $alur)
                            <div class="flex flex-col sm:flex-row gap-10 relative group"
                                 x-data="{ show: false }" x-intersect="show = true"
                                 :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'"
                                 style="transition-delay: {{ $index * 150 }}ms">
                                
                                <div class="hidden sm:flex shrink-0 w-20 h-20 rounded-[32px] bg-white border-4 border-gray-50 shadow-premium items-center justify-center relative z-10 transition-transform group-hover:scale-110">
                                    <div class="absolute inset-0 bg-accent/5 rounded-[32px] blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    <span class="relative text-3xl font-display font-black text-accent">{{ $alur->step_number }}</span>
                                </div>

                                <div class="flex-1 glass-dark p-10 rounded-[40px] shadow-sm hover:shadow-glow transition-all duration-500 border-none">
                                    <div class="flex items-center gap-5 mb-6">
                                        <div class="w-14 h-14 rounded-2xl bg-accent text-white flex items-center justify-center shadow-lg transition-transform group-hover:-rotate-6">
                                             @if($index == 0) <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" stroke-width="2" stroke-linecap="round"/></svg>
                                             @elseif($index == 1) <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" stroke-width="2" stroke-linecap="round"/></svg>
                                             @else <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round"/></svg> @endif
                                        </div>
                                        <h3 class="font-display font-black text-white text-2xl tracking-tight">{{ $alur->title }}</h3>
                                    </div>
                                    <p class="text-white/60 text-base leading-relaxed">{{ $alur->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>

{{-- Section 4: Asesor (Modern Grid) --}}
@if($asesors->isNotEmpty())
<section id="asesor-kompetensi" class="py-24 bg-soft">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16">
            <div class="max-w-2xl">
                <span class="text-accent font-bold tracking-[0.2em] text-xs uppercase">OUR EXPERTS</span>
                <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mt-4">Asesor </h2>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($asesors as $index => $asesor)
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
                     :style="`transition-delay: {{ $index * 150 }}ms`"
                     class="group relative h-[450px] rounded-[50px] overflow-hidden shadow-premium">
                    
                    @if($asesor->photo)
                        <img src="{{ $asesor->photo_url }}" class="absolute inset-0 w-full h-full object-cover grayscale transition-all duration-700 group-hover:grayscale-0 group-hover:scale-110">
                    @else
                        <div class="absolute inset-0 bg-primary-mid"></div>
                    @endif
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent group-hover:from-accent/80 transition-all duration-500"></div>

                    <div class="absolute inset-0 p-8 flex flex-col justify-end text-white text-center">
                        <h4 class="font-display font-black text-2xl group-hover:scale-110 transition-transform duration-500">{{ $asesor->name }}</h4>
                        <p class="text-xs font-bold text-white/60 uppercase tracking-widest mt-2">{{ $asesor->no_reg ?? 'Certified BNSP Asesor' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Section 6: Final CTA --}}
<section class="py-24 bg-white relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="inline-flex items-center gap-2 bg-accent/10 rounded-full px-5 py-2 mb-8 animate-float">
            <span class="text-accent font-black">⭐ 98% Program Success Rate</span>
        </div>
        <h2 class="font-display text-4xl lg:text-6xl font-black text-primary mb-8 leading-tight">Mulai Perjalanan Karir<br>Global Anda Hari Ini</h2>
        <div class="flex flex-wrap justify-center gap-6">
            <a href="{{ route('daftar') }}"
               class="bg-primary text-white font-bold rounded-2xl px-10 py-5 text-lg hover:bg-accent transition-all shadow-premium hover:shadow-glow active:scale-95">
                Daftar Sekarang
            </a>
            <a href="{{ route('kontak') }}"
               class="bg-white border-2 border-primary/10 text-primary font-bold rounded-2xl px-10 py-5 text-lg hover:border-primary transition-all">
                Hubungi Admin
            </a>
        </div>
    </div>
</section>

@endsection
