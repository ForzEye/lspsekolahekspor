@extends('layouts.admin')
@section('title', 'Tambah Wilayah Sebaran')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.sebaran.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Tambah Wilayah Sebaran</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8" x-data="wilayahManager()">
        <form action="{{ route('admin.sebaran.store') }}" method="POST">
            @csrf

            <div class="space-y-5">
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Kabupaten / Kota <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="text" autocomplete="off" name="nama_wilayah" 
                               x-model="namaWilayah" 
                               @input.debounce.400ms="searchRegion()" 
                               @focus="if(searchResults.length > 0) open = true" 
                               required 
                               placeholder="Ketik nama kabupaten/kota (misal: Bogor, Surabaya)..."
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                        
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center gap-2">
                            <template x-if="isLoading">
                                <svg class="animate-spin h-4 w-4 text-accent" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </template>
                            <svg class="w-4 h-4 text-gray-450 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Search Results Dropdown -->
                    <div x-show="open && searchResults.length > 0" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute z-50 left-0 right-0 mt-1.5 bg-white border border-gray-200 rounded-xl shadow-xl max-h-60 overflow-y-auto"
                         style="display: none;">
                        <div class="p-1">
                            <template x-for="(item, index) in searchResults" :key="index">
                                <button type="button" @click="selectRegion(item)" 
                                        class="w-full text-left px-4 py-2.5 rounded-lg hover:bg-primary/5 hover:text-primary transition-colors focus:outline-none flex flex-col text-gray-700">
                                    <span class="font-bold text-sm text-gray-800" x-text="item.name"></span>
                                    <span class="text-[11px] text-gray-400 mt-0.5" x-text="item.displayName"></span>
                                </button>
                            </template>
                        </div>
                    </div>
                    <p class="text-xs text-gray-450 mt-1.5">💡 Sistem mencari otomatis koordinat Latitude & Longitude resmi dari database geolokasi.</p>
                    @error('nama_wilayah')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Latitude <span class="text-red-500">*</span></label>
                    <input type="number" step="0.000001" name="latitude" x-model="lat" required min="-90" max="90"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    @error('latitude')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Longitude <span class="text-red-500">*</span></label>
                    <input type="number" step="0.000001" name="longitude" x-model="lng" required min="-180" max="180"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    @error('longitude')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Jumlah Peserta <span class="text-red-500">*</span></label>
                <input type="number" name="jumlah_peserta" value="{{ old('jumlah_peserta', 0) }}" required min="0"
                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                @error('jumlah_peserta')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md">
                    Simpan Wilayah
                </button>
                <a href="{{ route('admin.sebaran.index') }}" class="border border-gray-200 text-gray-500 hover:bg-gray-50 px-6 py-3.5 rounded-xl text-sm font-bold transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function wilayahManager() {
    return {
        namaWilayah: '{{ old('nama_wilayah') }}',
        lat: '{{ old('latitude', -0.789275) }}',
        lng: '{{ old('longitude', 113.921327) }}',
        searchResults: [],
        isLoading: false,
        open: false,

        async searchRegion() {
            if (this.namaWilayah.trim().length < 3) {
                this.searchResults = [];
                this.open = false;
                return;
            }
            this.isLoading = true;
            try {
                const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(this.namaWilayah)}&countrycodes=id&limit=5`;
                const response = await fetch(url, {
                    headers: {
                        'Accept-Language': 'id'
                    }
                });
                const data = await response.json();
                this.searchResults = data.map(item => {
                    return {
                        name: item.name,
                        displayName: item.display_name.replace(/, Indonesia$/, ''),
                        lat: parseFloat(item.lat),
                        lng: parseFloat(item.lon)
                    };
                });
                this.open = this.searchResults.length > 0;
            } catch (error) {
                console.error("Geocoding error:", error);
            } finally {
                this.isLoading = false;
            }
        },

        selectRegion(item) {
            this.namaWilayah = item.name;
            this.lat = item.lat.toFixed(6);
            this.lng = item.lng.toFixed(6);
            this.open = false;
            this.searchResults = [];
        }
    }
}
</script>
@endsection
