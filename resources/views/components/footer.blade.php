{{-- Footer --}}
<footer class="bg-primary-dark text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Main Footer Content --}}
        <div class="py-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- Brand Column --}}
            <div class="lg:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center mb-4 group">
                    @if($globalSettings->get('site_logo'))
                        <img src="{{ Storage::url($globalSettings->get('site_logo')) }}" alt="{{ $globalSettings->get('site_name', 'LSP SEN') }}" class="h-14 w-auto object-contain transition-all duration-500 group-hover:scale-105">
                    @else
                        <img src="{{ asset('img/site-logo.png') }}" alt="Logo" class="h-14 w-auto object-contain transition-all duration-500 group-hover:scale-105">
                    @endif
                </a>
                <p class="text-white/60 text-sm leading-relaxed mb-6 italic font-medium">
                    {{ $globalSettings->get('footer_description', 'Lembaga Sertifikasi & Pelatihan Ekspor berlisensi BNSP untuk mencetak eksportir profesional Indonesia.') }}
                </p>
                {{-- Social Links --}}
                <div class="flex gap-3">
                    <a href="{{ $globalContact->instagram ?? '#' }}" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-accent flex items-center justify-center transition-colors group" aria-label="Instagram" target="_blank" rel="noopener">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="{{ $globalContact->whatsapp ? 'https://wa.me/' . $globalContact->whatsapp : '#' }}" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-accent flex items-center justify-center transition-colors" aria-label="WhatsApp" target="_blank" rel="noopener">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                    </a>
                    <a href="{{ $globalContact->youtube ?? '#' }}" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-accent flex items-center justify-center transition-colors" aria-label="YouTube" target="_blank" rel="noopener">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-display font-bold text-white mb-5 text-sm">Navigasi</h4>
                <ul class="space-y-2.5">
                    @foreach([
                        ['route' => 'home', 'label' => 'Beranda'],
                        ['route' => 'profil', 'label' => 'Tentang Kami'],
                        ['route' => 'sertifikasi', 'label' => 'Sertifikasi'],
                        ['route' => 'kontak', 'label' => 'Kontak Kami'],
                        ['route' => 'daftar', 'label' => 'Daftar Program'],
                    ] as $link)
                        <li>
                            <a href="{{ route($link['route']) }}"
                               class="text-white/60 hover:text-white text-sm transition-colors hover:pl-1 duration-150 block">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Sertifikasi Links --}}
            <div>
                <h4 class="font-display font-bold text-white mb-5 text-sm">Sertifikasi</h4>
                <ul class="space-y-2.5">
                    @foreach([
                        'Skema Sertifikasi',
                        'Alur Sertifikasi',
                        'Persyaratan',
                        'Asesor Kompetensi',
                        'FAQ Sertifikasi',
                    ] as $item)
                        <li>
                            <a href="{{ route('sertifikasi') }}"
                               class="text-white/60 hover:text-white text-sm transition-colors hover:pl-1 duration-150 block">
                                {{ $item }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="font-display font-black text-white mb-6 text-xs uppercase tracking-widest leading-none">Operational Hub</h4>
                <ul class="space-y-5">
                    <li class="flex gap-4 items-start">
                        <div class="w-10 h-10 rounded-2xl bg-white/5 flex items-center justify-center flex-shrink-0 text-accent border border-white/5 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-width="2.5" stroke-linecap="round"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2.5" stroke-linecap="round"/></svg>
                        </div>
                        <span class="text-white/60 text-[11px] font-bold leading-relaxed">{!! nl2br(e($globalContact->address ?? $globalSettings->get('contact_address', "Jl. Ekspor Nasional No. 1,\nJakarta Selatan 12345"))) !!}</span>
                    </li>
                    <li class="flex gap-4 items-center">
                        <div class="w-10 h-10 rounded-2xl bg-white/5 flex items-center justify-center flex-shrink-0 text-accent border border-white/5 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2.5" stroke-linecap="round"/></svg>
                        </div>
                        <a href="mailto:{{ $globalContact->email ?? $globalSettings->get('contact_email', 'info@sekolahekspor.id') }}" class="text-white/60 hover:text-white text-[11px] font-bold transition-colors">{{ $globalContact->email ?? $globalSettings->get('contact_email', 'info@sekolahekspor.id') }}</a>
                    </li>
                    <li class="flex gap-4 items-center">
                        <div class="w-10 h-10 rounded-2xl bg-white/5 flex items-center justify-center flex-shrink-0 text-accent border border-white/5 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2.5" stroke-linecap="round"/></svg>
                        </div>
                        <span class="text-white/60 text-[11px] font-black uppercase tracking-tight">{{ $globalContact->office_hours ?? $globalSettings->get('contact_hours', 'Senin - Jumat: 08.00 - 17.00 WIB') }}</span>
                    </li>
                </ul>
                
            </div>
        </div>

        {{-- Full-Width Lokasi Kami Map --}}
        @if($globalContact && $globalContact->maps_embed_url)
            <div class="border-t border-white/10" style="padding-top: 2.5rem; padding-bottom: 2rem;">
                <h4 class="font-display font-black text-white mb-6 text-xs uppercase tracking-widest leading-none">Lokasi Kami</h4>
                <div class="rounded-3xl overflow-hidden border border-white/10 shadow-lg relative w-full" style="height: 320px;" id="footer-maps-embed-container">
                    @if(str_contains($globalContact->maps_embed_url, '<iframe'))
                        {!! $globalContact->maps_embed_url !!}
                    @else
                        <iframe src="{{ $globalContact->maps_embed_url }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @endif
                </div>
                <style>
                    #footer-maps-embed-container iframe {
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

        {{-- Bottom Bar --}}
        <div class="border-t border-white/10 py-5 flex flex-col sm:flex-row justify-between items-center gap-3">
            <p class="text-white/40 text-xs">
                {{ $globalSettings->get('footer_text', '© ' . date('Y') . ' LSP/LPK Sekolah Ekspor Nasional. Semua hak dilindungi.') }}
            </p>
            <div class="flex items-center gap-4">
                <span class="text-white/30 text-xs">Terakreditasi</span>
                <div class="bg-white/10 rounded-lg px-3 py-1">
                    <span class="text-white font-bold text-xs font-display">BNSP</span>
                </div>
            </div>
        </div>
    </div>
</footer>
