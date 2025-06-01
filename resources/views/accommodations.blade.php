@extends('layouts.app')

@section('title', 'Accommodations')

@section('content')
@vite('resources/css/app.css')
<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px]">
        <img src="{{ asset('storage/img/penginapan/6.jpg') }}" class="w-full h-150 object-cover" alt="">
    </div>
    <div class="pt-10 mr-50 ml-50 mt-30">
        <h2 class="text-5xl font-black mb-4 text-white">Penginapan</h2>
    </div>
</section>

<!-- Add Button for Providers -->
<section class="py-8">
    <div class="container mx-auto px-6">
        @auth
            @if(auth()->user()->role === 'provider')
                <div class="flex justify-end mb-6">
                    <a href="{{ route('accommodations.create') }}" class="bg-amber-400 text-black px-6 py-3 rounded hover:bg-amber-500 transition font-medium btn-amber">Add New Accommodation</a>
                </div>
            @endif
        @endauth
    </div>
</section>

<!-- Accommodations Table -->
<section class="py-8">
    <div class="container mx-auto px-6">
        <div class="bg-white rounded-lg shadow-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price/Night</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amenities</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner Phone</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($accommodations as $accommodation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $accommodation->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($accommodation->price_per_night, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($accommodation->description, 100) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($accommodation->amenities as $amenity)
                                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $amenity }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $accommodation->owner_phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $accommodation->location }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection