@extends('layouts.app')

@section('title', 'Drivers')

@section('content')
@vite('resources/css/app.css')

<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px]">
        <img src="{{ asset('storage/img/kapal.jpg') }}" alt="Hero Image" class="w-full h-150 object-cover">
    </div>
    <div class="pt-10 mr-50 ml-50 mt-50">
        <h2 class="text-5xl font-black mb-4 text-white">Mengakomodir segala kebutuhan perjalanan</h2>
    </div>
</section>

{{-- Add Button for Providers (dari code saya sebelumnya) --}}
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
                        <a href="{{ route('drivers.create') }}" class="bg-amber-400 text-black px-6 py-3 rounded hover:bg-amber-500 transition font-medium">Add New Driver</a>
                    </div>
                @endif
            @endif
        @endauth
    </div>
</section>

<section class="py-8 bg-white shadow-md mt-25">
    <div class="container mx-auto px-6">
        <form class="max-w-4xl mx-auto animate-on-scroll">
            <h2 class="text-2xl font-bold mb-6">Cari Driver Sesuai Kebutuhan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="date" class="block text-gray-700 mb-2">Tanggal</label>
                    <input type="date" id="date" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-amber-400">
                </div>
                <div>
                    <label for="duration" class="block text-gray-700 mb-2">Durasi</label>
                    <select id="duration" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-amber-400">
                        <option value="">Pilih Durasi</option>
                        <option value="half-day">Half Day (4-6 jam)</option>
                        <option value="full-day">Full Day (8-10 jam)</option>
                        <option value="multi-day">Multi Day</option>
                    </select>
                </div>
                <div>
                    <label for="passengers" class="block text-gray-700 mb-2">Jumlah Penumpang</label>
                    <select id="passengers" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-amber-400">
                        <option value="">Pilih Jumlah</option>
                        <option value="1-2">1-2 Orang</option>
                        <option value="3-4">3-4 Orang</option>
                        <option value="5-6">5-6 Orang</option>
                        <option value="7+">7+ Orang</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <label for="destination" class="block text-gray-700 mb-2">Destinasi yang Ingin Dikunjungi</label>
                <input type="text" id="destination" placeholder="Contoh: Pantai Iboih, Kilometer Nol, dll" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-amber-400">
            </div>
            <div class="mt-6 flex justify-center">
                {{-- Tombol ini untuk booking, tidak terhubung ke filter JS driver di bawah --}}
                <button type="submit" class="bg-amber-400 text-black px-8 py-3 rounded hover:bg-amber-500 transition font-medium btn-amber">CARI DRIVER</button>
            </div>
        </form>
    </div>
</section>

{{-- Functional Filter Section (untuk memfilter grid driver di bawah) --}}
<section class="py-8">
    <div class="container mx-auto px-6">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h3 class="text-xl font-semibold mb-4">Saring Daftar Driver</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="dynamicSearch" class="block text-sm font-medium text-gray-700">Cari Nama/Tipe Kendaraan</label>
                    <input type="text" id="dynamicSearch" placeholder="Cari driver..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500">
                </div>
                <div>
                    <label for="vehicleTypeFilter" class="block text-sm font-medium text-gray-700">Tipe Kendaraan</label>
                    <select id="vehicleTypeFilter" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500">
                        <option value="">Semua Tipe</option>
                        @php
                            $uniqueVehicleTypes = $drivers->pluck('vehicle_type')->unique()->filter()->sort();
                        @endphp
                        @foreach($uniqueVehicleTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center animate-on-scroll">Mengapa Memilih Driver Kami?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-lg p-6 shadow-lg animate-on-scroll">
                <div class="w-16 h-16 bg-amber-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-check text-black text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Terverifikasi</h3>
                <p class="text-gray-700 text-center">Semua driver kami telah melalui verifikasi identitas dan memiliki izin resmi</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-lg animate-on-scroll">
                <div class="w-16 h-16 bg-amber-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marked-alt text-black text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Pengetahuan Lokal</h3>
                <p class="text-gray-700 text-center">Familiar dengan semua lokasi, jalur terbaik, dan spot tersembunyi di Sabang</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-lg animate-on-scroll">
                <div class="w-16 h-16 bg-amber-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hand-holding-usd text-black text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Harga Transparan</h3>
                <p class="text-gray-700 text-center">Tidak ada biaya tambahan tersembunyi, apa yang Anda lihat adalah yang Anda bayar</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-lg animate-on-scroll">
                <div class="w-16 h-16 bg-amber-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-language text-black text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Bahasa</h3>
                <p class="text-gray-700 text-center">Sebagian besar driver kami fasih berbicara Bahasa Indonesia dan Inggris dasar</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center animate-on-scroll">Driver Tersedia</h2>
        <div id="drivers-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($drivers as $driver)
                {{-- Menggunakan link ke halaman detail pada seluruh kartu --}}
                <a href="{{ route('drivers.show', $driver->id) }}" class="driver-card bg-white rounded-lg shadow-lg overflow-hidden block hover:shadow-xl transition-shadow duration-200"
                     data-name="{{ strtolower($driver->name) }}"
                     data-vehicle-type="{{ strtolower($driver->vehicle_type ?? '') }}">
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                                @if($driver->image)
                                    <img src="{{ asset('storage/' . $driver->image) }}" alt="{{ $driver->name }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://placehold.co/80x80/E0E0E0/333333?text=No+Img" alt="No Image Available" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <h3 class="font-bold text-xl">{{ $driver->name }}</h3>
                                {{-- Rating dan Driver Sejak (Ini masih statis atau dummy, perlu kolom di DB untuk dinamis) --}}
                                <div class="flex text-amber-400 text-sm mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-gray-600 ml-1">4.5 (120 ulasan)</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                    <span>Driver Sejak {{ \Carbon\Carbon::parse($driver->created_at)->format('Y') }}</span> {{-- Mengambil tahun registrasi --}}
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 border-t border-gray-200 pt-4">
                            {{-- Fitur/Bahasa/Keahlian (perlu kolom di DB jika ingin dinamis) --}}
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Bahasa Indonesia</span>
                                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Tour Guide</span>
                                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $driver->vehicle_type ?? 'N/A' }}</span>
                            </div>
                            {{-- Deskripsi driver (perlu kolom di DB jika ingin dinamis) --}}
                            <p class="text-gray-700 mb-4 text-sm">Driver yang berpengalaman dan ramah. Siap mengantarkan Anda menjelajahi Sabang dengan aman dan nyaman.</p>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="font-bold text-lg">Rp {{ number_format($driver->price_per_day, 0, ',', '.') }}</span>
                                    <span class="text-gray-600 text-sm">/ hari</span>
                                </div>
                                {{-- Tombol Pesan Melalui Aplikasi (akan mengarah ke detail driver) --}}
                                <span class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Lihat Detail & Pesan</span>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="md:col-span-3 text-center py-10 text-gray-500">
                    Tidak ada driver yang tersedia.
                </div>
            @endforelse
        </div>

        {{-- Pagination (Ini masih statis, akan dihilangkan jika menggunakan dynamic JS filtering saja) --}}
        {{-- Jika ingin pagination dinamis, perlu server-side pagination dan dihubungkan ke Controller --}}
        {{-- <div class="flex justify-center mt-12">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Sebelumnya</a>
                <a href="#" class="px-4 py-2 rounded border border-amber-400 bg-amber-400 text-black font-medium">1</a>
                <a href="#" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">2</a>
                <a href="#" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-700 hover:bg-50">3</a>
                <a href="#" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Selanjutnya</a>
            </nav>
        </div> --}}
    </div>
