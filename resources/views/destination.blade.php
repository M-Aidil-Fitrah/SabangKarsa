@extends('layouts.app')

@section('title', 'Destination')

@section('content')
@vite('resources/css/app.css')

<div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px]">
    <img src="{{ asset('storage/img/carou5.jpg') }}" class="w-full h-150 object-cover" alt="">
</div>
<div class="pt-10 mr-50 ml-50 mt-50">
    <h2 class="text-5xl font-black mb-4 text-white">Destinasi</h2>
    @if(auth()->check() && auth()->user()->role === 'provider')
        <a href="{{ route('destinations.create') }}" class="bg-amber-400 text-black px-4 py-2 rounded-lg hover:bg-amber-500 transition btn-amber inline-block mb-4">Tambahkan Destinasi</a>
    @endif
</div>

<!-- Filter Section -->
<section class="py-8 mt-40">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <h2 class="text-5xl text-white font-bold mb-4 md:mb-0">Destinasi</h2>
            <div class="flex flex-wrap gap-4">
                <button class="filter-btn px-4 py-2 rounded bg-amber-400 hover:bg-amber-500 transition text-black" data-category="all">Semua</button>
                <button class="filter-btn px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition text-gray-700" data-category="pantai">Pantai</button>
                <button class="filter-btn px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition text-gray-700" data-category="gunung">Gunung</button>
                <button class="filter-btn px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition text-gray-700" data-category="diving">Diving</button>
                <button class="filter-btn px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 transition text-gray-700" data-category="sejarah">Sejarah</button>
            </div>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="py-12">
    <div class="container mx-auto px-6">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($destinations as $destination)
                <div class="destination-card bg-white rounded-lg overflow-hidden shadow-lg image-card animate-on-scroll" data-category="{{ strtolower($destination->category) }}">
                    <a href="{{ route('destinations.show', $destination->id) }}">
                        <div class="relative">
                            <img src="{{ Storage::url($destination->image) }}" alt="{{ $destination->name }}" class="w-full h-64 object-cover">
                            <span class="absolute top-4 left-4 bg-amber-400 text-black text-xs font-bold px-3 py-1 rounded">{{ strtoupper($destination->category) }}</span>
                            <div class="absolute bottom-0 left-0 right-0 p-4 caption-overlay">
                                <h3 class="text-white font-bold text-xl">{{ strtoupper($destination->name) }}</h3>
                                <div class="flex items-center mt-2">
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
                                    <span class="text-white ml-2">{{ number_format($destination->rating, 1) }}/5</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 line-clamp-3">{{ Str::limit($destination->description ?? 'Tidak ada deskripsi.', 50) }}</p>
                        <div class="flex items-center justify-between">
                            <a href="{{ route('destinations.show', $destination->id) }}" class="text-amber-500 font-medium hover:text-amber-600 transition">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-gray-500 mr-1"></i>
                                <span class="text-gray-500 text-sm">{{ $destination->distance_from_city_center }} dari pusat kota</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Belum ada destinasi yang tersedia.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            {{ $destinations->links() }}
        </div>
    </div>
</section>

<!-- Subscribe Section -->
<section class="py-16 bg-gray-900 mt-40">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h2 class="text-3xl font-bold mb-6 animate-on-scroll">DAPATKAN INFORMASI TERBARU</h2>
            <p class="mb-8 animate-on-scroll">Berlangganan newsletter kami untuk mendapatkan update destinasi terbaru dan promo menarik</p>
            <div class="flex flex-col md:flex-row gap-4 justify-center animate-on-scroll">
                <input type="email" placeholder="email@contoh.com" class="px-4 py-3 rounded flex-grow md:max-w-md text-white newsletter-input border-2 border-white">
                <button class="bg-amber-400 text-black px-6 py-3 rounded hover:bg-amber-500 transition font-medium btn-amber">BERLANGGANAN</button>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Category Filtering -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const destinationCards = document.querySelectorAll('.destination-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                const category = this.getAttribute('data-category');

                // Update button styles
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-amber-400', 'text-black');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });
                this.classList.remove('bg-gray-200', 'text-gray-700');
                this.classList.add('bg-amber-400', 'text-black');

                // Filter cards
                destinationCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

@endsection