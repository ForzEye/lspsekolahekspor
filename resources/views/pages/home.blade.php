@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'LSP/LPK Sekolah Ekspor Nasional — Lembaga sertifikasi profesi dan pelatihan ekspor berlisensi BNSP. Daftar sekarang dan tingkatkan karir ekspor Anda.')

@section('content')

{{-- Section 1: Hero --}}
@if($hero)
    <x-hero-section :hero="$hero" />
@else
    <x-hero-section :hero="null" />
@endif

{{-- Section 2: Tentang Kami (Modern Refined) --}}
@if($about)
<section id="tentang-singkat" class="relative py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-20 items-center">

            {{-- Left: Modern Image Composition --}}
            <div class="relative">
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 translate-x-0 scale-100' : 'opacity-0 -translate-x-12 scale-95'"
                     class="transition-all duration-1000 relative z-10">
                    @if($about->image)
                        <div class="rounded-[40px] overflow-hidden shadow-premium rotate-2 hover:rotate-0 transition-transform duration-700 border-[10px] border-white">
                            <img src="{{ $about->image_url }}" alt="{{ $about->heading }}" class="w-full object-cover aspect-[4/5]">
                        </div>
                    @else
                        <div class="rounded-[40px] bg-gradient-to-br from-primary to-primary-light h-[500px] flex items-center justify-center shadow-premium rotate-2 border-[10px] border-white relative overflow-hidden group">
                             <img src="{{ asset('img/hero-illustration.png') }}" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-110 transition-transform duration-1000">
                             <img src="{{ asset('img/site-logo.png') }}" class="relative z-10 w-32 h-32 object-contain filter brightness-0 invert opacity-80 group-hover:scale-125 transition-transform duration-700">
                        </div>
                    @endif

                    {{-- Floating Glass Stats Removed --}}
                </div>
                
                {{-- Decorative Background --}}
                <div class="absolute -top-10 -left-10 w-64 h-64 bg-accent/5 rounded-full blur-3xl animate-pulse"></div>
            </div>

            {{-- Right: Content --}}
            <div class="space-y-8">
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'"
                     class="transition-all duration-700 delay-300">
                    <span class="text-accent font-bold tracking-[0.2em] text-xs uppercase">{{ $about->label ?? 'WHO WE ARE' }}</span>
                    <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mt-4 mb-6 leading-tight">
                        {{ $about->heading }}
                    </h2>
                    <p class="text-gray-500 text-lg leading-relaxed mb-8">
                        {{ $about->description }}
                    </p>

                    @if($about->highlights)
                        <div class="grid sm:grid-cols-2 gap-4 mb-10">
                            @foreach($about->highlights as $highlight)
                                <div class="flex items-center gap-3 p-4 rounded-2xl bg-soft border border-gray-100 group hover:border-accent/30 transition-colors">
                                    <div class="w-8 h-8 rounded-xl bg-accent text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </div>
                                    <span class="text-sm font-bold text-primary">{{ $highlight }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ route('profil') }}"
                       class="inline-flex items-center gap-3 text-primary font-bold group">
                        <span class="underline decoration-accent decoration-2 underline-offset-8 group-hover:text-accent transition-colors">Pelajari Visi & Misi Kami</span>
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Section 3: Bento Grid Program --}}
@if($programs->isNotEmpty())
<section id="program-unggulan" class="py-24 bg-soft">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16">
            <div class="max-w-2xl">
                <span class="text-accent font-bold tracking-[0.2em] text-xs uppercase">OUR SCHEMES</span>
                <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mt-4">Program Sertifikasi</h2>
            </div>
            <a href="{{ route('sertifikasi') }}" class="group flex items-center gap-2 text-primary font-bold text-sm">
                Lihat Semua Skema 
                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm group-hover:bg-primary group-hover:text-white transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
            </a>
        </div>

        {{-- Card Grid Layout --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($programs as $index => $program)
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'"
                     :style="`transition-delay: {{ $index * 100 }}ms`"
                     class="group flex flex-col justify-between overflow-hidden rounded-[32px] bg-white border border-gray-100 shadow-sm transition-all duration-500 hover:shadow-premium hover:-translate-y-2">
                    
                    {{-- Card Image --}}
                    <a href="{{ route('sertifikasi.detail', $program->id) }}" class="relative aspect-video overflow-hidden w-full bg-primary-dark block">
                        @if($program->image_url)
                            <img src="{{ $program->image_url }}" alt="{{ $program->nama }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-primary to-primary-light flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-cover bg-center opacity-10 group-hover:scale-110 transition-transform duration-700" style="background-image: url('{{ asset('img/hero-illustration.png') }}')"></div>
                                <img src="{{ asset('img/site-logo.png') }}" class="h-16 w-auto object-contain filter brightness-0 invert opacity-20 group-hover:scale-110 transition-transform duration-700 relative z-10">
                            </div>
                        @endif
                    </a>

                    {{-- Card Content --}}
                    <div class="p-8 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold font-display text-primary mb-1 group-hover:text-accent transition-colors">
                                <a href="{{ route('sertifikasi.detail', $program->id) }}">{{ $program->nama }}</a>
                            </h3>
                            <span class="text-xs font-mono font-bold text-accent block mb-4">{{ $program->kode }}</span>
                            <p class="text-gray-500 text-sm line-clamp-3 mb-6">
                                {{ $program->description }}
                            </p>
                        </div>
                        <a href="{{ route('sertifikasi.detail', $program->id) }}" class="flex items-center gap-2 font-bold text-sm tracking-wider uppercase text-primary group/btn">
                            Pelajari Selengkapnya
                            <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Section 4: Keunggulan (Dynamic Floating Cards) --}}
