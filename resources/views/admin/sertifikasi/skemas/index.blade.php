@extends('layouts.admin')
@section('title', 'Skema Sertifikasi')

@section('content')
<div class="max-w-7xl mx-auto py-4">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)"
             :class="show ? 'animate-spring-up' : 'opacity-0'">
            <h1 class="font-display text-3xl font-black text-primary tracking-tight">Certification Schemes</h1>
            <div class="flex items-center gap-3 mt-2">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">BNSP Framework</p>
                <div class="w-1 h-1 rounded-full bg-gray-200"></div>
                <p class="text-xs text-gray-500 font-bold">{{ count($skemas) }} Valid Skema</p>
            </div>
        </div>
        
        <a href="{{ route('admin.sertifikasi.skemas.create') }}"
           class="group inline-flex items-center gap-2 bg-primary hover:bg-accent text-white font-bold px-6 py-3 rounded-2xl text-sm transition-all shadow-glow hover:shadow-glow-accent hover:-translate-y-1 active:scale-95">
            <div class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center transition-transform group-hover:rotate-90">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            Add New Scheme
        </a>
    </div>

    {{-- Table Container --}}
    <div class="bg-white rounded-[40px] shadow-premium border border-gray-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Scheme Name & Code</th>
                        <th class="text-left px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Harga</th>
                        <th class="text-left px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Operational Status</th>
                        <th class="text-right px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Management</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($skemas as $index => $skema)
                        <tr class="hover:bg-gray-50/50 transition-all duration-300 group"
                            x-data="{ show: false }" x-init="setTimeout(() => show = true, {{ $index * 50 }})"
                            :class="show ? 'opacity-100' : 'opacity-0'">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-5">
                                    <div class="w-12 h-12 rounded-xl bg-accent/5 text-accent flex items-center justify-center font-bold text-xs ring-1 ring-accent/10 flex-shrink-0 transition-transform group-hover:scale-110 shadow-inner">
                                        BNSP
                                    </div>
                                    <div>
                                        <p class="font-display font-black text-primary text-base tracking-tight">{{ $skema->nama }}</p>
                                        <p class="text-gray-400 text-[10px] mt-1 font-mono font-bold tracking-widest uppercase opacity-70 group-hover:opacity-100 transition-opacity">{{ $skema->kode }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 text-sm font-bold text-gray-700">
                                @if($skema->harga)
                                    Rp {{ number_format($skema->harga, 0, ',', '.') }}
                                @else
                                    <span class="text-gray-400 font-normal">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-6">
                                <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-2xl text-[10px] font-bold border
                                     {{ $skema->is_active ? 'bg-green-50 border-green-100 text-green-700' : 'bg-gray-50 border-gray-100 text-gray-400' }}">
                                    <div class="w-2 h-2 rounded-full {{ $skema->is_active ? 'bg-green-500 animate-pulse' : 'bg-gray-300' }}"></div>
                                    {{ $skema->is_active ? 'ENABLED' : 'DISABLED' }}
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.sertifikasi.skemas.edit', $skema) }}"
                                       class="p-2.5 rounded-xl bg-white border border-gray-100 text-primary hover:bg-primary hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.sertifikasi.skemas.destroy', $skema) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Hapus skema {{ addslashes($skema->nama) }}?')">
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
                            <td colspan="4" class="px-8 py-24 text-center">
                                <div class="w-20 h-20 bg-gray-50 rounded-[30px] flex items-center justify-center text-4xl mx-auto mb-6">📄</div>
                                <h3 class="font-display font-black text-primary text-xl mb-2">No Certification Schemes</h3>
                                <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6">Database currently contains no framework data</p>
                                <a href="{{ route('admin.sertifikasi.skemas.create') }}" class="bg-primary text-white font-bold px-8 py-3 rounded-2xl text-xs hover:bg-accent transition-all shadow-glow">Initialize Schemes</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($skemas->hasPages())
            <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                <div class="flex justify-between items-center">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Showing {{ $skemas->count() }} framework definitions</p>
                    {{ $skemas->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
