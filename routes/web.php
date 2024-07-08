<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DeteksiController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard/index');
});
Route::middleware('web')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/deteksi', [DeteksiController::class, 'index'])->name('deteksi');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::post('/diagnosa', [DeteksiController::class, 'diagnosa'])->name('diagnosa.submit');
    Route::post('/clear-session', function () {
        session()->forget('hasil');
        session()->forget('nama_pasien');
        session()->forget('usia_pasien');
        session()->forget('jenis_kelamin');
        session()->forget('login');
        session()->forget('register');
        return response()->json(['success' => true]);
    })->name('clear.session');
});
