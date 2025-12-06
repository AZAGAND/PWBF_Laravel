@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Edit Jenis Hewan
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                            href="{{ route('jenis_hewan') }}">
                            Data Jenis Hewan /
                        </a>
                    </li>
                    <li class="font-medium text-primary">Edit</li>
                </ol>
            </nav>
        </div>

        <!-- Form Section -->
        <div class="rounded-sm border border-gray-200 bg-white shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="border-b border-gray-200 py-4 px-6.5 dark:border-gray-800">
                <h3 class="font-medium text-black dark:text-white">
                    Form Edit Jenis Hewan
                </h3>
            </div>

            @if(session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Error!</span> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('jenis.update', $jenisHewan->idjenis_hewan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6.5">
                    
                    {{-- Nama Jenis Hewan --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Nama Jenis Hewan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_jenis_hewan" required value="{{ old('nama_jenis_hewan', $jenisHewan->nama_jenis_hewan) }}"
                            class="w-full rounded border border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary text-black dark:text-white" />
                    </div>

                    <button type="submit"
                        class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-white hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
