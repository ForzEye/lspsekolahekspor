@extends('layouts.admin')
@section('title', 'Alur Sertifikasi')

@section('content')
<div class="max-w-7xl mx-auto py-4">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)"
             :class="show ? 'animate-spring-up' : 'opacity-0'">
            <h1 class="font-display text-3xl font-black text-primary tracking-tight">Certification Workflow</h1>
            <div class="flex items-center gap-3 mt-2">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">Process Designer</p>
                <div class="w-1 h-1 rounded-full bg-gray-200"></div>
                <p class="text-xs text-gray-500 font-bold">Manage steps for Offline & Online routes</p>
            </div>
        </div>
        
        <a href="{{ route('admin.sertifikasi.alurs.create') }}"
           class="group inline-flex items-center gap-2 bg-primary hover:bg-accent text-white font-bold px-6 py-3 rounded-2xl text-sm transition-all shadow-glow hover:shadow-glow-accent hover:-translate-y-1 active:scale-95">
            <div class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center transition-transform group-hover:rotate-90">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            Define New Step
        </a>
    </div>

    <div class="grid lg:grid-cols-2 gap-10">
        {{-- Tatap Muka Column --}}
        <div>
            <div class="flex items-center justify-between mb-6 px-4">
                <h2 class="font-display font-black text-primary text-xl flex items-center gap-3">
                    <span class="text-2xl">🏢</span>
                    Offline / Tatap Muka
                </h2>
                <span class="text-[10px] font-black text-gray-400 bg-gray-50 px-3 py-1 rounded-full border border-gray-100 uppercase tracking-[0.1em]">{{ $alurs->where('type', 'tatap_muka')->count() }} Steps</span>
            </div>
            
            <div class="space-y-4">
                @forelse($alurs->where('type', 'tatap_muka') as $index => $alur)
                    <div class="group bg-white p-6 rounded-[32px] shadow-sm border border-gray-50 hover:shadow-premium hover:-translate-y-1 transition-all duration-300 flex items-center gap-6"
                         x-data="{ show: false }" x-init="setTimeout(() => show = true, {{ $index * 50 }})"
                         :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-4'">
                        <div class="w-12 h-12 rounded-2xl bg-primary/5 text-primary font-black text-lg flex items-center justify-center flex-shrink-0 transition-transform group-hover:scale-110 group-hover:rotate-6 ring-1 ring-primary/5 shadow-inner">
                            {{ $alur->step_number }}
                        </div>
                        <div class="flex-1">
                            <h3 class="font-display font-bold text-primary text-base">{{ $alur->title }}</h3>
                            <p class="text-gray-400 text-xs mt-1 line-clamp-1 font-medium italic">"{{ $alur->description }}"</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.sertifikasi.alurs.edit', $alur) }}" 
                               class="p-2.5 rounded-xl bg-gray-50 text-gray-400 hover:bg-primary hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-10 text-center bg-gray-50/50 border border-dashed border-gray-200 rounded-[32px]">
                         <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">No Offline Steps Defined</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Jarak Jauh Column --}}
        <div>
            <div class="flex items-center justify-between mb-6 px-4">
                <h2 class="font-display font-black text-accent text-xl flex items-center gap-3">
                    <span class="text-2xl">💻</span>
                    Online / Remote
                </h2>
                <span class="text-[10px] font-black text-gray-400 bg-gray-50 px-3 py-1 rounded-full border border-gray-100 uppercase tracking-[0.1em]">{{ $alurs->where('type', 'jarak_jauh')->count() }} Steps</span>
            </div>
            
            <div class="space-y-4">
                @forelse($alurs->where('type', 'jarak_jauh') as $index => $alur)
                    <div class="group bg-white p-6 rounded-[32px] shadow-sm border border-gray-50 hover:shadow-premium-accent hover:-translate-y-1 transition-all duration-300 flex items-center gap-6"
                         x-data="{ show: false }" x-init="setTimeout(() => show = true, {{ $index * 50 }})"
                         :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-4'">
                        <div class="w-12 h-12 rounded-2xl bg-accent/5 text-accent font-black text-lg flex items-center justify-center flex-shrink-0 transition-transform group-hover:scale-110 group-hover:-rotate-6 ring-1 ring-accent/5 shadow-inner">
                            {{ $alur->step_number }}
                        </div>
                        <div class="flex-1">
                            <h3 class="font-display font-bold text-primary text-base">{{ $alur->title }}</h3>
                            <p class="text-gray-400 text-xs mt-1 line-clamp-1 font-medium italic">"{{ $alur->description }}"</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.sertifikasi.alurs.edit', $alur) }}" 
                               class="p-2.5 rounded-xl bg-gray-50 text-gray-400 hover:bg-accent hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-10 text-center bg-gray-50/50 border border-dashed border-gray-200 rounded-[32px]">
                         <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">No Online Steps Defined</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
