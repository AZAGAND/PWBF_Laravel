@extends('layouts.pemilik')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        
        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
                📄 Detail Rekam Medis
            </h2>
            <div class="flex items-center gap-2 text-sm font-medium text-gray-800 dark:text-white">
                <span>{{ $rekamMedis->nama_hewan }} ({{ $rekamMedis->nama_jenis_hewan }})</span>
            </div>
        </div>

        {{-- Info Card --}}
        <div class="mb-6 rounded-sm border border-stroke bg-white shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="border-b border-stroke px-4 py-4 dark:border-gray-800 sm:px-6 xl:px-7.5">
                <h3 class="font-medium text-black dark:text-white">
                    Informasi Pemeriksaan
                </h3>
            </div>
            <div class="p-4 sm:p-6 xl:p-7.5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-500">Tanggal Pemeriksaan</label>
                        <p class="font-semibold text-black dark:text-white">
                            {{ \Carbon\Carbon::parse($rekamMedis->tanggal_periksa)->format('d F Y') }}
                        </p>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-500">Dokter Pemeriksa</label>
                        <p class="font-semibold text-black dark:text-white">
                            {{ $rekamMedis->nama_dokter }}
                        </p>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-500">Keluhan</label>
                        <p class="text-black dark:text-white">
                            {{ $rekamMedis->keluhan ?? '-' }}
                        </p>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-500">Diagnosa</label>
                        <p class="font-semibold text-black dark:text-white">
                            {{ $rekamMedis->diagnosa ?? '-' }}
                        </p>
                    </div>
                     <div>
                        <label class="mb-2 block text-sm font-medium text-gray-500">Suhu Tubuh</label>
                        <p class="text-black dark:text-white">
                            {{ $rekamMedis->suhu_tubuh ? $rekamMedis->suhu_tubuh . ' °C' : '-' }}
                        </p>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-500">Berat Badan</label>
                        <p class="text-black dark:text-white">
                            {{ $rekamMedis->berat_badan ? $rekamMedis->berat_badan . ' kg' : '-' }}
                        </p>
                    </div>
                     <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-500">Keterangan / Catatan Dokter</label>
                         <p class="text-black dark:text-white">
                            {{ $rekamMedis->keterangan ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tindakan / Detail Table --}}
        <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-gray-800 dark:bg-gray-900 sm:px-7.5 xl:pb-1">
            <div class="mb-4">
                <h4 class="text-xl font-bold text-black dark:text-white">
                   Daftar Tindakan & Terapi
                </h4>
            </div>

            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                            <th class="px-4 py-4 font-medium text-black dark:text-white xl:pl-11">
                                No
                            </th>
                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                Tindakan / Terapi
                            </th>
                            <th class="px-4 py-4 font-medium text-black dark:text-white">
                                Detail
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $detail)
                            <tr class="border-b border-stroke dark:border-strokedark">
                                <td class="pl-4 py-5 xl:pl-11">
                                    <p class="text-black dark:text-white">{{ $loop->iteration }}</p>
                                </td>
                                <td class="px-4 py-5">
                                    <p class="text-black dark:text-white font-medium">
                                        {{ $detail->nama_tindakan ?? 'Tindakan #' . $detail->idkode_tindakan_terapi }}
                                    </p>
                                </td>
                                <td class="px-4 py-5">
                                    <p class="text-black dark:text-white">
                                        {{ $detail->detail ?? '-' }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-5 text-center">
                                    <p class="text-gray-500">Tidak ada data tindakan lanjutan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="mt-6">
            <a href="{{ route('pemilik.rekam_medis') }}" class="inline-flex items-center gap-2 rounded-md bg-slate-600 px-6 py-3 font-medium text-white transition hover:bg-slate-700">
                <span>⬅ Kembali</span>
            </a>
        </div>
    </div>
@endsection
