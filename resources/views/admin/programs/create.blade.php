@extends('layouts.admin')
@section('title', 'Tambah Program')

@section('content')
<div class="max-w-2xl mx-auto">

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.programs.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Tambah Program Baru</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-5">
                {{-- Title --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Program <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                           placeholder="Contoh: Pelatihan Ekspor Dasar"
                           class="w-full border {{ $errors->has('title') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-colors">
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    {{-- Icon --}}
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-1.5">Emoji Icon</label>
                        <input type="text" id="icon" name="icon" value="{{ old('icon', '🎓') }}"
                               placeholder="🎓" maxlength="10"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-colors text-2xl">
                    </div>
                    {{-- Mode --}}
                    <div>
                        <label for="mode" class="block text-sm font-medium text-gray-700 mb-1.5">Mode Pelaksanaan</label>
                        <select id="mode" name="mode"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none bg-white">
                            <option value="">-- Pilih Mode --</option>
                            @foreach(['Online', 'Offline', 'Hybrid'] as $m)
                                <option value="{{ $m }}" {{ old('mode') === $m ? 'selected' : '' }}>{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="4" required
                              placeholder="Deskripsi singkat program..."
                              class="w-full border {{ $errors->has('description') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none resize-none transition-colors">{{ old('description') }}</textarea>
                    @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    {{-- Duration --}}
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-1.5">Durasi</label>
                        <input type="text" id="duration" name="duration" value="{{ old('duration') }}"
                               placeholder="Contoh: 3 Hari, 2 Minggu"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-colors">
                    </div>
                    {{-- Sort Order --}}
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1.5">Urutan Tampil</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-colors">
                    </div>
                </div>

                {{-- Icon Image --}}
                <div>
                    <label for="icon_image" class="block text-sm font-medium text-gray-700 mb-1.5">Gambar Icon (opsional)</label>
                    <input type="file" id="icon_image" name="icon_image" accept="image/*"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm file:mr-3 file:text-xs file:font-semibold file:rounded-lg file:border-0 file:bg-primary file:text-white hover:file:bg-primary-mid transition-colors">
                    <p class="text-gray-400 text-xs mt-1">Rekomendasi ukuran: <strong>200 x 200 piksel (Rasio 1:1)</strong>. Max 2MB. Format: JPG, PNG, WEBP</p>
                </div>

                {{-- Toggles --}}
                <div class="flex gap-8">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}
                               class="w-5 h-5 rounded accent-primary">
                        <span class="text-sm font-medium text-gray-700">Aktif (tampil di website)</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                               class="w-5 h-5 rounded accent-accent">
                        <span class="text-sm font-medium text-gray-700">Unggulan (tampil di homepage)</span>
                    </label>
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" id="btn-simpan-program"
                        class="bg-accent hover:bg-accent-dark text-white font-bold px-6 py-3 rounded-xl text-sm transition-all duration-200 shadow-sm hover:shadow-md">
                    Simpan Program
                </button>
                <a href="{{ route('admin.programs.index') }}"
                   class="border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium px-6 py-3 rounded-xl text-sm transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
