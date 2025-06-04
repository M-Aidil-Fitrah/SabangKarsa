@extends('layouts.app')

@section('title', $tour_guide->name) {{-- Disesuaikan --}}

@section('content')
@vite('resources/css/app.css')

<div class="container mx-auto px-6 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        {{-- Gambar Tour Guide --}}
        @if($tour_guide->image)
            <img src="{{ asset('storage/' . $tour_guide->image) }}" alt="{{ $tour_guide->name }}" class="w-full h-96 object-cover">
        @else
            <img src="https://placehold.co/1200x600/E0E0E0/333333?text=Gambar+Tidak+Tersedia" alt="Gambar Tidak Tersedia" class="w-full h-96 object-cover">
        @endif

        <div class="p-6 md:p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $tour_guide->name }}</h1>

            {{-- Menghapus Tipe dan Lokasi karena tidak ada di skema Tour Guide --}}

            <p class="text-gray-800 text-2xl font-bold mb-4">Rp {{ number_format($tour_guide->price_per_day, 0, ',', '.') }} / hari</p> {{-- Disesuaikan --}}

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Pengalaman</h2> {{-- Disesuaikan --}}
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $tour_guide->experience ?? 'Tidak ada informasi pengalaman.' }}</p> {{-- Disesuaikan, whitespace-pre-line untuk menjaga format teks --}}
            </div>

            {{-- Menghapus Bagian Fasilitas --}}

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Kontak Tour Guide</h2> {{-- Disesuaikan --}}
                <p class="text-gray-700">Telepon: <span class="font-semibold">{{ $tour_guide->phone ?? 'N/A' }}</span></p> {{-- Disesuaikan --}}
            </div>

            {{-- Tombol Pesan Sekarang --}}
            <div class="mt-8 text-center">
                {{-- Mengalihkan ke WhatsApp dengan nomor telepon tour guide --}}
                @if($tour_guide->phone)
                    @php
                        $phoneNumber = preg_replace('/[^0-9]/', '', $tour_guide->phone); // Hapus semua karakter non-angka
                        // Asumsi nomor sudah termasuk kode negara, atau tambahkan default jika belum
                        if (substr($phoneNumber, 0, 1) === '0') {
                            $phoneNumber = '62' . substr($phoneNumber, 1); // Ganti 0 di awal dengan 62 (kode negara Indonesia)
                        } elseif (substr($phoneNumber, 0, 2) !== '62') {
                             $phoneNumber = '62' . $phoneNumber; // Tambahkan 62 jika tidak ada 0 atau 62 di awal
                        }
                    @endphp
                    <a href="https://wa.me/{{ $phoneNumber }}?text={{ urlencode('Halo, saya tertarik dengan layanan tour guide Anda: ' . $tour_guide->name) }}" target="_blank" class="inline-block bg-amber-500 text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-amber-600 transition duration-300 ease-in-out shadow-lg">Hubungi via WhatsApp</a> {{-- Disesuaikan --}}
                @else
                    <span class="inline-block bg-gray-300 text-gray-700 px-8 py-4 rounded-lg text-xl font-semibold cursor-not-allowed">Pesan Sekarang (Nomor Tidak Tersedia)</span>
                @endif
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-8 text-center"> {{-- Margin atas ditambahkan untuk jarak --}}
                <a href="{{ route('tour-guides.index') }}" class="inline-block text-amber-600 hover:text-amber-800 transition duration-300 ease-in-out">← Kembali ke Daftar Tour Guide</a> {{-- Disesuaikan --}}
            </div>
        </div>
    </div>
</div>
@endsection