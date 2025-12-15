@extends('layouts.pemilik')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        
        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
                🩺 Rekam Medis Saya
            </h2>
            <div class="flex items-center gap-2 text-sm font-medium text-gray-800 dark:text-white">
                <span>👋 Halo, {{ Auth::user()->nama }}</span>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-gray-800 dark:bg-gray-900 sm:px-7.5 xl:pb-1">
            <div class="mb-4 flex items-center justify-between">
                <h4 class="text-xl font-bold text-black dark:text-white">
                   Daftar Rekam Medis
                </h4>
            </div>

            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-blue-900 text-left dark:bg-meta-4">
                            <th class="px-4 py-4 font-medium text-white xl:pl-11">
                                No
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Nama Hewan
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Dokter
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Diagnosa
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Tanggal
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekamMedis as $key => $rm)
                            <tr class="border-b border-stroke dark:border-strokedark">
                                <td class="pl-4 py-5 xl:pl-11">
                                    <p class="text-black dark:text-white">{{ $loop->iteration }}</p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">{{ $rm->nama_hewan ?? '-' }}</p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">
                                        {{ $rm->nama_dokter ?? '-' }}
                                    </p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">{{ $rm->diagnosa ?? '-' }}</p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">
                                        {{ \Carbon\Carbon::parse($rm->created_at)->format('d M Y') }}
                                    </p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <button class="rounded-md bg-blue-600 px-4 py-1.5 text-sm font-medium text-white hover:bg-blue-700">
                                        🔍 Detail
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-5 text-center">
                                    <p class="text-gray-500">Belum ada rekam medis.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="mt-6">
            <a href="{{ route('Dashboard_Pemilik') }}" class="inline-flex items-center gap-2 rounded-md bg-slate-600 px-6 py-3 font-medium text-white transition hover:bg-slate-700">
                <span>⬅ Kembali ke Dashboard</span>
            </a>
        </div>
    </div>
@endsection
