@extends('layouts.admin')
@section('title', 'Pengaturan Global')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Pengaturan Global</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            @foreach($settings as $group => $items)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-soft border-b border-gray-50 px-8 py-4">
                        <h2 class="text-xs font-bold text-primary uppercase tracking-widest">{{ $group }}</h2>
                    </div>
                    <div class="p-8 space-y-6">
                        @foreach($items as $setting)
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">{{ $setting->label }}</label>
                                
                                @if($setting->type === 'text')
                                    <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}"
                                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                                @elseif($setting->type === 'textarea')
                                    <textarea name="{{ $setting->key }}" rows="3"
                                              class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none">{{ $setting->value }}</textarea>
                                                               @elseif($setting->type === 'image')
                                    <div class="space-y-2">
                                        @if($setting->key === 'site_logo')
                                            <p class="text-xs text-gray-400">Rekomendasi logo: <strong>Tinggi minimal 80 piksel (format PNG transparan disarankan)</strong></p>
                                        @elseif($setting->key === 'site_favicon' || str_contains($setting->key, 'favicon'))
                                            <p class="text-xs text-gray-400">Rekomendasi favicon: <strong>32 x 32 / 48 x 48 piksel (format ICO atau PNG)</strong></p>
                                        @endif
                                        <div class="flex items-center gap-6">
                                            @if($setting->value)
                                                <div class="p-2 border border-gray-100 rounded-xl bg-soft">
                                                    <img src="{{ Storage::url($setting->value) }}" alt="{{ $setting->label }}" class="h-12 w-auto object-contain">
                                                </div>
                                            @endif
                                            <input type="file" name="{{ $setting->key }}" accept="image/*"
                                                   class="flex-1 text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                        </div>
                                    </div>
                                @endif
                                <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-tight font-mono">Key: {{ $setting->key }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex items-center gap-3 mt-10 pt-6 border-t border-gray-100">
            <button type="submit"
                    class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md">
                Simpan Semua Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
