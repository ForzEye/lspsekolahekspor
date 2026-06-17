@extends('layouts.admin')
@section('title', 'Tambah Langkah Alur')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.sertifikasi.alurs.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Tambah Langkah</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.sertifikasi.alurs.store') }}" method="POST">
            @csrf

            <div class="space-y-5">
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tipe Alur <span class="text-red-500">*</span></label>
                        <select name="type" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none bg-white">
                            <option value="tatap_muka">Tatap Muka</option>
                            <option value="jarak_jauh">Jarak Jauh</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nomor Langkah <span class="text-red-500">*</span></label>
                        <input type="number" name="step_number" value="{{ old('step_number', 1) }}" required
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Judul Langkah <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Registrasi & Administrasi"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none">{{ old('description') }}</textarea>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Icon (Emoji)</label>
                        <input type="text" name="icon" value="{{ old('icon', '📋') }}" maxlength="10"
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none text-2xl">
                    </div>
                </div>

                <div class="bg-blue-50 p-5 rounded-2xl border border-blue-100">
                    <p class="text-xs font-bold text-blue-600 mb-3 uppercase tracking-wider">Informasi Tambahan (Opsional)</p>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">Label Info</label>
                            <input type="text" name="extra_label" value="{{ old('extra_label') }}" placeholder="Contoh: Catatan Penting"
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">Konten Info</label>
                            <textarea name="extra_content" rows="2" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-xs outline-none resize-none">{{ old('extra_content') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md">Simpan Langkah</button>
            </div>
        </form>
    </div>
</div>
@endsection
