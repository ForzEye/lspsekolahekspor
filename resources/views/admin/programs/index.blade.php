@extends('layouts.admin')
@section('title', 'Daftar Program')

@section('content')
<div class="max-w-7xl mx-auto py-4">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)"
             :class="show ? 'animate-spring-up' : 'opacity-0'">
            <h1 class="font-display text-3xl font-black text-primary tracking-tight">Management Program</h1>
            <div class="flex items-center gap-3 mt-2">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Content Engine</p>
                <div class="w-1 h-1 rounded-full bg-gray-200"></div>
                <p class="text-xs text-gray-500 font-bold">{{ count($programs) }} Total Items</p>
            </div>
        </div>
        
        <a href="{{ route('admin.programs.create') }}"
           id="btn-tambah-program"
           class="group inline-flex items-center gap-2 bg-primary hover:bg-accent text-white font-bold px-6 py-3 rounded-2xl text-sm transition-all shadow-glow hover:shadow-glow hover:-translate-y-1 active:scale-95">
            <div class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center transition-transform group-hover:rotate-90">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            Create New Program
        </a>
    </div>

    {{-- Table Container --}}
    <div class="bg-white rounded-[40px] shadow-premium border border-gray-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Program Identity</th>
                        <th class="text-left px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] hidden lg:table-cell">Duration & Type</th>
                        <th class="text-left px-6 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Operational Status</th>
                        <th class="text-right px-8 py-5 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Quick Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($programs as $index => $program)
                        <tr class="hover:bg-gray-50/50 transition-all duration-300 group"
                            x-data="{ show: false }" x-init="setTimeout(() => show = true, {{ $index * 50 }})"
                            :class="show ? 'opacity-100' : 'opacity-0'">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-5">
                                    <div class="w-14 h-14 rounded-2xl bg-primary/5 text-primary flex items-center justify-center text-2xl flex-shrink-0 transition-transform group-hover:scale-110 group-hover:rotate-3 shadow-inner">
                                        {{ $program->icon ?? '🎓' }}
                                    </div>
                                    <div>
                                        <p class="font-display font-black text-primary text-base tracking-tight">{{ $program->title }}</p>
                                        <p class="text-gray-400 text-xs mt-1 font-bold line-clamp-1 max-w-sm">{{ $program->description }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6 hidden lg:table-cell">
                                <div class="flex flex-col gap-2">
                                    <div class="flex items-center gap-2 text-xs font-bold text-gray-500">
                                        <span class="opacity-50 text-base leading-none">⏱</span> 
                                        {{ $program->duration ?? 'Unset' }}
                                    </div>
                                    @if($program->mode)
                                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest w-fit
                                             {{ $program->mode == 'Online' ? 'bg-green-50 text-green-600 border border-green-100' : 'bg-blue-50 text-blue-600 border border-blue-100' }}">
                                            {{ $program->mode }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-2xl text-[10px] font-bold border
                                     {{ $program->is_active ? 'bg-green-50 border-green-100 text-green-700' : 'bg-gray-50 border-gray-100 text-gray-400' }}">
                                    <div class="w-2 h-2 rounded-full {{ $program->is_active ? 'bg-green-500 animate-pulse' : 'bg-gray-300' }}"></div>
                                    {{ $program->is_active ? 'LIVE SYSTEM' : 'MAINTENANCE' }}
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.programs.edit', $program) }}"
                                       class="p-2.5 rounded-xl bg-white border border-gray-100 text-primary hover:bg-primary hover:text-white transition-all shadow-sm hover:shadow-glow hover:-translate-y-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                            <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Archive program {{ addslashes($program->title) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="p-2.5 rounded-xl bg-white border border-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-all shadow-sm hover:shadow-glow-red hover:-translate-y-0.5">
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
                                <div class="w-20 h-20 bg-gray-50 rounded-[30px] flex items-center justify-center text-4xl mx-auto mb-6">📭</div>
                                <h3 class="font-display font-black text-primary text-xl mb-2">No Program Data</h3>
                                <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6">Database is currently empty</p>
                                <a href="{{ route('admin.programs.create') }}" class="bg-primary text-white font-bold px-8 py-3 rounded-2xl text-xs hover:bg-accent transition-all shadow-glow">Create First Entry</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($programs->hasPages())
            <div class="px-8 py-6 bg-gray-50/30 border-t border-gray-100">
                <div class="flex justify-between items-center">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Viewing {{ $programs->count() }} of {{ $programs->total() }} total entries</p>
                    {{ $programs->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
