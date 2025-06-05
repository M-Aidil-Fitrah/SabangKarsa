@extends('layouts.app')

@section('title', 'Detail Agenda')

@section('content')
@vite('resources/css/app.css')

<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px] bg-amber-950">
        <img src="{{ asset('storage/img/agenda.jpg') }}" class="w-full h-150 object-cover opacity-70" alt="">
    </div>
    <div class="pt-10 mr-50 ml-50 mt-50">
        <h2 class="text-5xl font-black mb-4 text-white">Detail Agenda</h2>
    </div>
</section>

<section class="mt-50">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-2xl mx-auto">
            <img src="{{ Storage::url($agenda->image) }}" alt="{{ $agenda->name }}" class="w-full h-64 object-cover">
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-2">{{ $agenda->name }}</h3>
                <p class="text-gray-600 text-base mb-4">{{ $agenda->description }}</p>
                <a href="{{ route('agendas.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400 transition mt-4 inline-block">Kembali ke Daftar Agenda</a>
            </div>
        </div>
    </div>
</section>

@endsection