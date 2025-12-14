@extends('layouts.resepsionis')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex items-center gap-2">
        <span class="text-2xl">🐾</span>
        <h2 class="text-2xl font-bold text-blue-900 dark:text-white">
            Registrasi Hewan Peliharaan
        </h2>
    </div>
    <p class="mb-6 text-sm font-medium text-gray-500 dark:text-gray-400">
        Daftarkan hewan peliharaan baru untuk pemilik yang sudah terdaftar
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

        <form action="{{ route('resepsionis.hewan.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                 <h3 class="mb-4 font-bold text-black dark:text-white flex items-center gap-2">
                    👤 Informasi Pemilik
                </h3>
                <div class="mb-5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Pilih Pemilik <span class="text-red-500">*</span>
                    </label>
                    <select name="idpemilik" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
                        <option value="">-- Pilih Pemilik --</option>
                        @foreach($pemiliks as $pemilik)
                            <option value="{{ $pemilik->idpemilik }}">{{ $pemilik->user->nama ?? '-' }} ({{ $pemilik->alamat }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr class="my-6 border-gray-200 dark:border-gray-700">

            <div class="mb-6">
                <h3 class="mb-4 font-bold text-black dark:text-white flex items-center gap-2">
                    🐶 Informasi Pet
                </h3>

                <div class="mb-5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Pet <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" placeholder="Contoh: Max, Luna, Bella" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    {{-- Jenis Hewan / Ras Helper --}}
                    {{-- Simplified approach: Users select Ras, we can assume Jenis from Ras relation visually --}}
                    {{-- Or use Javascript filter. For now, matching the Admin Create Pet style roughly --}}
                    
                    <div>
                         <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Jenis Hewan
                        </label>
                        <select id="jenis_helper" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500">
                             <option value="">-- Pilih Jenis Hewan (opsional) --</option>
                             {{-- Could populate distinct values from $races if needed, but keeping simple --}}
                             <option value="Kucing">Kucing</option>
                             <option value="Anjing">Anjing</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Untuk filter, tidak wajib diisi</p>
                    </div>

                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Ras Hewan <span class="text-red-500">*</span>
                        </label>
                        <select name="idras_hewan" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
                            <option value="">-- Pilih Ras Hewan --</option>
                            @foreach($races as $ras)
                                <option value="{{ $ras->idras_hewan }}">{{ $ras->nama_ras_hewan }} ({{ $ras->jenisHewan->jenis_hewan ?? '-' }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                     <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Tanggal Lahir
                        </label>
                        <input type="date" name="tanggal_lahir" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Jenis Kelamin
                        </label>
                         <select name="jenis_kelamin" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500">
                            <option value="">-- Pilih --</option>
                            <option value="Jantan">Jantan</option>
                            <option value="Betina">Betina</option>
                        </select>
                    </div>
                </div>

                <div class="mb-5">
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Warna / Tanda Khusus
                    </label>
                    <input type="text" name="warna_tanda" placeholder="Contoh: Putih dengan bercak coklat, hitam belang" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500">
                </div>
            </div>

            <div class="mt-6 mb-6 rounded-md bg-green-50 p-4 text-xs text-green-800">
                Info: Pastikan pemilik sudah terdaftar sebelum mendaftarkan pet. Data ras hewan wajib diisi karena berkaitan dengan jenis hewan.
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="flex items-center justify-center rounded bg-green-500 py-3 px-6 font-medium text-white hover:bg-green-600 transition gap-2 w-1/2">
                     ✓ Daftar Pet
                </button>
                <a href="{{ route('Dashboard_Resepsionis') }}" class="flex items-center justify-center rounded bg-slate-600 py-3 px-6 font-medium text-white hover:bg-slate-700 transition w-1/2">
                    ⬅ Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
