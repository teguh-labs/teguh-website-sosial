<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin - Lapor Warga Plaju</title>
    <link rel="icon" href="{{ asset('images/logo-palembang.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 min-h-screen">

    <nav class="bg-white border-b-2 border-red-500 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/logo-palembang.png') }}" alt="Logo Palembang" class="w-8 h-8 object-contain drop-shadow-sm">
                        <span class="font-black text-lg text-gray-800 tracking-tight">PANEL<span class="text-red-600">ADMIN</span></span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="hidden sm:inline-block text-xs font-bold text-gray-500 uppercase tracking-widest">Admin: {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-bold text-gray-400 hover:text-red-600 transition-colors uppercase">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 text-center md:text-left">
            <h2 class="font-black text-2xl text-gray-800 leading-tight uppercase tracking-tight">Kelola Laporan & Informasi</h2>
            <p class="text-sm text-gray-500 mt-1">Pusat kendali aplikasi Lapor Warga Plaju.</p>
        </div>
    </header>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <style>
                /* 1. Kotak muncul dari atas (halus) */
                @keyframes muncul-turun {
                    0% { opacity: 0; transform: translateY(-15px); }
                    100% { opacity: 1; transform: translateY(0); }
                }

                /* 2. Garis timer menyusut tepat 5 detik */
                @keyframes timer-menyusut {
                    0% { width: 100%; }
                    100% { width: 0%; }
                }

                /* 3. Ikon lonceng joget pelan selama 5 detik penuh */
                @keyframes ikon-joget {
                    0%, 100% { transform: scale(1) rotate(0deg); }
                    10%, 30%, 50%, 70%, 90% { transform: scale(1.1) rotate(-12deg); }
                    20%, 40%, 60%, 80% { transform: scale(1.1) rotate(12deg); }
                }

                .notif-wadah {
                    animation: muncul-turun 0.4s ease-out forwards;
                    position: relative;
                    overflow: hidden; /* Wajib biar garisnya nggak tembus keluar kotak */
                }

                .notif-garis {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    height: 4px;
                    background-color: #2563eb; /* Biru terang khas Tailwind (blue-600) */
                    animation: timer-menyusut 5s linear forwards;
                }

                .notif-ikon {
                    animation: ikon-joget 5s ease-in-out forwards;
                    transform-origin: top center;
                }
            </style>

            @if(session('pesan'))
                <div class="bg-blue-50 border border-blue-200 text-blue-800 p-4 rounded-lg mx-4 sm:mx-0 notif-wadah shadow-md mb-6">
                    <div class="flex items-center gap-3 relative z-10">
                        <svg class="w-6 h-6 text-blue-600 notif-ikon drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="text-sm font-black tracking-wide">{{ session('pesan') }}</span>
                    </div>

                    <div class="notif-garis"></div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mx-4 sm:mx-0">

                <div class="bg-white shadow-xl sm:rounded-xl border border-red-200 overflow-hidden h-fit">
                    <div class="bg-red-50 p-4 border-b border-red-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        <h3 class="font-black text-red-800 uppercase tracking-tight text-sm">Sebar Informasi Baru</h3>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('admin.pengumuman.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Judul Informasi</label>
                                <input type="text" name="judul" required placeholder="Contoh: Info Pemadaman Listrik" class="w-full text-sm font-bold border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 bg-gray-50 p-3">
                            </div>
                            <div class="mb-4">
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Isi Pesan / Syarat</label>
                                <textarea name="isi_informasi" required rows="3" placeholder="Tulis detail informasi di sini..." class="w-full text-sm border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 bg-gray-50 p-3"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-lg text-xs uppercase tracking-widest shadow-sm transition">
                                Sebarkan ke Warga
                            </button>
                        </form>
                    </div>
                </div>

                <div class="bg-white shadow-xl sm:rounded-xl border border-gray-200 overflow-hidden flex flex-col h-full max-h-[450px]">
                    <div class="bg-gray-50 p-4 border-b border-gray-200 flex items-center justify-between">
                        <h3 class="font-black text-gray-700 uppercase tracking-tight text-sm">Pengumuman Aktif</h3>
                        <span class="bg-gray-200 text-gray-600 text-[10px] px-2 py-1 rounded-full font-bold">{{ $pengumuman->count() }} Info</span>
                    </div>
                    <div class="p-4 overflow-y-auto flex-1 bg-gray-50/50">
                        @if($pengumuman->isEmpty())
                            <div class="text-center py-10">
                                <p class="text-gray-400 text-xs font-medium italic">Belum ada informasi yang disebar.</p>
                            </div>
                        @else
                            <div class="space-y-3">
                                @foreach($pengumuman as $info)
                                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm flex justify-between items-start gap-4 hover:border-red-300 transition">
                                        <div>
                                            <h4 class="font-bold text-gray-800 text-sm leading-tight mb-1">{{ $info->judul }}</h4>
                                            <p class="text-[10px] text-gray-400 font-medium mb-2">{{ $info->created_at->format('d M Y - H:i') }} WIB</p>
                                            <p class="text-xs text-gray-500 line-clamp-2">{{ $info->isi_informasi }}</p>
                                        </div>

                                        <form action="{{ route('admin.pengumuman.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus informasi ini secara permanen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white hover:bg-red-500 p-2 rounded transition" title="Hapus Pengumuman">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200 mx-4 sm:mx-0 mt-8">
                <div class="p-6 md:p-8 text-gray-900">
                    <div class="flex justify-between items-center mb-8 border-b pb-4">
                        <h3 class="font-black text-lg text-gray-800 uppercase tracking-tight italic">Tindak Lanjut Laporan Warga</h3>
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-[10px] font-bold text-gray-500 uppercase">
                            Total: {{ $laporan->count() }} Laporan
                        </span>
                    </div>

                    @if($laporan->isEmpty())
                        <div class="text-center py-20 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                            <p class="text-gray-400 text-sm font-medium italic">Belum ada warga yang melapor hari ini.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-lg border border-gray-100">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 border-b">
                                        <th class="p-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Pelapor</th>
                                        <th class="p-4 text-[10px] font-black text-gray-400 uppercase tracking-widest">Aduan & Bukti</th>
                                        <th class="p-4 text-[10px] font-black text-gray-400 uppercase tracking-widest text-center">Tindakan Admin</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($laporan as $item)
                                        <tr class="hover:bg-gray-50/50 transition duration-150">
                                            <td class="p-4 align-top w-48">
                                                <div class="text-sm font-bold text-gray-900 uppercase">{{ $item->user->name }}</div>
                                                <div class="text-[10px] text-gray-400 font-medium mb-2">{{ $item->user->email }}</div>
                                                <div class="text-[10px] bg-gray-200 px-2 py-1 inline-block rounded font-black text-gray-600">
                                                    {{ $item->created_at->format('d/m/Y H:i') }}
                                                </div>
                                            </td>

                                            <td class="p-4 align-top">
                                                <div class="text-sm font-black text-gray-800 mb-1 tracking-tight">{{ $item->judul }}</div>
                                                <p class="text-xs text-gray-500 leading-relaxed mb-4 italic">"{{ $item->deskripsi }}"</p>

                                                @if($item->foto)
                                                    <div class="mt-2">
                                                        <a href="{{ asset('storage/' . $item->foto) }}" target="_blank" class="inline-flex items-center gap-1.5 text-[10px] font-bold text-blue-600 hover:underline bg-blue-50 px-2 py-1 rounded">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                            LIHAT FOTO BUKTI
                                                        </a>
                                                    </div>
                                                @else
                                                    <span class="text-[10px] text-gray-300 italic font-medium">Tidak ada lampiran foto</span>
                                                @endif
                                            </td>

                                            <td class="p-4 align-top w-64">
                                                <form action="{{ route('admin.update', $item->id) }}" method="POST" class="space-y-2">
                                                    @csrf
                                                    @method('PATCH')

                                                    <select name="status" class="w-full text-xs font-bold border-gray-200 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500">
                                                        <option value="PENDING" {{ $item->status == 'PENDING' ? 'selected' : '' }}>🟡 MENUNGGU</option>
                                                        <option value="PROSES" {{ $item->status == 'PROSES' ? 'selected' : '' }}>🔵 DIPROSES</option>
                                                        <option value="SELESAI" {{ $item->status == 'SELESAI' ? 'selected' : '' }}>🟢 SELESAI</option>
                                                    </select>

                                                    <button type="submit" class="w-full bg-gray-800 hover:bg-black text-white text-[10px] font-black py-2 rounded-lg transition shadow-sm uppercase tracking-widest">
                                                        Update Status
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <footer class="py-12 text-center">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">
                    TEGUH PRAYOGA - 2511013 &copy; 2026
                </p>
            </footer>

        </div>
    </main>

</body>
</html>
