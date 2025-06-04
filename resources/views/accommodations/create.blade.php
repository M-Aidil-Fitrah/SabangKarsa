@extends('layouts.app')

@section('title', 'Add New Accommodation')

@section('content')
@vite('resources/css/app.css')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold mb-6">Add New Accommodation</h1>

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('accommodations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Accommodation Name (sesuai dengan 'name' di skema) --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Accommodation Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price per Night (sesuai dengan 'price_per_night' di skema) --}}
            <div class="mb-4">
                <label for="price_per_night" class="block text-sm font-medium text-gray-700">Price per Night (Rp)</label>
                <input type="number" name="price_per_night" id="price_per_night" value="{{ old('price_per_night') }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('price_per_night') border-red-500 @enderror" required>
                @error('price_per_night')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Type (asumsi ini adalah kolom 'type' baru di skema) --}}
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <input type="text" name="type" id="type" value="{{ old('type') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('type') border-red-500 @enderror" required>
                @error('type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description (sesuai dengan 'description' di skema) --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Amenities (tetap comma-separated di frontend, konversi di backend) --}}
            <div class="mb-4">
                <label for="amenities" class="block text-sm font-medium text-gray-700">Amenities (comma-separated)</label>
                <input type="text" name="amenities" id="amenities" value="{{ old('amenities') }}" placeholder="e.g., Wi-Fi, Parking, Pool" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('amenities') border-red-500 @enderror">
                @error('amenities')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Owner Phone (asumsi ini adalah kolom 'owner_phone' baru di skema) --}}
            <div class="mb-4">
                <label for="owner_phone" class="block text-sm font-medium text-gray-700">Owner Phone</label>
                <input type="text" name="owner_phone" id="owner_phone" value="{{ old('owner_phone') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('owner_phone') border-red-500 @enderror">
                @error('owner_phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Location (sesuai dengan 'location' di skema) --}}
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('location') border-red-500 @enderror">
                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image Upload (sesuai dengan 'image' di skema) --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Accommodation Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="mt-4 bg-amber-400 text-black px-6 py-3 rounded hover:bg-amber-500 transition font-medium">Save Accommodation</button>
    </form>
</div>
@endsection