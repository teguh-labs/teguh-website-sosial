<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Lapor Warga Plaju</title>
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
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-bold text-gray-900 transition duration-150">
                            Dashboard Laporan
                        </a>
                        <a href="{{ route('informasi') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-bold text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-150">
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
                Dashboard Laporan Warga
            </h2>
        </div>
    </header>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <style>
                @keyframes muncul-turun {
                    0% {
                        opacity: 0;
                        transform: translateY(-15px);
                    }

                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                @keyframes timer-menyusut {
                    0% {
                        width: 100%;
                    }

                    100% {
                        width: 0%;
                    }
                }

                @keyframes ikon-joget {

                    0%,
                    100% {
                        transform: scale(1) rotate(0deg);
                    }

                    10%,
                    30%,
                    50%,
                    70%,
                    90% {
                        transform: scale(1.1) rotate(-12deg);
                    }

                    20%,
                    40%,
                    60%,
                    80% {
                        transform: scale(1.1) rotate(12deg);
                    }
                }

                .notif-wadah-hijau {
                    animation: muncul-turun 0.4s ease-out forwards;
                    position: relative;
                    overflow: hidden;
                }

                .notif-garis-hijau {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    height: 4px;
                    background-color: #16a34a;
                    /* Warna hijau Tailwind (green-600) */
                    animation: timer-menyusut 5s linear forwards;
                }

                .notif-ikon-hijau {
                    animation: ikon-joget 5s ease-in-out forwards;
                    transform-origin: top center;
                }
            </style>

            @if (session('pesan'))
                <div
                    class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-lg mx-4 sm:mx-0 notif-wadah-hijau shadow-md mb-6">
                    <div class="flex items-center gap-3 relative z-10">
                        <svg class="w-6 h-6 text-green-600 notif-ikon-hijau drop-shadow-sm" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-black tracking-wide">{{ session('pesan') }}</span>
                    </div>

                    <div class="notif-garis-hijau"></div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 mx-4 sm:mx-0">
                <div class="p-6 md:p-8">
                    <h3 class="font-bold text-lg text-gray-800 mb-6 border-b pb-4 italic">Sampaikan Laporan Anda</h3>

                    <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Masalah</label>
                                    <input type="text" name="judul" value="{{ old('judul') }}"
                                        class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm text-sm py-2.5 @error('judul') border-red-500 @enderror"
                                        placeholder="Contoh: Lampu jalan mati di Lorong Asia">
                                    @error('judul')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Detail Kejadian &
                                        Lokasi</label>
                                    <textarea name="deskripsi" rows="4"
                                        class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm text-sm py-2.5 @error('deskripsi') border-red-500 @enderror"
                                        placeholder="Ceritakan sedetail mungkin agar admin mudah mengecek..."></textarea>
                                    @error('deskripsi')
                                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Bukti
                                    (Opsional)</label>
                                <div
                                    class="relative group h-48 w-full border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 flex items-center justify-center overflow-hidden hover:bg-gray-100 transition duration-150">

                                    <div id="preview-container"
                                        class="hidden absolute inset-0 w-full h-full z-10 bg-white">
                                        <img id="foto-preview" src="" class="w-full h-full object-contain">
                                        <div
                                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                            <span
                                                class="bg-white px-3 py-1 rounded-full text-[10px] font-bold shadow-sm">GANTI
                                                FOTO</span>
                                        </div>
                                    </div>

                                    <div id="placeholder-icon" class="text-center">
                                        <svg class="mx-auto h-10 w-10 text-gray-400" stroke="currentColor"
                                            fill="none" viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mt-1 text-xs text-blue-600 font-bold uppercase tracking-wider">Klik
                                            Untuk Pilih Foto</p>
                                    </div>

                                    <input type="file" name="foto" id="foto-input" accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                                        onchange="tampilkanPreview(this)">
                                </div>
                                <p class="text-[10px] text-gray-400 mt-2 font-medium italic">*Maks. 2MB (JPG, PNG, JPEG)
                                </p>
                                @error('foto')
                                    <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="submit"
                                class="bg-gray-800 hover:bg-black text-white font-bold py-3 px-8 rounded-lg shadow-sm transition duration-150 text-xs uppercase tracking-widest">
                                Kirim Laporan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 mx-4 sm:mx-0">
                <div class="p-6 md:p-8">
                    <h3 class="font-bold text-lg text-gray-800 mb-6 border-b pb-4 italic">Riwayat Pengajuan Saya</h3>

                    @if ($laporan->isEmpty())
                        <div class="text-center py-10">
                            <p class="text-gray-400 text-sm italic">Belum ada laporan yang Anda kirimkan.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-lg border">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 border-b">
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                                            Waktu</th>
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">
                                            Aduan</th>
                                        <th
                                            class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest text-center">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach ($laporan as $item)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td
                                                class="p-4 text-xs font-bold text-gray-600 align-top whitespace-nowrap">
                                                {{ $item->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="p-4 align-top">
                                                <div
                                                    class="text-sm font-bold text-gray-800 mb-1 uppercase tracking-tight">
                                                    {{ $item->judul }}</div>
                                                <div class="text-xs text-gray-500 leading-relaxed italic line-clamp-2">
                                                    {{ $item->deskripsi }}</div>
                                            </td>
                                            <td class="p-4 text-center align-top">
                                                @if ($item->status == 'PENDING')
                                                    <span
                                                        class="px-2.5 py-1 bg-yellow-100 text-yellow-800 text-[10px] font-black rounded-md border border-yellow-200 uppercase tracking-wider">
                                                        Menunggu
                                                    </span>
                                                @elseif($item->status == 'PROSES')
                                                    <span
                                                        class="px-2.5 py-1 bg-blue-100 text-blue-800 text-[10px] font-black rounded-md border border-blue-200 uppercase tracking-wider">
                                                        Diproses
                                                    </span>
                                                @else
                                                    <span
                                                        class="px-2.5 py-1 bg-green-100 text-green-800 text-[10px] font-black rounded-md border border-green-200 uppercase tracking-wider">
                                                        Selesai
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </main>

    <footer class="py-12 text-center border-t border-gray-200 bg-white">
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">
            Teguh Prayoga - 2511013 &copy; 2026<br>
            Management Informatics - ITB Bina Sriwijaya
        </p>
    </footer>

    <script>
        function tampilkanPreview(input) {
            const container = document.getElementById('preview-container');
            const preview = document.getElementById('foto-preview');
            const icon = document.getElementById('placeholder-icon');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                    icon.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "";
                container.classList.add('hidden');
                icon.classList.remove('hidden');
            }
        }
    </script>

</body>

</html>
