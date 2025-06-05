<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showLoginPForm()
    {
        return view('loginp');
    }

  public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->has('remember'))) {
        $user = Auth::user();
        if ($user->role === 'user') {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        Auth::logout();
        return back()->withErrors([
            'email' => 'Anda bukan pengguna biasa. Silakan masuk sebagai penyedia layanan.',
        ])->withInput($request->except('password'));
    }

    return back()->withErrors([
        'email' => 'Login gagal. Email atau password salah.',
    ])->withInput($request->except('password'));
}

 public function providerLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->has('remember'))) {
        $user = Auth::user();
        if ($user->role === 'provider') {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard/mitra');
        }
        Auth::logout();
        return back()->withErrors([
            'email' => 'Anda bukan penyedia layanan. Silakan masuk sebagai pengguna biasa.',
        ])->withInput($request->except('password'));
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput($request->except('password'));
}
public function register(Request $request)
{
    // Log incoming request data
    Log::info('Register request data:', $request->all());

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|in:user,provider',
    ]);

    // Log validated data
    Log::info('Validated data:', $validated);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => $validated['role'],
    ]);

    // Log created user
    Log::info('Created user:', $user->toArray());

    Auth::login($user);

    // Redirect based on role
    if ($user->role === 'provider') {
        return redirect()->route('dashboard.mitra');
    }

    return redirect()->route('home');
}
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}