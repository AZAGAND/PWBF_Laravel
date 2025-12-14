@extends('layouts.perawat')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="rounded-lg border border-gray-200 bg-white p-8 shadow-default dark:border-gray-800 dark:bg-gray-900">
        <div class="mb-6 flex items-center gap-2">
            <span class="text-2xl">✏️</span>
            <h2 class="text-xl font-bold text-blue-900 dark:text-white">
                Edit Rekam Medis
            </h2>
        </div>

        <form action="{{ route('perawat.rekam_medis.update', $rekamMedis->idrekam_medis) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Diagnosa
                </label>
                <input type="text" name="diagnosa" value="{{ $rekamMedis->diagnosa }}" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-5">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Anamnesa
                </label>
                <textarea name="anamnesa" rows="4" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>{{ $rekamMedis->anamnesa }}</textarea>
            </div>

            <div class="mb-6">
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Temuan Klinis
                </label>
                <textarea name="temuan_klinis" rows="4" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>{{ $rekamMedis->temuan_klinis }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('perawat.rekam_medis') }}" class="flex items-center justify-center rounded bg-slate-600 py-3 px-6 font-medium text-white hover:bg-slate-700 transition">
                    ⬅ Kembali
                </a>
                <button type="submit" class="flex items-center justify-center rounded bg-green-500 py-3 px-6 font-medium text-white hover:bg-green-600 transition gap-2">
                     💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
