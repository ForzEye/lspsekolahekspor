@extends('layouts.app')

@section('title', 'Profil Kami')
@section('meta_description', 'Profil LSP/LPK Sekolah Ekspor Nasional — visi, misi, nilai perusahaan, dan struktur organisasi.')

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
            <span class="inline-block bg-primary/5 text-accent font-bold text-[10px] uppercase tracking-[0.3em] rounded-full px-5 py-2 mb-6 border border-primary/5">TENTANG KAMI</span>
            <h1 class="font-display text-5xl lg:text-7xl font-black text-primary mb-6 leading-tight">
                Profil Sekolah<br><span class="text-accent underline decoration-accent/10 underline-offset-12">Ekspor Nasional</span>
            </h1>
            <p class="text-gray-500 text-lg lg:text-xl max-w-3xl mx-auto mb-10">
                Lembaga sertifikasi dan pelatihan ekspor terpercaya di Indonesia.
            </p>
            
            <nav class="flex justify-center items-center gap-3 text-sm font-bold">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-primary transition-colors">Beranda</a>
                <div class="w-1.5 h-1.5 rounded-full bg-gray-200"></div>
                <span class="text-primary">Profil Kami</span>
            </nav>
        </div>
    </div>
</section>

@if($about)

{{-- About Section --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <x-section-header :label="$about->label ?? 'TENTANG KAMI'" :heading="$about->heading" :centered="false" />
                <p class="text-gray-600 leading-relaxed text-base">{{ $about->description }}</p>

                @if($about->highlights)
                    <ul class="mt-6 space-y-3">
                        @foreach($about->highlights as $highlight)
                            <li class="flex items-start gap-3">
                                <div class="w-5 h-5 rounded-full bg-accent/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-gray-700 text-sm">{{ $highlight }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="relative">
                @if($about->image_profil || $about->image)
                    <img src="{{ $about->image_profil ? Storage::url($about->image_profil) : $about->image_url }}" alt="{{ $about->heading }}" class="rounded-2xl shadow-xl w-full object-cover">
                @else
                    <div class="rounded-2xl bg-gradient-to-br from-primary to-primary-mid h-80 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 18px 18px;"></div>
                        <div class="relative text-center text-white p-8">
                            <div class="text-8xl mb-4">🏛️</div>
                            <div class="font-display font-bold text-xl">Sekolah Ekspor Nasional</div>
                            <div class="text-white/70 text-sm mt-1">Berlisensi Resmi BNSP</div>
                        </div>
                    </div>
                @endif
                <div class="absolute -bottom-5 -right-5 bg-accent rounded-2xl p-4 shadow-xl text-white text-center">
                    <div class="font-display text-2xl font-black">BNSP</div>
                    <div class="text-xs font-medium opacity-90">Terakreditasi</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Visi Misi --}}
@if($about->vision_content || $about->mission_items)
<section class="py-20 bg-soft">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-header label="VISI & MISI" heading="Visi dan Misi Kami" />

        <div class="grid lg:grid-cols-2 gap-8">
            {{-- Visi --}}
            @if($about->vision_content)
            <div class="bg-primary rounded-2xl p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="relative">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="font-display font-bold text-white text-xl mb-3">{{ $about->vision_title ?? 'Visi Kami' }}</h3>
                    <p class="text-white/80 leading-relaxed text-sm">{{ $about->vision_content }}</p>
                </div>
            </div>
            @endif

            {{-- Misi --}}
            @if($about->mission_items)
            <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                <div class="text-4xl mb-4">🚀</div>
                <h3 class="font-display font-bold text-primary text-xl mb-4">{{ $about->mission_title ?? 'Misi Kami' }}</h3>
                <ul class="space-y-3">
                    @foreach($about->mission_items as $mission)
                        <li class="flex items-start gap-3 text-sm text-gray-600">
                            <span class="w-5 h-5 rounded-full bg-primary text-white text-xs flex items-center justify-center flex-shrink-0 mt-0.5 font-bold">✓</span>
                            {{ $mission }}
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

{{-- Nilai Perusahaan --}}
@if($about->values)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-header label="NILAI" heading="Nilai-Nilai Kami" subheading="Prinsip yang menjadi fondasi semua yang kami lakukan." />

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($about->values as $val)
                <div class="text-center p-6 rounded-2xl border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                    <div class="text-4xl mb-3">{{ $val['icon'] ?? '⭐' }}</div>
                    <h4 class="font-display font-bold text-primary mb-2">{{ $val['title'] }}</h4>
                    <p class="text-gray-500 text-sm">{{ $val['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endif

{{-- Section: Statistik Kelulusan Asesi --}}
@if($statistics->isNotEmpty())
<section class="py-24 bg-white relative overflow-hidden border-t border-gray-150/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block bg-primary/5 text-accent font-bold text-[10px] uppercase tracking-[0.3em] rounded-full px-5 py-2 mb-6 border border-primary/5">STATISTIK KELULUSAN</span>
            <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mb-6">Statistik Kelulusan Asesi</h2>
            <p class="text-gray-500 text-sm font-medium leading-relaxed">Berikut adalah data akumulasi peserta kompeten dan belum kompeten berdasarkan skema sertifikasi LSP Sekolah Ekspor Nasional.</p>
        </div>

        <div class="overflow-x-auto rounded-[32px] border border-[#cbd5e1] shadow-premium">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="text-white" style="background-color: #0f2e5c;">
                        <th class="px-6 py-4.5 text-xs font-black text-center uppercase tracking-wider w-16 border-r border-white/10">NO</th>
                        <th class="px-6 py-4.5 text-xs font-black uppercase tracking-wider border-r border-white/10">PROGRAM SKEMA SERTIFIKASI</th>
                        <th class="px-6 py-4.5 text-xs font-black text-center uppercase tracking-wider w-48 border-r border-white/10">PESERTA KOMPETEN</th>
                        <th class="px-6 py-4.5 text-xs font-black text-center uppercase tracking-wider w-48">PESERTA BELUM KOMPETEN</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#cbd5e1] text-primary">
                    @foreach($statistics as $index => $stat)
                        <tr class="odd:bg-[#f1f5f9] even:bg-[#e2e8f0]/40 transition-colors hover:bg-primary/5">
                            <td class="px-6 py-4 text-sm font-bold text-center border-r border-[#cbd5e1]">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-bold border-r border-[#cbd5e1]">{{ $stat->nama_program }}</td>
                            <td class="px-6 py-4 text-sm font-black text-center text-green-700 border-r border-[#cbd5e1]">{{ number_format($stat->peserta_kompeten, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm font-black text-center text-red-500">
                                {{ $stat->peserta_belum_kompeten > 0 ? number_format($stat->peserta_belum_kompeten, 0, ',', '.') : '-' }}
                            </td>
                        </tr>
                    @endforeach
                    {{-- Total Row --}}
                    <tr class="text-white font-black text-sm uppercase tracking-wider" style="background-color: #0284c7;">
                        <td colspan="2" class="px-8 py-5 text-center font-black border-r border-white/10">JUMLAH ASESI</td>
                        <td class="px-6 py-5 text-center font-black border-r border-white/10">{{ number_format($statistics->sum('peserta_kompeten'), 0, ',', '.') }}</td>
                        <td class="px-6 py-5 text-center font-black">{{ number_format($statistics->sum('peserta_belum_kompeten'), 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif

{{-- Section: Peta Sebaran Peserta --}}
@if($sebarans->isNotEmpty())
@push('head')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map {
            height: 500px;
            width: 100%;
            border-radius: 24px;
            z-index: 10;
        }
        /* Custom map marker overrides */
        .custom-map-marker {
            background: none !important;
            border: none !important;
        }
        /* Pulse Animation Keyframes */
        @keyframes pulse-ring {
            0% {
                transform: scale(0.3);
                opacity: 0.85;
            }
            80%, 100% {
                transform: scale(2.0);
                opacity: 0;
            }
        }
        .pulse-ring {
            display: inline-block;
            border-radius: 50%;
            animation: pulse-ring 2s cubic-bezier(0.215, 0.610, 0.355, 1) infinite;
        }
        /* Premium custom tooltip styling */
        .custom-tooltip-style {
            background: #0f2e5c !important;
            color: #ffffff !important;
            border-radius: 12px !important;
            padding: 8px 12px !important;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15), 0 8px 10px -6px rgba(0, 0, 0, 0.15) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            font-family: 'Outfit', sans-serif !important;
            pointer-events: none !important;
        }
        .custom-tooltip-style::before {
            border-top-color: #0f2e5c !important;
        }
    </style>
@endpush

<section class="py-24 bg-soft relative overflow-hidden border-t border-gray-150/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block bg-primary/5 text-accent font-bold text-[10px] uppercase tracking-[0.3em] rounded-full px-5 py-2 mb-6 border border-primary/5">SEBARAN NASIONAL</span>
            <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mb-6">Peta Sebaran Peserta</h2>
            <p class="text-gray-500 text-sm font-medium leading-relaxed">Visualisasi penyebaran asesi kompeten LSP Sekolah Ekspor Nasional di seluruh penjuru wilayah Indonesia.</p>
        </div>

        <div class="relative w-full overflow-hidden bg-white rounded-[40px] p-4 md:p-8 border border-gray-150/40 shadow-premium">
            <div id="map" class="w-full"></div>
        </div>
    </div>
</section>

@push('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Center map on Indonesia center point
            const map = L.map('map', {
                center: [-2.5, 118.0],
                zoom: 5,
                scrollWheelZoom: false,
                minZoom: 4,
                maxZoom: 9
            });

            // Modern grayscale tiles (CartoDB Positron) to match premium website aesthetic
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 20
            }).addTo(map);

            const sebarans = @json($sebarans);
            
            sebarans.forEach(function(item) {
                if (item.latitude && item.longitude) {
                    const lat = parseFloat(item.latitude);
                    const lng = parseFloat(item.longitude);
                    
                    // Determine custom dimensions based on participant count
                    let size = 16;
                    let ringSize = 28;
                    
                    if (item.jumlah_peserta > 500) {
                        size = 24;
                        ringSize = 44;
                    } else if (item.jumlah_peserta > 100) {
                        size = 20;
                        ringSize = 36;
                    } else if (item.jumlah_peserta > 50) {
                        size = 18;
                        ringSize = 32;
                    }

                    const halfRing = ringSize / 2;

                    // Custom HTML Marker matching the previous premium animation
                    const customHtml = `
                        <div class="relative flex items-center justify-center" style="width: ${ringSize}px; height: ${ringSize}px;">
                            <!-- Outer Pulsating Ring -->
                            <div class="absolute pulse-ring" style="width: ${ringSize}px; height: ${ringSize}px; background-color: rgba(249, 115, 22, 0.35);"></div>
                            <!-- Core Inner Dot -->
                            <div class="relative rounded-full border-2 border-white shadow-md" style="width: ${size}px; height: ${size}px; background-color: #f97316;"></div>
                        </div>
                    `;

                    const customIcon = L.divIcon({
                        html: customHtml,
                        className: 'custom-map-marker',
                        iconSize: [ringSize, ringSize],
                        iconAnchor: [halfRing, halfRing]
                    });

                    // Create marker with custom icon
                    const marker = L.marker([lat, lng], { icon: customIcon }).addTo(map);

                    const formattedCount = new Intl.NumberFormat('id-ID').format(item.jumlah_peserta);
                    
                    const tooltipContent = `
                        <div class="text-center font-sans">
                            <h4 class="font-extrabold text-[12px] leading-tight text-white mb-0.5">${item.nama_wilayah}</h4>
                            <p class="text-[11px] font-bold text-orange-400 m-0">${formattedCount} Peserta</p>
                        </div>
                    `;

                    // Bind Leaflet Tooltip (triggers automatically on hover)
                    marker.bindTooltip(tooltipContent, {
                        permanent: false,
                        direction: 'top',
                        className: 'custom-tooltip-style',
                        offset: L.point(0, -halfRing + 4)
                    });
                    
                    // Dynamic click behavior to focus
                    marker.on('click', function() {
                        map.setView([lat, lng], 7);
                    });
                }
            });
        });
    </script>
@endpush
@endif

{{-- Struktur Organisasi --}}
@if($team->isNotEmpty())
<section class="py-24 bg-gradient-to-b from-white via-soft to-white overflow-hidden relative">
    <div class="absolute inset-0 z-0 opacity-40">
        <div class="absolute top-1/4 left-10 w-72 h-72 bg-primary/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-1/4 right-10 w-80 h-80 bg-accent/5 rounded-full blur-[150px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="inline-block bg-primary/5 text-accent font-bold text-[10px] uppercase tracking-[0.3em] rounded-full px-5 py-2 mb-6 border border-primary/5">STRUKTUR ORGANISASI</span>
            <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mb-6">Struktur Organisasi</h2>
            <p class="text-gray-500 text-sm font-medium max-w-xl mx-auto leading-relaxed">Susunan kepengurusan dan manajemen profesional Lembaga Sertifikasi Profesi (LSP) Sekolah Ekspor Nasional.</p>
        </div>

        @php
            $dewan = $team->firstWhere('position', 'Direktur Utama') ?? $team->firstWhere('position', 'Dewan Pengarah');
            $direktur = $team->firstWhere('position', 'Direktur LSP');
            $m_sertifikasi = $team->firstWhere('position', 'Manajer Sertifikasi');
            $m_mutu = $team->firstWhere('position', 'Manajer Mutu');
            $m_admin = $team->firstWhere('position', 'Manajer Administrasi');
            $komite = $team->firstWhere('position', 'Komite Skema') ?? $team->firstWhere('position', 'Komite Skema Sertifikasi');
        @endphp

        {{-- Chart container with horizontal scroll support on mobile --}}
        <div class="w-full overflow-x-auto pb-12 scrollbar-thin scrollbar-thumb-gray-200">
            <div class="min-w-[950px] flex flex-col items-center py-8 relative">
                
                {{-- 1. Dewan Pengarah --}}
                @if($dewan)
                    <div class="flex flex-col items-center group relative z-10">
                        <div class="bg-gradient-to-r from-primary-dark via-primary to-primary-light text-white text-[9px] font-black uppercase tracking-[0.2em] px-6 py-2.5 rounded-full shadow-lg shadow-primary/20 border border-white/10 z-20 transition-all duration-300 group-hover:shadow-primary/30">
                            👑 Dewan Pengarah
                        </div>
                        <div class="bg-white/90 backdrop-blur-md rounded-[32px] p-6 border border-white/60 shadow-xl shadow-gray-150/40 transition-all duration-500 w-64 text-center -mt-4 relative hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-2 group-hover:scale-105">
                            @if($dewan->photo)
                                <img src="{{ $dewan->photo_url }}" alt="{{ $dewan->name }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-3.5 border-2 border-white ring-4 ring-primary/5 shadow-md transition-transform duration-500 group-hover:rotate-6">
                            @else
                                <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-primary to-accent text-white font-black text-lg flex items-center justify-center mx-auto mb-3.5 shadow-md ring-4 ring-primary/5 transition-transform duration-500 group-hover:scale-110">
                                    {{ $dewan->initials }}
                                </div>
                            @endif
                            <h4 class="font-display font-extrabold text-primary text-base tracking-tight mb-1">{{ $dewan->name }}</h4>
                            <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">LSP SEN</div>
                        </div>
                    </div>
                @endif

                {{-- Vertical Connector --}}
                <div class="w-[3px] h-12 bg-gradient-to-b from-primary/30 to-primary/80 relative">
                    <div class="absolute inset-0 bg-accent animate-pulse opacity-20"></div>
                </div>

                {{-- 2. Direktur LSP --}}
                @if($direktur)
                    <div class="flex flex-col items-center group relative z-10">
                        <div class="bg-gradient-to-r from-primary via-primary-light to-primary text-white text-[9px] font-black uppercase tracking-[0.2em] px-6 py-2.5 rounded-full shadow-lg shadow-primary/20 border border-white/10 z-20 transition-all duration-300 group-hover:shadow-primary/30">
                            🎯 Direktur LSP
                        </div>
                        <div class="bg-white/90 backdrop-blur-md rounded-[32px] p-6 border border-white/60 shadow-xl shadow-gray-150/40 transition-all duration-500 w-64 text-center -mt-4 relative hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-2 group-hover:scale-105">
                            @if($direktur->photo)
                                <img src="{{ $direktur->photo_url }}" alt="{{ $direktur->name }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-3.5 border-2 border-white ring-4 ring-primary/5 shadow-md transition-transform duration-500 group-hover:rotate-6">
                            @else
                                <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-primary to-primary-light text-white font-black text-lg flex items-center justify-center mx-auto mb-3.5 shadow-md ring-4 ring-primary/5 transition-transform duration-500 group-hover:scale-110">
                                    {{ $direktur->initials }}
                                </div>
                            @endif
                            <h4 class="font-display font-extrabold text-primary text-base tracking-tight mb-1">{{ $direktur->name }}</h4>
                            <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">LSP SEN</div>
                        </div>
                    </div>
                @endif

                {{-- Vertical Line extending down with horizontal branch --}}
                <div class="w-[3px] h-16 bg-gradient-to-b from-primary/80 to-accent relative">
                    {{-- Branching horizontal line for Asesor & Komite --}}
                    <div class="absolute top-8 left-1/2 -translate-x-1/2 h-[3px] bg-gradient-to-r from-primary/20 via-accent to-accent/20 w-[600px] flex justify-between pointer-events-none shadow-sm">
                        {{-- Left branch marker (dotted style for Asesor) --}}
                        <div class="w-1/2 border-t-[3px] border-dashed border-primary/30 h-1"></div>
                        {{-- Right branch marker (solid style for Komite) --}}
                        <div class="w-1/2 border-t-[3px] border-solid border-accent/70 h-1"></div>
                    </div>
                </div>

                {{-- 3. Middle Level (Asesor Kompetensi, Central Line, Komite Skema) --}}
                <div class="w-[760px] flex justify-between items-start -mt-8 relative">
                    {{-- Left Card: Asesor Kompetensi --}}
                    <div class="flex flex-col items-center w-64 z-10 group">
                        <div class="bg-gradient-to-r from-slate-800 to-slate-950 text-white text-xs font-bold uppercase tracking-[0.2em] px-6 py-4 rounded-3xl shadow-lg shadow-slate-900/10 border border-white/10 text-center w-full hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                            🔍 Asesor Kompetensi
                        </div>
                    </div>

                    {{-- Empty Center Spine --}}
                    <div class="w-[3px] self-stretch bg-gradient-to-b from-accent to-orange-500 -mt-8 relative">
                        <div class="absolute inset-0 bg-accent animate-pulse opacity-30"></div>
                    </div>

                    {{-- Right Card: Komite Skema --}}
                    <div class="flex flex-col items-center w-64 z-10 group">
                        <div class="bg-gradient-to-r from-accent to-amber-500 text-white text-[9px] font-black uppercase tracking-[0.2em] px-6 py-2.5 rounded-full shadow-lg shadow-accent/20 border border-white/10 z-20 transition-all duration-300 group-hover:shadow-accent/30">
                            📋 Komite Skema
                        </div>
                        <div class="bg-white/90 backdrop-blur-md rounded-[32px] p-6 border border-white/60 shadow-xl shadow-gray-150/40 transition-all duration-500 w-64 text-center -mt-4 relative hover:shadow-2xl hover:shadow-accent/10 hover:-translate-y-2 group-hover:scale-105">
                            @if($komite)
                                @if($komite->photo)
                                    <img src="{{ $komite->photo_url }}" alt="{{ $komite->name }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-3.5 border-2 border-white ring-4 ring-accent/5 shadow-md transition-transform duration-500 group-hover:rotate-6">
                                @else
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-accent to-amber-400 text-white font-black text-lg flex items-center justify-center mx-auto mb-3.5 shadow-md ring-4 ring-accent/5 transition-transform duration-500 group-hover:scale-110">
                                        {{ $komite->initials }}
                                    </div>
                                @endif
                                <h4 class="font-display font-extrabold text-primary text-base tracking-tight mb-1">{{ $komite->name }}</h4>
                                <div class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">LSP SEN</div>
                            @else
                                <div class="text-xs font-bold text-gray-400 py-4">Belum Ditentukan</div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Vertical connector to Managers level --}}
                <div class="w-[3px] h-16 bg-gradient-to-b from-orange-500 to-orange-500 relative">
                    {{-- Horizontal bar bridging the three managers --}}
                    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[600px] h-[3px] bg-gradient-to-r from-accent/50 via-orange-500 to-accent/50"></div>
                </div>

                {{-- Drop lines for each manager --}}
                <div class="w-[600px] flex justify-between pointer-events-none">
                    <div class="w-[3px] h-8 bg-accent/70"></div>
                    <div class="w-[3px] h-8 bg-orange-500"></div>
                    <div class="w-[3px] h-8 bg-accent/70"></div>
                </div>

                {{-- 4. Managers Level (Row of 3 Managers) --}}
                <div class="w-[760px] flex justify-between items-start">
                    {{-- Manajer Sertifikasi --}}
                    <div class="flex flex-col items-center w-60 z-10 group">
                        <div class="bg-gradient-to-r from-accent to-orange-500 text-white text-[9px] font-black uppercase tracking-[0.2em] px-4 py-2.5 rounded-full shadow-lg shadow-accent/20 border border-white/10 z-20 transition-all duration-300 group-hover:shadow-accent/30">
                            ⚙️ Manajer Sertifikasi
                        </div>
                        <div class="bg-white/90 backdrop-blur-md rounded-[32px] p-5 border border-white/60 shadow-xl shadow-gray-150/40 transition-all duration-500 w-full text-center -mt-4 relative hover:shadow-2xl hover:shadow-accent/10 hover:-translate-y-2 group-hover:scale-105">
                            @if($m_sertifikasi)
                                @if($m_sertifikasi->photo)
                                    <img src="{{ $m_sertifikasi->photo_url }}" alt="{{ $m_sertifikasi->name }}" class="w-14 h-14 rounded-full object-cover mx-auto mb-2.5 border-2 border-white ring-4 ring-accent/5 shadow-md transition-transform duration-500 group-hover:rotate-6">
                                @else
                                    <div class="w-14 h-14 rounded-full bg-gradient-to-tr from-accent to-orange-400 text-white font-black text-sm flex items-center justify-center mx-auto mb-2.5 shadow-md ring-4 ring-accent/5 transition-transform duration-500 group-hover:scale-110">
                                        {{ $m_sertifikasi->initials }}
                                    </div>
                                @endif
                                <h4 class="font-display font-extrabold text-primary text-sm tracking-tight mb-1">{{ $m_sertifikasi->name }}</h4>
                                <div class="text-[10px] font-bold text-gray-450 uppercase tracking-wider">LSP SEN</div>
                            @else
                                <div class="text-xs font-bold text-gray-400 py-3">Belum Ditentukan</div>
                            @endif
                        </div>
                    </div>

                    {{-- Manajer Mutu --}}
                    <div class="flex flex-col items-center w-60 z-10 group">
                        <div class="bg-gradient-to-r from-orange-500 to-amber-500 text-white text-[9px] font-black uppercase tracking-[0.2em] px-4 py-2.5 rounded-full shadow-lg shadow-orange-500/20 border border-white/10 z-20 transition-all duration-300 group-hover:shadow-orange-500/30">
                            🛡️ Manajer Mutu
                        </div>
                        <div class="bg-white/90 backdrop-blur-md rounded-[32px] p-5 border border-white/60 shadow-xl shadow-gray-150/40 transition-all duration-500 w-full text-center -mt-4 relative hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-2 group-hover:scale-105">
                            @if($m_mutu)
                                @if($m_mutu->photo)
                                    <img src="{{ $m_mutu->photo_url }}" alt="{{ $m_mutu->name }}" class="w-14 h-14 rounded-full object-cover mx-auto mb-2.5 border-2 border-white ring-4 ring-orange-500/5 shadow-md transition-transform duration-500 group-hover:rotate-6">
                                @else
                                    <div class="w-14 h-14 rounded-full bg-gradient-to-tr from-orange-500 to-amber-400 text-white font-black text-sm flex items-center justify-center mx-auto mb-2.5 shadow-md ring-4 ring-orange-500/5 transition-transform duration-500 group-hover:scale-110">
                                        {{ $m_mutu->initials }}
                                    </div>
                                @endif
                                <h4 class="font-display font-extrabold text-primary text-sm tracking-tight mb-1">{{ $m_mutu->name }}</h4>
                                <div class="text-[10px] font-bold text-gray-455 uppercase tracking-wider">LSP SEN</div>
                            @else
                                <div class="text-xs font-bold text-gray-400 py-3">Belum Ditentukan</div>
                            @endif
                        </div>
                    </div>

                    {{-- Manajer Administrasi --}}
                    <div class="flex flex-col items-center w-60 z-10 group">
                        <div class="bg-gradient-to-r from-accent to-orange-500 text-white text-[9px] font-black uppercase tracking-[0.2em] px-4 py-2.5 rounded-full shadow-lg shadow-accent/20 border border-white/10 z-20 transition-all duration-300 group-hover:shadow-accent/30">
                            📂 Manajer Administrasi
                        </div>
                        <div class="bg-white/90 backdrop-blur-md rounded-[32px] p-5 border border-white/60 shadow-xl shadow-gray-150/40 transition-all duration-500 w-full text-center -mt-4 relative hover:shadow-2xl hover:shadow-accent/10 hover:-translate-y-2 group-hover:scale-105">
                            @if($m_admin)
                                @if($m_admin->photo)
                                    <img src="{{ $m_admin->photo_url }}" alt="{{ $m_admin->name }}" class="w-14 h-14 rounded-full object-cover mx-auto mb-2.5 border-2 border-white ring-4 ring-accent/5 shadow-md transition-transform duration-500 group-hover:rotate-6">
                                @else
                                    <div class="w-14 h-14 rounded-full bg-gradient-to-tr from-accent to-orange-400 text-white font-black text-sm flex items-center justify-center mx-auto mb-2.5 shadow-md ring-4 ring-accent/5 transition-transform duration-500 group-hover:scale-110">
                                        {{ $m_admin->initials }}
                                    </div>
                                @endif
                                <h4 class="font-display font-extrabold text-primary text-sm tracking-tight mb-1">{{ $m_admin->name }}</h4>
                                <div class="text-[10px] font-bold text-gray-450 uppercase tracking-wider">LSP SEN</div>
                            @else
                                <div class="text-xs font-bold text-gray-400 py-3">Belum Ditentukan</div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        {{-- Mobile Hint --}}
        <div class="text-center text-xs text-gray-400 mt-4 block lg:hidden">
            💡 Geser ke samping untuk melihat seluruh struktur organisasi
        </div>
    </div>
</section>
@endif

@endsection
