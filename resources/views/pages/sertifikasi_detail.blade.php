@extends('layouts.app')

@section('title', 'Detail Skema - ' . ($skema->nama ?? $skema->kode))
@section('meta_description', 'Detail skema sertifikasi ' . ($skema->nama ?? $skema->kode) . ' berlisensi resmi BNSP di LSP/LPK Sekolah Ekspor Nasional.')

@section('content')

{{-- Hero Section: Premium Split Layout --}}
<section class="relative bg-primary pt-56 pb-40 overflow-hidden">
    {{-- Decorative Background Glows --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute -top-40 -right-40 w-[600px] h-[600px] bg-accent/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-2/3 h-1/2 bg-gradient-to-tr from-primary-dark via-primary to-transparent opacity-80"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'1\'/%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb (Light) --}}
        <nav class="flex items-center gap-3 text-xs font-bold mb-10 text-white/60">
            <a href="{{ route('home') }}" class="hover:text-accent transition-colors">Beranda</a>
            <svg class="w-3 h-3 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <a href="{{ route('sertifikasi') }}" class="hover:text-accent transition-colors">Sertifikasi</a>
            <svg class="w-3 h-3 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="text-white truncate max-w-xs">{{ $skema->nama ?? $skema->kode }}</span>
        </nav>

        <div class="grid lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-flex items-center gap-2 bg-white/10 border border-white/10 rounded-full px-4 py-1.5 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                    <span class="text-[10px] font-black text-white uppercase tracking-widest">Skema Sertifikasi BNSP</span>
                </span>
                <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-black text-white leading-tight tracking-tight">
                    {{ $skema->nama ?? 'Skema Sertifikasi' }}
                </h1>
                <p class="text-accent text-sm font-mono tracking-wider font-bold">NOMOR SKEMA: {{ $skema->kode }}</p>
            </div>

            @if($skema->image_url)
                <div class="lg:col-span-5 w-full">
                    <div class="relative w-full rounded-[32px] overflow-hidden shadow-2xl border-[6px] border-white/15 backdrop-blur-md">
                        <img src="{{ $skema->image_url }}" alt="{{ $skema->nama }}" class="w-full h-auto block">
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- Content Grid --}}
<section class="py-24 bg-soft relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10 items-start">
            
            {{-- Left/Main Panel: Deskripsi & Unit Kompetensi --}}
            <div class="lg:col-span-2 space-y-10">
                {{-- Deskripsi Card --}}
                <div class="bg-white rounded-[40px] p-8 lg:p-12 shadow-sm border border-gray-100/50 hover:shadow-premium transition-shadow duration-500">
                    <h2 class="font-display text-2xl font-extrabold text-primary mb-6 flex items-center gap-3">
                        <span class="w-1.5 h-6 bg-accent rounded-full"></span>
                        Deskripsi Skema
                    </h2>
                    <p class="text-gray-500 leading-relaxed text-base">
                        {{ $skema->description ?? 'Deskripsi mengenai skema sertifikasi ini belum tersedia.' }}
                    </p>
                </div>

                {{-- Unit Kompetensi Table Card --}}
                <div class="bg-white rounded-[40px] p-8 lg:p-12 shadow-sm border border-gray-100/50 hover:shadow-premium transition-shadow duration-500">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-8 pb-6 border-b border-gray-100">
                        <div>
                            <h2 class="font-display text-2xl font-extrabold text-primary flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-accent rounded-full"></span>
                                Unit Kompetensi
                            </h2>
                            <p class="text-gray-400 text-[10px] font-black uppercase tracking-widest mt-1">Daftar Standar Unit Kompetensi Kerja</p>
                        </div>
                        <span class="bg-primary/5 text-primary text-xs font-black uppercase px-5 py-2.5 rounded-2xl border border-primary/5 shadow-inner">
                            {{ $skema->jumlah_unit }} Unit Terdaftar
                        </span>
                    </div>

                    @if(!empty($skema->units))
                        <div class="overflow-hidden border border-gray-100 rounded-3xl shadow-sm">
                            <table class="w-full border-collapse">
                                <thead class="bg-gray-50/70">
                                    <tr class="border-b border-gray-100">
                                        <th class="text-left px-6 py-4.5 text-[10px] font-black text-gray-400 uppercase tracking-widest w-16">No.</th>
                                        <th class="text-left px-6 py-4.5 text-[10px] font-black text-gray-400 uppercase tracking-widest w-48">Kode Unit</th>
                                        <th class="text-left px-6 py-4.5 text-[10px] font-black text-gray-400 uppercase tracking-widest">Judul Unit Kompetensi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach($skema->units as $index => $unit)
                                        <tr class="hover:bg-gray-50/50 transition-colors group">
                                            <td class="px-6 py-5 text-sm font-bold text-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-6 py-5 text-sm font-mono font-bold text-accent tracking-wider">{{ $unit['kode'] ?? '-' }}</td>
                                            <td class="px-6 py-5 text-sm font-bold text-primary group-hover:text-accent transition-colors">{{ $unit['nama'] ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16 border-2 border-dashed border-gray-100 rounded-[32px] bg-gray-50/30">
                            <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center mx-auto mb-4 text-gray-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-width="2" stroke-linecap="round"/></svg>
                            </div>
                            <p class="text-gray-400 text-sm font-bold">Daftar unit kompetensi belum diinput oleh administrator.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right Panel: Metadata & Persyaratan --}}
            <div class="space-y-10">
                {{-- Metadata Card --}}
                <div class="bg-white rounded-[40px] p-8 lg:p-10 shadow-sm border border-gray-100/50 hover:shadow-premium transition-all duration-500 space-y-8">
                    <h3 class="font-display text-xl font-extrabold text-primary border-b border-gray-100 pb-4 flex items-center gap-3">
                        <span class="w-1.5 h-5 bg-accent rounded-full"></span>
                        Informasi Skema
                    </h3>
                    
                    <div class="space-y-6">
                        {{-- Code --}}
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-primary/5 text-primary flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" stroke-width="2.5" stroke-linecap="round"/></svg>
                            </div>
                            <div>
                                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest block">Nomor Skema</span>
                                <span class="text-sm font-mono font-bold text-primary">{{ $skema->kode }}</span>
                            </div>
                        </div>

                        {{-- Total Units --}}
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-primary/5 text-primary flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" stroke-width="2.5" stroke-linecap="round"/></svg>
                            </div>
                            <div>
                                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest block">Jumlah Unit</span>
                                <span class="text-sm font-bold text-primary">{{ $skema->jumlah_unit }} Unit Kerja</span>
                            </div>
                        </div>

                        {{-- Method --}}
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-primary/5 text-primary flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" stroke-width="2.5" stroke-linecap="round"/></svg>
                            </div>
                            <div>
                                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest block">Metode Pelaksanaan</span>
                                <span class="text-sm font-bold text-primary">{{ $skema->metode_pelaksanaan ?? 'Tatap Muka / Jarak Jauh' }}</span>
                            </div>
                        </div>

                        {{-- Duration --}}
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-primary/5 text-primary flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2.5" stroke-linecap="round"/></svg>
                            </div>
                            <div>
                                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest block">Masa Berlaku</span>
                                <span class="text-sm font-bold text-primary">{{ $skema->masa_berlaku ?? '3 Tahun' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-100">
                        <a href="{{ route('daftar') }}"
                           class="w-full bg-accent hover:bg-accent-dark text-white text-center py-4 rounded-2xl font-bold text-base transition-all duration-300 block shadow-glow hover:shadow-orange-200">
                            Daftar Skema Ini
                        </a>
                    </div>
                </div>

                {{-- Persyaratan Card --}}
                <div class="bg-white rounded-[40px] p-8 lg:p-10 shadow-sm border border-gray-100/50 hover:shadow-premium transition-all duration-500">
                    <h3 class="font-display text-xl font-extrabold text-primary mb-6 border-b border-gray-100 pb-4 flex items-center gap-3">
                        <span class="w-1.5 h-5 bg-accent rounded-full"></span>
                        Persyaratan Peserta
                    </h3>
                    
                    @if(!empty($skema->requirements))
                        <div class="space-y-4">
                            @foreach($skema->requirements as $req)
                                <div class="flex items-start gap-3.5 group">
                                    <div class="w-5 h-5 rounded-full bg-green-50 text-green-600 flex items-center justify-center shrink-0 mt-0.5 border border-green-100 shadow-sm transition-transform group-hover:scale-110">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </div>
                                    <span class="text-xs font-bold text-gray-600 leading-relaxed">{{ $req }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 border border-dashed border-gray-200 rounded-3xl bg-gray-50/30">
                            <p class="text-gray-400 text-xs font-bold">Tidak ada persyaratan khusus.</p>
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection
