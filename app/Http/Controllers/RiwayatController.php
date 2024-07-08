<?php

namespace App\Http\Controllers;

use App\Models\HistoryPerhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RiwayatController extends Controller
{
    public function index()
    {
        // Pengecekan session user_id
        if (!Session::has('user_id')) {
            // Jika session tidak ada, redirect ke halaman lain atau lakukan penanganan sesuai kebutuhan aplikasi Anda
            return redirect()->route('login')->with('error', 'Anda harus masuk untuk mengakses riwayat perhitungan.');
        }

        // Ambil user_id dari session
        $user_id = Session::get('user_id');

        // Ambil riwayat perhitungan berdasarkan id_akun (user_id)
        $riwayatPerhitungan = HistoryPerhitungan::where('id_akun', $user_id)
            ->join('users', 'users.id', '=', 'history_deteksi.id_akun')
            ->get();

        return view('riwayat.index')->with('riwayatPerhitungan', $riwayatPerhitungan);
    }
}