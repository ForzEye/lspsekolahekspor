@extends('layouts.admin')
@section('title', 'Edit Hero Section')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Edit Hero Section</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Badge Text</label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $hero->badge_text) }}"
                           placeholder="Lembaga Resmi Terakreditasi BNSP"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-colors">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Headline <span class="text-red-500">*</span></label>
                    <textarea name="headline" rows="3" required
                              class="w-full border {{ $errors->has('headline') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none resize-none transition-colors">{{ old('headline', $hero->headline) }}</textarea>
                    @error('headline')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Subheadline</label>
                    <textarea name="subheadline" rows="3"
                              class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none resize-none transition-colors">{{ old('subheadline', $hero->subheadline) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tombol Utama (teks)</label>
                        <input type="text" name="btn_primary_text" value="{{ old('btn_primary_text', $hero->btn_primary_text) }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tombol Utama (URL)</label>
                        <input type="text" name="btn_primary_url" value="{{ old('btn_primary_url', $hero->btn_primary_url) }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tombol Sekunder (teks)</label>
                        <input type="text" name="btn_secondary_text" value="{{ old('btn_secondary_text', $hero->btn_secondary_text) }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tombol Sekunder (URL)</label>
                        <input type="text" name="btn_secondary_url" value="{{ old('btn_secondary_url', $hero->btn_secondary_url) }}"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none transition-colors">
                    </div>
                </div>

                {{-- Stats --}}
                <div>
                    <p class="text-sm font-medium text-gray-700 mb-2">Statistik (3 angka)</p>
                    <div class="grid grid-cols-3 gap-3">
                        @foreach([1, 2, 3] as $i)
                            <div class="space-y-2">
                                <input type="text" name="stat_{{ $i }}_value" value="{{ old('stat_'.$i.'_value', $hero->{'stat_'.$i.'_value'}) }}"
                                       placeholder="500+" class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary/30 outline-none font-bold">
                                <input type="text" name="stat_{{ $i }}_label" value="{{ old('stat_'.$i.'_label', $hero->{'stat_'.$i.'_label'}) }}"
                                       placeholder="Label stat" class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary/30 outline-none text-gray-500">
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Image --}}
                @if($hero->image)
                    <div class="bg-soft rounded-xl p-4">
                        <p class="text-xs font-semibold text-gray-500 mb-2">Gambar Hero Saat Ini</p>
                        <img src="{{ $hero->image_url }}" alt="Hero" class="h-40 rounded-xl object-cover">
                    </div>
                @endif
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">{{ $hero->image ? 'Ganti Gambar Hero' : 'Upload Gambar Hero' }}</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm file:mr-3 file:text-xs file:font-semibold file:rounded-lg file:border-0 file:bg-primary file:text-white hover:file:bg-primary-mid transition-colors">
                    <p class="text-gray-400 text-xs mt-1">Rekomendasi ukuran: <strong>800 x 1000 piksel (Rasio 4:5)</strong>. Max 2MB. Kosongkan jika tidak ingin mengganti.</p>
                </div>

                {{-- SK PDF --}}
                @if($hero->sk_pdf)
                    <div class="bg-soft rounded-xl p-4 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="text-3xl">📄</span>
                            <div>
                                <p class="text-xs font-semibold text-gray-700">SK Sertifikasi Jarak Jauh LSP SEN</p>
                                <a href="{{ $hero->sk_pdf_url }}" target="_blank" class="text-xs font-bold text-accent hover:underline">Lihat PDF SK</a>
                            </div>
                        </div>
                    </div>
                @endif
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">{{ $hero->sk_pdf ? 'Ganti File SK (PDF)' : 'Upload File SK (PDF)' }}</label>
                    <input type="file" name="sk_pdf" accept="application/pdf"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm file:mr-3 file:text-xs file:font-semibold file:rounded-lg file:border-0 file:bg-primary file:text-white hover:file:bg-primary-mid transition-colors">
                    <p class="text-gray-400 text-xs mt-1">Hanya file PDF. Max 10MB. Kosongkan jika tidak ingin mengganti.</p>
                </div>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $hero->is_active) ? 'checked' : '' }}
                           class="w-5 h-5 rounded accent-primary">
                    <span class="text-sm font-medium text-gray-700">Hero Section Aktif</span>
                </label>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <button type="submit"
                        class="bg-accent hover:bg-accent-dark text-white font-bold px-6 py-3 rounded-xl text-sm transition-all duration-200 shadow-sm">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.dashboard') }}"
                   class="border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium px-6 py-3 rounded-xl text-sm transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
