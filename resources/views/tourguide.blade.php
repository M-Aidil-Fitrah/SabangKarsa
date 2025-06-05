@extends('layouts.app')

@section('title', 'Book a Tour Guide')

@section('content')
<!-- Header Section -->
<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px]">
        <video autoplay loop muted playsinline class="w-full h-150 object-cover">
            <source src="{{ asset('storage/video/videobg.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="pt-10 mr-50 ml-50 mt-50">
        <h2 class="text-5xl font-black mb-4 text-white">Pesan Tour Guide Anda</h2>
        <p class="text-white">Jelajahi Sabang bersama pemandu wisata lokal berpengalaman!</p>
    </div>
</section>

<!-- Content Section -->

<section class="py-16 bg-white mt-45">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Daftar Pemandu Wisata</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            <!-- Tour Guide Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden border-2 border-gray-500">
                <img src="{{ asset('storage/img/budi.png') }}" alt="Tour Guide Budi" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Budi</h3>
                    <p class="text-sm text-gray-600">Ahli Sejarah Sabang</p>
                    <p class="text-sm text-gray-700 mt-2">Pengalaman mendalam tentang sejarah dan budaya Sabang.</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="ml-1 text-sm text-gray-700">4.8 (120 ulasan)</span>
                    </div>
                </div>
            </div>
            <!-- Tour Guide Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden  border-2 border-gray-500">
                <img src="{{ asset('storage/img/siti.png') }}" alt="Tour Guide Siti" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Siti</h3>
                    <p class="text-sm text-gray-600">Spesialis Wisata Bahari</p>
                    <p class="text-sm text-gray-700 mt-2">Panduan terbaik untuk menyelam dan snorkeling di Sabang.</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="ml-1 text-sm text-gray-700">4.7 (98 ulasan)</span>
                    </div>
                </div>
            </div>
            {{-- 3 --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden  border-2 border-gray-500">
                <img src="{{ asset('storage/img/siti.png') }}" alt="Tour Guide Siti" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Siti</h3>
                    <p class="text-sm text-gray-600">Spesialis Wisata Bahari</p>
                    <p class="text-sm text-gray-700 mt-2">Panduan terbaik untuk menyelam dan snorkeling di Sabang.</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="ml-1 text-sm text-gray-700">4.7 (98 ulasan)</span>
                    </div>
                </div>
            </div>
            {{-- 4 --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden  border-2 border-gray-500">
                <img src="{{ asset('storage/img/siti.png') }}" alt="Tour Guide Siti" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Siti</h3>
                    <p class="text-sm text-gray-600">Spesialis Wisata Bahari</p>
                    <p class="text-sm text-gray-700 mt-2">Panduan terbaik untuk menyelam dan snorkeling di Sabang.</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="ml-1 text-sm text-gray-700">4.7 (98 ulasan)</span>
                    </div>
                </div>
            </div>
            {{-- 5 --}}
            <div class="bg-white rounded-lg shadow-md overflow-hidden  border-2 border-gray-500">
                <img src="{{ asset('storage/img/siti.png') }}" alt="Tour Guide Siti" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Siti</h3>
                    <p class="text-sm text-gray-600">Spesialis Wisata Bahari</p>
                    <p class="text-sm text-gray-700 mt-2">Panduan terbaik untuk menyelam dan snorkeling di Sabang.</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="ml-1 text-sm text-gray-700">4.7 (98 ulasan)</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden  border-2 border-gray-500 flex items-center justify-center">
                <div class="p-4 ">
                    <p class="text-sm text-gray-600">Tertarik menjadi tourguide?</p>
                    <h3 class="text-lg font-semibold text-gray-800">Daftarkan Diri Anda</h3>
                    <p class="text-sm text-gray-700 mt-2">Bawa mereka ke tempat andalan anda</p>
                    <div class="flex items-center mt-3">

                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection
