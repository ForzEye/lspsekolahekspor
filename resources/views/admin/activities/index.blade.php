@extends('layouts.admin')
@section('title', 'Dokumentasi & Galeri')

@section('content')
<div class="max-w-7xl mx-auto py-4">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)"
             :class="show ? 'animate-spring-up' : 'opacity-0'">
            <h1 class="font-display text-3xl font-black text-primary tracking-tight">Dokumentasi & Galeri</h1>
            <div class="flex items-center gap-3 mt-2">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Activity Feed</p>
                <div class="w-1 h-1 rounded-full bg-gray-200"></div>
                <p class="text-xs text-gray-500 font-bold">{{ count($activities) }} Items documented</p>
            </div>
        </div>
        
        <a href="{{ route('admin.activities.create') }}"
           class="group inline-flex items-center gap-2 bg-primary hover:bg-accent text-white font-bold px-6 py-3 rounded-2xl text-sm transition-all shadow-glow hover:shadow-glow hover:-translate-y-1 active:scale-95">
            <div class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center transition-transform group-hover:rotate-90">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            Tambah Kegiatan Baru
        </a>
    </div>

    {{-- Table Container --}}
    <div class="bg-white rounded-[40px] shadow-premium border border-gray-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Preview & Info</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Category</th>
                        <th class="px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status</th>
                        <th class="px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($activities as $index => $activity)
                        <tr class="hover:bg-gray-50/50 transition-all duration-300 group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-5">
                                    <div class="w-20 h-16 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0 shadow-inner group-hover:scale-105 transition-transform">
                                        @if($activity->type === 'image')
                                            <img src="{{ $activity->media_url }}" alt="{{ $activity->title }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-accent/20 text-accent font-black text-[10px]">VIDEO</div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-display font-black text-primary text-base tracking-tight leading-none">{{ $activity->title }}</p>
                                        <p class="text-gray-400 text-[10px] mt-2 font-bold uppercase tracking-widest">{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border border-gray-100 text-gray-500 bg-white">
                                    {{ $activity->category }}
                                </span>
                            </td>
                            <td class="px-6 py-6">
                                @if($activity->is_featured)
                                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent/10 border border-accent/20 text-accent text-[10px] font-black uppercase tracking-widest">
                                        <span class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse"></span>
                                        Featured Home
                                    </div>
                                @else
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Gallery Only</span>
                                @endif
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.activities.edit', $activity) }}"
                                       class="p-2.5 rounded-xl bg-white border border-gray-100 text-primary hover:bg-primary hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </a>
                                    <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kegiatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2.5 rounded-xl bg-white border border-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center text-gray-400 font-bold uppercase tracking-widest text-xs">Belum ada data dokumentasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
