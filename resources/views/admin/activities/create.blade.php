@extends('layouts.admin')
@section('title', 'Tambah Kegiatan')

@section('content')
<div class="max-w-4xl mx-auto py-4">

    <div class="flex items-center gap-3 mb-10">
        <a href="{{ route('admin.activities.index') }}" class="w-10 h-10 rounded-2xl bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-primary hover:border-primary transition-all shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <h1 class="font-display text-3xl font-black text-primary tracking-tight">Post New Activity</h1>
    </div>

    <form action="{{ route('admin.activities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8" x-data="{ type: 'image' }">
        @csrf
        
        <div class="bg-white rounded-[40px] shadow-premium border border-gray-50 p-10 space-y-8">
            {{-- Header Information --}}
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Kegiatan Name</label>
                    <input type="text" name="title" required placeholder="Judul Dokumentasi..."
                           class="w-full bg-soft border border-gray-100 rounded-2xl px-5 py-4 text-sm font-bold text-primary focus:ring-4 focus:ring-primary/10 outline-none transition-all">
                </div>
                <div>
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Tanggal Pelaksanaan</label>
                    <input type="date" name="date" required
                           class="w-full bg-soft border border-gray-100 rounded-2xl px-5 py-4 text-sm font-bold text-primary outline-none focus:ring-4 focus:ring-primary/10">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Category Display</label>
                    <select name="category" class="w-full bg-soft border border-gray-100 rounded-2xl px-5 py-4 text-sm font-bold text-gray-600 outline-none appearance-none">
                        <option value="dokumentasi">Home Documentation</option>
                        <option value="galeri">Full Gallery Only</option>
                        <option value="event">Special Event</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Media Engine</label>
                    <div class="flex p-1.5 bg-soft rounded-2xl border border-gray-100">
                        <button type="button" @click="type = 'image'"
                                :class="type === 'image' ? 'bg-white text-primary shadow-sm' : 'text-gray-400'"
                                class="flex-1 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">Image File</button>
                        <button type="button" @click="type = 'video'"
                                :class="type === 'video' ? 'bg-white text-primary shadow-sm' : 'text-gray-400'"
                                class="flex-1 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">YouTube Link</button>
                    </div>
                    <input type="hidden" name="type" :value="type">
                </div>
            </div>

            {{-- Media Content --}}
            <div class="p-8 rounded-[32px] bg-soft border-2 border-dashed border-gray-200">
                <template x-if="type === 'image'">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-primary mx-auto mb-4 shadow-sm">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        <input type="file" name="media" class="text-xs font-bold text-gray-400 file:mr-4 file:py-2 file:px-6 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-primary file:text-white">
                        <p class="mt-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Rekomendasi ukuran: <strong>1200 x 800 piksel (Rasio 3:2)</strong>. Max 5MB.</p>
                    </div>
                </template>
                <template x-if="type === 'video'">
                    <div>
                        <input type="url" name="media_url" placeholder="https://youtube.com/watch?v=..."
                               class="w-full bg-white border border-gray-100 rounded-2xl px-5 py-4 text-sm font-bold text-primary outline-none shadow-sm">
                        <p class="mt-4 text-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">Input full YouTube or Vimeo video URL</p>
                    </div>
                </template>
            </div>

            <div>
                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Extra Description (Optional)</label>
                <textarea name="description" rows="4" class="w-full bg-soft border border-gray-100 rounded-3xl px-6 py-5 text-sm font-bold text-primary outline-none focus:ring-4 focus:ring-primary/10 resize-none"></textarea>
            </div>

            <div class="flex items-center gap-4 p-6 bg-primary/5 rounded-3xl border border-primary/10">
                <div class="relative inline-block w-12 h-6 transition duration-200 ease-in-out">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" class="absolute w-12 h-6 opacity-0 cursor-pointer z-10 peer">
                    <span class="absolute top-0 left-0 right-0 bottom-0 bg-gray-300 rounded-full transition-all duration-300 peer-checked:bg-accent cursor-pointer before:content-[''] before:absolute before:h-4 before:w-4 before:left-1 before:bottom-1 before:bg-white before:rounded-full before:transition-all before:duration-300 peer-checked:before:translate-x-6"></span>
                </div>
                <div>
                    <label for="is_featured" class="block text-[10px] font-black text-primary uppercase tracking-[0.2em] cursor-pointer">Featured on Homepage</label>
                    <p class="text-[9px] text-gray-400 font-bold uppercase mt-1">If active, this will appear in the "Documentation" section on home.</p>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-primary hover:bg-accent text-white font-black px-10 py-4 rounded-2xl text-xs uppercase tracking-widest transition-all shadow-glow hover:-translate-y-1">
                Deploy Registration
            </button>
            <a href="{{ route('admin.activities.index') }}" class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-primary transition-colors">Cancel Protocol</a>
        </div>
    </form>
</div>
@endsection
