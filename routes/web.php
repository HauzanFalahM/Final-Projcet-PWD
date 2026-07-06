<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $produkUnggulan = collect(config('produk'))->take(4);

    return view('index', compact('produkUnggulan'));

})->name('index');

Route::get('/produk', function () {

    $produk = config('produk');

    return view('produk', compact('produk'));

})->name('produk');

Route::get('/produk/{id}', function ($id) {

    $produk = collect(config('produk'))->firstWhere('id', (int)$id);

    abort_if(!$produk, 404);

    return view('detail-produk', compact('produk'));

})->name('produk.detail');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';