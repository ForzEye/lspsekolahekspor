{{-- Admin Sidebar: Modern Premium --}}
<aside class="w-68 bg-primary-dark min-h-screen flex flex-col flex-shrink-0 sticky top-0 h-screen z-40 shadow-2xl">

    {{-- Logo Section --}}
    <div class="px-8 py-10">
        <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-4">
            <div class="relative">
                @if($globalSettings->get('site_logo'))
                    <img src="{{ Storage::url($globalSettings->get('site_logo')) }}" alt="Logo" class="h-9 w-auto transition-transform duration-500 group-hover:scale-110">
                @else
                    <div class="w-10 h-10 rounded-2xl bg-accent flex items-center justify-center shadow-lg transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                        <span class="text-white font-bold text-base font-display">SE</span>
                    </div>
                @endif
                <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-primary-dark shadow-sm"></div>
            </div>
            <div>
                <span class="font-display font-black text-white text-base leading-none block tracking-tight">Admin OS</span>
                <span class="text-white/40 text-[10px] uppercase font-bold tracking-widest mt-1">LSP Sekolah Ekspor</span>
            </div>
        </a>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 py-2 space-y-1 overflow-y-auto">
        @php
            $navSections = [
                'Main Dashboard' => [
                    ['route' => 'admin.dashboard', 'label' => 'Overview', 'icon' => '<path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>'],
                ],
                'Core Settings' => [
                    ['route' => 'admin.hero.edit', 'label' => 'Hero Banner', 'icon' => '<path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>'],
                    ['route' => 'admin.settings.index', 'label' => 'Global Config', 'icon' => '<path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924-1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                ],
                'Content Engine' => [
                    ['route' => 'admin.about.edit', 'label' => 'Tentang Kami', 'icon' => '<path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>'],
                    ['route' => 'admin.sertifikasi.skemas.index', 'label' => 'Skema Sertifikasi', 'icon' => '<path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>'],
                    ['route' => 'admin.sertifikasi.alurs.index', 'label' => 'Alur Proses', 'icon' => '<path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>'],
                ],
                'Human Capital' => [
                    ['route' => 'admin.team.index', 'label' => 'Struktur Organisasi', 'icon' => '<path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                    ['route' => 'admin.asesors.index', 'label' => 'Asesor', 'icon' => '<path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>'],
                    ['route' => 'admin.activities.index', 'label' => 'Dokumentasi & Galeri', 'icon' => '<path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>'],
                ],
                'Feedback' => [
                    ['route' => 'admin.testimonials.index', 'label' => 'Testimonials', 'icon' => '<path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>'],
                    ['route' => 'admin.contact.edit', 'label' => 'Contact Info', 'icon' => '<path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>'],
                ]
            ];
        @endphp

        @foreach($navSections as $section => $items)
            <div class="pt-6 pb-2 px-4">
                <p class="text-white/20 text-[10px] uppercase tracking-[0.2em] font-black">{{ $section }}</p>
            </div>
            @foreach($items as $item)
                @php $isActive = request()->routeIs($item['route'] . '*'); @endphp
                <a href="{{ route($item['route']) }}"
                   class="flex items-center gap-4 px-6 py-3.5 rounded-2xl text-[13px] font-bold transition-all duration-300 group
                          {{ $isActive
                             ? 'bg-accent text-white shadow-glow translate-x-1'
                             : 'text-white/50 hover:bg-white/5 hover:text-white hover:translate-x-1' }}">
                    <svg class="w-5 h-5 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        {!! $item['icon'] !!}
                    </svg>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        @endforeach
    </nav>

    {{-- Footer --}}
    <div class="p-8 border-t border-white/5">
        <div class="glass-dark p-4 rounded-2xl">
            <div class="flex items-center gap-3">
                <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                <span class="text-[10px] font-bold text-white uppercase tracking-widest">System Operational</span>
            </div>
            <p class="text-[9px] text-white/30 mt-2">© 2026 Senusa Admin V2</p>
        </div>
    </div>
</aside>

