@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        
        {{-- Breadcrumb / Header --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Dashboard Data Kategori
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" href="{{ route('data_master') }}">
                            Dashboard /
                        </a>
                    </li>
                    <li class="font-medium text-gray-500 dark:text-gray-400">
                        Data Kategori
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Table Section --}}
        <div class="rounded-sm border border-gray-200 bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-gray-800 dark:bg-gray-900 sm:px-7.5 xl:pb-1">
            
            {{-- Header Actions --}}
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                        List Data Kategori
                    </h3>
                </div>
                
                <div>
                    @if (Route::has('kategori.trash'))
                        <a href="{{ route('kategori.trash') }}"
                           class="inline-flex items-center justify-center gap-2.5 rounded-lg bg-orange-600 px-4 py-2 text-center font-medium text-white hover:bg-orange-700 lg:px-6 mr-2">
                            <span>
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 18a1 1 0 001-1v-6a1 1 0 00-2 0v6a1 1 0 001 1zM20 6h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v2H4a1 1 0 000 2h1v11c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8h1a1 1 0 000-2zM9 4h6v2H9V4zm8 16H7V8h10v12z" fill="currentColor"/>
                                </svg>
                            </span>
                            Sampah
                        </a>
                    @endif

                    <a href="{{ route('kategori.create') }}"
                       class="inline-flex items-center justify-center gap-2.5 rounded-lg bg-blue-600 px-4 py-2 text-center font-medium text-white hover:bg-blue-700 lg:px-6">
                        <span>
                            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 4.16666V15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.16669 10H15.8334" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        Tambah Kategori
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-white" role="alert">
                    <span class="font-medium">Sukses!</span> {{ session('success') }}
                </div>
            @endif

            <div class="max-w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-2 text-left dark:bg-meta-4">
                            <th class="min-w-[50px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                                No
                            </th>
                            <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white">
                                Nama Kategori
                            </th>
                            <th class="py-4 px-4 font-medium text-black dark:text-white text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoris as $i => $kategori)
                            <tr class="transition-colors border-b border-[#eee] dark:border-strokedark hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="py-5 px-4 pl-9 xl:pl-11">
                                    <h5 class="font-medium text-black dark:text-white">{{ $i + 1 }}</h5>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-black dark:text-white font-medium">
                                        {{ $kategori->nama_kategori }}
                                    </p>
                                </td>
                                <td class="py-5 px-4">
                                    <div class="flex flex-wrap items-center justify-center gap-2">
                                        {{-- Edit --}}
                                        <a href="{{ route('kategori.edit', $kategori->idkategori) }}" class="inline-flex items-center gap-1.5 rounded bg-gray-100 px-2.5 py-1.5 text-xs font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-600 dark:bg-gray-700 dark:text-white dark:hover:bg-blue-900/50 dark:hover:text-blue-400 transition" title="Edit">
                                            <svg class="fill-current" width="16" height="16" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.7535 2.47502C13.5186 2.24003 13.2386 2.12253 12.9135 2.12253C12.5885 2.12253 12.3085 2.24003 12.0735 2.47502L2.55855 11.9875C2.51855 12.025 2.48355 12.07 2.45605 12.115L1.01855 15.6575C1.00605 15.6875 1.00105 15.72 1.00105 15.7525C1.00105 15.8275 1.02605 15.8975 1.07605 15.9475C1.12605 15.9975 1.19605 16.0225 1.27105 16.0225C1.30355 16.0225 1.33605 16.0175 1.36605 16.0025L4.90855 14.5675C4.94855 14.5375 4.99355 14.4975 5.03105 14.4575L14.5461 4.94502C14.7811 4.71003 14.8986 4.43003 14.8986 4.10502C14.8986 3.78003 14.7811 3.50003 14.5461 3.26502L13.7535 2.47502Z" fill="currentColor"/>
                                            </svg>
                                            Edit
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('kategori.destroy', $kategori->idkategori) }}" method="POST" onsubmit="return confirm('Hapus kategori {{ $kategori->nama_kategori }}?');" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="inline-flex items-center gap-1.5 rounded bg-gray-100 px-2.5 py-1.5 text-xs font-medium text-gray-600 hover:bg-red-100 hover:text-red-600 dark:bg-gray-700 dark:text-white dark:hover:bg-red-900/50 dark:hover:text-red-400 transition" title="Hapus">
                                                <svg class="fill-current" width="16" height="16" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.7535 2.47502C13.5186 2.24003 13.2386 2.12253 12.9135 2.12253C12.5885 2.12253 12.3085 2.24003 12.0735 2.47502L2.55855 11.9875C2.51855 12.025 2.48355 12.07 2.45605 12.115L1.01855 15.6575C1.00605 15.6875 1.00105 15.72 1.00105 15.7525C1.00105 15.8275 1.02605 15.8975 1.07605 15.9475C1.12605 15.9975 1.19605 16.0225 1.27105 16.0225C1.30355 16.0225 1.33605 16.0175 1.36605 16.0025L4.90855 14.5675C4.94855 14.5375 4.99355 14.4975 5.03105 14.4575L14.5461 4.94502C14.7811 4.71003 14.8986 4.43003 14.8986 4.10502C14.8986 3.78003 14.7811 3.50003 14.5461 3.26502L13.7535 2.47502Z" fill="" />
                                                    <path d="M13.2188 5.4375H12.6562H4.78125H4.21875C3.79688 5.4375 3.4375 5.79688 3.4375 6.21875V6.78125C3.4375 6.86719 3.50781 6.9375 3.59375 6.9375H13.8438C13.9297 6.9375 14 6.86719 14 6.78125V6.21875C14 5.79688 13.6406 5.4375 13.2188 5.4375Z" fill="currentColor"/>
                                                    <path d="M12.9242 7.78125H4.51328C4.38047 7.78125 4.31016 7.94219 4.39453 8.04375L5.70078 9.58906C5.74766 9.64375 5.77344 9.71328 5.77344 9.78516V14.6562C5.77344 14.8977 5.96953 15.0938 6.21094 15.0938H11.2266C11.468 15.0938 11.6641 14.8977 11.6641 14.6562V9.78516C11.6641 9.7125 11.6906 9.64297 11.7375 9.58984L13.0422 8.04375C13.1258 7.94219 13.0562 7.78125 12.9242 7.78125Z" fill="currentColor"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-5 px-4 text-center dark:border-strokedark">
                                    <p class="text-gray-500 dark:text-gray-400">Belum ada data kategori.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
