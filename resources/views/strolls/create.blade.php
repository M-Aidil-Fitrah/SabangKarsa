@extends('layouts.app')

@section('title', 'Tambah Stroll/Kuliner')

@section('content')
@vite('resources/css/app.css')

<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px] bg-amber-950">
        <img src="{{ asset('storage/img/agenda.jpg') }}" class="w-full h-150 object-cover opacity-70" alt="">
    </div>
    <div class="pt-10 mr-50 ml-50 mt-50">
        <h2 class="text-5xl font-black mb-4 text-white">Tambah Stroll/Kuliner</h2>
    </div>
</section>

<section class="mt-50">
    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-4 rounded-lg shadow-md">
            <form action="{{ route('strolls.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Stroll/Kuliner</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border rounded-lg" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" class="w-full p-2 border rounded-lg"></textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                    <input type="text" name="location" id="location" class="w-full p-2 border rounded-lg" required>
                    @error('location')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="category" id="category" class="w-full p-2 border rounded-lg" required>
                        <option value="kuliner">Kuliner</option>
                        <option value="jalan-jalan">Jalan-jalan</option>
                    </select>
                    @error('category')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" name="image" id="image" class="w-full p-2 border rounded-lg">
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="bg-amber-400 text-black px-4 py-2 rounded-lg hover:bg-amber-500 transition btn-amber">Simpan Stroll/Kuliner</button>
                <a href="{{ route('strolls.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400 transition inline-block ml-2">Kembali</a>
            </form>
        </div>
    </div>
</section>

@endsection