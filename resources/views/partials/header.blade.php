{{--
<header class="pt-10 mr-50 ml-50 flex justify-between items-center z-20">
    <img src="{{ asset('storage/img/logo.png') }}" alt="Logo" class="w-16 h-16">
    <h1 class="text-xl font-bold">Visit Sabang</h1>
    <nav class="space-x-6">
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Home</a>
        <a href="{{ route('about') }}" class="text-blue-600 hover:underline">About</a>
    </nav>
</header> --}}

   <header class="pt-10 mr-50 ml-50 flex justify-between items-center z-20">
    <div class="container mx-auto flex justify-between items-center p-4">
        <div class="flex items-center">
            <div class="">
                <a href="{{ route('home') }}" class="block">
                    <img src="{{ asset('storage/img/logo.png') }}" alt="Visit Sabang Logo" class="h-25">
                </a>
            </div>
            <nav class="hidden md:flex space-x-8 ml-8">
                <a href="{{ route('destination') }}" class="text-white font-black hover:text-amber-400 transition duration-300 nav-link active">DESTINASI</a>
                <div x-data="{ open: false }" class="relative">
                    <button
                        @click="open = !open"
                        class="flex items-center gap-1 text-white font-black hover:text-amber-400 transition duration-300 nav-link"
                    >
                        LAYANAN
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                                              </button>

                    <div
                        x-show="open"
                        @click.outside="open = false"
                        x-transition
                        class="absolute bg-white shadow-lg rounded-md mt-2 w-48 z-50">
                        <a href="{{ route('accommodations') }}" class="block px-4 py-2 text-gray-800 hover:bg-amber-100">PENGINAPAN</a>
                        <a href="{{ route('drivers') }}" class="block px-4 py-2 text-gray-800 hover:bg-amber-100">DRIVER & RENTAL</a>
                        <a href="{{ route('tourguide') }}" class="block px-4 py-2 text-gray-800 hover:bg-amber-100">TOUR GUIDE</a>

                    </div>
                </div>

                <a href="{{ route('agenda') }}" class="text-white font-black hover:text-amber-400 transition duration-300 nav-link">AGENDA</a>
                <a href="{{ route('stroll') }}" class="text-white font-black hover:text-amber-400 transition duration-300 nav-link">STROLL & KULINER</a>
                <a href="{{ route('travelkit') }}" class="text-white font-black hover:text-amber-400 transition duration-300 nav-link">TRAVEL KIT</a>

                <a href="{{ route('about') }}" class="text-white font-black hover:text-amber-400 transition duration-300 nav-link">TENTANG KAMI</a>
            </nav>
        </div>
        <div class="flex items-center space-x-4">
            <div class="hidden md:block">
                <button class="text-sm rounded-full px-4 py-1 border border-white text-white">
                    <span>ID</span>
                    <span class="mx-1">|</span>
                    <span>EN</span>
                </button>
            </div>
            
            @guest
                <a href="{{ route('login') }}">
                <button class="bg-amber-400 text-black px-6 py-2 rounded-lg hover:bg-amber-500 transition btn-amber">Masuk</button></a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-amber-400 text-black px-6 py-2 rounded-lg hover:bg-amber-500 transition btn-amber">Keluar</button>
                </form>
            @endguest
            <button class="md:hidden text-white" id="mobileMenuButton">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>
</header>