<section id="keunggulan" class="py-24 bg-primary overflow-hidden relative">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'1\'/%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="inline-block bg-white/10 text-accent font-bold text-[10px] uppercase tracking-[0.3em] rounded-full px-5 py-2 mb-6 border border-white/10">WHY US</span>
            <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-white">Value Proposition & Impact</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                [
                    'icon' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-width="2" stroke-linecap="round"/></svg>',
                    'value' => $globalSettings->get('stats_alumni_value', '500+'),
                    'label' => $globalSettings->get('stats_alumni_label', 'Certified Alumni'),
                    'desc' => $globalSettings->get('stats_alumni_desc', 'Verified by BNSP')
                ],
                [
                    'icon' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                    'value' => $globalSettings->get('stats_success_value', '98.5%'),
                    'label' => $globalSettings->get('stats_success_label', 'Success Rate'),
                    'desc' => $globalSettings->get('stats_success_desc', 'Proven training quality')
                ],
                [
                    'icon' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" stroke-width="2" stroke-linecap="round"/></svg>',
                    'value' => $globalSettings->get('stats_schemes_value', '10+'),
                    'label' => $globalSettings->get('stats_schemes_label', 'Global Schemes'),
                    'desc' => $globalSettings->get('stats_schemes_desc', 'International trade standards')
                ],
                [
                    'icon' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-width="2" stroke-linecap="round"/></svg>',
                    'value' => $globalSettings->get('stats_experience_value', '15+'),
                    'label' => $globalSettings->get('stats_experience_label', 'Years Experience'),
                    'desc' => $globalSettings->get('stats_experience_desc', 'Trusted market authority')
                ],
            ] as $index => $item)
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     :style="`transition-delay: {{ $index * 150 }}ms`"
                     class="glass-dark p-10 rounded-[50px] text-center group hover:bg-white/5 transition-all duration-500 animate-float border-none"
                     style="animation-delay: -{{ $index * 1.5 }}s">
                    <div class="w-20 h-20 rounded-3xl bg-accent/20 text-accent flex items-center justify-center mx-auto mb-8 transform group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500 shadow-glow">
                        {!! $item['icon'] !!}
                    </div>
                    <div class="font-display text-5xl font-black text-white mb-3 tracking-tighter">{{ $item['value'] }}</div>
                    <div class="font-black text-accent text-[10px] uppercase tracking-[0.2em] mb-4">{{ $item['label'] }}</div>
                    <p class="text-white/40 text-sm leading-relaxed font-bold italic">"{{ $item['desc'] }}"</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Section 5: Testimonials (Modern Glass Carousel) --}}
