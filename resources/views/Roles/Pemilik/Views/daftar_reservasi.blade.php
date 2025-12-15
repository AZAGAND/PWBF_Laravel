@extends('layouts.pemilik')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        
        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
                📅 Daftar Reservasi Saya
            </h2>
            <div class="flex items-center gap-2 text-sm font-medium text-gray-800 dark:text-white">
                <span>👋 Halo, {{ Auth::user()->nama }}</span>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-gray-800 dark:bg-gray-900 sm:px-7.5 xl:pb-1">
            <div class="mb-4 flex items-center justify-between">
                <h4 class="text-xl font-bold text-black dark:text-white">
                   Jadwal Temu Dokter
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
                                Jenis Hewan
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Dokter
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Nomor Reservasi
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Tanggal Temu
                            </th>
                            <th class="px-4 py-4 font-medium text-white text-center">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservasi as $key => $res)
                            <tr class="border-b border-stroke dark:border-strokedark">
                                <td class="pl-4 py-5 xl:pl-11">
                                    <p class="text-black dark:text-white">{{ $loop->iteration }}</p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">{{ $res->nama_hewan ?? '-' }}</p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">
                                        {{ $res->nama_jenis_hewan ?? '-' }}
                                    </p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">
                                        {{ $res->nama_dokter ?? '-' }}
                                    </p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">{{ $res->idreservasi_dokter }}</p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    <p class="text-black dark:text-white">{{ $res->tanggal }}</p>
                                </td>
                                <td class="px-4 py-5 text-center">
                                    @php
                                        $statusClass = 'bg-gray-200 text-gray-700';
                                        if($res->status == 'Menunggu') $statusClass = 'bg-yellow-100 text-yellow-700';
                                        elseif($res->status == 'Selesai') $statusClass = 'bg-green-100 text-green-700';
                                        elseif($res->status == 'Batal') $statusClass = 'bg-red-100 text-red-700';
                                        elseif($res->status == 'Diproses') $statusClass = 'bg-blue-100 text-blue-700';
                                    @endphp
                                    <span class="inline-flex rounded-full px-3 py-1 text-sm font-medium {{ $statusClass }}">
                                        {{ $res->status ?? 'Belum Diproses' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-5 text-center">
                                    <p class="text-gray-500">Belum ada reservasi.</p>
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
