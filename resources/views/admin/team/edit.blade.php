@extends('layouts.admin')
@section('title', 'Edit Anggota Tim')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.team.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Edit Anggota Tim</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $team->name) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Jabatan <span class="text-red-500">*</span></label>
                    <select name="position" required class="w-full border border-gray-200 bg-white rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Direktur Utama" {{ old('position', $team->position) === 'Direktur Utama' ? 'selected' : '' }}>Dewan Pengarah (Direktur Utama)</option>
                        <option value="Direktur LSP" {{ old('position', $team->position) === 'Direktur LSP' ? 'selected' : '' }}>Direktur LSP</option>
                        <option value="Komite Skema" {{ old('position', $team->position) === 'Komite Skema' ? 'selected' : '' }}>Komite Skema</option>
                        <option value="Manajer Sertifikasi" {{ old('position', $team->position) === 'Manajer Sertifikasi' ? 'selected' : '' }}>Manajer Sertifikasi</option>
                        <option value="Manajer Mutu" {{ old('position', $team->position) === 'Manajer Mutu' ? 'selected' : '' }}>Manajer Mutu</option>
                        <option value="Manajer Administrasi" {{ old('position', $team->position) === 'Manajer Administrasi' ? 'selected' : '' }}>Manajer Administrasi</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Foto Anggota</label>
                    @if($team->photo)
                        <div class="flex items-center gap-4 mb-3 p-3 bg-soft rounded-xl">
                            <img src="{{ $team->photo_url }}" alt="{{ $team->name }}" class="w-16 h-16 rounded-lg object-cover">
                            <p class="text-xs text-gray-500">Ganti foto dengan upload baru di bawah ini.</p>
                        </div>
                    @endif
                    <input type="file" name="photo" accept="image/*"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm file:mr-3 file:text-xs file:font-semibold file:rounded-lg file:border-0 file:bg-primary file:text-white">
                    <p class="text-gray-400 text-xs mt-1">Rekomendasi ukuran: <strong>400 x 500 piksel (Rasio 4:5)</strong>. Max 2MB. Format: JPG, PNG, WEBP</p>
                </div>

                <div>
                    <label class="flex items-center gap-3 cursor-pointer mt-4">
                        <input type="checkbox" name="is_active" value="1" {{ $team->is_active ? 'checked' : '' }} class="w-5 h-5 rounded accent-primary">
                        <span class="text-sm font-medium text-gray-700">Aktif</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
