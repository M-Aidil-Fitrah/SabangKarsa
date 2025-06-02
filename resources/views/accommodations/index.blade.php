@extends('layouts.app')

@section('title', 'Accommodations')

@section('content')
@vite('resources/css/app.css')
<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px]">
        {{-- Menggunakan gambar statis untuk background section --}}
        <img src="{{ asset('storage/img/penginapan/6.jpg') }}" class="w-full h-150 object-cover" alt="Background Image for Accommodations">
    </div>
    <div class="pt-10 mx-50 my-30">
        <h2 class="text-5xl font-black mb-4 text-white">Penginapan</h2>
    </div>
</section>

{{-- Add Button for Providers --}}
<section class="py-8">
    <div class="container mx-auto px-6">
        @auth
            @if(auth()->user()->role === 'provider')
                @if(!Auth::user()->provider)
                    <div class="flex justify-end mb-6">
                        <a href="{{ route('provider.create') }}" class="bg-red-500 text-white px-6 py-3 rounded hover:bg-red-600 transition font-medium">Create Provider Profile First</a>
                    </div>
                @else
                    <div class="flex justify-end mb-6">
                        <a href="{{ route('accommodations.create') }}" class="bg-amber-400 text-black px-6 py-3 rounded hover:bg-amber-500 transition font-medium">Add New Accommodation</a>
                    </div>
                @endif
            @endif
        @endauth
    </div>
</section>

{{-- Filter Section --}}
<section class="py-8">
    <div class="container mx-auto px-6">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h3 class="text-xl font-semibold mb-4">Filter Akomodasi</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700">Cari (Nama, Deskripsi, Lokasi)</label>
                    <input type="text" id="search" placeholder="Cari akomodasi..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500">
                </div>
                <div>
                    <label for="typeFilter" class="block text-sm font-medium text-gray-700">Tipe</label>
                    <select id="typeFilter" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500">
                        <option value="">Semua Tipe</option>
                        {{-- Ambil tipe unik dari data akomodasi --}}
                        @php
                            $uniqueTypes = $accommodations->pluck('type')->unique()->filter()->sort();
                        @endphp
                        @foreach($uniqueTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="locationFilter" class="block text-sm font-medium text-gray-700">Lokasi</label>
                    <select id="locationFilter" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500">
                        <option value="">Semua Lokasi</option>
                        {{-- Ambil lokasi unik dari data akomodasi --}}
                        @php
                            $uniqueLocations = $accommodations->pluck('location')->unique()->filter()->sort();
                        @endphp
                        @foreach($uniqueLocations as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Accommodations Grid --}}
<section class="py-8">
    <div class="container mx-auto px-6">
        <div id="accommodations-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($accommodations as $accommodation)
                {{-- Tambahkan link ke halaman detail pada seluruh kartu --}}
                <a href="{{ route('accommodations.show', $accommodation->id) }}" class="accommodation-card bg-white rounded-lg shadow-lg overflow-hidden block hover:shadow-xl transition-shadow duration-200"
                     data-name="{{ strtolower($accommodation->name) }}"
                     data-type="{{ strtolower($accommodation->type ?? '') }}"
                     data-location="{{ strtolower($accommodation->location ?? '') }}"
                     data-description="{{ strtolower($accommodation->description ?? '') }}"
                     data-amenities="{{ strtolower(implode(',', $accommodation->amenities ?? [])) }}">
                    @if($accommodation->image)
                        <img src="{{ asset('storage/' . $accommodation->image) }}" alt="{{ $accommodation->name }}" class="w-full h-48 object-cover">
                    @else
                        <img src="https://placehold.co/600x400/E0E0E0/333333?text=No+Image" alt="No Image Available" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $accommodation->name }}</h3>
                        <p class="text-gray-600 text-sm mb-1">Tipe: {{ $accommodation->type ?? 'N/A' }}</p>
                        <p class="text-gray-800 font-bold text-lg mb-2">Rp {{ number_format($accommodation->price_per_night, 0, ',', '.') }} / malam</p>
                        <p class="text-gray-700 text-sm mb-3">{{ Str::limit($accommodation->description, 120) }}</p>

                        <div class="flex flex-wrap gap-2 mb-3">
                            @forelse($accommodation->amenities ?? [] as $amenity)
                                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">{{ $amenity }}</span>
                            @empty
                                <span class="text-gray-500 text-xs">Tidak ada fasilitas</span>
                            @endforelse
                        </div>

                        <div class="text-sm text-gray-600 mb-1">
                            <p>Lokasi: {{ $accommodation->location ?? 'N/A' }}</p>
                            <p>Telp. Pemilik: {{ $accommodation->owner_phone ?? 'N/A' }}</p>
                        </div>
                        {{-- Tambahkan link detail atau booking jika ada --}}
                        {{-- <a href="#" class="mt-4 inline-block bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition font-medium">Lihat Detail</a> --}}
                    </div>
                </a> {{-- Tutup tag <a> --}}
            @empty
                <div class="md:col-span-3 text-center py-10 text-gray-500">
                    Tidak ada akomodasi yang tersedia.
                </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const typeFilter = document.getElementById('typeFilter');
        const locationFilter = document.getElementById('locationFilter');
        // accommodationCards sekarang akan menargetkan elemen <a>
        const accommodationCards = document.querySelectorAll('.accommodation-card');

        function filterAccommodations() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedType = typeFilter.value.toLowerCase();
            const selectedLocation = locationFilter.value.toLowerCase();

            accommodationCards.forEach(card => {
                const name = card.dataset.name;
                const type = card.dataset.type;
                const location = card.dataset.location;
                const description = card.dataset.description;
                const amenities = card.dataset.amenities;

                let matchesSearch = true;
                if (searchTerm) {
                    matchesSearch = name.includes(searchTerm) ||
                                    description.includes(searchTerm) ||
                                    location.includes(searchTerm) ||
                                    amenities.includes(searchTerm);
                }

                const matchesType = selectedType === '' || type === selectedType;
                const matchesLocation = selectedLocation === '' || location === selectedLocation;

                if (matchesSearch && matchesType && matchesLocation) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('keyup', filterAccommodations);
        typeFilter.addEventListener('change', filterAccommodations);
        locationFilter.addEventListener('change', filterAccommodations);
    });
</script>
@endsection
