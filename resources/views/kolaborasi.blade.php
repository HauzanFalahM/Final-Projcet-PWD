<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Colaborations - Creative Hub</title>
</head>

<body>
    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white shadow-sm" x-data="{ open: false, userMenu: false }">
        <nav class="max-w-7xl mx-auto flex items-center justify-between px-8 py-5">

            <!-- Logo -->
            <div class="flex lg:flex-1">
                <a href="{{ route('dashboard') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Creative Hub</span>
                    <img src="{{ asset('images/logo/logo.jpg') }}" alt="" class="h-8 w-auto">
                </a>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="flex lg:hidden">
                <button @click="open = true" class="-m-2.5 p-2.5">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Menu Links (Desktop) -->
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('dashboard') }}" class="text-sm/6 font-semibold text-black">Beranda</a>
                <a href="{{ route('produk') }}" class="text-sm/6 font-semibold text-black">Produk</a>
                <a href="{{ route('blog') }}" class="text-sm/6 font-semibold text-black">Artikel</a>
                <a href="{{ route('tentang-kami') }}" class="text-sm/6 font-semibold text-black">Tentang Kami</a>
                <a href="{{ route('kolaborasi') }}" class="text-sm/6 font-semibold text-black">Kolaborasi</a>
            </div>

            <!-- Auth Area (Desktop) -->
            <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-x-6">
                @auth
                    <div class="relative" @click.outside="userMenu = false">
                        <button @click="userMenu = !userMenu"
                            class="flex items-center gap-x-1 text-sm/6 font-semibold text-black">
                            {{ Auth::user()->name }}
                            <svg class="h-4 w-4 transition-transform" :class="{ 'rotate-180': userMenu }" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="userMenu" x-transition
                            class="absolute right-0 mt-3 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5"
                            style="display: none;">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-black">Login</a>
                    <a href="{{ route('register') }}" class="text-sm/6 font-semibold text-black">Sign up</a>
                @endauth
            </div>

        </nav>

        <!-- Mobile Menu -->
        <div x-show="open" class="fixed inset-0 z-50 bg-white lg:hidden" style="display: none;">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <img src="{{ asset('images/logo/logo.jpg') }}" class="h-8">
                    <button @click="open = false">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-10 space-y-6">
                    <a href="{{ route('dashboard') }}" class="block text-sm/6 font-semibold text-black">Home</a>
                    <a href="{{ route('produk') }}" class="block text-sm/6 font-semibold text-black">Produk</a>
                    <a href="{{ route('blog') }}" class="block text-sm/6 font-semibold text-black">Blog</a>
                    <a href="{{ route('tentang-kami') }}" class="block text-sm/6 font-semibold text-black">Tentang
                        Kami</a>
                    <a href="{{ route('kolaborasi') }}"
                        class="block text-sm/6 font-semibold text-[#3B5D50]">Colaborations</a>
                    <hr>

                    @auth
                        <p class="text-sm font-semibold text-gray-500">{{ Auth::user()->name }}</p>
                        <a href="{{ route('profile.edit') }}" class="block text-xl font-semibold">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block text-xl font-semibold text-left w-full">
                                Log Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block text-xl font-semibold">Login</a>
                        <a href="{{ route('register') }}" class="block text-xl font-semibold">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div>
                    <span
                        class="inline-block rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-[#3B5D50]">
                        Untuk Pelaku UMKM
                    </span>

                    <h1 class="mt-6 text-5xl font-bold tracking-tight text-gray-900">
                        Daftarkan Usahamu,
                        <span class="text-[#3B5D50]">Jangkau Lebih Banyak Pembeli</span>
                    </h1>

                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Creative Hub membantu produk UMKM kamu tampil di depan ribuan calon pembeli
                        di seluruh Indonesia. Gratis, mudah, dan didampingi tim kami dari awal.
                    </p>

                    <div class="mt-10">
                        <a href="#form-daftar"
                            class="inline-flex items-center gap-2 rounded-lg bg-[#3B5D50] px-6 py-3.5 text-sm font-semibold text-white shadow hover:bg-[#2f4b40] transition">
                            Daftarkan Produk Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <img src="https://images.unsplash.com/photo-1556740758-90de374c12ad?w=700" alt="UMKM Kolaborasi"
                        class="rounded-2xl shadow-xl">
                </div>

            </div>
        </div>
    </section>

    <!-- Kenapa Bergabung -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-12">
                <span class="text-sm font-semibold text-[#3B5D50] uppercase tracking-widest">Kenapa Bergabung</span>
                <h2 class="mt-3 text-4xl font-bold text-gray-900">
                    Keuntungan Jadi Mitra Creative Hub
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl p-8 border border-gray-100">
                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center mb-6 text-2xl">
                        📢
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Jangkauan Lebih Luas</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Produkmu tampil di halaman utama dan katalog yang dilihat ribuan pengunjung setiap bulan.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 border border-gray-100">
                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center mb-6 text-2xl">
                        🆓
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Tanpa Biaya Pendaftaran</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Bergabung dan menampilkan produk di Creative Hub sepenuhnya gratis untuk pelaku UMKM.
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 border border-gray-100">
                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center mb-6 text-2xl">
                        🤝
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pendampingan Tim Kami</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Dibantu proses verifikasi, foto produk, dan tips pemasaran dari tim Creative Hub.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Cara Bergabung -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-14">
                <span class="text-sm font-semibold text-[#3B5D50] uppercase tracking-widest">Prosesnya Mudah</span>
                <h2 class="mt-3 text-4xl font-bold text-gray-900">
                    Cara Bergabung
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-10">

                <div class="text-center">
                    <div
                        class="w-12 h-12 mx-auto rounded-full bg-[#3B5D50] text-white flex items-center justify-center font-bold mb-5">
                        1
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Isi Formulir</h3>
                    <p class="text-sm text-gray-500">
                        Lengkapi data usaha dan produk kamu di formulir pendaftaran di bawah ini.
                    </p>
                </div>

                <div class="text-center">
                    <div
                        class="w-12 h-12 mx-auto rounded-full bg-[#3B5D50] text-white flex items-center justify-center font-bold mb-5">
                        2
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Verifikasi Tim Kami</h3>
                    <p class="text-sm text-gray-500">
                        Tim Creative Hub akan meninjau data dan menghubungi kamu lewat WhatsApp/email.
                    </p>
                </div>

                <div class="text-center">
                    <div
                        class="w-12 h-12 mx-auto rounded-full bg-[#3B5D50] text-white flex items-center justify-center font-bold mb-5">
                        3
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Produk Tayang</h3>
                    <p class="text-sm text-gray-500">
                        Setelah disetujui, produkmu resmi tampil di katalog Creative Hub.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Form Pendaftaran -->
    <section id="form-daftar" class="bg-gray-50 py-16">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">
                    Formulir Pendaftaran UMKM
                </h2>
                <p class="mt-3 text-gray-500">
                    Isi data di bawah ini selengkap mungkin agar proses verifikasi lebih cepat.
                </p>
            </div>

            <div class="bg-white rounded-3xl border border-gray-200 p-8 lg:p-10">

                {{-- Pesan sukses/error dari controller (jika ada) --}}
                @if (session('success'))
                    <div class="mb-6 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('kolaborasi.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6" x-data="{ preview: null }">
                    @csrf

                    <!-- Nama Usaha & Nama Pemilik -->
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Usaha / UMKM</label>
                            <input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}" required
                                placeholder="Contoh: Rotan Jaya"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-[#3B5D50] focus:border-[#3B5D50] focus:outline-none">
                            @error('nama_usaha')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required
                                placeholder="Nama lengkap"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-[#3B5D50] focus:border-[#3B5D50] focus:outline-none">
                            @error('nama_pemilik')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- WhatsApp & Email -->
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" required
                                placeholder="08xxxxxxxxxx"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-[#3B5D50] focus:border-[#3B5D50] focus:outline-none">
                            @error('whatsapp')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                placeholder="nama@email.com"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-[#3B5D50] focus:border-[#3B5D50] focus:outline-none">
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Kategori & Lokasi -->
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Produk</label>
                            <select name="kategori" required
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-[#3B5D50] focus:border-[#3B5D50] focus:outline-none">
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="Kerajinan" {{ old('kategori') == 'Kerajinan' ? 'selected' : '' }}>
                                    Kerajinan Tangan</option>
                                <option value="Fashion" {{ old('kategori') == 'Fashion' ? 'selected' : '' }}>Fashion &
                                    Tekstil</option>
                                <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan &
                                    Minuman</option>
                                <option value="Dekorasi" {{ old('kategori') == 'Dekorasi' ? 'selected' : '' }}>
                                    Dekorasi & Furnitur</option>
                            </select>
                            @error('kategori')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Usaha</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                                placeholder="Contoh: Yogyakarta"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-[#3B5D50] focus:border-[#3B5D50] focus:outline-none">
                            @error('lokasi')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Deskripsi Usaha -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Usaha & Produk</label>
                        <textarea name="deskripsi" rows="4" required
                            placeholder="Ceritakan produk yang kamu jual, bahan yang dipakai, dan keunikannya..."
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-[#3B5D50] focus:border-[#3B5D50] focus:outline-none">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Upload Foto Produk -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Produk</label>

                        <label
                            class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-300 rounded-xl py-8 cursor-pointer hover:border-[#3B5D50] transition"
                            :class="preview ? 'border-[#3B5D50]' : ''">

                            <template x-if="!preview">
                                <div class="text-center">
                                    <svg class="w-8 h-8 mx-auto text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-500">Klik untuk unggah foto produk</p>
                                    <p class="text-xs text-gray-400">PNG atau JPG, maks. 2MB</p>
                                </div>
                            </template>

                            <template x-if="preview">
                                <img :src="preview" class="h-32 rounded-lg object-cover">
                            </template>

                            <input type="file" name="foto_produk" accept="image/png, image/jpeg" required
                                class="hidden" @change="preview = URL.createObjectURL($event.target.files[0])">
                        </label>
                        @error('foto_produk')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Syarat & Ketentuan -->
                    <label class="flex items-start gap-3 text-sm text-gray-600">
                        <input type="checkbox" name="setuju" required class="mt-1 accent-[#3B5D50]">
                        Saya menyatakan bahwa data di atas benar dan menyetujui
                    </label>

                    <button type="submit"
                        class="w-full bg-[#3B5D50] text-white font-semibold py-3.5 rounded-xl hover:bg-[#2f4b40] transition">
                        Kirim Pendaftaran
                    </button>

                </form>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#000000] text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">

            <div class="mb-12">
                <img src="{{ asset('images/logo/logo.jpg') }}"
                    alt="Creative Hub" class="h-8 w-auto mb-5">

                <p class="text-sm text-gray-400 mb-6">
                    Making the world a better place through constructing elegant hierarchies.
                </p>

                <div class="flex items-center gap-4">

                    <a href="#"
                        class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073C24 5.406 18.627 0 12 0S0 5.406 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.413c0-3.026 1.791-4.697 4.533-4.697 1.312 0 2.686.235 2.686.235v2.97h-1.513c-1.491 0-1.956.93-1.956 1.885v2.267h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
                        </svg>
                    </a>

                    <a href="#"
                        class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg>
                    </a>

                    <a href="#"
                        class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622 5.911-5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>

                    <a href="#"
                        class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                        </svg>
                    </a>

                    <a href="#"
                        class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>

                </div>
            </div>

            <hr class="border-gray-200 mb-12">

            <div class="grid grid-cols-2 gap-8 lg:grid-cols-4 mb-12">

                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-6">Solutions</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Marketing</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Analytics</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Automation</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Commerce</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Insights</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-6">Support</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Submit ticket</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Documentation</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Guides</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-6">Company</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">About</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Blog</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Jobs</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Press</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-6">Legal</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Terms of service</a>
                        </li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Privacy policy</a></li>
                        <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">License</a></li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-6">
                <p class="text-sm text-gray-400">&copy; 2024 Your Company, Inc. All rights reserved.</p>
            </div>
        </div>

    </footer>

</body>

</html>
