@extends('layouts.admin')
@section('title', 'Edit Tentang Kami')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Edit Tentang Kami</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-8">
                {{-- Bagian Utama --}}
                <div class="border-b border-gray-100 pb-8">
                    <h2 class="text-lg font-bold text-primary mb-5 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center text-sm">01</span>
                        Informasi Utama
                    </h2>
                    <div class="grid gap-5">
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Label (Kecil di Atas)</label>
                                <input type="text" name="label" value="{{ old('label', $about->label) }}"
                                       placeholder="TENTANG KAMI"
                                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Headline <span class="text-red-500">*</span></label>
                                <input type="text" name="heading" value="{{ old('heading', $about->heading) }}" required
                                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi Panjang <span class="text-red-500">*</span></label>
                            <textarea name="description" rows="4" required
                                      class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none">{{ old('description', $about->description) }}</textarea>
                        </div>

                        {{-- Images --}}
                        <div class="grid sm:grid-cols-2 gap-8 items-end">
                            <div class="bg-gray-50/50 p-4 rounded-2xl border border-gray-100">
                                <label class="block text-xs font-black text-primary uppercase tracking-widest mb-1">Foto Beranda (Homepage)</label>
                                <p class="text-[10px] text-gray-400 mb-3">Rekomendasi: <strong>800 x 1000 px (Rasio 4:5)</strong></p>
                                @if($about->image)
                                    <img src="{{ Storage::url($about->image) }}" alt="Home" class="h-32 w-full rounded-xl object-cover mb-3 shadow-sm">
                                @endif
                                <input type="file" name="image" accept="image/*"
                                       class="w-full text-xs file:mr-3 file:text-[10px] file:font-black file:uppercase file:rounded-lg file:border-0 file:bg-primary file:text-white file:px-3 file:py-2">
                            </div>

                            <div class="bg-gray-50/50 p-4 rounded-2xl border border-gray-100">
                                <label class="block text-xs font-black text-accent uppercase tracking-widest mb-1">Foto Halaman Profil</label>
                                <p class="text-[10px] text-gray-400 mb-3">Rekomendasi: <strong>1200 x 800 px (Rasio 3:2)</strong></p>
                                @if($about->image_profil)
                                    <img src="{{ Storage::url($about->image_profil) }}" alt="Profil" class="h-32 w-full rounded-xl object-cover mb-3 shadow-sm">
                                @endif
                                <input type="file" name="image_profil" accept="image/*"
                                       class="w-full text-xs file:mr-3 file:text-[10px] file:font-black file:uppercase file:rounded-lg file:border-0 file:bg-accent file:text-white file:px-3 file:py-2">
                            </div>
                        </div>

                        {{-- Highlights --}}
                        <div x-data="{ items: {{ json_encode($about->highlights ?? []) }} }" class="pt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Highlights (Point-point)</label>
                                <div class="space-y-2">
                                    <template x-for="(item, index) in items" :key="index">
                                        <div class="flex gap-2">
                                            <input type="text" name="highlights[]" x-model="items[index]"
                                                   class="flex-1 border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                                            <button type="button" @click="items.splice(index, 1)"
                                                    class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                    </template>
                                    <button type="button" @click="items.push('')"
                                            class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:text-primary-mid mt-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        Tambah Highlight
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Visi & Misi --}}
                <div class="border-b border-gray-100 pb-8">
                    <h2 class="text-lg font-bold text-primary mb-5 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center text-sm">02</span>
                        Visi & Misi
                    </h2>
                    <div class="grid gap-6">
                        <div class="bg-soft p-5 rounded-2xl">
                            <label class="block text-sm font-bold text-primary mb-3">VISI</label>
                            <input type="text" name="vision_title" value="{{ old('vision_title', $about->vision_title) }}"
                                   placeholder="Judul Visi"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none mb-3">
                            <textarea name="vision_content" rows="3"
                                      placeholder="Konten Visi"
                                      class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none">{{ old('vision_content', $about->vision_content) }}</textarea>
                        </div>

                        <div class="bg-soft p-5 rounded-2xl">
                            <label class="block text-sm font-bold text-primary mb-3">MISI</label>
                            <input type="text" name="mission_title" value="{{ old('mission_title', $about->mission_title) }}"
                                   placeholder="Judul Misi"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none mb-4">
                            
                            <div x-data="{ items: {{ json_encode($about->mission_items ?? []) }} }">
                                <label class="block text-xs font-semibold text-gray-500 mb-2 uppercase tracking-wider">Daftar Item Misi</label>
                                <div class="space-y-2">
                                    <template x-for="(item, index) in items" :key="index">
                                        <div class="flex gap-2">
                                            <input type="text" name="mission_items[]" x-model="items[index]"
                                                   class="flex-1 border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                                            <button type="button" @click="items.splice(index, 1)"
                                                    class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                    </template>
                                    <button type="button" @click="items.push('')"
                                            class="inline-flex items-center gap-1.5 text-xs font-bold text-primary hover:text-primary-mid mt-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        Tambah Misi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Nilai-Nilai --}}
                <div>
                    <h2 class="text-lg font-bold text-primary mb-5 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center text-sm">03</span>
                        Nilai-Nilai Perusahaan
                    </h2>
                    
                    <div x-data="{ items: {{ json_encode($about->values ?? []) }} }">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <template x-for="(item, index) in items" :key="index">
                                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-5 relative group">
                                    <button type="button" @click="items.splice(index, 1)"
                                            class="absolute top-3 right-3 p-1.5 text-red-500 hover:bg-red-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                    
                                    <div class="grid gap-3">
                                        <div class="flex gap-3">
                                            <input type="text" x-model="items[index].icon" :name="'values['+index+'][icon]'"
                                                   placeholder="Icon (Emoji)"
                                                   class="w-16 border border-gray-200 rounded-xl px-2 py-2 text-center text-xl focus:ring-2 focus:ring-primary/30 outline-none">
                                            <input type="text" x-model="items[index].title" :name="'values['+index+'][title]'"
                                                   placeholder="Judul Nilai"
                                                   class="flex-1 border border-gray-200 rounded-xl px-3 py-2 text-sm font-bold focus:ring-2 focus:ring-primary/30 outline-none">
                                        </div>
                                        <textarea x-model="items[index].desc" :name="'values['+index+'][desc]'"
                                                  placeholder="Deskripsi singkat nilai..."
                                                  rows="2"
                                                  class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none"></textarea>
                                    </div>
                                </div>
                            </template>
                            
                            <button type="button" @click="items.push({icon: '⭐', title: '', desc: ''})"
                                    class="border-2 border-dashed border-gray-200 rounded-2xl p-8 flex flex-col items-center justify-center text-gray-400 hover:border-primary hover:text-primary transition-all group">
                                <svg class="w-8 h-8 mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <span class="font-bold text-sm">Tambah Nilai</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-10 pt-6 border-t border-gray-100">
                <button type="submit"
                        class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md hover:shadow-lg">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
