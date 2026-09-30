<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Resmi - Lapor Warga Plaju</title>

    <link rel="icon" href="{{ asset('images/logo-palembang.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900 flex flex-col min-h-screen">

    <nav
        class="bg-white/80 backdrop-blur-md border-b border-gray-200 fixed w-full z-50 top-0 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-palembang.png') }}" alt="Logo Palembang"
                        class="w-10 h-10 object-contain drop-shadow-sm">
                    <span class="font-black text-2xl text-gray-800 tracking-tighter">
                        LAPOR<span class="text-blue-600">PLAJU</span>
                    </span>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('tentang-pengembang') }}"
                        class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-150">
                        Tentang Pengembang
                    </a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm font-bold text-gray-600 hover:text-blue-600 transition uppercase tracking-widest">
                                Masuk Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm font-bold text-gray-600 hover:text-blue-600 transition uppercase tracking-widest hidden sm:block">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-6 rounded-full shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 uppercase tracking-widest">
                                    Daftar Akun
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow pt-32 pb-16 flex flex-col justify-center relative overflow-hidden">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full max-w-3xl opacity-10 pointer-events-none">
            <div class="w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl absolute top-10 left-10">
            </div>
            <div class="w-96 h-96 bg-red-400 rounded-full mix-blend-multiply filter blur-3xl absolute top-20 right-10">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-xs font-black uppercase tracking-widest mb-8 shadow-sm">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                Portal Aspirasi Masyarakat Plaju
            </div>

            <h1 class="text-5xl md:text-7xl font-black text-gray-900 tracking-tight leading-tight mb-6">
                Suara Anda Membangun <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-400">Kecamatan Kita
                    Tercinta</span>
            </h1>

            <p class="mt-4 max-w-2xl text-lg text-gray-500 mx-auto mb-10 leading-relaxed">
                Laporkan masalah infrastruktur, lingkungan, maupun layanan masyarakat di wilayah Kecamatan Plaju dengan
                mudah, cepat, dan transparan.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}"
                    class="bg-gray-900 hover:bg-black text-white font-bold py-4 px-10 rounded-xl shadow-lg hover:shadow-xl transition duration-200 text-sm uppercase tracking-widest">
                    Buat Laporan Sekarang
                </a>
                <a href="#alur"
                    class="bg-white hover:bg-gray-50 text-gray-800 border border-gray-200 font-bold py-4 px-10 rounded-xl shadow-sm hover:shadow transition duration-200 text-sm uppercase tracking-widest">
                    Pelajari Alurnya
                </a>
            </div>
        </div>

        <div id="alur" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-32 relative z-10 scroll-mt-32">
            <h2 class="text-center text-sm font-black text-gray-400 uppercase tracking-[0.3em] mb-12">Bagaimana Sistem
                Ini Bekerja?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 bg-red-50 text-red-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-gray-800 mb-3">1. Tulis Laporan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Jelaskan masalah yang Anda temui di sekitar wilayah
                        Plaju. Tambahkan foto bukti agar lebih akurat.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div
                        class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-gray-800 mb-3">2. Proses Verifikasi</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Admin kelurahan akan memverifikasi dan meneruskan
                        laporan Anda ke pihak atau instansi yang berwenang.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 bg-green-50 text-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-gray-800 mb-3">3. Tindak Lanjut</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Pantau status laporan Anda secara real-time hingga
                        masalah selesai ditangani oleh petugas lapangan.</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24 relative z-10 w-full">
            <div class="bg-blue-600 rounded-3xl p-10 md:p-16 text-center relative overflow-hidden shadow-xl">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl">
                </div>
                <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl">
                </div>

                <h2 class="text-3xl md:text-4xl font-black text-white mb-6 tracking-tight relative z-10">Mari Bersama
                    Membangun Plaju</h2>
                <p class="text-blue-100 mb-10 max-w-2xl mx-auto text-sm md:text-base leading-relaxed relative z-10">
                    Satu laporan dari Anda sangat berarti untuk kemajuan fasilitas dan layanan bersama. Jangan ragu
                    untuk melapor jika ada fasilitas yang rusak.
                </p>
                <a href="{{ route('register') }}"
                    class="relative z-10 inline-block bg-white text-blue-700 font-black py-4 px-10 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 text-sm uppercase tracking-widest">
                    Mulai Lapor Sekarang
                </a>
            </div>
        </div>

    </main>

    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div
            class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2 opacity-50 grayscale hover:grayscale-0 transition duration-300">
                <img src="{{ asset('images/logo-palembang.png') }}" alt="Logo Palembang" class="w-6 h-6">
                <span class="font-bold text-sm tracking-tight text-gray-900">LAPORPLAJU</span>
            </div>
            <p class="text-[10px] font-black text-black-400 uppercase tracking-[0.2em] text-center md:text-right">
                Dikembangkan oleh Teguh Prayoga &copy; 2026 <br>
                2511013 - ITB Bina Sriwijaya
            </p>
        </div>
    </footer>

</body>

</html>
