@extends('layouts.app')

@section('title', 'Agenda')

@section('content')
@vite('resources/css/app.css')

<section>
    <div class="absolute top-0 left-0 w-full h-150 -z-10 mt-0 overflow-hidden rounded-bl-[50px] rounded-br-[50px] bg-amber-950">
        <img src="{{ asset('storage/img/agenda.jpg') }}" class="w-full h-150 object-cover opacity-70" alt="">
    </div>
    <div class="pt-10 mr-50 ml-50 mt-50">
        <h2 class="text-5xl font-black mb-4 text-white">Agenda</h2>
        @if(auth()->check() && auth()->user()->role === 'provider')
            <a href="{{ route('agendas.create') }}" class="bg-amber-400 text-black px-4 py-2 rounded-lg hover:bg-amber-500 transition btn-amber inline-block mb-4">Tambahkan Agenda</a>
        @endif
    </div>
</section>

<section class="mt-50">
    <div class="items-center flex justify-center overflow-hidden rounded-2xl m-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d329107.34308610234!2d95.22521858185829!3d5.872294096356269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3041cf2458af5be9%3A0x20892775b3c98e17!2sPulau%20We!5e0!3m2!1sid!2sid!4v1744604129408!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<section class="mt-10 mr-50 ml-50 mb-15">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-4">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Daftar agenda dari database -->
        @forelse($agendas as $agenda)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ Storage::url($agenda->image) }}" alt="{{ $agenda->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2">{{ $agenda->name }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($agenda->description, 100) }}</p>
                    <a href="{{ route('agendas.show', $agenda->id) }}" class="text-blue-500 hover:underline">Read more</a>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada agenda yang tersedia.</p>
        @endforelse
    </div>

    <!-- Paginasi dinamis -->
    <div class="flex justify-center mt-12">
        {{ $agendas->links() }}
    </div>
</section>

@endsection