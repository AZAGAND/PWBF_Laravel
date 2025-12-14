@extends('layouts.resepsionis')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        
        {{-- Welcome Banner --}}
        <div class="rounded-2xl bg-blue-700 px-7.5 py-6 shadow-default mb-8 text-white">
            <div class="flex flex-col gap-2">
                <h2 class="text-3xl font-bold flex items-center gap-3">
                    👋 Selamat Datang, Resepsionis!
                </h2>
                <p class="text-blue-100 text-lg">
                    Kelola registrasi pemilik, pet, dan jadwal temu dokter dengan mudah.
                </p>
            </div>
        </div>

        {{-- Cards Container --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3 mb-8">
            
            {{-- Registrasi Card --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-default dark:border-gray-800 dark:bg-gray-900 overflow-hidden flex flex-col h-full">
                <div class="bg-green-500 px-6 py-3">
                    <h3 class="text-white text-xl font-bold flex items-center gap-2">
                        ✏️ Registrasi
                    </h3>
                </div>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <p class="text-gray-500 mb-6 text-sm">
                        Daftarkan pemilik dan hewan peliharaan baru ke sistem
                    </p>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('resepsionis.pemilik.create') }}" class="w-full inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-center font-medium text-white hover:bg-blue-700 transition">
                            + Registrasi Pemilik
                        </a>
                        <a href="{{ route('resepsionis.hewan.create') }}" class="w-full inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-center font-medium text-white hover:bg-blue-700 transition">
                            + Registrasi Pet
                        </a>
                    </div>
                    <div class="mt-4 rounded-md bg-green-50 p-3 flex items-start gap-2 text-xs text-green-700">
                        <span>ℹ️</span>
                        <p>Mulai dengan registrasi pemilik, kemudian tambahkan data pet mereka.</p>
                    </div>
                </div>
            </div>

            {{-- Temu Dokter Card --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-default dark:border-gray-800 dark:bg-gray-900 overflow-hidden flex flex-col h-full">
                <div class="bg-[#0ea5e9] px-6 py-3"> {{-- Teal/Cyan Color --}}
                    <h3 class="text-white text-xl font-bold flex items-center gap-2">
                        🩺 Temu Dokter
                    </h3>
                </div>
                <div class="p-6 flex flex-col flex-1 justify-between">
                    <p class="text-gray-500 mb-6 text-sm">
                        Kelola jadwal dan pendaftaran temu dengan dokter
                    </p>
                    <div>
                        <a href="{{ route('resepsionis.temu_dokter') }}" class="w-full inline-flex items-center justify-center rounded-lg bg-[#0ea5e9] px-6 py-3 text-center font-medium text-white hover:bg-sky-600 transition">
                            🗓️ Daftar Temu Dokter
                        </a>
                    </div>
                    <div class="mt-6 rounded-md bg-sky-50 p-3 flex items-start gap-2 text-xs text-sky-700">
                        <span>ℹ️</span>
                        <p>Buat jadwal temu pasien dengan dokter yang tersedia</p>
                    </div>
                </div>
            </div>

            {{-- Panduan Card --}}
            <div class="rounded-xl border border-gray-200 bg-white shadow-default dark:border-gray-800 dark:bg-gray-900 overflow-hidden flex flex-col h-full">
                <div class="bg-amber-500 px-6 py-3">
                    <h3 class="text-white text-xl font-bold flex items-center gap-2">
                        💡 Panduan
                    </h3>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="mb-4">
                        <h4 class="font-bold text-sm text-black dark:text-white mb-2">Alur Kerja:</h4>
                        <ol class="list-decimal list-inside text-xs text-gray-500 space-y-1 ml-1">
                            <li class="pl-2 relative">Registrasi pemilik baru beserta informasi lengkapnya</li>
                            <li class="pl-2 relative">Daftarkan hewan peliharaan milik pemilik tersebut</li>
                            <li class="pl-2 relative">Buat jadwal temu dokter sesuai kebutuhan pasien</li>
                        </ol>
                    </div>
                    
                    <div class="mt-auto bg-amber-50 rounded-lg p-4">
                        <h4 class="font-bold text-xs text-amber-800 mb-2">Quick Stats</h4>
                        <div class="space-y-1 text-xs text-amber-700">
                            <div class="flex justify-between">
                                <span>Pemilik Terdaftar:</span>
                                <span class="font-bold">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Pet Terdaftar:</span>
                                <span class="font-bold">-</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Jadwal Hari Ini:</span>
                                <span class="font-bold">-</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tips Penting --}}
        <div class="rounded-xl bg-blue-50 p-6 shadow-sm border-l-4 border-blue-600">
            <div class="flex items-start gap-3">
                <span class="text-2xl text-red-500">📌</span>
                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Tips Penting</h3>
                    <p class="text-sm text-gray-600">
                        Pastikan data pemilik dan pet sudah terdaftar sebelum membuat jadwal temu dokter. Verifikasi kembali informasi yang diinput untuk menghindari kesalahan data.
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection