{{-- Navbar: Modern Glassmorphism --}}
<nav x-data="{ open: false, scrolled: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="scrolled ? 'bg-white/80 border-b border-gray-100 shadow-glass py-2' : 'bg-transparent py-4'"
     class="fixed top-0 inset-x-0 z-50 transition-all duration-500 backdrop-blur-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between transition-all duration-300">

            {{-- Logo Section --}}
            <a href="{{ route('home') }}" class="group flex items-center py-1">
                @if($globalSettings->get('site_logo'))
                    <img src="{{ Storage::url($globalSettings->get('site_logo')) }}" alt="{{ $globalSettings->get('site_name', 'LSP SEN') }}" class="h-16 w-auto object-contain transition-all duration-500 group-hover:scale-105">
                @else
                    <img src="{{ asset('img/site-logo.png') }}" alt="Logo" class="h-16 w-auto object-contain transition-all duration-500 group-hover:scale-105">
                @endif
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden lg:flex items-center bg-gray-50/50 p-1.5 rounded-2xl border border-gray-100/50">
                @php
                    $navLinks = [
                        ['route' => 'home', 'label' => 'Beranda'],
                        ['route' => 'profil', 'label' => 'Tentang Kami'],
                        ['route' => 'sertifikasi', 'label' => 'Sertifikasi'],
                        ['route' => 'gallery', 'label' => 'Galeri'],
                        ['route' => 'kontak', 'label' => 'Kontak Kami'],
                    ];
                @endphp
                @foreach($navLinks as $link)
                    @php $isActive = request()->routeIs($link['route']); @endphp
                    <a href="{{ route($link['route']) }}"
                       class="relative px-5 py-2 rounded-xl text-sm font-semibold transition-all duration-300 group
                              {{ $isActive ? 'text-white' : 'text-gray-600 hover:text-primary' }}">
                        @if($isActive)
                            <span class="absolute inset-0 bg-primary rounded-xl shadow-lg -z-10" 
                                  x-transition:enter="transition ease-out duration-300"
                                  x-transition:enter-start="scale-90 opacity-0"
                                  x-transition:enter-end="scale-100 opacity-100"></span>
                        @endif
                        <span class="relative">{{ $link['label'] }}</span>
                        @if(!$isActive)
                            <span class="absolute bottom-1.5 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-accent rounded-full transition-all duration-300 group-hover:w-1/3"></span>
                        @endif
                    </a>
                @endforeach
            </div>

            {{-- Action Buttons --}}
            <div class="hidden lg:flex items-center gap-4">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-gray-400 hover:text-primary transition-colors">CMS Admin</a>
                @endauth
                <a href="{{ route('daftar') }}"
                   class="bg-accent hover:bg-accent-dark text-white font-bold rounded-2xl px-6 py-3 text-sm transition-all duration-300 hover:scale-105 active:scale-95 shadow-glow hover:shadow-orange-200">
                    Daftar Sekarang
                </a>
            </div>

            {{-- Mobile Button --}}
            <button @click="open = !open"
                    class="lg:hidden w-10 h-10 flex items-center justify-center rounded-2xl bg-gray-50 text-gray-600 hover:bg-gray-100 transition-all active:scale-90"
                    aria-label="Menu">
                <div class="relative w-5 h-4">
                    <span :class="open ? 'rotate-45 translate-y-2 w-5' : 'w-5'" class="absolute h-0.5 bg-current rounded-full transition-all duration-300 top-0"></span>
                    <span :class="open ? 'opacity-0' : 'opacity-100'" class="absolute h-0.5 bg-current rounded-full transition-all duration-300 top-2 w-3"></span>
                    <span :class="open ? '-rotate-45 -translate-y-2 w-5' : 'w-5'" class="absolute h-0.5 bg-current rounded-full transition-all duration-300 top-4"></span>
                </div>
            </button>
        </div>

        {{-- Mobile Overlay --}}
        <div x-show="open" 
             x-transition:enter="transition-all duration-500"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition-all duration-500"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-full"
             class="fixed inset-0 lg:hidden z-40 bg-white p-6 flex flex-col">
            <div class="flex items-center justify-between mb-12">
                <span class="text-2xl font-display font-bold text-primary">Menu</span>
                <button @click="open = false" class="w-12 h-12 rounded-full bg-gray-50 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2.5" stroke-linecap="round"/></svg>
                </button>
            </div>
            
            <nav class="flex-1 space-y-4">
                @foreach($navLinks as $index => $link)
                    <a href="{{ route($link['route']) }}"
                       class="block text-4xl font-display font-extrabold transition-all duration-300 hover:text-accent
                              {{ request()->routeIs($link['route']) ? 'text-primary' : 'text-gray-200' }}"
                       style="transition-delay: {{ $index * 100 }}ms">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="mt-auto">
                <a href="{{ route('daftar') }}"
                   class="block w-full bg-accent text-white text-center py-4 rounded-3xl font-bold text-xl shadow-glow">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</nav>
