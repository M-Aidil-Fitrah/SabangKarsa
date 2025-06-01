@extends('layouts.app')

@section('title', 'Drivers')

@section('content')
@vite('resources/css/app.css')
 <!-- Hero Section -->



 <section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px]">
        <img src="{{ asset('storage/img/kapal.jpg') }}" alt="Hero Image" class="w-full h-150 object-cover">
    </div>
    <div class="pt-10 mr-50 ml-50 mt-50">
        <h2 class="text-5xl font-black mb-4 text-white">Mengakomodir segala kebutuhan perjalan</h2>

    </div>
    </section>



<!-- Search Section -->
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
                <button type="submit" class="bg-amber-400 text-black px-8 py-3 rounded hover:bg-amber-500 transition font-medium btn-amber">CARI DRIVER</button>
            </div>
        </form>
    </div>
</section>

<!-- Why Choose Our Drivers -->
<section class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center animate-on-scroll">Mengapa Memilih Driver Kami?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-lg p-6 shadow-lg animate-on-scroll">
                <div class="w-16 h-16 bg-amber-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-check text-black text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Terverifikasi</h3>
                <p class="text-gray-700 text-center">Semua driver kami telah melalui verifikasi identitas dan memiliki izin resmi</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-lg p-6 shadow-lg animate-on-scroll">
                <div class="w-16 h-16 bg-amber-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marked-alt text-black text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Pengetahuan Lokal</h3>
                <p class="text-gray-700 text-center">Familiar dengan semua lokasi, jalur terbaik, dan spot tersembunyi di Sabang</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-lg p-6 shadow-lg animate-on-scroll">
                <div class="w-16 h-16 bg-amber-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hand-holding-usd text-black text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-center">Harga Transparan</h3>
                <p class="text-gray-700 text-center">Tidak ada biaya tambahan tersembunyi, apa yang Anda lihat adalah yang Anda bayar</p>
            </div>

            <!-- Feature 4 -->
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