</section>

{{-- Testimonials (dari code user) --}}
<section class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center animate-on-scroll">Testimoni Pelanggan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg animate-on-scroll">
                <div class="flex text-amber-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-gray-700 mb-6 italic">"Pak Ahmad sangat berpengalaman, ramah, dan sabar. Beliau menunjukkan tempat-tempat indah yang tidak ada di Google Maps. Pengetahuan lokalnya sangat berharga untuk perjalanan kami di Sabang."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden mr-4 bg-gray-200">
                        <img src="{{ asset('storage/img/budi.png') }}" alt="User" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-bold">Indra Kusuma</h4>
                        <p class="text-gray-600 text-sm">Jakarta</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg animate-on-scroll">
                <div class="flex text-amber-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text-gray-700 mb-6 italic">"Pengalaman luar biasa dengan Ibu Siti. Beliau tidak hanya mengantarkan kami ke tempat-tempat wisata, tapi juga memperkenalkan kuliner khas Sabang yang enak-enak. Sangat direkomendasikan!"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden mr-4 bg-gray-200">
                        <img src="{{ asset('storage/img/rina.png') }}" alt="User" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-bold">Dewi Anggraini</h4>
                        <p class="text-gray-600 text-sm">Surabaya</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg animate-on-scroll">
                <div class="flex text-amber-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-gray-700 mb-6 italic">"Mas Rudi sangat membantu! Sebagai fotografer, dia memberikan tips foto terbaik di setiap lokasi. Kami mendapatkan foto-foto luar biasa berkat bantuannya. Mobil yang digunakan juga sangat nyaman."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden mr-4 bg-gray-200">
                        <img src="{{ asset('storage/img/budi.png') }}" alt="User" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-bold">Dian Sastro</h4>
                        <p class="text-gray-600 text-sm">Bandung</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menggunakan ID unik untuk input pencarian di bagian filter fungsional
        const dynamicSearchInput = document.getElementById('dynamicSearch');
        const vehicleTypeFilter = document.getElementById('vehicleTypeFilter');
        const driverCards = document.querySelectorAll('.driver-card');

        function filterDrivers() {
            const searchTerm = dynamicSearchInput.value.toLowerCase();
            const selectedVehicleType = vehicleTypeFilter.value.toLowerCase();

            driverCards.forEach(card => {
                const name = card.dataset.name;
                const vehicleType = card.dataset.vehicleType;

                let matchesSearch = true;
                if (searchTerm) {
                    matchesSearch = name.includes(searchTerm) ||
                                    vehicleType.includes(searchTerm);
                }

                const matchesVehicleType = selectedVehicleType === '' || vehicleType === selectedVehicleType;

                if (matchesSearch && matchesVehicleType) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        dynamicSearchInput.addEventListener('keyup', filterDrivers);
        vehicleTypeFilter.addEventListener('change', filterDrivers);
    });
</script>