@if($activities->isNotEmpty())
<section id="dokumentasi" class="py-24 bg-soft overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16">
            <div class="max-w-2xl">
                <span class="text-accent font-bold tracking-[0.2em] text-xs uppercase">ACTIVITY FEED</span>
                <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mt-4">Dokumentasi Kegiatan</h2>
                <p class="text-gray-500 mt-6 text-lg">Momen-momen eksklusif dari pelatihan, sertifikasi, dan kegiatan networking alumni.</p>
            </div>
            <a href="{{ route('gallery') }}" class="group flex items-center gap-3 bg-white border border-gray-100 px-8 py-4 rounded-2xl shadow-sm hover:bg-primary hover:text-white transition-all duration-500">
                <span class="font-bold text-sm">Lihat Semua Galeri</span> 
                <div class="w-8 h-8 rounded-xl bg-accent text-white flex items-center justify-center group-hover:bg-white group-hover:text-accent transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($activities as $index => $activity)
                <div x-data="{ show: false }" x-intersect="show = true"
                     :class="show ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-12 scale-95'"
                     :style="`transition-delay: {{ $index * 150 }}ms`"
                     class="group bg-white rounded-[40px] overflow-hidden shadow-sm hover:shadow-premium transition-all duration-700 relative">
                    
                    <div class="aspect-video overflow-hidden relative">
                        @if($activity->type === 'image')
                            <img src="{{ $activity->media_url }}" alt="{{ $activity->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gray-100">
                                <span class="text-accent font-black text-[10px] uppercase tracking-widest">Video Content</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                            <span class="text-white text-[10px] font-black uppercase tracking-widest border-b-2 border-accent">View Documentation</span>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-[10px] font-black text-accent uppercase tracking-widest">{{ \Carbon\Carbon::parse($activity->date)->format('M d, Y') }}</span>
                            <div class="h-1 w-1 rounded-full bg-gray-200"></div>
                            <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $activity->category }}</span>
                        </div>
                        <h3 class="font-display font-black text-primary text-xl leading-tight mb-2 group-hover:text-accent transition-colors">
                            {{ $activity->title }}
                        </h3>
                    </div>
                    <a href="{{ route('gallery') }}" class="absolute inset-0 z-10"></a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($testimonials->isNotEmpty())
<section id="testimonial" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/3">
                <span class="text-accent font-bold tracking-[0.2em] text-xs uppercase">ALUMNI STORY</span>
                <h2 class="font-display text-4xl lg:text-5xl font-extrabold text-primary mt-4 mb-8">Apa Kata Mereka?</h2>
                <p class="text-gray-500 text-lg mb-10">Kisah sukses alumni kami yang telah bertransformasi menjadi eksportir profesional berlisensi nasional.</p>
                
                <div class="flex gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center shadow-premium"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14 17h2.6l2-4V7h-6v6h3zM7 17h2.6l2-4V7h-6v6h3z"/></svg></div>
                    <div class="text-sm font-bold text-primary">Rating 4.9/5 Berdasarkan Google & LinkedIn Review</div>
                </div>
            </div>

            <div class="lg:w-2/3 grid sm:grid-cols-2 gap-6">
                @foreach($testimonials->take(4) as $index => $testimonial)
                    <div x-data="{ show: false }" x-intersect="show = true"
                         :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-12'"
                         :style="`transition-delay: {{ $index * 200 }}ms`"
                         class="glass p-8 rounded-[40px] border-none shadow-premium hover:shadow-2xl transition-all duration-500 group">
                        <div class="flex gap-1 mb-6 text-accent">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 italic text-base leading-relaxed mb-8">"{{ $testimonial->content }}"</p>
                        <div class="flex items-center gap-4">
                            @if($testimonial->photo)
                                <img src="{{ $testimonial->photo_url }}" class="w-12 h-12 rounded-2xl object-cover shadow-md">
                            @else
                                <div class="w-12 h-12 rounded-2xl bg-primary-light flex items-center justify-center font-bold text-white shadow-md">{{ $testimonial->initials }}</div>
                            @endif
                            <div>
                                <h4 class="font-bold text-primary group-hover:text-accent transition-colors">{{ $testimonial->name }}</h4>
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">{{ $testimonial->position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
         </div>
    </div>
</section>
@endif

{{-- Section 6: CTA Banner (Premium Modern) --}}
<section id="cta-banner" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-primary rounded-[60px] p-12 lg:p-24 relative overflow-hidden shadow-2xl">
            {{-- Abstract Patterns --}}
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-accent/20 rounded-full blur-[100px]"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white/5 rounded-full blur-[100px]"></div>
            
            <div class="relative z-10 text-center max-w-3xl mx-auto space-y-8">
                <h2 class="font-display text-4xl lg:text-6xl font-black text-white leading-tight">
                    Ready to Scale Your <span class="text-accent underline decoration-white/20 underline-offset-8">Global Impact?</span>
                </h2>
                <p class="text-white/60 text-lg lg:text-xl">
                    Gabung dengan komunitas eksportir profesional terbesar di Indonesia. Dapatkan sertifikasi BNSP & tingkatkan kompetensi Anda sekarang.
                </p>
                <div class="flex flex-wrap justify-center gap-6 pt-4">
                    <a href="{{ route('daftar') }}"
                       class="bg-accent text-white font-bold rounded-2xl px-10 py-5 text-lg hover:scale-105 transition-all shadow-premium hover:shadow-orange-400/20 active:scale-95">
                        Daftar Program Now
                    </a>
                    <a href="{{ route('kontak') }}"
                       class="bg-white/5 border-2 border-white/20 text-white font-bold rounded-2xl px-10 py-5 text-lg hover:bg-white hover:text-primary transition-all">
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
