@extends('layouts.app')

@section('title', 'Create Provider Profile')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">Create Provider Profile</h1>

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('provider.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block">Nama Usaha:</label>
            <input type="text" name="nama_usaha" class="border p-2 w-full @error('nama_usaha') border-red-500 @enderror" value="{{ old('nama_usaha') }}" required>
            @error('nama_usaha')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block">Deskripsi:</label>
            <textarea name="deskripsi" class="border p-2 w-full @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block">Kontak:</label>
            <input type="text" name="kontak" class="border p-2 w-full @error('kontak') border-red-500 @enderror" value="{{ old('kontak') }}" required>
            @error('kontak')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block">Alamat:</label>
            <input type="text" name="alamat" class="border p-2 w-full @error('alamat') border-red-500 @enderror" value="{{ old('alamat') }}">
            @error('alamat')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection