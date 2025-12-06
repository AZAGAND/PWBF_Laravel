@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        {{-- Breadcrumb --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
                Edit User
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
                        Edit
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Form Section --}}
        <div class="rounded-sm border border-gray-200 bg-white shadow-default dark:border-gray-800 dark:bg-gray-900">
            <div class="border-b border-gray-200 py-4 px-6.5 dark:border-gray-800">
                <h3 class="font-medium text-gray-800 dark:text-white">
                    Form Edit User
                </h3>
            </div>
            
            <form action="{{ route('users.update', $user->iduser) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-6.5">
                    {{-- Nama --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" placeholder="Masukkan nama lengkap" required
                            class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-gray-700 dark:bg-form-input dark:focus:border-blue-500 text-black dark:text-white" />
                        @error('nama')
                            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-4.5">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan alamat email" required
                            class="w-full rounded border-[1.5px] border-gray-300 bg-transparent py-3 px-5 font-medium outline-none transition focus:border-blue-600 active:border-blue-600 disabled:cursor-default disabled:bg-whiter dark:border-gray-700 dark:bg-form-input dark:focus:border-blue-500 text-black dark:text-white" />
                        @error('email')
                            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="mb-6">
                        <label class="mb-2.5 block text-black dark:text-white">
                            Role <span class="text-red-500">*</span>
                        </label>
                        <div class="relative z-20 bg-transparent dark:bg-form-input">
                            <select name="role" required
                                class="relative z-20 w-full appearance-none rounded border border-gray-300 bg-transparent py-3 px-5 outline-none transition focus:border-blue-600 active:border-blue-600 dark:border-gray-700 dark:bg-form-input dark:focus:border-blue-500 text-black dark:text-white">
                                <option value="" disabled class="text-body dark:text-body dark:bg-gray-800">Pilih Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->idrole }}" {{ $user->roles->contains('idrole', $role->idrole) ? 'selected' : '' }} class="text-body dark:text-body dark:bg-gray-800">
                                        {{ $role->nama_role }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                <svg class="fill-current text-gray-500 dark:text-gray-400" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        </div>
                        @error('role')
                            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="flex w-full justify-center rounded bg-blue-600 p-3 font-medium text-white hover:bg-blue-700 transition">
                        Update User
                    </button>
                    
                    <a href="{{ route('data_user') }}" class="mt-4 flex w-full justify-center rounded bg-gray-100 p-3 font-medium text-gray-700 hover:bg-gray-200 transition dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
