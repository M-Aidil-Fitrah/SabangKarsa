@extends('layouts.app')

@section('title', 'Detail Destinasi')

@section('content')
@vite('resources/css/app.css')

<style>
    .destination-image {
        aspect-ratio: 16 / 9; /* Menjaga rasio aspek gambar */
        object-fit: cover; /* Memastikan gambar tidak gepeng */
    }
    .description-container {
        flex: 1; /* Mengisi ruang yang tersedia */
        min-width: 0; /* Mencegah overflow */
    }
    .description-container p {
        white-space: normal; /* Memastikan teks membungkus dengan baik */
        word-break: break-word; /* Memecah kata panjang jika perlu */
    }
</style>

<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px] bg-amber-950">
        <img src="{{ asset('storage/img/carou5.jpg') }}" class="w-full h-150 object-cover opacity-70" alt="">
    </div>
    <div class="pt-10 mr-50 ml-50 mt-50">
        <h2 class="text-5xl font-black mb-4 text-white">Detail Destinasi</h2>
    </div>
</section>

<section class="mt-50">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-row items-start">
            <!-- Card Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-md mr-8">
                <img src="{{ Storage::url($destination->image) }}" alt="{{ $destination->name }}" class="w-full h-64 destination-image">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">{{ $destination->name }}</h3>
                    <p class="text-gray-600 text-base mb-2">Lokasi: {{ $destination->location }}</p>
                    <p class="text-gray-600 text-base mb-2">Kategori: {{ ucfirst($destination->category) }}</p>
                    <div class="flex items-center mb-2">
                        <div class="flex text-amber-400">
                            @php
                                $fullStars = floor($destination->rating);
                                $hasHalfStar = $destination->rating - $fullStars >= 0.5;
                                $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                            @endphp
                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @if ($hasHalfStar)
                                <i class="fas fa-star-half-alt"></i>
                            @endif
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                        <span class="text-gray-600 ml-2">{{ number_format($destination->rating, 1) }}/5</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <i class="fas fa-map-marker-alt text-gray-500 mr-1"></i>
                        <span class="text-gray-600">{{ $destination->distance_from_city_center }} dari pusat kota</span>
                    </div>
                    <a href="{{ route('destinations.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400 transition mt-4 inline-block">Kembali ke Daftar Destinasi</a>
                </div>
            </div>
            <!-- Description Section -->
            <div class="description-container">
                <p class="text-gray-600 text-base mb-4">{{ $destination->description ?? 'Tidak ada deskripsi.' }}</p>
            </div>
        </div>
    </div>
</section>

@endsection