@extends('layouts.app')

@section('title', 'Tour Guides') {{-- Disesuaikan --}}

@section('content')
@vite('resources/css/app.css')
<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px]">
        {{-- Menggunakan gambar statis untuk background section --}}
        <img src="{{ asset('storage/img/penginapan/6.jpg') }}" class="w-full h-150 object-cover" alt="Background Image for Tour Guides">
    </div>
    <div class="pt-10 mx-50 my-30">
        <h2 class="text-5xl font-black mb-4 text-white">Tour Guide</h2>
    </div>
</section>

{{-- Add Button for Providers --}}
<section class="py-8">
    <div class="container mx-auto px-6">
        @auth
            @if(auth()->user()->role === 'provider')
                @if(!Auth::user()->provider) {{-- Asumsi relasi provider untuk cek profil --}}
                    <div class="flex justify-end mb-6">
                        <a href="{{ route('provider.create') }}" class="bg-red-500 text-white px-6 py-3 rounded hover:bg-red-600 transition font-medium">Create Provider Profile First</a>
                    </div>
                @else
                    <div class="flex justify-end mb-6">
                        <a href="{{ route('tour-guides.create') }}" class="bg-amber-400 text-black px-6 py-3 rounded hover:bg-amber-500 transition font-medium">Add New Tour Guide</a> {{-- Teks Disesuaikan --}}
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
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4"> {{-- Hanya search filter untuk saat ini --}}
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700">Cari (Nama, Pengalaman)</label> {{-- Disesuaikan --}}
                    <input type="text" id="search" placeholder="Cari tour guide..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500"> {{-- Disesuaikan --}}
                </div>
                {{-- Filter Tipe dan Lokasi dihapus karena tidak ada di skema tour_guides --}}
            </div>
        </div>
    </div>
</section>

{{-- Tour Guides Grid --}}
<section class="py-8">
    <div class="container mx-auto px-6">
        <div id="tour-guides-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> {{-- ID Disesuaikan --}}
            @forelse($tour_guides as $tour_guide) {{-- Variabel Disesuaikan --}}
                <a href="{{ route('tour-guides.show', $tour_guide->id) }}" class="tour-guide-card bg-white rounded-lg shadow-lg overflow-hidden block hover:shadow-xl transition-shadow duration-200" {{-- Class Disesuaikan --}}
                   data-name="{{ strtolower($tour_guide->name) }}"
                   data-experience="{{ strtolower($tour_guide->experience ?? '') }}"> {{-- data-description diubah ke data-experience --}}
                    @if($tour_guide->image)
                        <img src="{{ asset('storage/' . $tour_guide->image) }}" alt="{{ $tour_guide->name }}" class="w-full h-48 object-cover">
                    @else
                        <img src="https://placehold.co/600x400/E0E0E0/333333?text=No+Image" alt="No Image Available" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $tour_guide->name }}</h3>
                        <p class="text-gray-800 font-bold text-lg mb-2">Rp {{ number_format($tour_guide->price_per_day, 0, ',', '.') }} / hari</p> {{-- Disesuaikan ke price_per_day dan "/ hari" --}}
                        
                        <div class="mb-3">
                            <p class="text-gray-700 text-sm font-medium">Pengalaman:</p>
                            <p class="text-gray-600 text-sm">{{ Str::limit($tour_guide->experience, 120) }}</p> {{-- Menggunakan experience --}}
                        </div>

                        <div class="text-sm text-gray-600 mb-1">
                            <p>Kontak: {{ $tour_guide->phone ?? 'N/A' }}</p> {{-- Menampilkan nomor telepon tour guide --}}
                        </div>
                        
                        {{-- Menghapus Tipe, Amenities, Lokasi terpisah, Telp. Pemilik --}}
                    </div>
                </a>
            @empty
                <div class="md:col-span-3 text-center py-10 text-gray-500">
                    Tidak ada tour guide yang tersedia. {{-- Pesan Disesuaikan --}}
                </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        // Hapus typeFilter dan locationFilter karena elemennya sudah dihapus dari HTML
        const tourGuideCards = document.querySelectorAll('.tour-guide-card'); // Disesuaikan

        function filterTourGuides() { // Disesuaikan
            const searchTerm = searchInput.value.toLowerCase();
            // Hapus selectedType dan selectedLocation

            tourGuideCards.forEach(card => { // Disesuaikan
                const name = card.dataset.name;
                const experience = card.dataset.experience; // Disesuaikan dari description
                // Hapus type, location, amenities dari dataset

                let matchesSearch = true;
                if (searchTerm) {
                    matchesSearch = name.includes(searchTerm) ||
                                  experience.includes(searchTerm); // Disesuaikan
                }

                // Hapus matchesType dan matchesLocation
                if (matchesSearch) { // Kondisi Disesuaikan
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        searchInput.addEventListener('keyup', filterTourGuides); // Disesuaikan
        // Hapus event listener untuk typeFilter dan locationFilter
    });
</script>
@endsection