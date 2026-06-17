@extends('layouts.admin')
@section('title', 'Daftar Asesor')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-display text-2xl font-bold text-gray-900">Daftar Asesor</h1>
            <p class="text-gray-500 text-sm mt-0.5">Kelola data asesor kompetensi Sekolah Ekspor Nasional.</p>
        </div>
        <a href="{{ route('admin.asesors.create') }}"
           class="inline-flex items-center gap-2 bg-accent hover:bg-accent-dark text-white font-bold px-5 py-2.5 rounded-xl text-sm transition-all duration-200 shadow-sm hover:shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Asesor
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full">
            <thead class="bg-soft border-b border-gray-100">
                <tr>
                    <th class="text-left px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Asesor</th>
                    <th class="text-left px-4 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Posisi</th>
                    <th class="text-left px-4 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="text-right px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($asesors as $asesor)
                    <tr class="hover:bg-soft transition-colors duration-150 group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($asesor->photo)
                                    <img src="{{ $asesor->photo_url }}" alt="{{ $asesor->name }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold text-xs">{{ $asesor->initials }}</div>
                                @endif
                                <p class="font-display font-semibold text-gray-900 text-sm">{{ $asesor->name }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-600">
                            {{ $asesor->position }}
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-1 rounded-full
                                         {{ $asesor->is_active ? 'bg-green-50 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $asesor->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                {{ $asesor->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.asesors.edit', $asesor) }}" class="text-primary hover:text-primary-mid text-xs font-bold border border-primary/20 px-3 py-1.5 rounded-lg transition-colors">Edit</a>
                                <form action="{{ route('admin.asesors.destroy', $asesor) }}" method="POST" onsubmit="return confirm('Hapus asesor ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold border border-red-100 px-3 py-1.5 rounded-lg transition-colors">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-16 text-center text-gray-400">Belum ada data asesor.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if($asesors->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $asesors->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
