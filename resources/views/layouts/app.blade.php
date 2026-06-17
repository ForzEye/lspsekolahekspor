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

    @stack('scripts')
</body>
</html>
