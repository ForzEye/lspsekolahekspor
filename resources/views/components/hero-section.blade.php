@props(['hero'])

<section id="hero-section"
         class="relative min-h-[90vh] flex items-center overflow-hidden bg-white pt-20">

    {{-- Background Elements --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 right-0 w-2/3 h-full bg-gradient-to-bl from-soft to-transparent rounded-bl-[100px]"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-accent/5 rounded-full blur-[100px] animate-pulse"></div>
        <div class="absolute top-1/4 left-10 w-64 h-64 bg-primary/5 rounded-full blur-[80px]"></div>
    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">

            {{-- Left: Content --}}
            <div class="space-y-8 lg:col-span-7">
                <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
                     :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                     class="transition-all duration-700">
                    
                    {{-- Badge --}}
                    @if($hero && $hero->badge_text)
                        <div class="inline-flex items-center gap-2 bg-primary/5 border border-primary/10 rounded-2xl px-5 py-2 mb-6">
                            <span class="w-2 h-2 rounded-full bg-accent"></span>
                            <span class="text-xs font-bold text-primary uppercase tracking-wider">{{ $hero->badge_text }}</span>
                        </div>
                    @else
                        <div class="inline-flex items-center gap-2 bg-primary/5 border border-primary/10 rounded-2xl px-5 py-2 mb-6">
                            <span class="w-2 h-2 rounded-full bg-accent"></span>
                            <span class="text-xs font-bold text-primary uppercase tracking-wider">Lembaga Sertifikasi Profesi — BNSP</span>
                        </div>
                    @endif

                    {{-- Headline --}}
                    <h1 class="font-display text-4xl sm:text-5xl lg:text-[46px] xl:text-[50px] font-extrabold text-primary leading-[1.2] mb-6">
                        @if($hero)
                            {!! nl2br(e($hero->headline)) !!}
                        @else
                            Membangun <span class="text-accent underline decoration-accent/20 underline-offset-8">Masa Depan</span><br>
                            Eksportir Profesional
                        @endif
                    </h1>

                    {{-- Subheadline --}}
                    @if($hero && $hero->subheadline)
                        <p class="text-gray-500 text-base lg:text-lg leading-relaxed max-w-xl mb-10">
                            {{ $hero->subheadline }}
                        </p>
                    @else
                        <p class="text-gray-500 text-base lg:text-lg leading-relaxed max-w-xl mb-10">
                            Dapatkan pengakuan kompetensi resmi nasional melalui program sertifikasi profesi bidang ekspor-impor berlisensi BNSP.
                        </p>
                    @endif

                    {{-- CTA Buttons --}}
                    <div class="flex flex-wrap gap-5">
                        <a href="{{ route('daftar') }}"
                           class="group relative inline-flex items-center gap-3 bg-primary text-white font-bold rounded-2xl px-8 py-4 text-base transition-all duration-300 hover:scale-105 active:scale-95 shadow-premium overflow-hidden">
                            <span class="absolute inset-0 bg-accent translate-y-full group-hover:translate-y-0 transition-transform duration-500 rounded-2xl"></span>
                            <span class="relative">Mulai Sertifikasi</span>
                            <svg class="relative w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="{{ route('sertifikasi') }}"
                           class="inline-flex items-center gap-3 bg-white text-primary border-2 border-primary/10 font-bold rounded-2xl px-8 py-4 text-base transition-all duration-300 hover:border-primary hover:bg-gray-50">
                            Lihat Skema
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right: Dynamic Visual --}}
            <div class="relative lg:block hidden lg:col-span-5 w-full max-w-[400px] lg:max-w-none mx-auto">
                <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 400)"
                     :class="show ? 'opacity-100 scale-100 translate-x-0' : 'opacity-0 scale-95 translate-x-12'"
                     class="transition-all duration-1000 relative">
                    
                    {{-- Abstract Image Frame --}}
                    <div class="relative z-10 w-full max-w-[360px] xl:max-w-[400px] aspect-[4/5] rounded-[40px] overflow-hidden shadow-2xl rotate-3 transition-transform duration-700 hover:rotate-0 group border-[8px] border-white mx-auto">
                        <img src="{{ $hero && $hero->image ? $hero->image_url : asset('img/hero-illustration.png') }}" 
                             alt="Professional Export" 
                             class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/40 via-transparent to-transparent opacity-60 group-hover:opacity-20 transition-opacity"></div>
                    </div>

                    {{-- Floating Glass Cards Removed --}}
                    {{-- Decorative Elements --}}
                    <div class="absolute top-1/2 -right-12 w-24 h-24 bg-accent/10 rounded-full blur-2xl animate-pulse"></div>
                    <div class="absolute -bottom-20 left-1/4 w-48 h-48 bg-primary/5 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </div>
</section>
