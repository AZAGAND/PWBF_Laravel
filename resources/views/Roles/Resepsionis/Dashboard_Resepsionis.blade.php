@extends('layouts.resepsionis')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
                Dashboard Resepsionis
            </h2>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Selamat Datang kembali, {{ Auth::user()->nama }}! 👋
            </p>
        </div>

        {{-- Statistics Grid --}}
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:gap-7.5">
            {{-- Card 1: Total Pasien --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400">
                    <span class="text-xl">🐾</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            0
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pasien</span>
                    </div>
                </div>
            </div>

            {{-- Card 2: Janji Temu Hari Ini --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-green-50 text-green-600 dark:bg-green-900/50 dark:text-green-400">
                    <span class="text-xl">📅</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            0
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Janji Temu Hari Ini</span>
                    </div>
                </div>
            </div>

            {{-- Card 3: Menunggu Konfirmasi --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-yellow-50 text-yellow-600 dark:bg-yellow-900/50 dark:text-yellow-400">
                    <span class="text-xl">⏳</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            0
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Menunggu Konfirmasi</span>
                    </div>
                </div>
            </div>

             {{-- Card 4: Dokter Tersedia --}}
             <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-teal-50 text-teal-600 dark:bg-teal-900/50 dark:text-teal-400">
                    <span class="text-xl">👨‍⚕️</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            0
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Dokter Tersedia</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Welcome Section --}}
        <div class="mt-8 rounded-3xl border border-gray-200 bg-white p-8 shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="flex flex-col gap-4">
                <h3 class="text-2xl font-bold text-black dark:text-white">
                    Halo, Resepsionis!
                </h3>
                <p class="font-medium text-gray-500 dark:text-gray-400">
                    Anda dapat mengelola pendaftaran pasien, jadwal temu, dan antrian klinik melalui menu yang tersedia.
                </p>
                {{-- 
                <div class="mt-4">
                     <a href="#" class="inline-flex items-center justify-center rounded-lg bg-primary px-10 py-4 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                        Buat Pendaftaran Baru
                    </a>
                </div>
                --}}
            </div>
        </div>
    </div>
@endsection