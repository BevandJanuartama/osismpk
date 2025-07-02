<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\AnggotaController;
use App\Models\Anggota;

// Redirect root ke dashboard
Route::redirect('/', '/dashboard');

// Halaman dashboard menampilkan semua anggota
Route::get('/dashboard', function () {
    $anggotas = Anggota::with('divisi')->get();
    return view('public/dashboard', compact('anggotas'));
})->name('dashboard');

// CRUD Divisi (tanpa login)
Route::resource('admin/divisi', DivisiController::class);

// CRUD Anggota (tanpa login)
Route::resource('admin/anggota', AnggotaController::class)->parameters([
    'anggota' => 'anggota',
]);


// (Opsional) Komentar/Nonaktifkan profil jika tidak digunakan
/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

// Hapus login jika tidak dibutuhkan
// require _DIR_.'/auth.php';