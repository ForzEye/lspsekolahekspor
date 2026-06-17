@extends('layouts.admin')
@section('title', 'Edit Statistik Kelulusan')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.statistics.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Edit Program Statistik</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.statistics.update', $statistic) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Program / Skema Sertifikasi <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_program" value="{{ old('nama_program', $statistic->nama_program) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    @error('nama_program')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Peserta Kompeten <span class="text-red-500">*</span></label>
                        <input type="number" name="peserta_kompeten" value="{{ old('peserta_kompeten', $statistic->peserta_kompeten) }}" required min="0"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        @error('peserta_kompeten')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Peserta Belum Kompeten <span class="text-red-500">*</span></label>
                        <input type="number" name="peserta_belum_kompeten" value="{{ old('peserta_belum_kompeten', $statistic->peserta_belum_kompeten) }}" required min="0"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        @error('peserta_belum_kompeten')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Order Tampil (Sort Order)</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $statistic->sort_order) }}" min="0"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    @error('sort_order')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.statistics.index') }}" class="border border-gray-200 text-gray-500 hover:bg-gray-50 px-6 py-3.5 rounded-xl text-sm font-bold transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
