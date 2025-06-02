@extends('layouts.app')

@section('title', $driver->name)

@section('content')
@vite('resources/css/app.css')

<div class="container mx-auto px-6 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        {{-- Gambar Driver --}}
        @if($driver->image)
            <img src="{{ asset('storage/' . $driver->image) }}" alt="{{ $driver->name }}" class="w-full h-96 object-cover">
        @else
            <img src="https://placehold.co/1200x600/E0E0E0/333333?text=Gambar+Tidak+Tersedia" alt="Gambar Tidak Tersedia" class="w-full h-96 object-cover">
        @endif

        <div class="p-6 md:p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $driver->name }}</h1>

            <div class="flex items-center text-gray-600 text-lg mb-4">
                <span>Tipe Kendaraan: <span class="font-semibold">{{ $driver->vehicle_type ?? 'N/A' }}</span></span>
            </div>

            <p class="text-gray-800 text-2xl font-bold mb-4">Rp {{ number_format($driver->price_per_day, 0, ',', '.') }} / hari</p>

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Kontak Driver</h2>
                <p class="text-gray-700">Telepon: <span class="font-semibold">{{ $driver->phone ?? 'N/A' }}</span></p>
            </div>

            {{-- Tombol Pesan Sekarang (WhatsApp) --}}
            <div class="mt-8 text-center">
                @if($driver->phone)
                    @php
                        $phoneNumber = preg_replace('/[^0-9]/', '', $driver->phone);
                        if (substr($phoneNumber, 0, 1) === '0') {
                            $phoneNumber = '62' . substr($phoneNumber, 1);
                        }
                    @endphp
                    <a href="https://wa.me/{{ $phoneNumber }}" target="_blank" class="inline-block bg-green-500 text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-green-600 transition duration-300 ease-in-out shadow-lg">Pesan Sekarang (WhatsApp)</a>
                @else
                    <span class="inline-block bg-gray-300 text-gray-700 px-8 py-4 rounded-lg text-xl font-semibold cursor-not-allowed">Pesan Sekarang (Nomor Tidak Tersedia)</span>
                @endif
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-6 text-center">
                <a href="{{ route('drivers.index') }}" class="inline-block text-amber-600 hover:text-amber-800 transition duration-300 ease-in-out">← Kembali ke Daftar Driver</a>
            </div>
        </div>
    </div>
</div>
@endsection
