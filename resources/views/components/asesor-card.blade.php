@props(['asesor'])

<div class="bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-md transition-all duration-300 border border-gray-100 hover:-translate-y-1">

    {{-- Photo / Initials Avatar --}}
    <div class="mb-4 flex justify-center">
        @if($asesor->photo)
            <img src="{{ $asesor->photo_url }}"
                 alt="{{ $asesor->name }}"
                 class="w-24 h-24 rounded-full object-cover border-4 border-soft shadow">
        @else
            <div class="w-24 h-24 rounded-full bg-primary flex items-center justify-center border-4 border-soft shadow">
                <span class="text-white text-2xl font-bold font-display">{{ $asesor->initials }}</span>
            </div>
        @endif
    </div>

    {{-- Name --}}
    <h3 class="font-display font-bold text-gray-900 text-base mb-1">{{ $asesor->name }}</h3>

    {{-- Title --}}
    @if($asesor->title)
        <p class="text-gray-500 text-xs mb-3">{{ $asesor->title }}</p>
    @endif

    {{-- Expertise Badge --}}
    @if($asesor->expertise)
        <span class="inline-block bg-accent/10 text-accent text-xs rounded-full px-3 py-1 font-medium mb-2">
            {{ $asesor->expertise }}
        </span>
    @endif

    {{-- BNSP Badge --}}
    @if($asesor->asesor_badge)
        <div class="mt-2">
            <span class="inline-block border border-primary/20 text-primary text-xs rounded-full px-3 py-1">
                🏅 {{ $asesor->asesor_badge }}
            </span>
        </div>
    @endif
</div>
