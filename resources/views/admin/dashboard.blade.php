@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-4">

    {{-- Header Section --}}
    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
             :class="show ? 'animate-spring-up' : 'opacity-0'">
            <h1 class="font-display text-3xl lg:text-4xl font-black text-primary tracking-tight">
                Halo, {{ explode(' ', auth()->user()->name)[0] ?? 'Admin' }}! 👋
            </h1>
            <p class="text-gray-400 mt-2 font-bold text-xs uppercase tracking-widest">
                Welcome back to your <span class="text-accent">Global Trade Control</span>
            </p>
        </div>
        
        <div class="flex items-center gap-3">
            <div class="bg-white border border-gray-100 rounded-2xl px-4 py-2.5 flex items-center gap-3 shadow-sm transition-all hover:shadow-md">
                <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                <span class="text-[10px] font-black text-primary uppercase tracking-widest">Server Optimization: 100%</span>
            </div>
        </div>
    </div>

    {{-- Bento Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-6 gap-6 mb-12">
        @foreach([
            ['label' => 'Total Program', 'value' => $stats['programs'], 'icon' => '📦', 'color' => 'bg-blue-50 text-blue-600', 'route' => 'admin.programs.index', 'span' => 'md:col-span-2 lg:col-span-2'],
            ['label' => 'Active Skema', 'value' => $stats['skemas'], 'icon' => '🏅', 'color' => 'bg-yellow-50 text-yellow-600', 'route' => 'admin.sertifikasi.skemas.index', 'span' => 'lg:col-span-1'],
            ['label' => 'Certified Asesor', 'value' => $stats['asesors'], 'icon' => '👤', 'color' => 'bg-green-50 text-green-600', 'route' => 'admin.asesors.index', 'span' => 'lg:col-span-1'],
            ['label' => 'Dokumentasi', 'value' => $stats['activities'], 'icon' => '📸', 'color' => 'bg-purple-50 text-purple-600', 'route' => 'admin.activities.index', 'span' => 'lg:col-span-1'],
            ['label' => 'Total Review', 'value' => $stats['testimonials'], 'icon' => '⭐', 'color' => 'bg-orange-50 text-orange-600', 'route' => 'admin.testimonials.index', 'span' => 'lg:col-span-1'],
        ] as $index => $stat)
            <div x-data="{ show: false }" x-init="setTimeout(() => show = true, {{ $index * 100 }})"
                 :class="show ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-8 scale-95'"
                 class="{{ $stat['span'] }} bg-white rounded-[40px] p-8 border border-gray-50 shadow-sm hover:shadow-premium transition-all duration-500 group relative overflow-hidden">
                <a href="{{ $stat['route'] ? route($stat['route']) : '#' }}" class="block relative z-10">
                    <div class="w-14 h-14 rounded-2xl {{ $stat['color'] }} flex items-center justify-center text-2xl shadow-inner mb-6 transition-transform group-hover:scale-110 group-hover:rotate-6">
                        {{ $stat['icon'] }}
                    </div>
                    <div class="font-display text-4xl font-black text-primary mb-2 tracking-tight group-hover:text-accent transition-colors">{{ $stat['value'] }}</div>
                    <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $stat['label'] }}</div>
                </a>
                {{-- Decorative Glow --}}
                <div class="absolute -bottom-10 -right-10 w-32 h-32 opacity-20 group-hover:opacity-40 transition-opacity rounded-full blur-3xl {{ str_replace('text-', 'bg-', $stat['color']) }}"></div>
            </div>
        @endforeach
    </div>

    {{-- Middle Bento Section --}}
    <div class="grid lg:grid-cols-3 gap-8">
        
        {{-- Customizer Card (Interactive) --}}
        <div class="lg:col-span-2 bg-white rounded-[50px] p-10 shadow-premium border border-gray-50 overflow-hidden relative group">
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-accent/10 px-4 py-1.5 rounded-full">
                         <span class="text-accent font-black text-[10px] uppercase tracking-widest">Global Action Hub</span>
                    </div>
                </div>
                <h2 class="font-display text-3xl font-black text-primary mb-8 leading-tight">Kelola Konten &<br>Ekspektasi Pengguna</h2>
                
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
                    @foreach([
                        ['label' => 'Quick Program', 'icon' => '➕', 'route' => 'admin.programs.create', 'color' => 'bg-primary'],
                        ['label' => 'Edit Hero', 'icon' => '🎨', 'route' => 'admin.hero.edit', 'color' => 'bg-accent'],
                        ['label' => 'System Config', 'icon' => '⚙️', 'route' => 'admin.settings.index', 'color' => 'bg-gray-800'],
                        ['label' => 'View Public', 'icon' => '🌐', 'route' => 'home', 'color' => 'bg-green-600'],
                    ] as $action)
                        <a href="{{ route($action['route']) }}"
                           class="flex flex-col items-center gap-4 p-6 rounded-3xl bg-gray-50/50 hover:bg-white border border-transparent hover:border-gray-100 hover:shadow-premium transition-all group/item">
                            <div class="w-12 h-12 rounded-2xl {{ $action['color'] }} text-white flex items-center justify-center text-xl shadow-lg transition-transform group-hover/item:scale-110">
                                {{ $action['icon'] }}
                            </div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">{{ $action['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            
            {{-- Abstract Graphic Background --}}
            <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-soft rounded-full -z-0 opacity-50 group-hover:scale-110 transition-transform duration-1000"></div>
        </div>

        {{-- Performance/Info Card --}}
        <div class="bg-primary rounded-[50px] p-10 text-white relative overflow-hidden shadow-glow">
            <div class="absolute inset-0 z-0 opacity-10" style="background-image: radial-gradient(circle, #fff 1px, transparent 1px); background-size: 24px 24px;"></div>
            
            <div class="relative z-10 flex flex-col h-full">
                <div class="mb-8">
                    <h3 class="font-display text-2xl font-black mb-2 tracking-tight">Enterprise Control</h3>
                    <p class="text-white/60 text-xs font-bold uppercase tracking-widest">Operational Manual</p>
                </div>

                <div class="space-y-6 flex-1">
                    @foreach([
                        'Perubahan bersifat Instan & Real-time',
                        'Setiap Upload Gambar di-optimize otomatis',
                        'Pastikan SEO Metadata selalu terisi',
                        'Testimonial meningkatkan Trust Rate'
                    ] as $tip)
                        <div class="flex items-start gap-4 group/tip cursor-default">
                             <div class="w-2 h-2 rounded-full bg-accent mt-1.5 transition-transform group-hover/tip:scale-150"></div>
                             <p class="text-white/80 text-sm font-bold group-hover/tip:text-white transition-colors leading-relaxed">{{ $tip }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10 pt-8 border-t border-white/10">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-xl">ℹ️</div>
                        <div>
                             <p class="text-[10px] font-black text-white/40 uppercase tracking-widest leading-none">V2.4 — 2026 Edition</p>
                             <p class="text-[11px] font-bold mt-1">LSP Sekolah Ekspor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
