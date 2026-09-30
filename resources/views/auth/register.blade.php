<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - Lapor Warga Plaju</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-br from-blue-100 via-white to-blue-50 min-h-screen">

    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
        <div class="max-w-md w-full">

            <div class="text-center mb-8">
                <img class="mx-auto h-24 w-auto mb-4 drop-shadow-lg" src="{{ asset('images/logo-palembang.png') }}"
                    alt="Logo Palembang">

                <h2 class="text-3xl font-extrabold text-blue-900 tracking-tight">
                    Lapor Warga <span class="text-blue-600">Plaju</span>
                </h2>
                <p class="mt-2 text-sm text-gray-600 font-medium">
                    Gotong royong bangun Palembang lebih baik.
                </p>
            </div>

            <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-3xl p-8 border border-white/50">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="name"
                            class="block text-xs font-bold text-blue-900 uppercase tracking-wider mb-1 ml-1">Nama
                            Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autofocus placeholder="Masukkan nama sesuai KTP"
                            class="block w-full bg-gray-50/50 border-gray-200 rounded-xl focus:ring-blue-500 focus:border-blue-500 py-3 px-4 transition-all">
                        @error('name')
                            <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email"
                            class="block text-xs font-bold text-blue-900 uppercase tracking-wider mb-1 ml-1">Alamat
                            Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            placeholder="email@warga.com"
                            class="block w-full bg-gray-50/50 border-gray-200 rounded-xl focus:ring-blue-500 focus:border-blue-500 py-3 px-4 transition-all">
                        @error('email')
                            <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">

                        <div>
                            <label for="password"
                                class="block text-xs font-bold text-blue-900 uppercase tracking-wider mb-1 ml-1">Password</label>
                            <div class="relative">
                                <input id="password" type="password" name="password" required
                                    placeholder="Min. 8 Karakter"
                                    class="block w-full bg-gray-50/50 border-gray-200 rounded-xl focus:ring-blue-500 focus:border-blue-500 py-3 pl-4 pr-16 transition-all">
                                <button type="button" onclick="togglePassword('password')"
                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-xs font-bold text-gray-400 hover:text-blue-600 focus:outline-none transition-colors">
                                    <span id="label-password">LIHAT</span>
                                </button>
                            </div>
                            @error('password')
                                <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block text-xs font-bold text-blue-900 uppercase tracking-wider mb-1 ml-1">Konfirmasi</label>
                            <div class="relative">
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    placeholder="Ulangi Password"
                                    class="block w-full bg-gray-50/50 border-gray-200 rounded-xl focus:ring-blue-500 focus:border-blue-500 py-3 pl-4 pr-16 transition-all">
                                <button type="button" onclick="togglePassword('password_confirmation')"
                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-xs font-bold text-gray-400 hover:text-blue-600 focus:outline-none transition-colors">
                                    <span id="label-password_confirmation">LIHAT</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-sm">
                            Daftar Sekarang
                        </button>

                        <p class="text-center text-sm text-gray-500">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">
                                Masuk ke Sistem
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <p class="text-center mt-8 text-xs text-gray-400 font-medium">
                &copy; 2026 Project Ujian Akhir Semester <br>
                Mata Kuliah Praktik Design Web <br>
                <b>Teguh Prayoga - 2511013</b>
            </p>
        </div>
    </div>
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const label = document.getElementById('label-' + inputId);

            // Kalau tipenya password, ubah jadi teks. Kalau teks, balikin ke password.
            if (input.type === 'password') {
                input.type = 'text';
                label.innerText = 'TUTUP';
                label.classList.replace('text-gray-400', 'text-blue-600');
            } else {
                input.type = 'password';
                label.innerText = 'LIHAT';
                label.classList.replace('text-blue-600', 'text-gray-400');
            }
        }
    </script>

</body>

</html>
