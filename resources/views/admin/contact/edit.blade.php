@extends('layouts.admin')
@section('title', 'Edit Info Kontak')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Edit Info Kontak</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.contact.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-8">
                {{-- Kontak Dasar --}}
                <div class="border-b border-gray-100 pb-8">
                    <h2 class="text-lg font-bold text-primary mb-5 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center text-sm">01</span>
                        Kontak Utama
                    </h2>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email Kantor <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $contact->email) }}" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">No. Telepon <span class="text-red-500">*</span></label>
                            <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" required
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">WhatsApp (Gunakan format 62...)</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp', $contact->whatsapp) }}"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jam Operasional</label>
                            <input type="text" name="office_hours" value="{{ old('office_hours', $contact->office_hours) }}"
                                   placeholder="Senin - Jumat: 08.00 - 17.00"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        </div>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="border-b border-gray-100 pb-8">
                    <h2 class="text-lg font-bold text-primary mb-5 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center text-sm">02</span>
                        Alamat & Lokasi
                    </h2>
                    <div class="grid gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Lengkap <span class="text-red-500">*</span></label>
                            <textarea name="address" rows="3" required
                                      class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none">{{ old('address', $contact->address) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Google Maps Embed URL</label>
                            <textarea name="maps_embed_url" rows="2"
                                      placeholder="https://www.google.com/maps/embed?pb=..."
                                      class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none resize-none">{{ old('maps_embed_url', $contact->maps_embed_url) }}</textarea>
                            <p class="text-[10px] text-gray-400 mt-1">Copy URL dari 'Embed a map' di Google Maps (hanya bagian src-nya).</p>
                        </div>
                    </div>
                </div>

                {{-- Social Media --}}
                <div>
                    <h2 class="text-lg font-bold text-primary mb-5 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center text-sm">03</span>
                        Media Sosial
                    </h2>
                    <div class="grid sm:grid-cols-3 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Instagram URL</label>
                            <input type="text" name="instagram" value="{{ old('instagram', $contact->instagram) }}"
                                   placeholder="https://instagram.com/..."
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">LinkedIn URL</label>
                            <input type="text" name="linkedin" value="{{ old('linkedin', $contact->linkedin) }}"
                                   placeholder="https://linkedin.com/..."
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">YouTube URL</label>
                            <input type="text" name="youtube" value="{{ old('youtube', $contact->youtube) }}"
                                   placeholder="https://youtube.com/..."
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-10 pt-6 border-t border-gray-100">
                <button type="submit"
                        class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md">
                    Simpan Kontak
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
