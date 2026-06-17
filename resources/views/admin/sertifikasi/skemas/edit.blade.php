@extends('layouts.admin')
@section('title', 'Edit Skema Sertifikasi')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.sertifikasi.skemas.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Edit Skema</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.sertifikasi.skemas.update', $skema) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Kode Skema <span class="text-red-500">*</span></label>
                    <input type="text" name="kode" value="{{ old('kode', $skema->kode) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    <input type="hidden" name="level" value="{{ old('level', $skema->level ?? 'Muda') }}">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Skema <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', $skema->nama) }}" required
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                </div>

                <div x-data="{ imagePreview: '{{ $skema->image_url }}' }">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Gambar / Thumbnail Skema</label>
                    <p class="text-xs text-gray-400 mb-2">Rekomendasi ukuran: <strong>800 x 450 piksel (Rasio 16:9)</strong></p>
                    <div class="flex items-center gap-4">
                        <div class="w-32 h-20 bg-gray-50 border border-dashed border-gray-200 rounded-xl overflow-hidden flex items-center justify-center text-gray-300">
                            <template x-if="imagePreview">
                                <img :src="imagePreview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!imagePreview">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </template>
                        </div>
                        <input type="file" name="image" accept="image/*" @change="
                            const file = $event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = (e) => { imagePreview = e.target.result; };
                                reader.readAsDataURL(file);
                            } else {
                                imagePreview = null;
                            }
                        " class="text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary/5 file:text-primary hover:file:bg-primary/10 file:cursor-pointer">
                    </div>
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Metode Pelaksanaan</label>
                        <input type="text" name="metode_pelaksanaan" value="{{ old('metode_pelaksanaan', $skema->metode_pelaksanaan) }}" placeholder="Tatap Muka / Jarak Jauh"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Masa Berlaku</label>
                        <input type="text" name="masa_berlaku" value="{{ old('masa_berlaku', $skema->masa_berlaku) }}" placeholder="Contoh: 3 Tahun"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Jumlah Unit Kompetensi</label>
                        <input type="number" name="jumlah_unit" value="{{ old('jumlah_unit', $skema->jumlah_unit ?? 0) }}" min="0"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi Singkat</label>
                    <textarea name="description" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none">{{ old('description', $skema->description) }}</textarea>
                </div>

                {{-- Competency Units Repeater --}}
                <div x-data="{ units: {{ json_encode(old('units', $skema->units ?? [['kode' => '', 'nama' => '']])) }} }">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Daftar Unit Kompetensi</label>
                    <div class="space-y-3">
                        <template x-for="(unit, index) in units" :key="index">
                            <div class="flex gap-3 items-center">
                                <input type="text" :name="`units[${index}][kode]`" x-model="unit.kode" placeholder="Kode Unit (eg. LOG.01.001)"
                                       class="w-1/3 border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                                <input type="text" :name="`units[${index}][nama]`" x-model="unit.nama" placeholder="Nama Unit Kompetensi"
                                       class="flex-1 border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                                <button type="button" @click="units.splice(index, 1)"
                                        class="p-2.5 text-red-500 hover:bg-red-50 rounded-xl transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="units.push({kode: '', nama: ''})"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:text-primary-mid mt-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Tambah Unit Kompetensi
                        </button>
                    </div>
                </div>

                {{-- Requirements Repeater --}}
                <div x-data="{ items: {{ json_encode($skema->requirements ?? []) }} }">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Persyaratan Peserta</label>
                    <div class="space-y-2">
                        <template x-for="(item, index) in items" :key="index">
                            <div class="flex gap-2">
                                <input type="text" name="requirements[]" x-model="items[index]"
                                       class="flex-1 border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                                <button type="button" @click="items.splice(index, 1)"
                                        class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="items.push('')"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:text-primary-mid mt-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Tambah Persyaratan
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Order Tampil</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $skema->sort_order) }}" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    </div>
                    <div class="flex items-center">
                        <label class="flex items-center gap-3 cursor-pointer mt-6">
                            <input type="checkbox" name="is_active" value="1" {{ $skema->is_active ? 'checked' : '' }} class="w-5 h-5 rounded accent-primary">
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
