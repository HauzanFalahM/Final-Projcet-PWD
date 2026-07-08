<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk['nama'] }} | Creative Hub</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    {{-- Navbar --}}
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('index') }}" class="text-2xl font-bold text-[#3B5D50]">
                Creative Hub
            </a>
    </nav>

    <!-- Back Button -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 pt-8">
        <a href="{{ route('produk') }}"
            class="inline-flex items-center gap-2 text-[#3B5D50] font-semibold hover:text-[#2f4d42] transition">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>

            Kembali ke Produk
        </a>
    </div>

    {{-- Detail Produk --}}
    <section class="max-w-7xl mx-auto px-6 py-12">

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <div class="grid md:grid-cols-2 gap-10">

                {{-- Gambar --}}
                <div class="p-8">

                    <img src="{{ asset('images/produk/' . $produk['gambar']) }}" alt="{{ $produk['nama'] }}"
                        class="w-full h-[500px] object-cover rounded-xl">

                </div>

                {{-- Informasi --}}
                <div class="p-8 flex flex-col">

                    <span class="inline-block bg-orange-100 text-orange-600 px-4 py-1 rounded-full text-sm w-fit mb-4">
                        {{ $produk['kategori'] }}
                    </span>

                    <div class="flex items-start justify-between gap-4 mb-3">

                        <h1 class="text-4xl font-bold text-gray-800">
                            {{ $produk['nama'] }}
                        </h1>

                        <button
                            class="w-12 h-12 rounded-xl border border-gray-200 flex items-center justify-center hover:bg-[#3B5D50] hover:text-white hover:border-[#3B5D50] transition duration-300 group">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21l-7.5-4-7.5 4V5.507c0-1.108.807-2.057 1.907-2.185A48.507 48.507 0 0 1 12 3c1.904 0 3.797.11 5.593.322z" />
                            </svg>

                        </button>

                    </div>

                    <h2 class="text-3xl font-bold text-[#3B5D50] mb-6">
                        Rp{{ number_format($produk['harga'], 0, ',', '.') }}
                    </h2>

                    <div class="border-t border-b py-6 space-y-4">

                        <div>
                            <h3 class="font-semibold text-gray-700">
                                Deskripsi Produk
                            </h3>

                            <p class="text-gray-600 leading-relaxed mt-2">
                                {{ $produk['deskripsi'] }}
                            </p>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">

                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm text-gray-500">
                                    UMKM
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $produk['umkm'] }}
                                </p>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-sm text-gray-500">
                                    Lokasi
                                </p>

                                <p class="font-semibold text-gray-800">
                                    {{ $produk['alamat'] }}
                                </p>
                            </div>

                        </div>

                    </div>

                    {{-- Tombol --}}
                    <div class="mt-8 flex gap-4">

                        <a href="{{ route('produk') }}"
                            class="px-6 py-3 rounded-lg bg-gray-200 hover:bg-gray-300 transition">
                            Kembali
                        </a>

                        <button class="px-6 py-3 rounded-lg bg-[#3B5D50] hover:bg-[#2f4a40] text-white transition">
                            Hubungi Penjual
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Produk Lain --}}
    <section class="max-w-7xl mx-auto px-6 pb-16">

        <h2 class="text-3xl font-bold mb-8">
            Produk Lainnya
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            @foreach (config('produk') as $item)
                @if ($item['id'] != $produk['id'])
                    <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

                        <img src="{{ asset('images/produk/' . $item['gambar']) }}" class="h-52 w-full object-cover">

                        <div class="p-5">

                            <h3 class="font-bold text-lg">
                                {{ $item['nama'] }}
                            </h3>

                            <p class="text-[#3B5D50] font-bold mt-2">
                                Rp{{ number_format($item['harga'], 0, ',', '.') }}
                            </p>

                            <a href="{{ route('produk.detail', $item['id']) }}"
                                class="inline-block mt-4 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg">
                                Lihat Detail
                            </a>

                        </div>

                    </div>
                @endif
            @endforeach

        </div>

    </section>

</body>

</html>
