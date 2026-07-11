<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama / landing page
Route::get('/', function () {
    // Ambil 4 produk teratas untuk section "Produk Unggulan"
    $produkUnggulan = collect(config('produk'))->take(4);

    return view('index', compact('produkUnggulan'));
})->name('index');

// Halaman daftar semua produk
Route::get('/produk', function () {
    $produk = config('produk');

    return view('produk', compact('produk'));
})->name('produk');

// Halaman detail 1 produk berdasarkan id di URL
Route::get('/produk/{id}', function ($id) {
    $produk = collect(config('produk'))->firstWhere('id', (int) $id);

    // Tampilkan 404 kalau produk tidak ditemukan
    abort_if(!$produk, 404);

    return view('detail-produk', compact('produk'));
})->name('produk.detail');

// Halaman daftar artikel/blog
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Halaman Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

// Halaman Dashboard, hanya bisa diakses setelah login
Route::get('/dashboard', function () {
    // Kirim data yang sama seperti index, karena dashboard.blade.php butuh $produkUnggulan
    $produkUnggulan = collect(config('produk'))->take(4);

    return view('dashboard', compact('produkUnggulan'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Halaman Kolaborasi, hanya bisa diakses setelah login
Route::get('/kolaborasi', function () {
    return view('kolaborasi');
})->name('kolaborasi');

Route::post('/kolaborasi', [KolaborasiController::class, 'store'])->name('kolaborasi.store');

// Group route untuk fitur profile, semua wajib login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tambahkan route ini di web.php, dekat route blog yang sudah ada

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Route BARU: halaman detail 1 artikel, berdasarkan {id} di URL
Route::get('/blog/{id}', function ($id) {

    $blog = collect(config('blog'))->firstWhere('id', (int) $id);

    // Tampilkan 404 kalau artikel tidak ditemukan
    abort_if(!$blog, 404);

    return view('blog-detail', compact('blog'));

})->name('blog.detail');


require __DIR__.'/auth.php';