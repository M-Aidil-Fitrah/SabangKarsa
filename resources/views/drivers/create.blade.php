@extends('layouts.app')

@section('title', 'Add New Driver')

@section('content')
@vite('resources/css/app.css')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold mb-6">Add New Driver</h1>

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

    <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Driver Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('phone') border-red-500 @enderror" required>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                <input type="text" name="vehicle_type" id="vehicle_type" value="{{ old('vehicle_type') }}" placeholder="e.g., Car, Motorcycle, Van" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('vehicle_type') border-red-500 @enderror" required>
                @error('vehicle_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price_per_day" class="block text-sm font-medium text-gray-700">Price per Day (Rp)</label>
                <input type="number" name="price_per_day" id="price_per_day" value="{{ old('price_per_day') }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('price_per_day') border-red-500 @enderror" required>
                @error('price_per_day')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Driver Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="mt-4 bg-amber-400 text-black px-6 py-3 rounded hover:bg-amber-500 transition font-medium">Save Driver</button>
    </form>
</div>
@endsection
