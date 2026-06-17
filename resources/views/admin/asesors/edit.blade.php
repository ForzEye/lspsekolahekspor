@extends('layouts.admin')
@section('title', 'Edit Asesor')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.asesors.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Edit Asesor</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.asesors.update', $asesor) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $asesor->name) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Posisi / Keahlian <span class="text-red-500">*</span></label>
                    <input type="text" name="position" value="{{ old('position', $asesor->position) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi Singkat</label>
                    <textarea name="description" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none">{{ old('description', $asesor->description) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Foto Asesor</label>
                    @if($asesor->photo)
                        <div class="flex items-center gap-4 mb-3 p-3 bg-soft rounded-xl">
                            <img src="{{ $asesor->photo_url }}" alt="{{ $asesor->name }}" class="w-16 h-16 rounded-lg object-cover">
                            <p class="text-xs text-gray-500">Ganti foto dengan upload baru di bawah ini.</p>
                        </div>
                    @endif
                    <input type="file" name="photo" accept="image/*"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm file:mr-3 file:text-xs file:font-semibold file:rounded-lg file:border-0 file:bg-primary file:text-white">
                    <p class="text-gray-400 text-xs mt-1">Rekomendasi ukuran: <strong>600 x 800 piksel (Rasio 3:4)</strong>. Max 2MB. Format: JPG, PNG, WEBP</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Urutan Tampil</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $asesor->sort_order) }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    </div>
                    <div class="flex items-center">
                        <label class="flex items-center gap-3 cursor-pointer mt-6">
                            <input type="checkbox" name="is_active" value="1" {{ $asesor->is_active ? 'checked' : '' }} class="w-5 h-5 rounded accent-primary">
                            <span class="text-sm font-medium text-gray-700">Aktif</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
