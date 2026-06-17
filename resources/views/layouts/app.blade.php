<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LSP/LPK Sekolah Ekspor Nasional') — Lembaga Sertifikasi & Pelatihan Ekspor BNSP</title>
    <meta name="description" content="@yield('meta_description', $globalSettings->get('meta_description', 'LSP/LPK Sekolah Ekspor Nasional — Lembaga sertifikasi profesi dan pelatihan ekspor berlisensi BNSP.'))">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="font-body text-gray-800 antialiased bg-white">

    {{-- Navbar --}}
    <x-navbar />

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-footer />

    {{-- Floating WhatsApp Button --}}
    @if($globalContact && $globalContact->whatsapp)
        <a href="https://wa.me/{{ $globalContact->whatsapp }}?text={{ urlencode('Halo Sekolah Ekspor Nasional, saya ingin bertanya mengenai program sertifikasi/pelatihan.') }}"
           target="_blank"
           rel="noopener noreferrer"
           class="fixed bottom-6 right-6 z-50 flex items-center justify-center sm:justify-start w-14 sm:w-auto h-14 sm:h-auto sm:pl-4 sm:pr-5 sm:py-3.5 rounded-full bg-gradient-to-r from-[#25D366] to-[#128C7E] text-white shadow-premium hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 group active:scale-95 border border-white/20"
           aria-label="Hubungi kami di WhatsApp">
            {{-- Pulse ring --}}
            <span class="absolute inset-0 rounded-full bg-[#25D366] opacity-35 animate-ping -z-10"></span>
            
            {{-- WhatsApp Icon --}}
            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-white/10 group-hover:rotate-12 transition-transform duration-300">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.517 2.27 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.458L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.625 1.451 5.402.002 9.799-4.394 9.802-9.797.002-2.618-1.01-5.08-2.859-6.93C16.32 2.028 13.86 1.01 11.24 1.01C5.834 1.01 1.438 5.408 1.436 10.813c-.001 1.52.397 3.01 1.156 4.307l-.994 3.635 3.72-.976zm11.393-5.234c-.29-.144-1.716-.848-1.983-.944-.266-.096-.46-.144-.652.144-.19.29-.738.944-.906 1.134-.167.19-.334.215-.624.072-2.905-1.45-4.14-2.228-5.79-5.074-.29-.5-.072-.77.172-1.015.22-.22.46-.53.69-.795.145-.167.24-.29.356-.506.117-.216.058-.41-.03-.553-.086-.144-.652-1.57-.893-2.147-.234-.56-.492-.482-.652-.49-.168-.008-.362-.01-.555-.01-.19 0-.501.072-.763.36-.262.29-1.002.98-1.002 2.385s1.02 2.76 1.164 2.95c.145.19 2.01 3.07 4.87 4.31.68.297 1.21.474 1.62.605.684.218 1.306.187 1.8.113.548-.08 1.716-.7 1.957-1.378.24-.68.24-1.263.17-1.378-.073-.116-.267-.215-.556-.36z"/>
                </svg>
            </span>
            
            {{-- Text label --}}
            <span class="hidden sm:inline-block text-xs font-black tracking-wider uppercase whitespace-nowrap ml-2">Tanya Kami</span>
        </a>
    @endif

    @stack('scripts')
</body>
</html>
