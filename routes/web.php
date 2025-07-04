<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\EventController;
use App\Models\Anggota;
use App\Models\Event; // Tambahkan ini

// Redirect root ke dashboard
Route::redirect('/', '/dashboard');

// Halaman dashboard menampilkan semua anggota & event
Route::get('/dashboard', function () {
    $anggotas = Anggota::with('divisi')->get();
    $events = Event::with('photos')->orderByDesc('tanggal_mulai')->get(); // Ambil semua event + foto
    return view('public.dashboard', compact('anggotas', 'events'));
})->name('dashboard');

// Halaman publik detail event
Route::get('/event/{id}', function ($id) {
    $event = Event::with('photos')->findOrFail($id);
    return view('public.event_show', compact('event'));
})->name('public.event.show');

// CRUD Divisi (tanpa login)
Route::resource('admin/divisi', DivisiController::class)->names('admin.divisi');

// CRUD Anggota (tanpa login)
Route::resource('admin/anggota', AnggotaController::class)->names('admin.anggota');

// CRUD Event (tanpa login)
Route::resource('admin/event', EventController::class)->names('admin.event');

// (Opsional) Komentar/Nonaktifkan profil jika tidak digunakan
/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

// Hapus login jika tidak dibutuhkan
// require __DIR__.'/auth.php';
