@extends('layouts.perawat')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex items-center gap-2">
        <span class="text-2xl">📋</span>
        <h2 class="text-2xl font-bold text-blue-900 dark:text-white">
            Detail Rekam Medis
        </h2>
    </div>

    {{-- Info Section --}}
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900 mb-6">
        <h3 class="mb-4 text-lg font-bold text-black dark:text-white">Informasi Rekam Medis</h3>
        <div class="flex flex-col gap-2 text-sm font-medium text-black dark:text-white">
            <div>
                <span class="font-bold">Pasien:</span> {{ $rekamMedis->temuDokter->pet->nama ?? '-' }} ({{ $rekamMedis->temuDokter->pet->pemilik->user->nama ?? '-' }})
            </div>
            <div>
                <span class="font-bold">Diagnosa:</span> {{ $rekamMedis->diagnosa }}
            </div>
            <div>
                <span class="font-bold">Anamnesa:</span> {{ $rekamMedis->anamnesa }}
            </div>
            <div>
                <span class="font-bold">Temuan Klinis:</span> {{ $rekamMedis->temuan_klinis }}
            </div>
            <div>
                <span class="font-bold">Tanggal:</span> {{ $rekamMedis->created_at }}
            </div>
        </div>
    </div>

    {{-- Read-Only Table Section --}}
    <div class="rounded-lg border border-gray-200 bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-gray-800 dark:bg-gray-900">
        <div class="mb-4 flex items-center gap-2">
             <span class="text-xl">📄</span>
             <h3 class="text-lg font-bold text-black dark:text-white">Daftar Detail Tindakan Terapi</h3>
        </div>
        
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-900 text-left">
                        <th class="min-w-[50px] py-4 px-4 font-medium text-white">No</th>
                        <th class="min-w-[100px] py-4 px-4 font-medium text-white">Kode</th>
                        <th class="min-w-[200px] py-4 px-4 font-medium text-white">Deskripsi</th>
                        <th class="py-4 px-4 font-medium text-white">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekamMedis->detailRekamMedis as $index => $detail)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-4 px-4">
                            <h5 class="font-medium text-black dark:text-white">{{ $index + 1 }}</h5>
                        </td>
                        <td class="py-4 px-4">
                            <p class="text-black dark:text-white">{{ $detail->tindakanTerapi->kode ?? '-' }}</p>
                        </td>
                        <td class="py-4 px-4">
                             <p class="text-black dark:text-white">{{ $detail->tindakanTerapi->deskripsi_tindakan_terapi ?? '-' }}</p>
                        </td>
                        <td class="py-4 px-4">
                            <p class="text-black dark:text-white">{{ $detail->detail }}</p>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-6 text-center text-gray-500">
                            Tidak ada detail tindakan terapi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('perawat.rekam_medis') }}" class="inline-flex items-center justify-center rounded bg-slate-600 px-6 py-2.5 text-center font-medium text-white hover:bg-slate-700 transition">
             ⬅ Kembali ke Rekam Medis
        </a>
    </div>
</div>
@endsection
