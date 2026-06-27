<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Produk | Creative Hub</title>
</head>

<body>
<!-- Navbar -->
<header class="sticky top-0 z-50 bg-white shadow-sm" x-data="{ open: false }">
    <nav class="max-w-7xl mx-auto flex items-center justify-between px-8 py-5">

        <!-- Logo -->
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Creative Hub</span>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="h-8 w-auto">
            </a>
        </div>

        <!-- Hamburger (Mobile) -->
        <div class="flex lg:hidden">
            <button @click="open = true" class="-m-2.5 p-2.5">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Menu Links (Desktop) -->
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="#" class="text-sm/6 font-semibold text-black">Kategori</a>
            <a href="{{ route('produk') }}" class="text-sm/6 font-semibold text-black">Produk</a>
            <a href="#" class="text-sm/6 font-semibold text-black">Blog</a>
            <a href="#" class="text-sm/6 font-semibold text-black">Tentang Kami</a>
        </div>

        <!-- Auth Links (Desktop) -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-x-6">
            <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-black">Login</a>
            <a href="{{ route('register') }}" class="text-sm/6 font-semibold text-black">Sign up</a>
        </div>

    </nav>

<!-- Hero -->
<section class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-14">

        <p class="text-sm text-gray-500">
            Beranda / Produk
        </p>

        <h1 class="mt-3 text-5xl font-bold text-gray-900">
            Produk UMKM
        </h1>

        <p class="mt-4 text-gray-500 max-w-2xl">
            Temukan berbagai produk unggulan dari pelaku UMKM Indonesia.
            Jelajahi berbagai kategori dan dukung produk lokal berkualitas.
        </p>

        <!-- Search -->
        <div class="mt-8">
            <input
                type="text"
                placeholder="Cari produk..."
                class="w-full lg:w-96 px-5 py-4 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-[#3B5D50] focus:outline-none">
        </div>

    </div>
</section>

<!-- Produk -->
<section class="py-8">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">

            <!-- Sidebar -->
            <aside>

                <div class="bg-white rounded-3xl border border-gray-200 p-6 sticky top-24">

                    <h2 class="text-xl font-bold mb-6">
                        Filter Produk
                    </h2>

                    <!-- Kategori -->
                    <div class="mb-8">

                        <h3 class="font-semibold mb-4">
                            Kategori
                        </h3>

                        <div class="space-y-3">

                            <label class="flex items-center gap-3">
                                <input type="checkbox">
                                Kerajinan
                            </label>

                            <label class="flex items-center gap-3">
                                <input type="checkbox">
                                Fashion
                            </label>

                            <label class="flex items-center gap-3">
                                <input type="checkbox">
                                Makanan
                            </label>

                            <label class="flex items-center gap-3">
                                <input type="checkbox">
                                Dekorasi
                            </label>

                        </div>

                    </div>

                    <!-- Harga -->

                    <div>

                        <h3 class="font-semibold mb-4">
                            Urutkan
                        </h3>

                        <select class="w-full border rounded-xl p-3">

                            <option>Terbaru</option>
                            <option>Harga Termurah</option>
                            <option>Harga Termahal</option>

                        </select>

                    </div>

                </div>

            </aside>

            <!-- Produk -->
            <div class="lg:col-span-3">

                <!-- Header -->
                <div class="flex justify-between items-center mb-8">

                    <h2 class="text-2xl font-bold">
                        Semua Produk
                    </h2>

                    <p class="text-gray-500">
                        Menampilkan 12 produk
                    </p>

                </div>

                <!-- Grid -->
                <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-8">

                    <!-- CARD -->
                    @for($i=1;$i<=9;$i++)

                    <div class="group bg-white rounded-3xl overflow-hidden border border-gray-200 hover:border-[#3B5D50] hover:shadow-xl transition">

                        <div class="overflow-hidden">

                            <img src="{{ asset('images/produk/sule.jpg') }}"
                                class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">

                        </div>

                        <div class="p-6">

                            <span class="text-xs bg-green-100 text-[#3B5D50] px-3 py-1 rounded-full">
                                Kerajinan
                            </span>

                            <h3 class="mt-4 text-xl font-bold">
                                Tas Anyaman Rotan
                            </h3>

                            <p class="mt-2 text-gray-500 text-sm">
                                Produk handmade berkualitas tinggi dari UMKM lokal.
                            </p>

                            <div class="mt-6 flex justify-between items-center">

                                <div>

                                    <p class="text-gray-400 text-sm">
                                        Harga
                                    </p>

                                    <p class="text-xl font-bold text-[#3B5D50]">
                                        Rp125.000
                                    </p>

                                </div>

                                <a href="#"
                                    class="bg-[#3B5D50] text-white px-4 py-2 rounded-xl hover:bg-[#2d4c41] transition">

                                    Detail

                                </a>

                            </div>

                        </div>

                    </div>

                    @endfor

                </div>

                <!-- Pagination -->
                <div class="mt-14 flex justify-center gap-3">

                    <button class="px-4 py-2 border rounded-xl hover:bg-gray-100">
                        ←
                    </button>

                    <button class="px-4 py-2 rounded-xl bg-[#3B5D50] text-white">
                        1
                    </button>

                    <button class="px-4 py-2 border rounded-xl hover:bg-gray-100">
                        2
                    </button>

                    <button class="px-4 py-2 border rounded-xl hover:bg-gray-100">
                        3
                    </button>

                    <button class="px-4 py-2 border rounded-xl hover:bg-gray-100">
                        →
                    </button>

                </div>

            </div>

        </div>

    </div>
</section>

</body>
</html>