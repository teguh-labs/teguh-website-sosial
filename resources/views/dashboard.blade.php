<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Laporan Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Notifikasi Sukses -->
            @if (session('pesan'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('pesan') }}
                </div>
            @endif

            <!-- Kotak Form Laporan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4">Buat Laporan Baru</h3>

                    <!-- Form POST mengarah ke route 'lapor.store' -->
                    <form action="{{ route('lapor.store') }}" method="POST">
                        @csrf <!-- Wajib ada untuk keamanan dari serangan CSRF -->

                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Judul Laporan</label>
                            <input type="text" name="judul" class="w-full border-gray-300 rounded-md shadow-sm"
                                placeholder="Contoh: Jalan berlubang di simpang...">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Deskripsi Lengkap</label>
                            <textarea name="deskripsi" rows="3" class="w-full border-gray-300 rounded-md shadow-sm"
                                placeholder="Jelaskan detail masalahnya di sini..."></textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-bold text-sm text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                                Kirim Laporan Sekarang
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Kotak Riwayat Laporan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4">Riwayat Laporan Saya</h3>

                    <!-- Cek apakah datanya kosong -->
                    @if ($laporan->isEmpty())
                        <p class="text-gray-500 italic">Belum ada laporan yang dibuat.</p>
                    @else
                        <!-- Kalau ada datanya, bikin tabel -->
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b bg-gray-50">
                                    <th class="p-3 text-sm">Tanggal</th>
                                    <th class="p-3 text-sm">Judul Laporan</th>
                                    <th class="p-3 text-sm">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Lakukan perulangan (looping) untuk setiap data laporan -->
                                @foreach ($laporan as $item)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-3 text-sm">{{ $item->created_at->format('d M Y') }}</td>
                                        <td class="p-3 text-sm">{{ $item->judul }}</td>
                                        <td class="p-3 text-sm">
                                            <span
                                                class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full uppercase">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
