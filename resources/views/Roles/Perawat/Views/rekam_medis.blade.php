@extends('layouts.perawat')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-blue-900 dark:text-white flex items-center gap-2">
            📋 Manajemen Rekam Medis
        </h2>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Kelola rekam medis pasien dan detail tindakan terapi
        </p>
    </div>

    @if(session('success'))
    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg dark:bg-green-900/50 dark:text-green-300">
        {{ session('success') }}
    </div>
    @endif

    {{-- Form Section --}}
    <div class="rounded-lg border border-gray-200 bg-white px-5 pt-6 pb-8 shadow-default dark:border-gray-800 dark:bg-gray-900 mb-6">
        <h3 class="mb-4 text-xl font-bold text-black dark:text-white flex items-center gap-2">
            ➕ Tambah Rekam Medis Baru
        </h3>
        <form action="{{ route('perawat.rekam_medis.store') }}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-1 gap-6 xl:grid-cols-4">
                <div class="w-full xl:col-span-1">
                    <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Reservasi Dokter</label>
                    <select name="idreservasi_dokter" class="w-full rounded border border-gray-300 bg-transparent py-3 px-5 outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800" required>
                        <option value="">-- Pilih Reservasi --</option>
                        @foreach($reservasiList as $res)
                            <option value="{{ $res->idreservasi_dokter }}">
                                {{ $res->idreservasi_dokter }} - {{ $res->no_urut }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full xl:col-span-1">
                    <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Diagnosa</label>
                    <input type="text" name="diagnosa" placeholder="Diagnosa penyakit" class="w-full rounded border border-gray-300 bg-transparent py-3 px-5 outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800" required>
                </div>
                <div class="w-full xl:col-span-1">
                    <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Catatan</label>
                    <input type="text" name="catatan" placeholder="Catatan tambahan" class="w-full rounded border border-gray-300 bg-transparent py-3 px-5 outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800" required>
                </div>
                <div class="w-full xl:col-span-1">
                    <label class="mb-2.5 block text-sm font-medium text-black dark:text-white">Temuan Klinis</label>
                    <input type="text" name="temuan_klinis" placeholder="Masukkan temuan klinis pasien" class="w-full rounded border border-gray-300 bg-transparent py-3 px-5 outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800" required>
                </div>
            </div>
            <button type="submit" class="flex w-full justify-center rounded bg-green-500 p-3 font-medium text-white shadow-md hover:bg-green-600 transition max-w-xs">
                Tambah
            </button>
        </form>
    </div>

    {{-- Table Section --}}
    <div class="rounded-lg border border-gray-200 bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-gray-800 dark:bg-gray-900">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-900 text-left">
                        <th class="min-w-[50px] py-4 px-4 font-medium text-white">No</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Nomor Reservasi</th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-white">Pemilik</th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-white">Pet</th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-white">Diagnosa</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Anamnesa</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Temuan Klinis</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Dokter Pemeriksa</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Tanggal</th>
                        <th class="py-4 px-4 font-medium text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekamMedis as $index => $rm)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-5 px-4">
                            <h5 class="font-medium text-black dark:text-white">{{ $index + 1 }}</h5>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white font-medium">{{ $rm->idreservasi_dokter }} - {{ $rm->temuDokter->no_urut ?? '' }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $rm->temuDokter->pet->pemilik->user->nama ?? '-' }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $rm->temuDokter->pet->nama ?? '-' }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $rm->diagnosa }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $rm->anamnesa }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $rm->temuan_klinis }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $rm->dokterPemeriksa->user->nama ?? '-' }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $rm->created_at }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('perawat.rekam_medis.edit', $rm->idrekam_medis) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-sm flex items-center gap-1 hover:bg-yellow-500 transition">
                                    ✏️ Edit
                                </a>
                                <a href="{{ route('perawat.rekam_medis.show', $rm->idrekam_medis) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-sm flex items-center gap-1 hover:bg-blue-600 transition">
                                    🔍 Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-6">
        <a href="{{ route('Dashboard_Perawat') }}" class="inline-flex items-center justify-center rounded bg-slate-600 px-6 py-2.5 text-center font-medium text-white hover:bg-slate-700 transition">
             ⬅ Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
