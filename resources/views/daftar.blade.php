<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SabangKarsa</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('storage/css/style.css') }}">
    <link rel="icon" href="{{ asset('storage/img/logo.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#fbfbfb] text-gray-900">
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
        <div class="max-w-md w-full">
            <h2 class="text-3xl font-bold text-slate-900 mb-8">Daftar Akun</h2>

            @if ($errors->any())
                <div class="text-red-500 text-sm mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label class="text-sm text-slate-800 font-medium mb-2 block">Nama</label>
                        <input name="name" type="text" required class="bg-slate-100 w-full text-sm text-slate-800 px-4 py-3 rounded-md outline-none border focus:border-blue-600 focus:bg-transparent" placeholder="Masukkan Nama" value="{{ old('name') }}" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-800 font-medium mb-2 block">Email</label>
                        <input name="email" type="email" required class="bg-slate-100 w-full text-sm text-slate-800 px-4 py-3 rounded-md outline-none border focus:border-blue-600 focus:bg-transparent" placeholder="Masukkan Email" value="{{ old('email') }}" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-800 font-medium mb-2 block">Password</label>
                            <input name="password" type="password" required class="bg-slate-100 w-full text-sm text-slate-800 px-4 py-3 rounded-md outline-none border focus:border-blue-600 focus:bg-transparent" placeholder="Masukkan Password" />
                        </div>
                        <div>
                            <label class="text-sm text-slate-800 font-medium mb-2 block">Konfirmasi Password</label>
                            <input name="password_confirmation" type="password" required class="bg-slate-100 w-full text-sm text-slate-800 px-4 py-3 rounded-md outline-none border focus:border-blue-600 focus:bg-transparent" placeholder="Konfirmasi Password" />
                        </div>
                        <div>
                            <label class="text-sm text-slate-800 font-medium mb-2 block">Daftar Sebagai</label>
                            <select name="role" class="bg-slate-100 w-full text-sm text-slate-800 px-4 py-3 rounded-md border focus:border-blue-600 focus:bg-transparent" required>
                                <option value="user" {{ old('role', '') == 'user' ? 'selected' : '' }}>Pengguna / Wisatawan</option>
                                <option value="provider" {{ old('role', '') == 'provider' ? 'selected' : '' }}>Penyedia Layanan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-amber-400 hover:bg-amber-700 focus:outline-none">
                            Daftar
                        </button>
                    </div>

                <p class="text-sm mt-6 text-slate-500 text-center">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Masuk di sini</a>
                </p>
            </form>
        </div>
    </div>
    <script src="{{ asset('storage/js/script.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>