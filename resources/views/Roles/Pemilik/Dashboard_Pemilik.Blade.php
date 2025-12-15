@extends('layouts.pemilik')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        
        {{-- Welcome Banner --}}
        <div class="mb-8 rounded-2xl bg-gradient-to-r from-blue-700 to-blue-600 p-8 text-white shadow-lg">
            <h2 class="mb-3 text-3xl font-bold">
                🐾 Selamat Datang, {{ Auth::user()->nama }}!
            </h2>
            <p class="text-lg text-blue-100">
                Lihat dan kelola informasi hewan peliharaanmu dengan mudah melalui dashboard ini.
            </p>
        </div>

        {{-- Main Feature Cards --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            {{-- Card 1: Hewan Saya --}}
            <div class="flex flex-col rounded-2xl border border-gray-200 bg-white p-6 shadow-default shadow-sm transition hover:shadow-md dark:border-gray-800 dark:bg-gray-900">
                <div class="mb-6 flex flex-col items-center text-center">
                    <div class="mb-4 text-5xl">🐶</div>
                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-white">Hewan Saya</h3>
                    <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">
                        Lihat dan kelola daftar hewan peliharaan yang kamu miliki dengan lengkap.
                    </p>
                    <a href="{{ route('pemilik.hewan') }}" class="inline-flex items-center justify-center rounded-lg bg-blue-800 px-6 py-2.5 text-center font-medium text-white hover:bg-blue-900 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        Lihat Hewan Saya
                    </a>
                </div>
                <div class="border-t border-gray-100 pt-4 dark:border-gray-700">
                    <ul class="space-y-2 text-xs text-gray-500 dark:text-gray-400">
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Data lengkap hewan
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Informasi kesehatan
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Riwayat perawatan
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Card 2: Reservasi Saya --}}
            <div class="flex flex-col rounded-2xl border border-gray-200 bg-white p-6 shadow-default shadow-sm transition hover:shadow-md dark:border-gray-800 dark:bg-gray-900">
                <div class="mb-6 flex flex-col items-center text-center">
                    <div class="mb-4 text-5xl">🗓️</div>
                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-white">Reservasi Saya</h3>
                    <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">
                        Lihat jadwal temu dokter dan kelola reservasi untuk hewan peliharaanmu.
                    </p>
                    <a href="{{ route('pemilik.reservasi') }}" class="inline-flex items-center justify-center rounded-lg bg-green-600 px-6 py-2.5 text-center font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                        Lihat Reservasi
                    </a>
                </div>
                <div class="border-t border-gray-100 pt-4 dark:border-gray-700">
                    <ul class="space-y-2 text-xs text-gray-500 dark:text-gray-400">
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Jadwal konsultasi
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Status reservasi
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Detail dokter & waktu
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Card 3: Rekam Medis Saya --}}
            <div class="flex flex-col rounded-2xl border border-gray-200 bg-white p-6 shadow-default shadow-sm transition hover:shadow-md dark:border-gray-800 dark:bg-gray-900">
                <div class="mb-6 flex flex-col items-center text-center">
                    <div class="mb-4 text-5xl">🩺</div>
                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-white">Rekam Medis Saya</h3>
                    <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">
                        Lihat hasil pemeriksaan dan riwayat tindakan medis dari dokter.
                    </p>
                    <a href="{{ route('pemilik.rekam_medis') }}" class="inline-flex items-center justify-center rounded-lg bg-purple-600 px-6 py-2.5 text-center font-medium text-white hover:bg-purple-700 focus:outline-none focus:ring-4 focus:ring-purple-300">
                        Lihat Rekam Medis
                    </a>
                </div>
                <div class="border-t border-gray-100 pt-4 dark:border-gray-700">
                    <ul class="space-y-2 text-xs text-gray-500 dark:text-gray-400">
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Hasil pemeriksaan
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Diagnosis & tindakan
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-500">✓</span> Riwayat lengkap
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Tips Section --}}
        <div class="mt-8 rounded-lg border-l-4 border-yellow-400 bg-blue-50 p-6 dark:bg-gray-800 dark:text-gray-300">
            <div class="flex items-start gap-3">
                <span class="text-2xl">💡</span>
                <div>
                    <h4 class="mb-1 font-bold text-blue-900 dark:text-white">Tips Penggunaan</h4>
                    <p class="text-sm text-blue-800/80 dark:text-gray-400">
                        Periksa jadwal reservasi secara berkala dan pastikan hewan peliharaan Anda siap untuk konsultasi. Rekam medis dapat diakses kapan saja untuk memantau kesehatan hewan kesayangan Anda.
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center text-xs text-gray-400">
            © 2025 RSHP Universitas Airlangga — Sistem Informasi Klinik Hewan. All rights reserved.
        </div>

    </div>
@endsection