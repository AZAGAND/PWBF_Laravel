@extends('layouts.dokter')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        
        {{-- Breadcrumb / Header --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Daftar Rekam Medis
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" href="{{ route('Dashboard_Dokter') }}">
                            Dashboard /
                        </a>
                    </li>
                    <li class="font-medium text-gray-500 dark:text-gray-400">
                        Rekam Medis
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Info Banner --}}
        <div class="rounded-lg border border-blue-200 bg-blue-50 px-6 py-4 mb-6 dark:border-blue-900 dark:bg-blue-900/20">
            <div class="flex items-start gap-3">
                <span class="text-xl">📄</span>
                <div>
                    <h4 class="text-lg font-bold text-blue-800 dark:text-white">Daftar Rekam Medis</h4>
                    <p class="text-sm text-blue-700 dark:text-white">
                        Lihat dan kelola rekam medis pasien hewan peliharaan yang telah diperiksa.
                    </p>
                </div>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="rounded-sm border border-gray-200 bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-gray-800 dark:bg-gray-900 sm:px-7.5 xl:pb-1">

            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-blue-900 text-left dark:bg-meta-4">
                            <th class="min-w-[50px] py-4 px-4 font-medium text-white xl:pl-11">
                                No
                            </th>
                            <th class="min-w-[150px] py-4 px-4 font-medium text-white">
                                Nomor Reservasi
                            </th>
                            <th class="min-w-[120px] py-4 px-4 font-medium text-white">
                                Pemilik
                            </th>
                            <th class="min-w-[100px] py-4 px-4 font-medium text-white">
                                Pet
                            </th>
                            <th class="min-w-[120px] py-4 px-4 font-medium text-white">
                                Diagnosa
                            </th>
                            <th class="min-w-[150px] py-4 px-4 font-medium text-white">
                                Anamnesa
                            </th>
                            <th class="min-w-[150px] py-4 px-4 font-medium text-white">
                                Temuan Klinis
                            </th>
                            <th class="min-w-[150px] py-4 px-4 font-medium text-white">
                                Dokter Pemeriksa
                            </th>
                            <th class="min-w-[150px] py-4 px-4 font-medium text-white">
                                Tanggal
                            </th>
                            <th class="py-4 px-4 font-medium text-white text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekamMedis as $i => $data)
                            <tr class="transition-colors border-b border-[#eee] dark:border-strokedark hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="py-5 px-4 pl-9 xl:pl-11">
                                    <h5 class="font-medium text-black dark:text-white">{{ $i + 1 }}</h5>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-black dark:text-white">
                                        {{ $data->temuDokter->no_urut ?? '-' }}
                                    </p>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-black dark:text-white font-medium">
                                        {{ $data->temuDokter->pet->pemilik->user->nama ?? '-' }}
                                    </p>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-black dark:text-white">
                                        {{ $data->temuDokter->pet->nama ?? '-' }}
                                    </p>
                                </td>
                                <td class="py-5 px-4">
                                    <span class="inline-block rounded bg-red-50 px-2.5 py-0.5 text-sm font-medium text-gray-300">
                                        {{ $data->diagnosa }}
                                    </span>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                                        {{ Str::limit($data->anamnesa, 30) }}
                                    </p>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                                        {{ Str::limit($data->temuan_klinis, 30) }}
                                    </p>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-black dark:text-white text-sm">
                                        {{ $data->dokterPemeriksa->user->nama ?? '-' }}
                                    </p>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-black dark:text-white text-sm">
                                        {{ $data->created_at ? \Carbon\Carbon::parse($data->created_at)->format('Y-m-d H:i:s') : '-' }}
                                    </p>
                                </td>
                                <td class="py-5 px-4 text-center">
                                    <a href="{{ route('dokter.rekam_medis.show', $data->idrekam_medis) }}" class="inline-flex items-center gap-1.5 rounded-md bg-blue-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-blue-700 transition shadow-sm">
                                        <svg class="fill-current" width="14" height="14" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                           <path d="M10 4.4C6.55 4.4 3.59 6.28 2.08 9.25C3.59 12.22 6.55 14.1 10 14.1C13.45 14.1 16.41 12.22 17.92 9.25C16.41 6.28 13.45 4.4 10 4.4ZM10 12.5C8.07 12.5 6.5 10.93 6.5 9C6.5 7.07 8.07 5.5 10 5.5C11.93 5.5 13.5 7.07 13.5 9C13.5 10.93 11.93 12.5 10 12.5ZM10 6.9C8.84 6.9 7.9 7.84 7.9 9C7.9 10.16 8.84 11.1 10 11.1C11.16 11.1 12.1 10.16 12.1 9C12.1 7.84 11.16 6.9 10 6.9Z" />
                                        </svg>
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="py-5 px-4 text-center dark:border-strokedark">
                                    <p class="text-gray-500 dark:text-gray-400">Belum ada data rekam medis.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

             <div class="mt-6">
                {{-- Pagination if needed, add later --}}
            </div>

        </div>
        
        {{-- Footer Info --}}
        <div class="mt-4 rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
             <div class="flex items-start gap-3">
                 <span class="text-xl text-yellow-500">💡</span>
                 <div>
                     <h5 class="font-bold text-gray-800 dark:text-white">Informasi</h5>
                     <p class="text-sm text-gray-500">
                         Klik tombol <strong>Detail</strong> untuk melihat informasi lengkap rekam medis pasien, termasuk tindakan terapi yang telah dilakukan.
                     </p>
                 </div>
             </div>
        </div>

    </div>
@endsection
