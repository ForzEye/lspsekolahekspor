@extends('layouts.app')

@section('title', 'Galeri Dokumentasi')
@section('meta_description', 'Lihat dokumentasi kegiatan, pelatihan, dan sertifikasi ekspor di LSP Sekolah Ekspor Nasional.')

@section('content')
<section class="relative pt-44 pb-24 bg-soft overflow-hidden">
    {{-- Background Decorations --}}
    <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-white to-transparent"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-accent/5 rounded-full blur-[100px]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
            <span :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'" 
                  class="inline-block px-4 py-2 rounded-full bg-white border border-gray-100 shadow-sm text-accent text-[10px] font-black uppercase tracking-[0.3em] mb-6 transition-all duration-700">
                Visual Journey
            </span>
            <h1 :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
                class="font-display text-4xl lg:text-6xl font-black text-primary leading-tight mb-8 transition-all duration-700 delay-100">
                Dokumentasi & <span class="text-accent">Galeri Kegiatan</span>
            </h1>
            <p :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
               class="text-gray-500 text-lg lg:text-xl font-medium leading-relaxed transition-all duration-700 delay-200">
                Kumpulan momen berharga dalam perjalanan mencetak eksportir profesional Indonesia melalui pelatihan dan sertifikasi standar BNSP.
            </p>
        </div>

        {{-- Gallery Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($activities as $index => $activity)
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     :style="`transition-delay: {{ ($index % 3) * 150 }}ms`"
                     class="group bg-white rounded-[40px] overflow-hidden shadow-sm hover:shadow-premium transition-all duration-700 relative border border-gray-50">
                    
                    {{-- Media Frame --}}
                    <div class="aspect-[4/3] overflow-hidden relative">
                        @if($activity->type === 'image')
                            <img src="{{ $activity->media_url }}" alt="{{ $activity->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        @else
                            {{-- Placeholder for Video --}}
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gray-100 group-hover:bg-accent transition-colors duration-500">
                                <div class="w-16 h-16 rounded-full bg-white text-accent flex items-center justify-center shadow-lg group-hover:scale-125 transition-transform">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                                <span class="mt-4 text-[10px] font-black uppercase tracking-widest text-gray-400 group-hover:text-white transition-colors">Watch Documentation</span>
                            </div>
                            <a href="{{ $activity->media_path }}" target="_blank" class="absolute inset-0 z-10"></a>
                        @endif

                        <div class="absolute top-6 left-6 flex flex-col gap-2">
                            <span class="px-4 py-1.5 rounded-full bg-white/90 backdrop-blur-md shadow-sm text-primary text-[10px] font-black uppercase tracking-widest border border-white/20">
                                {{ $activity->category }}
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 rounded-xl bg-accent/10 text-accent flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2.5" stroke-linecap="round"/></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</span>
                        </div>
                        <h3 class="font-display font-black text-primary text-xl leading-tight group-hover:text-accent transition-colors duration-300">
                            {{ $activity->title }}
                        </h3>
                        @if($activity->description)
                            <p class="mt-4 text-gray-500 text-sm leading-relaxed line-clamp-2 italic">
                                "{{ $activity->description }}"
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full py-32 text-center">
                    <div class="w-24 h-24 bg-white rounded-[40px] shadow-sm flex items-center justify-center text-5xl mx-auto mb-8">📸</div>
                    <h2 class="font-display text-2xl font-black text-primary">No documentation yet.</h2>
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-xs mt-2">Come back later for new updates</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-20">
            {{ $activities->links() }}
        </div>
    </div>
</section>
@endsection
