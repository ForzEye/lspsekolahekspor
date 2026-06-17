@props(['program'])

<div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 p-6 border border-gray-100 flex flex-col h-full group">

    {{-- Icon --}}
    <div class="text-3xl mb-4 w-14 h-14 rounded-xl bg-soft flex items-center justify-center group-hover:bg-accent/10 transition-colors duration-200">
        @if($program->icon_image_url)
            <img src="{{ $program->icon_image_url }}" alt="{{ $program->title }}" class="w-8 h-8 object-contain">
        @else
            <span>{{ $program->icon ?? '🎓' }}</span>
        @endif
    </div>

    {{-- Title --}}
    <h3 class="font-display font-bold text-gray-900 text-lg mb-2 group-hover:text-primary transition-colors">
        {{ $program->title }}
    </h3>

    {{-- Description --}}
    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-4 flex-1">
        {{ $program->description }}
    </p>

    {{-- Badges --}}
    <div class="flex flex-wrap gap-2 mb-4">
        @if($program->duration)
            <span class="rounded-full bg-soft text-primary text-xs px-3 py-1 font-medium border border-primary/10">
                ⏱ {{ $program->duration }}
            </span>
        @endif

        @if($program->mode)
            @php
                $modeColors = [
                    'Online'  => 'bg-green-50 text-green-700 border-green-100',
                    'Offline' => 'bg-blue-50 text-blue-700 border-blue-100',
                    'Hybrid'  => 'bg-purple-50 text-purple-700 border-purple-100',
                ];
                $modeIcons = ['Online' => '💻', 'Offline' => '🏢', 'Hybrid' => '🔄'];
                $modeColor = $modeColors[$program->mode] ?? 'bg-gray-50 text-gray-600 border-gray-100';
                $modeIcon  = $modeIcons[$program->mode] ?? '';
            @endphp
            <span class="rounded-full text-xs px-3 py-1 font-medium border {{ $modeColor }}">
                {{ $modeIcon }} {{ $program->mode }}
            </span>
        @endif
    </div>

    {{-- Link --}}
    <a href="{{ route('daftar') }}"
       class="inline-flex items-center gap-1.5 text-sm font-semibold text-gray-500 hover:text-accent transition-colors group-hover:text-accent">
        Pelajari Lebih Lanjut
        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
    </a>
</div>
