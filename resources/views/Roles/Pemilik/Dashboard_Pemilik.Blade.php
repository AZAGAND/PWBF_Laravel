@extends('layouts.pemilik')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
                Dashboard Pemilik
            </h2>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Selamat Datang kembali, {{ Auth::user()->nama }}! 👋
            </p>
        </div>

        {{-- Statistics Grid --}}
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:gap-7.5">
            {{-- Card 1: Hewan Peliharaan --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400">
                    <span class="text-xl">🐾</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            0
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Hewan Peliharaan</span>
                    </div>
                </div>
            </div>

            {{-- Card 2: Janji Temu --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-green-50 text-green-600 dark:bg-green-900/50 dark:text-green-400">
                    <span class="text-xl">📅</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            0
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Janji Temu Aktif</span>
                    </div>
                </div>
            </div>

            {{-- Card 3: Riwayat Medis --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-yellow-50 text-yellow-600 dark:bg-yellow-900/50 dark:text-yellow-400">
                    <span class="text-xl">📋</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            0
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Riwayat Medis</span>
                    </div>
                </div>
            </div>

            {{-- Card 4: Tagihan --}}
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-purple-50 text-purple-600 dark:bg-purple-900/50 dark:text-purple-400">
                    <span class="text-xl">💸</span>
                </div>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white">
                            Rp 0
                        </h4>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tagihan Belum Bayar</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Welcome Section --}}
        <div class="mt-8 rounded-3xl border border-gray-200 bg-white p-8 shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="flex flex-col gap-4">
                <h3 class="text-2xl font-bold text-black dark:text-white">
                    Halo, {{ Auth::user()->nama }}!
                </h3>
                <p class="font-medium text-gray-500 dark:text-gray-400">
                    Selamat datang di panel pemilik hewan. Anda dapat memantau kesehatan hewan peliharaan Anda dan mengatur jadwal kunjungan ke klinik.
                </p>
            </div>
        </div>
    </div>
@endsection