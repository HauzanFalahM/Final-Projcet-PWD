<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Creative Hub</title>
</head>
<body>
<!-- Navbar -->
<header class="sticky top-0 z-50 bg-white shadow-sm" x-data="{ open: false }">
    <nav class="max-w-7xl mx-auto flex items-center justify-between px-8 py-5">

        <!-- Logo -->
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
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
            <a href="{{ route('kategori') }}" class="text-sm/6 font-semibold text-black">Kategori</a>
            <a href="{{ route('produk') }}" class="text-sm/6 font-semibold text-black">Produk</a>
            <a href="{{ route('blog') }}" class="text-sm/6 font-semibold text-black">Blog</a>
            <a href="{{ route('tentang-kami') }}" class="text-sm/6 font-semibold text-black">Tentang Kami</a>
        </div>

        <!-- Auth Links (Desktop) -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-x-6">
            <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-black">Login</a>
            <a href="{{ route('register') }}" class="text-sm/6 font-semibold text-black">Sign up</a>
        </div>

    </nav>

    <!-- Mobile Menu -->
    <div x-show="open" class="fixed inset-0 z-50 bg-white lg:hidden">
        <div class="p-6">

            <!-- Header -->
            <div class="flex justify-between items-center">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" class="h-8">
                <button @click="open = false">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Links -->
            <div class="mt-10 space-y-6">
                <a href="#" class="block text-xl font-semibold">Kategori</a>
                <a href="#" class="block text-xl font-semibold">Produk</a>
                <a href="#" class="block text-xl font-semibold">Blog</a>
                <a href="#" class="block text-xl font-semibold">Tentang Kami</a>
                <hr>
                <a href="{{ route('login') }}" class="block text-xl font-semibold">Login</a>
                <a href="{{ route('register') }}" class="block text-xl font-semibold">Sign Up</a>
            </div>

        </div>
    </div>
</header>

<!-- Hero -->
<section class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">

        <p class="text-sm text-gray-500">
            Beranda / Blog
        </p>

        <h1 class="mt-3 text-5xl font-bold text-gray-900">
            Blog & Artikel UMKM
        </h1>

        <p class="mt-4 text-gray-500 max-w-2xl">
            Temukan berbagai artikel, tips bisnis, strategi pemasaran, dan inspirasi untuk membantu perkembangan UMKM Indonesia.
        </p>

        <div class="mt-8">
            <input
                type="text"
                placeholder="Cari artikel..."
                class="w-full lg:w-96 px-5 py-4 rounded-2xl border border-gray-300 focus:ring-2 focus:ring-[#3B5D50] focus:outline-none">
        </div>

    </div>
</section>

<!-- Artikel -->
<section class="py-16 bg-gray-50">

    @php
        $blogs = config('blog');
    @endphp

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-10">

            <div>
                <h2 class="text-3xl font-bold">
                    Semua Artikel
                </h2>

                <p class="mt-2 text-gray-500">
                    Temukan berbagai artikel dan tips untuk mengembangkan UMKM Indonesia.
                </p>
            </div>

            <span class="text-gray-500">
                {{ count($blogs) }} Artikel
            </span>

        </div>

        <!-- Grid Artikel -->
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @foreach($blogs as $blog)

            <article class="group bg-white rounded-3xl overflow-hidden border border-gray-200 hover:border-[#3B5D50] hover:shadow-xl transition-all duration-300">

                <!-- Gambar -->
                <div class="overflow-hidden">

                    <img src="{{ asset('images/artikel/' . $blog['gambar']) }}"
                        alt="{{ $blog['judul'] }}"
                        class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">

                </div>

                <!-- Isi -->
                <div class="p-6">

                    <div class="flex items-center justify-between mb-4">

                        <span class="{{ $blog['warna'] }} text-xs px-3 py-1 rounded-full">
                            {{ $blog['kategori'] }}
                        </span>

                        <span class="text-sm text-gray-400">
                            {{ $blog['tanggal'] }}
                        </span>

                    </div>

                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-[#3B5D50] transition">
                        {{ $blog['judul'] }}
                    </h3>

                    <p class="mt-4 text-gray-500 leading-relaxed">
                        {{ $blog['deskripsi'] }}
                    </p>

                    <a href="{{ $blog['link'] }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 mt-6 text-[#3B5D50] font-semibold hover:gap-3 transition-all">

                        Baca Selengkapnya

                        <svg class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>

                    </a>

                </div>

            </article>

            @endforeach

        </div>

        <!-- Pagination (Dummy) -->
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

</section>

<!-- Footer -->
<footer class="bg-[#000000] text-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">

        <div class="mb-12">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                alt="Creative Hub"
                class="h-8 w-auto mb-5">

            <p class="text-sm text-gray-400 mb-6">
                Making the world a better place through constructing elegant hierarchies.
            </p>

            <div class="flex items-center gap-4">

                <a href="#" class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073C24 5.406 18.627 0 12 0S0 5.406 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.413c0-3.026 1.791-4.697 4.533-4.697 1.312 0 2.686.235 2.686.235v2.97h-1.513c-1.491 0-1.956.93-1.956 1.885v2.267h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>
                </a>

                <a href="#" class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>

                <a href="#" class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622 5.911-5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>

                <a href="#" class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                </a>

                <a href="#" class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:border-[#3B5D50] hover:text-[#3B5D50] transition">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
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
                    <li><a href="#" class="text-sm hover:text-[#3B5D50] transition">Terms of service</a></li>
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