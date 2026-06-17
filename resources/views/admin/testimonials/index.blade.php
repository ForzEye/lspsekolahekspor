@extends('layouts.admin')
@section('title', 'Daftar Testimonial')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-display text-2xl font-bold text-gray-900">Testimonial Alumni</h1>
            <p class="text-gray-500 text-sm mt-0.5">Kelola cerita sukses dan testimoni dari alumni Sekolah Ekspor Nasional.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}"
           class="inline-flex items-center gap-2 bg-accent hover:bg-accent-dark text-white font-bold px-5 py-2.5 rounded-xl text-sm transition-all duration-200 shadow-sm hover:shadow-md">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Testimonial
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-4 py-3 flex items-center gap-2 mb-6">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-4">
        @forelse($testimonials as $testimonial)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col md:flex-row gap-6 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0">
                    @if($testimonial->photo)
                        <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->name }}" class="w-16 h-16 rounded-2xl object-cover shadow-sm">
                    @else
                        <div class="w-16 h-16 rounded-2xl bg-primary flex items-center justify-center text-white font-bold text-xl">{{ $testimonial->initials }}</div>
                    @endif
                </div>
                <div class="flex-1">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                        <div>
                            <h3 class="font-display font-bold text-gray-900 text-lg">{{ $testimonial->name }}</h3>
                            <p class="text-accent text-xs font-semibold uppercase tracking-wider">{{ $testimonial->position }} {{ $testimonial->company ? 'di ' . $testimonial->company : '' }}</p>
                        </div>
                        <div class="flex gap-1 text-yellow-400">
                            @for($i=1; $i<=5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'fill-current' : 'text-gray-200' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4 italic">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center justify-between border-t border-gray-50 pt-4">
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-1 rounded-full
                                     {{ $testimonial->is_active ? 'bg-green-50 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $testimonial->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                            {{ $testimonial->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-primary hover:text-primary-mid text-xs font-bold border border-primary/20 px-3 py-1.5 rounded-lg transition-colors">Edit</a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Hapus testimonial ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-bold border border-red-100 px-3 py-1.5 rounded-lg transition-colors">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl p-16 text-center text-gray-400 border border-gray-100">Belum ada data testimonial.</div>
        @endforelse
    </div>
    
    @if($testimonials->hasPages())
        <div class="mt-6">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
