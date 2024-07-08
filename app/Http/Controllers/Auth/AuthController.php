<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Simpan username dan id ke dalam sesi
            session(['username' => $user->username]);
            session(['user_id' => $user->id]);

            $request->session()->put('login', 'Login Anda Berhasil');
            return redirect()->intended('/');
        } else {
            // Masuk gagal, kembalikan dengan pesan kesalahan
            $request->session()->put('login', 'Login Anda Gagal');
            return redirect()->intended('/');
        }
    }
    public function register(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'username' => 'required|string|max:255|unique:users',
                'birthdate' => 'required|date',
                'gender' => 'required|in:Male,Female',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani jika validasi gagal
            $request->session()->put('register', 'Gagal membuat akun. Silakan coba lagi.');
            return redirect()->intended('/');
        }

        // Buat akun baru
        $user = new User();
        $user->username = $request->username;
        $user->birthdate = $request->birthdate;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // Coba menyimpan pengguna
        if ($user->save()) {
            $request->session()->put('register', 'Akun berhasil dibuat. Silakan masuk.');
            return redirect()->intended('/');
        } else {
            $request->session()->put('register', 'Gagal membuat akun. Silakan coba lagi.');
            return redirect()->intended('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna
        // $request->session()->forget('username'); // Hapus sesi username
        // $request->session()->forget('user_id'); // Hapus sesi user_id
        Session::flush();
        return Redirect::to('/'); // Redirect ke halaman utama
    }
}
