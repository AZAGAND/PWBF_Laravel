@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Tambah Ras Hewan
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                            href="{{ route('ras_hewan') }}">
                            Data Ras Hewan /
                        </a>
                    </li>
                    <li class="font-medium text-primary">Tambah</li>
                </ol>
            </nav>
        </div>

        <!-- Form Section -->
        <div class="rounded-sm border border-gray-200 bg-white shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="border-b border-gray-200 py-4 px-6.5 dark:border-gray-800">
                <h3 class="font-medium text-black dark:text-white">
                    Form Data Ras Hewan
                </h3>
            </div>

            @if(session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Error!</span> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('ras.store') }}" method="POST">
                @csrf
                <div class="p-6.5">
                    
                    {{-- Nama Ras --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Nama Ras <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_ras" required placeholder="Masukkan nama ras hewan"
                            class="w-full rounded border border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary text-black dark:text-white" />
                    </div>

                    {{-- Jenis Hewan --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Jenis Hewan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="idjenis_hewan" required
                                class="relative z-20 w-full appearance-none rounded border border-[1.5px] border-gray-300 bg-transparent py-3 px-5 outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-gray-700 dark:bg-form-input text-black dark:text-white dark:focus:border-blue-500">
                                <option value="" disabled selected class="text-body dark:text-body dark:bg-gray-800">Pilih jenis hewan</option>
                                @foreach($jenisHewans as $j)
                                    <option value="{{ $j->idjenis_hewan }}" class="text-body dark:text-body dark:bg-gray-800">{{ $j->nama_jenis_hewan }}</option>
                                @endforeach
                            </select>
                            <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                <svg class="fill-current text-gray-500 dark:text-gray-400" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <button type="submit"
                        class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-white hover:bg-blue-700">
                        Simpan Ras Hewan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