<!-- Available Drivers -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center animate-on-scroll">Driver Tersedia</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Driver 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/ahmad.png') }}" alt="Driver" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Ahmad Rizal</h3>
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
                                <span>Driver Sejak 2018</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Bahasa Inggris</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Tour Guide</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Mobil Ber-AC</span>
                        </div>
                        <p class="text-gray-700 mb-4 text-sm">Saya lahir dan besar di Sabang, mengenal semua destinasi wisata baik yang populer maupun yang tersembunyi. Saya siap mengantarkan Anda ke tempat-tempat terbaik di Pulau Weh dengan aman dan nyaman.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Rp 500.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Driver 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/budi.png') }}" alt="Driver" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Rudi Saputra</h3>
                            <div class="flex text-amber-400 text-sm mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="text-gray-600 ml-1">5.0 (85 ulasan)</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                <span>Driver Sejak 2020</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Bahasa Inggris</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Fotografi</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Mobil 6 Penumpang</span>
                        </div>
                        <p class="text-gray-700 mb-4 text-sm">Mantan fotografer profesional yang kini menjadi driver wisata. Selain mengantarkan ke lokasi wisata, saya juga bisa membantu Anda mengambil foto yang instagramable di spot-spot terbaik Sabang.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Rp 600.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Driver 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/siti.png') }}" alt="Driver" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Siti Nurhaliza</h3>
                            <div class="flex text-amber-400 text-sm mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="text-gray-600 ml-1">4.0 (62 ulasan)</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                <span>Driver Sejak 2021</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Bahasa Inggris</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Kuliner Lokal</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Mobil Ber-AC</span>
                        </div>
                        <p class="text-gray-700 mb-4 text-sm">Driver wanita yang ahli tentang kuliner lokal Sabang. Selama perjalanan, saya akan membawa Anda ke tempat-tempat makan terbaik dengan hidangan khas Aceh yang autentik dan lezat.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Rp 450.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Driver 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/ahmad.png') }}" alt="Driver" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Budi Santoso</h3>
                            <div class="flex text-amber-400 text-sm mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-gray-600 ml-1">4.7 (95 ulasan)</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                <span>Driver Sejak 2017</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Bahasa Inggris</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Sejarah</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">SUV</span>
                        </div>
                        <p class="text-gray-700 mb-4 text-sm">Saya memiliki pengetahuan mendalam tentang sejarah Sabang dan Aceh. Perjalanan bersama saya tidak hanya wisata biasa, tetapi juga pembelajaran tentang sejarah dan budaya daerah ini.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Rp 550.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Driver 5 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/budi.png') }}" alt="Driver" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Rahmat Hidayat</h3>
                            <div class="flex text-amber-400 text-sm mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="text-gray-600 ml-1">4.0 (50 ulasan)</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                <span>Driver Sejak 2019</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Bahasa Inggris</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Adventure</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Jeep</span>
                        </div>
                        <p class="text-gray-700 mb-4 text-sm">Spesialis tur petualangan dengan kendaraan Jeep yang siap menjelajahi area off-road. Cocok untuk Anda yang ingin menjelajahi area-area yang tidak bisa diakses dengan kendaraan biasa.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Rp 700.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Driver 6 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/rina.png') }}" alt="Driver" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Maya Indriani</h3>
                            <div class="flex text-amber-400 text-sm mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="text-gray-600 ml-1">5.0 (42 ulasan)</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                <span>Driver Sejak 2022</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Bahasa Inggris</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">Bahasa Jepang</span>
                            <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">MPV</span>
                        </div>
                        <p class="text-gray-700 mb-4 text-sm">Driver wanita yang fasih berbahasa Inggris dan Jepang. Pernah tinggal di Jepang selama 5 tahun dan memiliki pengalaman sebagai pemandu wisata. Sangat cocok untuk wisatawan asing.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Rp 650.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Sebelumnya</a>
                <a href="#" class="px-4 py-2 rounded border border-amber-400 bg-amber-400 text-black font-medium">1</a>
                <a href="#" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">2</a>
                <a href="#" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">3</a>
                <a href="#" class="px-4 py-2 rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">Selanjutnya</a>
            </nav>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center animate-on-scroll">Testimoni Pelanggan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
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

            <!-- Testimonial 2 -->
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

            <!-- Testimonial 3 -->
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
<!-- Rental Providers -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold mb-12 text-center animate-on-scroll">Penyedia Rental Mobil dan Motor</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Rental Provider 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/rentalmb.jpg') }}" alt="Rental Provider" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Sabang Rent Car</h3>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt text-amber-400 mr-1"></i>
                                <span>Jalan Teuku Umar No. 10</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <p class="text-gray-700 mb-4 text-sm">Menyediakan berbagai jenis mobil untuk kebutuhan wisata Anda, mulai dari city car hingga SUV.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Mulai Rp 300.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rental Provider 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/rentalm.jpg') }}" alt="Rental Provider" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Weh Island Motor</h3>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt text-amber-400 mr-1"></i>
                                <span>Jalan Perdagangan No. 5</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <p class="text-gray-700 mb-4 text-sm">Rental motor dengan berbagai pilihan, cocok untuk menjelajahi Sabang dengan mudah dan hemat.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Mulai Rp 100.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rental Provider 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/rentalmb.jpg') }}" alt="Rental Provider" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Aceh Transport</h3>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt text-amber-400 mr-1"></i>
                                <span>Jalan Cut Nyak Dhien No. 15</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <p class="text-gray-700 mb-4 text-sm">Penyedia rental mobil dengan layanan sopir profesional untuk perjalanan yang lebih nyaman.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Mulai Rp 400.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rental Provider 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/rentalm.jpg') }}" alt="Rental Provider" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Sabang Bike Rental</h3>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt text-amber-400 mr-1"></i>
                                <span>Jalan Sabang Merauke No. 8</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <p class="text-gray-700 mb-4 text-sm">Sewa sepeda motor dengan harga terjangkau untuk menjelajahi Sabang dengan lebih leluasa.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Mulai Rp 80.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rental Provider 5 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg animate-on-scroll">
                <div class="p-6">
                    <div class="flex items-start">
                        <div class="w-20 h-20 rounded-full overflow-hidden mr-4 bg-gray-200">
                            <img src="{{ asset('storage/img/rentalm.jpg') }}" alt="Rental Provider" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-bold text-xl">Weh Island Transport</h3>
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt text-amber-400 mr-1"></i>
                                <span>Jalan Raya Sabang No. 12</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <p class="text-gray-700 mb-4 text-sm">Pilihan kendaraan lengkap, mulai dari motor hingga mobil keluarga untuk kebutuhan wisata Anda.</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="font-bold text-lg">Mulai Rp 250.000</span>
                                <span class="text-gray-600 text-sm">/ hari</span>
                            </div>
                            <button class="bg-amber-400 text-black px-4 py-2 rounded hover:bg-amber-500 transition text-sm btn-amber">Pesan Melalui Aplikasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
