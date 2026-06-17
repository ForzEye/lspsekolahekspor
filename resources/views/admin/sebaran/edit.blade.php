@extends('layouts.admin')
@section('title', 'Edit Wilayah Sebaran')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.sebaran.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h1 class="font-display text-2xl font-bold text-gray-900">Edit Wilayah Sebaran</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8" x-data="wilayahManager()">
        <form action="{{ route('admin.sebaran.update', $sebaran) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Wilayah / Kota <span class="text-red-500">*</span></label>
                    <input type="text" list="wilayah-list" name="nama_wilayah" x-model="namaWilayah" @input="updateCoords()" required placeholder="Ketik atau pilih wilayah..."
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    <datalist id="wilayah-list">
                        <template x-for="name in Object.keys(predefinedList)">
                            <option :value="name"></option>
                        </template>
                    </datalist>
                    <p class="text-xs text-gray-400 mt-1.5">💡 Ketik nama kota utama untuk memicu pengisian koordinat otomatis (misal: Surabaya, DKI Jakarta, Makassar).</p>
                    @error('nama_wilayah')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
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
                    <input type="number" name="jumlah_peserta" value="{{ old('jumlah_peserta', $sebaran->jumlah_peserta) }}" required min="0"
                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 outline-none">
                    @error('jumlah_peserta')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-accent hover:bg-accent-dark text-white font-bold px-8 py-3.5 rounded-xl text-sm transition-all duration-200 shadow-md">
                    Simpan Perubahan
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
        namaWilayah: '{{ old('nama_wilayah', $sebaran->nama_wilayah) }}',
        lat: '{{ old('latitude', $sebaran->latitude) }}',
        lng: '{{ old('longitude', $sebaran->longitude) }}',
        predefinedList: {
            'Banda Aceh': {lat: 5.548292, lng: 95.323756},
            'Medan': {lat: 3.595196, lng: 98.672223},
            'Pekanbaru': {lat: 0.507068, lng: 101.447779},
            'Padang': {lat: -0.947075, lng: 100.417181},
            'Palembang': {lat: -2.976074, lng: 104.775431},
            'Bandar Lampung': {lat: -5.397140, lng: 105.266792},
            'DKI Jakarta': {lat: -6.208763, lng: 106.845599},
            'Bandung': {lat: -6.917464, lng: 107.619123},
            'Semarang': {lat: -6.966667, lng: 110.416664},
            'Yogyakarta': {lat: -7.795580, lng: 110.369490},
            'Surabaya': {lat: -7.257472, lng: 112.752088},
            'Denpasar': {lat: -8.670458, lng: 115.212629},
            'Pontianak': {lat: -0.026330, lng: 109.342503},
            'Banjarmasin': {lat: -3.316694, lng: 114.590111},
            'Samarinda': {lat: -0.494860, lng: 117.143615},
            'Makassar': {lat: -5.147665, lng: 119.432732},
            'Palu': {lat: -0.891700, lng: 119.870700},
            'Manado': {lat: 1.482180, lng: 124.848624},
            'Kupang': {lat: -10.177200, lng: 123.607800},
            'Ambon': {lat: -3.695400, lng: 128.181400},
            'Sorong': {lat: -0.875600, lng: 131.251400},
            'Jayapura': {lat: -2.591600, lng: 140.718100}
        },
        updateCoords() {
            if (this.predefinedList[this.namaWilayah]) {
                this.lat = this.predefinedList[this.namaWilayah].lat;
                this.lng = this.predefinedList[this.namaWilayah].lng;
            }
        }
    }
}
</script>
@endsection
