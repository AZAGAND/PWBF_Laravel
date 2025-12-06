@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <!-- Breadcrumb -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-gray-800 dark:text-white">
            Profil Administrator
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li><a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" href="{{ route('dashboard_Admin') }}">Dashboard /</a></li>
                <li class="font-medium text-gray-500 dark:text-gray-400">Profile</li>
            </ol>
        </nav>
    </div>

    <!-- Main Profile Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Left Column: Identity Card -->
        <div class="col-span-1">
            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900 text-center h-full">
                <div class="relative mx-auto inline-block mb-4">
                     <div class="flex h-32 w-32 items-center justify-center rounded-full bg-blue-50 text-6xl font-bold text-blue-600 dark:bg-blue-900/50 dark:text-blue-400 mx-auto">
                        {{ strtoupper(substr($user->nama, 0, 1)) }}
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-black dark:text-white mb-2">
                    {{ $user->nama }}
                </h3>
                <p class="font-medium text-gray-500 dark:text-gray-400 mb-6">
                    Administrator
                </p>

                <div class="inline-flex items-center justify-center gap-2 rounded-full bg-green-50 px-4 py-2 text-sm font-medium text-green-600 dark:bg-green-900/50 dark:text-green-400 w-full">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    Active Status
                </div>
            </div>
        </div>

        <!-- Right Column: Detail Information Cards -->
        <div class="col-span-1 md:col-span-2 space-y-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Card 1: Email -->
                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-900/50 dark:text-blue-400">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.35 4.5H4.65C3.51873 4.5 2.625 5.39373 2.625 6.525V17.475C2.625 18.6063 3.51873 19.5 4.65 19.5H19.35C20.4813 19.5 21.375 18.6063 21.375 17.475V6.525C21.375 5.39373 20.4813 4.5 19.35 4.5ZM19.35 18H4.65C4.36015 18 4.125 17.7648 4.125 17.475V8.12563L11.5369 13.6847C11.6681 13.7831 11.8341 13.8375 12 13.8375C12.1659 13.8375 12.3319 13.7831 12.4631 13.6847L19.875 8.12563V17.475C19.875 17.7648 19.6399 18 19.35 18ZM19.875 6.525V6.63469L12 12.5409L4.125 6.63469V6.525C4.125 6.23516 4.36015 6 4.65 6H19.35C19.6399 6 19.875 6.23516 19.875 6.525Z" fill=""/>
                            </svg>
                        </div>
                        <div>
                             <span class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email Address</span>
                             <h4 class="text-lg font-bold text-black dark:text-white break-all">{{ $user->email }}</h4>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Username -->
                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                     <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-50 text-purple-600 dark:bg-purple-900/50 dark:text-purple-400">
                             <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="" />
                                <path opacity="0.5" d="M12.0002 14.5C6.99016 14.5 2.91016 17.86 2.91016 22H21.0902C21.0902 17.86 17.0102 14.5 12.0002 14.5Z" fill="" />
                            </svg>
                        </div>
                        <div>
                             <span class="block text-sm font-medium text-gray-500 dark:text-gray-400">Username</span>
                             <h4 class="text-lg font-bold text-black dark:text-white">{{ $user->username }}</h4>
                        </div>
                    </div>
                </div>

                 <!-- Card 3: Join Date -->
                 <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                     <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-50 text-green-600 dark:bg-green-900/50 dark:text-green-400">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.5 4.5H17.25V3.75C17.25 3.33578 16.9142 3 16.5 3C16.0858 3 15.75 3.33578 15.75 3.75V4.5H8.25V3.75C8.25 3.33578 7.91422 3 7.5 3C7.08578 3 6.75 3.33578 6.75 3.75V4.5H4.5C3.25736 4.5 2.25 5.50736 2.25 6.75V19.5C2.25 20.7426 3.25736 21.75 4.5 21.75H19.5C20.7426 21.75 20.7426 21.75 19.5V6.75C21.75 5.50736 20.7426 4.5 19.5 4.5ZM20.25 19.5C20.25 19.9142 19.9142 20.25 19.5 20.25H4.5C4.08578 20.25 3.75 19.9142 3.75 19.5V9.75H20.25V19.5Z" fill=""/>
                            </svg>
                        </div>
                        <div>
                             <span class="block text-sm font-medium text-gray-500 dark:text-gray-400">Bergabung Sejak</span>
                             <h4 class="text-lg font-bold text-black dark:text-white">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</h4>
                        </div>
                    </div>
                </div>

                 <!-- Card 4: Role ID -->
                 <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900">
                     <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-orange-50 text-orange-600 dark:bg-orange-900/50 dark:text-orange-400">
                             <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.75 8.25H17.25C17.25 6.17893 15.5711 4.5 13.5 4.5C11.4289 4.5 9.75 6.17893 9.75 8.25H8.25C6.17893 8.25 4.5 9.92893 4.5 12V18.75C4.5 20.8211 6.17893 22.5 8.25 22.5H18.75C20.8211 22.5 22.5 20.8211 22.5 18.75V12C22.5 9.92893 20.8211 8.25 18.75 8.25ZM11.25 8.25C11.25 7.00736 12.2574 6 13.5 6C14.7426 6 15.75 7.00736 15.75 8.25H11.25ZM21 18.75C21 19.9926 19.9926 21 18.75 21H8.25C7.00736 21 6 19.9926 6 18.75V12C6 10.7574 7.00736 9.75 8.25 9.75H18.75C19.9926 9.75 21 10.7574 21 12V18.75Z" fill=""/>
                             </svg>
                        </div>
                        <div>
                             <span class="block text-sm font-medium text-gray-500 dark:text-gray-400">Role ID</span>
                             <h4 class="text-lg font-bold text-black dark:text-white">Administrator (1)</h4>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
