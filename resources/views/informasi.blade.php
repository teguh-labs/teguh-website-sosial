<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusat Informasi - Lapor Warga Plaju</title>
    <link rel="icon" href="{{ asset('images/logo-palembang.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 min-h-screen">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 mr-8">
                        <img src="{{ asset('images/logo-palembang.png') }}" alt="Logo Palembang"
                            class="w-8 h-8 object-contain drop-shadow-sm">
                        <span class="font-extrabold text-lg text-gray-800 tracking-tight">LAPOR<span
                                class="text-blue-600">PLAJU</span></span>
                    </a>

                    <div class="hidden sm:flex sm:space-x-8 h-full">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-150">
                            Dashboard Laporan
                        </a>
                        <a href="{{ route('informasi') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-bold text-gray-900 transition duration-150">
                            Pusat Informasi
                        </a>
                        <a href="{{ route('tentang-pengembang') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-150">
                            Tentang Pengembang
                        </a>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <span
                        class="hidden sm:inline-block text-sm font-medium text-gray-500">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-xs font-bold text-gray-400 hover:text-red-600 border border-gray-200 hover:border-red-100 px-3 py-1.5 rounded-lg transition duration-150 uppercase tracking-widest">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                Pusat Informasi Kecamatan Plaju
            </h2>
            <p class="text-xs text-gray-500 mt-1">Berita dan pengumuman resmi dari aparatur setempat.</p>
        </div>
    </header>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if ($pengumuman->isEmpty())
                <div class="text-center py-20 bg-white rounded-xl border border-dashed border-gray-200">
                    <p class="text-gray-400 text-sm font-medium italic">Belum ada informasi terbaru saat ini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-4 sm:mx-0">
                    @foreach ($pengumuman as $info)
                        <div
                            class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition duration-150 relative overflow-hidden group">
                            <div
                                class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 group-hover:w-2 transition-all duration-300">
                            </div>

                            <div class="flex justify-between items-start mb-4 pl-2">
                                <h4 class="font-black text-gray-800 text-base uppercase tracking-tight">
                                    {{ $info->judul }}</h4>
                                <span
                                    class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-100 px-2.5 py-1 rounded-full whitespace-nowrap ml-4">
                                    {{ $info->created_at->format('d M Y') }}
                                </span>
                            </div>
                            <div class="text-sm text-gray-600 leading-relaxed pl-2 whitespace-pre-line">
                                {{ $info->isi_informasi }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </main>

    <footer class="py-12 text-center mt-auto">
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">
            &copy; 2026 Project UAS - TEGUH PRAYOGA 2511013
        </p>
    </footer>

</body>

</html>
