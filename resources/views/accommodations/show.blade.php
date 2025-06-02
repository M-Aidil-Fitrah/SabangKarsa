@extends('layouts.app')

@section('title', $accommodation->name)

@section('content')
@vite('resources/css/app.css')

<div class="container mx-auto px-6 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        {{-- Gambar Akomodasi --}}
        @if($accommodation->image)
            <img src="{{ asset('storage/' . $accommodation->image) }}" alt="{{ $accommodation->name }}" class="w-full h-96 object-cover">
        @else
            <img src="https://placehold.co/1200x600/E0E0E0/333333?text=Gambar+Tidak+Tersedia" alt="Gambar Tidak Tersedia" class="w-full h-96 object-cover">
        @endif

        <div class="p-6 md:p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $accommodation->name }}</h1>

            <div class="flex items-center text-gray-600 text-lg mb-4">
                <span class="mr-4">Tipe: <span class="font-semibold">{{ $accommodation->type ?? 'N/A' }}</span></span>
                <span>Lokasi: <span class="font-semibold">{{ $accommodation->location ?? 'N/A' }}</span></span>
            </div>

            <p class="text-gray-800 text-2xl font-bold mb-4">Rp {{ number_format($accommodation->price_per_night, 0, ',', '.') }} / malam</p>

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Deskripsi</h2>
                <p class="text-gray-700 leading-relaxed">{{ $accommodation->description ?? 'Tidak ada deskripsi.' }}</p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Fasilitas</h2>
                <div class="flex flex-wrap gap-2">
                    @forelse($accommodation->amenities ?? [] as $amenity)
                        <span class="bg-amber-100 text-amber-800 text-sm px-3 py-1 rounded-full font-medium">{{ $amenity }}</span>
                    @empty
                        <span class="text-gray-500 text-sm">Tidak ada fasilitas yang terdaftar.</span>
                    @endforelse
                </div>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Kontak Pemilik</h2>
                <p class="text-gray-700">Telepon: <span class="font-semibold">{{ $accommodation->owner_phone ?? 'N/A' }}</span></p>
            </div>

            {{-- Tombol Pesan Sekarang --}}
            <div class="mt-8 text-center">
                {{-- Mengalihkan ke WhatsApp dengan nomor telepon pemilik --}}
                @if($accommodation->owner_phone)
                    {{-- Membersihkan nomor telepon agar hanya angka, dan menambahkan kode negara jika diperlukan --}}
                    @php
                        $phoneNumber = preg_replace('/[^0-9]/', '', $accommodation->owner_phone); // Hapus semua karakter non-angka
                        // Asumsi nomor sudah termasuk kode negara, atau tambahkan default jika belum
                        if (substr($phoneNumber, 0, 1) === '0') {
                            $phoneNumber = '62' . substr($phoneNumber, 1); // Ganti 0 di awal dengan 62 (kode negara Indonesia)
                        }
                    @endphp
                    <a href="https://wa.me/{{ $phoneNumber }}" target="_blank" class="inline-block bg-amber-500 text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-amber-600 transition duration-300 ease-in-out shadow-lg">Pesan Sekarang (WhatsApp)</a>
                @else
                    <span class="inline-block bg-gray-300 text-gray-700 px-8 py-4 rounded-lg text-xl font-semibold cursor-not-allowed">Pesan Sekarang (Nomor Tidak Tersedia)</span>
                @endif
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-6 text-center">
                <a href="{{ route('accommodations.index') }}" class="inline-block text-amber-600 hover:text-amber-800 transition duration-300 ease-in-out">← Kembali ke Daftar Akomodasi</a>
            </div>
        </div>
    </div>
</div>
@endsection
