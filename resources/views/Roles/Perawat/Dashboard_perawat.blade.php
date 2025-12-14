@extends('layouts.perawat')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        {{-- Welcome Banner --}}
        <div class="rounded-3xl border border-stroke bg-blue-700 px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark mb-6 text-white">
            <div class="flex flex-col gap-2">
                <h2 class="text-2xl font-bold">
                    👩‍⚕️ Selamat Datang, Perawat!
                </h2>
                <p class="text-white/90">
                    Kelola rekam medis dan data reservasi pasien dengan mudah melalui dashboard ini.
                </p>
            </div>
        </div>

        {{-- Action Cards --}}
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-8 mb-8">
            {{-- Rekam Medis Card --}}
            <div class="flex flex-col items-center justify-center rounded-3xl border border-gray-200 bg-white px-7.5 py-10 shadow-default dark:border-gray-800 dark:bg-gray-900 text-center gap-4">
                <div class="h-16 w-16 bg-orange-50 rounded-2xl flex items-center justify-center text-3xl text-orange-500">
                    📋
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white">Rekam Medis</h3>
                <p class="text-sm font-medium text-gray-500 max-w-xs">
                    Kelola rekam medis pasien dan detail tindakan terapi dengan sistem yang terintegrasi.
                </p>
                <a href="{{ route('perawat.rekam_medis') }}" class="inline-flex items-center justify-center rounded-lg bg-blue-900 px-6 py-2.5 text-center font-medium text-white hover:bg-blue-800 lg:px-8 xl:px-10 transition">
                    Akses Rekam Medis
                </a>
                
                <div class="mt-4 text-left w-full max-w-xs text-sm text-gray-500 space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="text-green-500">✓</span> Input data pemeriksaan
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-green-500">✓</span> Catat tindakan terapi
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-green-500">✓</span> Riwayat medis lengkap
                    </div>
                </div>
            </div>

            {{-- Reservasi Card --}}
            <div class="flex flex-col items-center justify-center rounded-3xl border border-gray-200 bg-white px-7.5 py-10 shadow-default dark:border-gray-800 dark:bg-gray-900 text-center gap-4">
                <div class="h-16 w-16 bg-blue-50 rounded-2xl flex items-center justify-center text-3xl text-blue-500">
                    🗓️
                </div>
                <h3 class="text-xl font-bold text-black dark:text-white">Data Reservasi</h3>
                <p class="text-sm font-medium text-gray-500 max-w-xs">
                    Lihat dan kelola data reservasi pasien untuk mempersiapkan proses rekam medis.
                </p>
                <a href="{{ route('perawat.reservasi') }}" class="inline-flex items-center justify-center rounded-lg bg-green-500 px-6 py-2.5 text-center font-medium text-white hover:bg-green-600 lg:px-8 xl:px-10 transition">
                    Lihat Reservasi
                </a>

                <div class="mt-4 text-left w-full max-w-xs text-sm text-gray-500 space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="text-green-500">✓</span> Daftar Jadwal pasien
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-green-500">✓</span> Detail informasi reservasi
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-green-500">✓</span> Status ketersediaan dokter
                    </div>
                </div>
            </div>
        </div>

        {{-- Tips Section --}}
        <div class="rounded-3xl border-l-4 border-blue-500 bg-blue-50 px-7.5 py-6 shadow-default dark:bg-gray-800">
            <div class="flex items-start gap-4">
                <span class="text-2xl">💡</span>
                <div>
                    <h4 class="mb-1 text-lg font-bold text-blue-900 dark:text-blue-100">Tips Penggunaan</h4>
                    <p class="text-sm text-blue-700 dark:text-blue-200">
                        Pastikan semua data rekam medis diisi dengan lengkap dan akurat. Periksa jadwal reservasi secara berkala untuk memastikan tidak ada pasien yang terlewat.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection