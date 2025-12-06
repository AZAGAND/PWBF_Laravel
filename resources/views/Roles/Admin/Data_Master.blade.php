@extends('layouts.admin')

@section('content')
    {{-- ================= CUSTOM STYLE (Shimmer, Float, Glow) ================= --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

        .card-glow {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-glow:hover {
            transform: translateY(-12px) scale(1.02);
        }

        .icon-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(5deg);
            }
        }

        .feature-item {
            transition: .3s;
        }

        .feature-item:hover {
            transform: translateX(5px);
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .1), transparent);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }
    </style>

    {{-- ================= HEADER & BACK BUTTON ================= --}}
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Data Master
            </h2>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Pusat pengelolaan data sistem
            </p>
        </div>

        <a href="{{ route('dashboard_Admin') }}"
            class="inline-flex items-center gap-2.5 rounded-lg bg-gray-100 px-5 py-3 font-medium text-black transition hover:bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M18.4375 9.375H3.6875C3.25 9.375 2.90625 9.71875 2.90625 10.1562C2.90625 10.5938 3.25 10.9375 3.6875 10.9375H18.4375C18.875 10.9375 19.2188 10.5938 19.2188 10.1562C19.2188 9.71875 18.875 9.375 18.4375 9.375Z"
                    fill="" />
                <path
                    d="M9.53125 3.53125C9.25 3.25 8.78125 3.25 8.5 3.53125L2.3125 9.71875C2.03125 10 2.03125 10.4688 2.3125 10.75L8.5 16.9375C8.625 17.0625 8.8125 17.125 9 17.125C9.1875 17.125 9.375 17.0625 9.5 16.9375C9.78125 16.6562 9.78125 16.1875 9.5 15.9062L3.84375 10.25L9.53125 4.5625C9.8125 4.28125 9.8125 3.8125 9.53125 3.53125Z"
                    fill="" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    {{-- ================= GRID MENU CARDS ================= --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 w-full">

        {{-- Card 1: Data User --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-blue-400 dark:hover:border-blue-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-blue-500 via-blue-600 to-cyan-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">👤</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Data User</h2>
                    <p class="text-blue-100 text-sm font-medium">Kelola pengguna sistem dan informasi akun</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('data_user') }}"
                    class="block w-full bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500 hover:from-blue-700 hover:via-blue-600 hover:to-cyan-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Data User
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Manajemen pengguna</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Info akun lengkap</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Status aktivasi user</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 2: Manajemen Role --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-green-400 dark:hover:border-green-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-green-500 via-emerald-500 to-teal-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">⚙️</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Manajemen Role</h2>
                    <p class="text-green-100 text-sm font-medium">Kelola role dan hak akses sistem</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('data_role') }}"
                    class="block w-full bg-gradient-to-r from-green-600 via-emerald-500 to-teal-500 hover:from-green-700 hover:via-emerald-600 hover:to-teal-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Role
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-green-500 to-teal-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Pengaturan role</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-green-500 to-teal-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Hak akses user</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-green-500 to-teal-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Permission management</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 3: Ras Hewan --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-purple-400 dark:hover:border-purple-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-purple-500 via-violet-500 to-fuchsia-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">🐾</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Ras Hewan</h2>
                    <p class="text-purple-100 text-sm font-medium">Kelola data ras hewan peliharaan</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('ras_hewan') }}"
                    class="block w-full bg-gradient-to-r from-purple-600 via-violet-500 to-fuchsia-500 hover:from-purple-700 hover:via-violet-600 hover:to-fuchsia-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Ras Hewan
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-500 to-fuchsia-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Daftar ras lengkap</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-500 to-fuchsia-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Karakteristik ras</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-purple-500 to-fuchsia-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Database terintegrasi</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 4: Jenis Hewan --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-orange-400 dark:hover:border-orange-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-orange-500 via-amber-500 to-yellow-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">🐱</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Jenis Hewan</h2>
                    <p class="text-orange-100 text-sm font-medium">Kelola kategori jenis hewan</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('jenis_hewan') }}"
                    class="block w-full bg-gradient-to-r from-orange-600 via-amber-500 to-yellow-500 hover:from-orange-700 hover:via-amber-600 hover:to-yellow-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Jenis Hewan
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Kategori jenis hewan</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Klasifikasi lengkap</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Master data jenis</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 5: Data Pemilik --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-red-400 dark:hover:border-red-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-red-500 via-rose-500 to-pink-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">📋</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Data Pemilik</h2>
                    <p class="text-red-100 text-sm font-medium">Kelola informasi pemilik hewan</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('data_pemilik') }}"
                    class="block w-full bg-gradient-to-r from-red-600 via-rose-500 to-pink-500 hover:from-red-700 hover:via-rose-600 hover:to-pink-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Data Pemilik
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-red-500 to-pink-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Profil pemilik</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-red-500 to-pink-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Kontak & alamat</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-red-500 to-pink-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Riwayat kepemilikan</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 6: Data Dokter --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-teal-400 dark:hover:border-teal-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-teal-500 via-cyan-500 to-sky-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">👨‍⚕️</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Data Dokter</h2>
                    <p class="text-teal-100 text-sm font-medium">Kelola informasi dokter hewan</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('data_dokter') }}"
                    class="block w-full bg-gradient-to-r from-teal-600 via-cyan-500 to-sky-500 hover:from-teal-700 hover:via-cyan-600 hover:to-sky-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Data Dokter
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-teal-500 to-sky-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Profil dokter</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-teal-500 to-sky-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Spesialisasi & keahlian</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-teal-500 to-sky-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Jadwal praktik</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 7: Data Hewan --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-indigo-400 dark:hover:border-indigo-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-indigo-500 via-blue-500 to-purple-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">🐶</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Data Hewan</h2>
                    <p class="text-indigo-100 text-sm font-medium">Kelola database hewan peliharaan</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('data_hewan') }}"
                    class="block w-full bg-gradient-to-r from-indigo-600 via-blue-500 to-purple-500 hover:from-indigo-700 hover:via-blue-600 hover:to-purple-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Data Hewan
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Profil hewan lengkap</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Riwayat kesehatan</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Data pemilik terkait</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 8: Data Kategori --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-pink-400 dark:hover:border-pink-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-pink-500 via-fuchsia-500 to-purple-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">📂</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Data Kategori</h2>
                    <p class="text-pink-100 text-sm font-medium">Kelola kategori klasifikasi data</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('data_kategori') }}"
                    class="block w-full bg-gradient-to-r from-pink-600 via-fuchsia-500 to-purple-500 hover:from-pink-700 hover:via-fuchsia-600 hover:to-purple-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Kategori
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-pink-500 to-purple-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Kategori sistem</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-pink-500 to-purple-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Klasifikasi data</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-pink-500 to-purple-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Master kategori</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 9: Kategori Klinis --}}
        <div
            class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-cyan-400 dark:hover:border-cyan-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-cyan-500 via-blue-400 to-teal-500 p-8 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">🩺</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg">Kategori Klinis</h2>
                    <p class="text-cyan-100 text-sm font-medium">Kelola kategori pemeriksaan klinis</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('data_kategori_klinis') }}"
                    class="block w-full bg-gradient-to-r from-cyan-600 via-blue-400 to-teal-500 hover:from-cyan-700 hover:via-blue-500 hover:to-teal-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Kategori Klinis
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Kategori pemeriksaan</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Diagnosis klinis</span>
                    </div>
                    <div
                        class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span
                            class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-cyan-500 to-teal-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Master data klinis</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 10: Kode Tindakan Terapi --}}
        <div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-2 border-transparent hover:border-lime-400 dark:hover:border-lime-500 overflow-hidden">
            <div class="relative bg-gradient-to-br from-lime-500 via-green-500 to-emerald-500 p-8 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>
                <div class="relative z-10 text-center">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-white/90 dark:bg-gray-800/90 rounded-3xl shadow-2xl mb-4 backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                        <span class="text-6xl">💊</span>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 drop-shadow-lg leading-tight">Kode Tindakan / Terapi</h2>
                    <p class="text-lime-100 text-sm font-medium">Kelola kode medis dan terapi</p>
                </div>
            </div>

            <div class="p-6">
                <a href="{{ route('data_kode_tindakan_terapi') }}"
                    class="block w-full bg-gradient-to-r from-lime-600 via-green-500 to-emerald-500 hover:from-lime-700 hover:via-green-600 hover:to-emerald-600 text-white font-bold px-6 py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-2xl text-center text-lg group-hover:scale-105">
                    Kelola Kode Terapi
                </a>

                <div class="mt-6 pt-6 border-t-2 border-gray-200 dark:border-gray-700 space-y-3">
                    <div class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-lime-500 to-emerald-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Daftar kode tindakan</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-lime-500 to-emerald-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Jenis terapi medis</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-700 dark:text-gray-300 hover:translate-x-1 transition-transform">
                        <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-lime-500 to-emerald-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow-md">✓</span>
                        <span class="font-medium">Standarisasi layanan</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
