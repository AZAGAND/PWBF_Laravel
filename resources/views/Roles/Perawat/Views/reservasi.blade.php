@extends('layouts.perawat')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-blue-900 dark:text-white flex items-center gap-2">
            🗓️ Daftar Reservasi Dokter
        </h2>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Kelola dan update status reservasi pasien dengan mudah
        </p>
    </div>

    @if(session('success'))
    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg dark:bg-green-900/50 dark:text-green-300">
        {{ session('success') }}
    </div>
    @endif

    <div class="rounded-lg border border-gray-200 bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-gray-800 dark:bg-gray-900">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-900 text-left">
                        <th class="min-w-[50px] py-4 px-4 font-medium text-white">No</th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-white">No Temu</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Nama Hewan</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Dokter</th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-white">Status</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Tanggal</th>
                        <th class="py-4 px-4 font-medium text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservasi as $index => $res)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-5 px-4">
                            <h5 class="font-medium text-black dark:text-white">{{ $index + 1 }}</h5>
                        </td>
                        <td class="py-5 px-4">
                             <div class="bg-slate-700 text-white rounded-full px-4 py-1.5 text-sm font-bold inline-block shadow-sm">
                                {{ substr(str_pad($res->no_urut, 7, '0', STR_PAD_LEFT), 0, 6) . '-' . substr(str_pad($res->no_urut, 7, '0', STR_PAD_LEFT), 6) }}
                             </div>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white font-semibold">{{ $res->pet->nama }}</p>
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $res->dokter->user->nama ?? 'Dokter' }}</p>
                        </td>
                        <td class="py-5 px-4 dark:text-white">
                            @if($res->status == 'S' || $res->status == 'Selesai')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold border border-green-200">Selesai</span>
                            @elseif($res->status == 'P' || $res->status == 'Pending')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold border border-yellow-200">Pending</span>
                            @else
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-semibold border border-gray-200">{{ $res->status }}</span>
                            @endif
                        </td>
                        <td class="py-5 px-4">
                            <p class="text-black dark:text-white">{{ $res->tanggal }}</p>
                        </td>
                        <td class="py-5 px-4 dark:text-white">
                            <form action="{{ route('perawat.reservasi.update', $res->idreservasi_dokter) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="py-1 px-2 rounded border border-gray-300 text-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                                    <option value="P" {{ ($res->status == 'P' || $res->status == 'Pending') ? 'selected' : '' }}>Pending</option>
                                    <option value="S" {{ ($res->status == 'S' || $res->status == 'Selesai') ? 'selected' : '' }}>Selesai</option>
                                    <option value="Unknown" {{ $res->status == 'Unknown' ? 'selected' : '' }}>Unknown</option>
                                    <option value="Batal" {{ $res->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm flex items-center gap-1 transition">
                                    🔄 Update
                                </button>
                                <button type="button" onclick="if(confirm('Yakin hapus?')) document.getElementById('delete-{{$res->idreservasi_dokter}}').submit()" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm flex items-center gap-1 transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                            <form id="delete-{{$res->idreservasi_dokter}}" action="{{ route('perawat.reservasi.destroy', $res->idreservasi_dokter) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
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
