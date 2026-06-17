<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title', 'Dashboard') | Sekolah Ekspor Nasional</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="font-body bg-gray-50/50 antialiased text-gray-900">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('admin.partials.sidebar')

        {{-- Main Area --}}
        <div class="flex-1 flex flex-col min-w-0">

            {{-- Topbar --}}
            <header class="bg-white/80 backdrop-blur-xl border-b border-gray-100 px-8 py-5 flex items-center justify-between sticky top-0 z-30 shadow-sm">
                <div>
                    <h2 class="font-display font-black text-primary text-xl tracking-tight">@yield('title', 'Dashboard')</h2>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">LSP/LPK — Central Control</p>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" target="_blank"
                       class="group inline-flex items-center gap-2 bg-gray-50 hover:bg-primary hover:text-white px-4 py-2 rounded-xl text-xs font-bold text-gray-500 transition-all">
                        <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Public Website
                    </a>
                    
                    <div class="h-6 w-px bg-gray-100"></div>

                    <div class="flex items-center gap-4 pl-2">
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-bold text-primary leading-none">{{ auth()->user()->name ?? 'Administrator' }}</p>
                            <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-tight">System Manager</p>
                        </div>
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="w-10 h-10 rounded-2xl bg-gradient-to-br from-primary to-primary-light flex items-center justify-center shadow-lg transition-transform hover:scale-105 active:scale-95">
                                <span class="text-white text-sm font-black">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                            </button>
                            
                            {{-- Dropdown Placeholder --}}
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-3 w-48 glass rounded-2xl shadow-premium p-2 border-gray-100 z-50">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center gap-2 px-4 py-2.5 text-xs font-bold text-gray-600 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        Log Out System
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Flash Messages --}}
            <div class="px-6 pt-4">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 flex items-center gap-2 mb-0"
                         x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2">
                        <svg class="w-4 h-4 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                        <button @click="show = false" class="ml-auto text-green-600 hover:text-green-800">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 flex items-center gap-2 mb-0">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                @endif
            </div>

            {{-- Page Content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>
    </div>
    @stack('scripts')
</body>
</html>
