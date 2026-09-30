<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Pengembang - Lapor Warga Plaju</title>

    <link rel="icon" href="{{ asset('images/logo-palembang.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900 flex flex-col min-h-screen">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo-palembang.png') }}" alt="Logo Palembang" class="w-8 h-8 object-contain">
                    <span class="font-black text-lg tracking-tighter uppercase">LAPOR<span class="text-blue-600">PLAJU</span></span>
                </a>
                <a href="{{ url('/') }}" class="text-xs font-black text-gray-500 hover:text-blue-600 uppercase tracking-widest transition">Kembali ke Beranda</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center py-20 px-4 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <svg class="w-full h-full text-blue-100" fill="currentColor" viewBox="0 0 100 100"><defs><pattern id="dots" patternUnits="userSpaceOnUse" width="20" height="20"><circle cx="2" cy="2" r="1.5"/></pattern></defs><rect width="100" height="100" fill="url(#dots)"/></svg>
        </div>

        <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col md:flex-row relative z-10 transition-all hover:shadow-2xl">

            <div class="md:w-2/5 bg-gradient-to-br from-blue-600 to-blue-800 pt-16 pb-12 p-8 flex flex-col items-center justify-start text-white text-center relative overflow-hidden">

                <div class="absolute -top-10 -left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>

                <div class="w-52 h-52 md:w-60 md:h-60 bg-white/10 rounded-full mb-6 border-4 border-white/20 flex items-center justify-center backdrop-blur-sm shadow-inner relative z-10 overflow-hidden">
                    <img src="{{ asset('images/tghp.png') }}" alt="Teguh Prayoga" class="w-full h-full object-cover translate-y-12 drop-shadow-[0_4px_6px_rgba(0,0,0,0.3)]">
                </div>

                <h2 class="text-2xl font-black uppercase tracking-tight relative z-10">Teguh Prayoga</h2>
                <p class="text-blue-100 text-[11px] font-black mt-1 uppercase tracking-widest relative z-10">Manajemen Informatika - ITB Bina Sriwijaya</p>

                <span class="mt-5 px-3 py-1 rounded-full bg-black/15 text-[10px] font-black uppercase tracking-widest text-blue-100 border border-white/10 relative z-10">
                    Fullstack Developer
                </span>
            </div>

            <div class="md:w-3/5 p-8 md:p-12 space-y-10">

                <div>
                    <h3 class="text-xs font-black text-blue-600 uppercase tracking-[0.2em] mb-3">Profil Pengembang</h3>
                    <p class="text-sm md:text-base text-gray-600 leading-relaxed font-medium">
                        Halo! Saya adalah Teguh Prayoga, mahasiswa aktif program studi Manajemen Informatika di <strong>ITB Bina Sriwijaya Palembang</strong>.
                        Aplikasi <strong>Lapor Warga Plaju</strong> ini saya kembangkan sebagai solusi digital praktis untuk menjembatani aspirasi masyarakat dengan aparat kelurahan setempat.
                    </p>
                </div>

                <div class="border-t border-gray-100 pt-10">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">

                        <div>
                            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Pendidikan & Organisasi</h4>
                            <ul class="text-sm text-gray-700 space-y-3 font-semibold">
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-500 font-bold">#</span>
                                    <span>Program Diploma Manajemen Informatika, ITB Bina Sriwijaya</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-blue-500 font-bold">#</span>
                                    <span>Ketua Umum HIMMI (Himpunan Mahasiswa Manajemen Informatika)</span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Keahlian Teknis</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-gray-100 px-2.5 py-1 rounded-full text-[10px] font-bold text-gray-700 uppercase border border-gray-200">Laravel</span>
                                <span class="bg-gray-100 px-2.5 py-1 rounded-full text-[10px] font-bold text-gray-700 uppercase border border-gray-200">Java</span>
                                <span class="bg-gray-100 px-2.5 py-1 rounded-full text-[10px] font-bold text-gray-700 uppercase border border-gray-200">PHP</span>
                                <span class="bg-gray-100 px-2.5 py-1 rounded-full text-[10px] font-bold text-gray-700 uppercase border border-gray-200">Flutter</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-10 text-center">
                    <p class="text-xs text-gray-400 font-semibold italic max-w-md mx-auto">
                        "Membangun sistem yang transparan dan akuntabel adalah langkah awal menuju kemajuan Kecamatan Plaju yang lebih baik."
                    </p>
                </div>

            </div>
        </div>
    </main>

    <footer class="py-12 border-t border-gray-200 text-center bg-white mt-auto">
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">
            Teguh Prayoga - 2511013 &copy; 2026<br>
            Management Informatics - ITB Bina Sriwijaya
        </p>
    </footer>

</body>
</html>
