@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Edit Kode Tindakan / Terapi
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                            href="{{ route('data_kode_tindakan_terapi') }}">
                            Data Kode Tindakan Terapi /
                        </a>
                    </li>
                    <li class="font-medium text-gray-500 dark:text-gray-400">Edit</li>
                </ol>
            </nav>
        </div>

        <!-- Form Section -->
        <div class="rounded-sm border border-gray-200 bg-white shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="border-b border-gray-200 py-4 px-6.5 dark:border-gray-800">
                <h3 class="font-medium text-black dark:text-white">
                    Form Edit Data
                </h3>
            </div>

            @if(session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Error!</span> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('kode_tindakan_terapi.update', $item->idkode_tindakan_terapi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6.5">
                    
                    {{-- Kode --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Kode <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="kode" required placeholder="Masukkan kode" value="{{ old('kode', $item->kode) }}"
                            class="w-full rounded border border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary text-black dark:text-white @error('kode') border-red-500 @enderror" />
                        @error('kode')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Deskripsi Tindakan / Terapi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="deskripsi_tindakan_terapi" required rows="3" placeholder="Masukkan deskripsi"
                            class="w-full rounded border border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary text-black dark:text-white @error('deskripsi_tindakan_terapi') border-red-500 @enderror">{{ old('deskripsi_tindakan_terapi', $item->deskripsi_tindakan_terapi) }}</textarea>
                        @error('deskripsi_tindakan_terapi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="idkategori" required
                                class="relative z-20 w-full appearance-none rounded border border-[1.5px] border-gray-300 bg-transparent py-3 px-5 outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-gray-700 dark:bg-form-input text-black dark:text-white dark:focus:border-blue-500 @error('idkategori') border-red-500 @enderror">
                                <option value="" disabled class="text-body dark:text-body dark:bg-gray-800">Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->idkategori }}" class="text-body dark:text-body dark:bg-gray-800" 
                                        {{ old('idkategori', $item->idkategori) == $kategori->idkategori ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                <svg class="fill-current text-gray-500 dark:text-gray-400" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </div>
                        @error('idkategori')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori Klinis --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Kategori Klinis <span class="text-red-500">*</span>
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="idkategori_klinis" required
                                class="relative z-20 w-full appearance-none rounded border border-[1.5px] border-gray-300 bg-transparent py-3 px-5 outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-gray-700 dark:bg-form-input text-black dark:text-white dark:focus:border-blue-500 @error('idkategori_klinis') border-red-500 @enderror">
                                <option value="" disabled class="text-body dark:text-body dark:bg-gray-800">Pilih Kategori Klinis</option>
                                @foreach($kategori_klinis as $kk)
                                    <option value="{{ $kk->idkategori_klinis }}" class="text-body dark:text-body dark:bg-gray-800" 
                                        {{ old('idkategori_klinis', $item->idkategori_klinis) == $kk->idkategori_klinis ? 'selected' : '' }}>
                                        {{ $kk->nama_kategori_klinis }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                <svg class="fill-current text-gray-500 dark:text-gray-400" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </div>
                        @error('idkategori_klinis')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
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
