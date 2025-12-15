@extends('layouts.resepsionis')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex items-center gap-2">
        <span class="text-2xl">📝</span>
        <h2 class="text-2xl font-bold text-blue-900 dark:text-white">
            Registrasi Pemilik Baru
        </h2>
    </div>
    <p class="mb-6 text-sm font-medium text-gray-500 dark:text-gray-400">
        Daftarkan pemilik hewan peliharaan baru ke sistem
    </p>

    <div class="rounded-lg border border-gray-200 bg-white p-8 shadow-default dark:border-gray-800 dark:bg-gray-900">
        
        @if(session('success'))
            <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('resepsionis.pemilik.store') }}" method="POST">
            @csrf
            
            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent dark:text-white py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 disabled:cursor-default disabled:bg-whiter dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" placeholder="contoh@email.com" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent dark:text-white py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Password <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password" placeholder="Masukkan password" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent dark:text-white py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Nomor WhatsApp <span class="text-red-500">*</span>
                </label>
                <input type="text" name="no_wa" placeholder="08xxxxxxxxxx" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent dark:text-white py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Alamat <span class="text-red-500">*</span>
                </label>
                <textarea name="alamat" rows="4" placeholder="Masukkan alamat lengkap" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent dark:text-white py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required></textarea>
            </div>

            <div class="mt-6 mb-6 rounded-md bg-blue-50 p-4 text-xs dark:text-white">
                Info: Pastikan semua data diisi dengan benar. Data ini akan digunakan untuk keperluan komunikasi dan administrasi.
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="flex items-center justify-center rounded bg-green-500 py-3 px-6 font-medium dark:text-white hover:bg-green-600 transition gap-2 w-1/2">
                     ✓ Daftar Sekarang
                </button>
                <a href="{{ route('Dashboard_Resepsionis') }}" class="flex items-center justify-center rounded bg-slate-600 py-3 px-6 font-medium dark:text-white hover:bg-slate-700 transition w-1/2">
                    ⬅ Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
