<?php

// 1. Ambil autoload vendor bawaan Laravel
require __DIR__ . '/../vendor/autoload.php';

// 2. Jalankan bootstrap aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Tangani request melalui HTTP Kernel Laravel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// 4. Kirim response balik ke browser lewat Vercel
$response->send();

$kernel->terminate($request, $response);