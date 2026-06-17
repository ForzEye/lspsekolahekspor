@extends('layouts.admin')
@section('title', 'Statistik Kelulusan Asesi')

@section('content')
<div class="max-w-7xl mx-auto py-4">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)"
             :class="show ? 'animate-spring-up' : 'opacity-0'">
            <h1 class="font-display text-3xl font-black text-primary tracking-tight">Statistik Kelulusan</h1>
            <div class="flex items-center gap-3 mt-2">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Skema Kompetensi</p>
                <div class="w-1 h-1 rounded-full bg-gray-200"></div>
                <p class="text-xs text-gray-500 font-bold">{{ $statistics->total() }} Program Skema</p>
            </div>
        </div>
        
        <a href="{{ route('admin.statistics.create') }}"
           class="group inline-flex items-center gap-2 bg-primary hover:bg-accent text-white font-bold px-6 py-3 rounded-2xl text-sm transition-all shadow-glow hover:shadow-glow-accent hover:-translate-y-1 active:scale-95">
            <div class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center transition-transform group-hover:rotate-90">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            Tambah Program
        </a>
    </div>

    {{-- Table Container --}}
    <div class="bg-white rounded-[40px] shadow-premium border border-gray-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] w-16">No</th>
                        <th class="text-left px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Program Skema Sertifikasi</th>
                        <th class="text-center px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Peserta Kompeten</th>
                        <th class="text-center px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Peserta Belum Kompeten</th>
                        <th class="text-center px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Order</th>
                        <th class="text-right px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($statistics as $index => $stat)
                        <tr class="hover:bg-gray-50/50 transition-all duration-300 group"
                            x-data="{ show: false }" x-init="setTimeout(() => show = true, {{ $index * 50 }})"
                            :class="show ? 'opacity-100' : 'opacity-0'">
                            <td class="px-8 py-6 text-sm font-bold text-gray-400">
                                {{ ($statistics->currentPage() - 1) * $statistics->perPage() + $index + 1 }}
                            </td>
                            <td class="px-8 py-6">
                                <p class="font-display font-black text-primary text-base tracking-tight">{{ $stat->nama_program }}</p>
                            </td>
                            <td class="px-6 py-6 text-center text-sm font-bold text-green-600">
                                {{ number_format($stat->peserta_kompeten, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-6 text-center text-sm font-bold text-red-500">
                                {{ $stat->peserta_belum_kompeten > 0 ? number_format($stat->peserta_belum_kompeten, 0, ',', '.') : '-' }}
                            </td>
                            <td class="px-6 py-6 text-center text-sm font-bold text-gray-400">
                                {{ $stat->sort_order }}
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.statistics.edit', $stat) }}"
                                       class="p-2.5 rounded-xl bg-white border border-gray-100 text-primary hover:bg-primary hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.statistics.destroy', $stat) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Hapus data statistik untuk {{ addslashes($stat->nama_program) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="p-2.5 rounded-xl bg-white border border-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                                <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-24 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-[30px] flex items-center justify-center text-4xl mx-auto mb-6">📊</div>
                                <h3 class="font-display font-black text-primary text-xl mb-2">Belum Ada Statistik</h3>
                                <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6">Database tidak memiliki data statistik kelulusan asesi</p>
                                <a href="{{ route('admin.statistics.create') }}" class="bg-primary text-white font-bold px-8 py-3 rounded-2xl text-xs hover:bg-accent transition-all shadow-glow">Tambah Program Statistik</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($statistics->hasPages())
            <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                <div class="flex justify-between items-center">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Menampilkan {{ $statistics->count() }} program skema</p>
                    {{ $statistics->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
