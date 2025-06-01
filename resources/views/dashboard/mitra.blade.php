<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penyedia - SabangKarsa</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('storage/css/style.css') }}">
    <link rel="icon" href="{{ asset('storage/img/logo.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#fbfbfb] text-gray-900">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-slate-900">Dashboard Penyedia</h1>
            <nav class="mt-4">
                <a href="{{ route('dashboard.mitra') }}" class="text-blue-600 hover:underline mx-2">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-blue-600 hover:underline mx-2">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-slate-900 mb-4">Selamat Datang, {{ Auth::user()->name }}</h2>
        <p class="text-lg text-slate-500">
            Kelola layanan Anda di sini. Tambah penawaran, lihat pemesanan, atau update profil Anda.
        </p>
        <!-- Add more dashboard content as needed -->
    </main>

    <script src="{{ asset('storage/js/script.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>