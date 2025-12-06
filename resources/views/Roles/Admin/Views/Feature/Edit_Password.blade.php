@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        {{-- Breadcrumb --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
                Ganti Password
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" href="{{ route('data_master') }}">
                            Dashboard /
                        </a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" href="{{ route('data_user') }}">
                            Data User /
                        </a>
                    </li>
                    <li class="font-medium text-gray-500 dark:text-gray-400">
                        Password
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Form Section --}}
        <div class="rounded-sm border border-gray-200 bg-white shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="border-b border-gray-200 py-4 px-6.5 dark:border-gray-800">
                <h3 class="font-medium text-gray-800 dark:text-white">
                    Form Ganti Password User: <span class="font-bold">{{ $user->nama }}</span>
                </h3>
            </div>
            
            <form action="{{ route('users.update_password', $user->iduser) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6.5">
                    
                    {{-- Password Baru --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Password Baru <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" placeholder="Masukkan password baru (min. 8 karakter)" required minlength="8"
                            class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-gray-700 dark:bg-form-input dark:focus:border-blue-500 text-black dark:text-white" />
                        @error('password')
                            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="mb-6">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Konfirmasi Password Baru <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Ulangi password baru" required minlength="8"
                            class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-gray-700 dark:bg-form-input dark:focus:border-blue-500 text-black dark:text-white" />
                    </div>

                    <button class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-white hover:bg-blue-700 transition">
                        Simpan Password
                    </button>
                    
                    <a href="{{ route('data_user') }}" class="mt-4 flex w-full justify-center rounded bg-gray-100 p-3 font-medium text-gray-700 hover:bg-gray-200 transition dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
