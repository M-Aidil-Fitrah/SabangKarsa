@extends('layouts.app')

@section('title', 'Add New Tour Guide')

@section('content')
@vite('resources/css/app.css')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold mb-6">Add New Tour Guide</h1>

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

    <form action="{{ route('tour-guides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Tour Guide Name --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Tour Guide Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone --}}
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('phone') border-red-500 @enderror" required>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Experience --}}
            <div class="mb-4 md:col-span-2"> {/* Made experience full width for better text area space */}
                <label for="experience" class="block text-sm font-medium text-gray-700">Experience</label>
                <textarea name="experience" id="experience" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('experience') border-red-500 @enderror" required>{{ old('experience') }}</textarea>
                @error('experience')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price per Day --}}
            <div class="mb-4">
                <label for="price_per_day" class="block text-sm font-medium text-gray-700">Price per Day (IDR)</label>
                <input type="number" name="price_per_day" id="price_per_day" value="{{ old('price_per_day') }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('price_per_day') border-red-500 @enderror" required>
                @error('price_per_day')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image Upload --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Tour Guide Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full text-gray-700 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- provider_id will typically be handled in the controller, e.g., auth()->id() --}}

        <button type="submit" class="mt-4 bg-amber-400 text-black px-6 py-3 rounded hover:bg-amber-500 transition font-medium">Save Tour Guide</button>
    </form>
</div>
@endsection