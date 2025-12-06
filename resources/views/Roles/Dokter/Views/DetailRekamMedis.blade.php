@extends('layouts.dokter')

@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 selection:bg-blue-500 selection:text-white">
        
        {{-- Breadcrumb / Header --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Detail Rekam Medis
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" href="{{ route('Dashboard_Dokter') }}">
                            Dashboard /
                        </a>
                    </li>
                    <li>
                        <a class="font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" href="{{ route('dokter.rekam_medis') }}">
                            Rekam Medis /
                        </a>
                    </li>
                    <li class="font-medium text-gray-500 dark:text-gray-400">
                        Detail
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Info Banner --}}
        <div class="rounded-lg border border-transparent bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4 mb-6 shadow-md dark:from-blue-950 dark:to-blue-900">
            <div class="flex items-start gap-4">
                <span class="text-3xl text-white">📄</span>
                <div>
                    <h4 class="text-lg font-bold text-white">Detail Rekam Medis Pasien</h4>
                    <p class="text-sm text-white">
                        Informasi lengkap pemeriksaan dan tindakan terapi yang telah dilakukan.
                    </p>
                </div>
            </div>
        </div>

        {{-- Informasi Pasien Card --}}
        <div class="rounded-sm border border-stroke bg-[#1e293b] shadow-default dark:border-strokedark dark:bg-[#1e293b] mb-8">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                <h3 class="font-semibold text-xl text-white dark:text-white flex items-center gap-2">
                    <span class="text-primary"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                    Informasi Pasien
                </h3>
            </div>
            <div class="p-6.5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-3">
                            <span class="text-gray-400 mt-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg></span>
                            <div>
                                <p class="text-sm text-gray-400 font-medium">Nama Hewan</p>
                                <p class="text-lg font-semibold text-white dark:text-white">{{ $rekamMedis->temuDokter->pet->nama ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="text-gray-400 mt-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></span>
                            <div>
                                <p class="text-sm text-gray-400 font-medium">Pemilik</p>
                                <p class="text-lg font-semibold text-white dark:text-white">{{ $rekamMedis->temuDokter->pet->pemilik->user->nama ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="text-gray-400 mt-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                            <div>
                                <p class="text-sm text-gray-400 font-medium">Tanggal Pemeriksaan</p>
                                <p class="text-lg font-semibold text-white dark:text-white">
                                    {{ $rekamMedis->created_at ? \Carbon\Carbon::parse($rekamMedis->created_at)->format('Y-m-d H:i:s') : '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div class="flex items-start gap-3">
                            <span class="text-gray-400 mt-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></span>
                            <div>
                                <p class="text-sm text-gray-400 font-medium">Diagnosa</p>
                                <p class="text-lg font-semibold text-white dark:text-white">{{ $rekamMedis->diagnosa }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="text-gray-400 mt-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></span>
                            <div>
                                <p class="text-sm text-gray-400 font-medium">Anamnesa</p>
                                <p class="text-base text-white dark:text-white">{{ $rekamMedis->anamnesa }}</p>
                            </div>
                        </div>

                         <div class="flex items-start gap-3">
                            <span class="text-gray-400 mt-1"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>
                            <div>
                                <p class="text-sm text-gray-400 font-medium">Temuan Klinis</p>
                                <p class="text-base text-white dark:text-white">{{ $rekamMedis->temuan_klinis }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Detail Tindakan Terapi Card --}}
        <div class="rounded-sm border border-stroke bg-[#1e293b] shadow-default dark:border-strokedark dark:bg-[#1e293b] mb-8">
            <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark flex justify-between items-center">
                 <h3 class="font-semibold text-xl text-white dark:text-white flex items-center gap-2">
                    <span class="text-primary"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg></span>
                    Detail Tindakan Terapi
                </h3>
            </div>
            
            <div class="p-6.5">
                 @if(session('success'))
                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                        <span class="font-medium">Sukses!</span> {{ session('success') }}
                    </div>
                 @endif

                 @if($errors->any())
                    <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">Error!</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif

                 {{-- Form Tambah Tindakan (Static on Page) --}}
                 <div class="mb-6 p-6 rounded-lg border border-gray-600 bg-gray-800/50">
                    <h4 class="mb-4 text-lg font-semibold text-white">Tambah Tindakan Baru</h4>
                    <form action="{{ route('dokter.rekam_medis.detail.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idrekam_medis" value="{{ $rekamMedis->idrekam_medis }}">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label class="mb-2.5 block text-white font-medium">Tindakan <span class="text-meta-1">*</span></label>
                                <div class="relative z-20 bg-transparent dark:bg-form-input">
                                    <select name="idkode_tindakan_terapi" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-strokedark dark:bg-form-input dark:focus:border-primary text-black dark:text-white">
                                        <option value="" class="text-body dark:text-body dark:bg-gray-800">Pilih Tindakan</option>
                                        @foreach($kodeTindakan as $kode)
                                            <option value="{{ $kode->idkode_tindakan_terapi }}" class="text-body dark:text-body dark:bg-gray-800">{{ $kode->kode }} - {{ $kode->deskripsi_tindakan_terapi }}</option>
                                        @endforeach
                                    </select>
                                    <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                        <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path g fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="white"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="mb-2.5 block text-white font-medium">Keterangan</label>
                                <textarea name="detail" rows="1" placeholder="Tambahkan keterangan (opsional)" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-strokedark dark:bg-form-input dark:focus:border-primary text-white"></textarea>
                            </div>
                        </div>
                        
                        <div class="text-right">
                             <button type="submit" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-6 text-center font-medium text-white hover:bg-opacity-90">
                                <svg class="mr-2 fill-current" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z" fill="white"/></svg>
                                Tambah
                            </button>
                        </div>
                    </form>
                 </div>

                 <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-blue-900 text-left dark:bg-meta-4">
                            <th class="py-4 px-4 font-medium text-white xl:pl-6 w-[50px]">No</th>
                            <th class="py-4 px-4 font-medium text-white w-[100px]">Kode</th>
                            <th class="py-4 px-4 font-medium text-white">Deskripsi Tindakan</th>
                            <th class="py-4 px-4 font-medium text-white">Keterangan</th>
                            <th class="py-4 px-4 font-medium text-white w-[150px] text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         @forelse ($rekamMedis->detailRekamMedis as $i => $detail)
                             <tr class="border-b border-[#eee] dark:border-strokedark transition-colors hover:bg-blue-900/20 dark:hover:bg-blue-900/40">
                                <td class="py-4 px-4 xl:pl-6 text-white dark:text-white">{{ $i + 1 }}</td>
                                <td class="py-4 px-4">
                                     <span class="inline-block rounded bg-blue-50 px-2.5 py-0.5 text-sm font-medium text-blue-500 border border-blue-200">
                                        {{ $detail->tindakanTerapi->kode ?? '-' }}
                                     </span>
                                </td>
                                <td class="py-4 px-4 text-white dark:text-white">{{ $detail->tindakanTerapi->deskripsi_tindakan_terapi ?? '-' }}</td>
                                <td class="py-4 px-4 text-gray-300 dark:text-gray-400">{{ $detail->detail ?? '-' }}</td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button onclick="openEditModal('{{ $detail->iddetail_rekam_medis }}', '{{ $detail->tindakanTerapi->idkode_tindakan_terapi }}', '{{ $detail->detail }}')" class="hover:text-primary">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.7535 2.475C14.4735 1.755 15.6335 1.755 16.3535 2.475C17.0735 3.195 17.0735 4.355 16.3535 5.075L5.6135 15.815C5.4635 15.965 5.2735 16.075 5.0735 16.105L2.1435 16.525C1.8635 16.565 1.5935 16.355 1.5635 16.075L1.8735 13.145C1.9035 12.945 2.0135 12.755 2.1635 12.605L13.7535 2.475Z" fill="" /></svg>
                                        </button>
                                        <button onclick="openDeleteModal('{{ route('dokter.rekam_medis.detail.destroy', $detail->iddetail_rekam_medis) }}')" class="hover:text-danger">
                                            <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.7535 2.475C14.4735 1.755 15.6335 1.755 16.3535 2.475C17.0735 3.195 17.0735 4.355 16.3535 5.075L5.6135 15.815C5.4635 15.965 5.2735 16.075 5.0735 16.105L2.1435 16.525C1.8635 16.565 1.5935 16.355 1.5635 16.075L1.8735 13.145C1.9035 12.945 2.0135 12.755 2.1635 12.605L13.7535 2.475Z" fill="" fill-opacity="0" /><path d="M15 4H11.5V3C11.5 1.9 10.6 1 9.5 1H8.5C7.4 1 6.5 1.9 6.5 3V4H3C2.45 4 2 4.45 2 5C2 5.55 2.45 6 3 6H15C15.55 6 16 5.55 16 5C16 4.45 15.55 4 15 4ZM4.5 16C4.5 17.1 5.4 18 6.5 18H11.5C12.6 18 13.5 17.1 13.5 16V7H4.5V16Z" fill="" /></svg>
                                        </button>
                                    </div>
                                </td>
                             </tr>
                         @empty
                            <tr><td colspan="5" class="py-4 text-center text-gray-400">Tidak ada tindakan terapi.</td></tr>
                         @endforelse
                    </tbody>
                 </table>
            </div>
        </div>

        {{-- Footer Info --}}
        <div class="rounded-lg border border-gray-200 bg-blue-50 p-4 border-l-4 border-l-yellow-400 dark:bg-gray-800 dark:border-strokedark mb-8">
             <div class="flex items-start gap-3">
                 <span class="text-xl text-yellow-500">💡</span>
                 <div>
                     <h5 class="font-bold text-gray-800 dark:text-white">Informasi</h5>
                     <p class="text-sm text-gray-500 dark:text-gray-400">
                         Data rekam medis ini mencatat seluruh pemeriksaan dan tindakan terapi yang telah dilakukan.
                     </p>
                 </div>
             </div>
        </div>

    </div>

    <!-- Edit Modal (Fixed Style: Solid Opaque Background) -->
    <div id="editModal" class="fixed inset-0 z-99999 hidden flex items-center justify-center bg-black/90 px-4 py-5">
        <div class="relative w-full max-w-lg rounded-lg border border-stroke bg-[#1e293b] px-8 py-10 shadow-default dark:border-strokedark dark:bg-[#1e293b] md:px-10 md:py-12">
             <button onclick="closeModal('editModal')" class="absolute top-4 right-4 text-white hover:text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <h3 class="mb-6 text-xl font-bold text-white sm:text-2xl text-center">Edit Tindakan Terapi</h3>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label class="mb-2.5 block font-medium text-white">Tindakan <span class="text-meta-1">*</span></label>
                    <div class="relative z-20 bg-transparent dark:bg-form-input">
                        <select id="edit_idkode" name="idkode_tindakan_terapi" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-strokedark dark:bg-form-input dark:focus:border-primary text-black dark:text-white">
                            @foreach($kodeTindakan as $kode)
                                <option value="{{ $kode->idkode_tindakan_terapi }}" class="text-body dark:text-body dark:bg-gray-800">{{ $kode->kode }} - {{ $kode->deskripsi_tindakan_terapi }}</option>
                            @endforeach
                        </select>
                         <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path g fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill="white"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-5">
                    <label class="mb-2.5 block font-medium text-white">Keterangan</label>
                    <textarea id="edit_detail" name="detail" rows="4" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-strokedark dark:bg-form-input dark:focus:border-primary text-white"></textarea>
                </div>
                <div class="-mx-3 flex flex-wrap gap-y-4">
                    <div class="w-full px-3 2xl:w-1/2">
                        <button type="button" onclick="closeModal('editModal')" class="block w-full rounded border border-stroke bg-transparent p-3 text-center font-medium text-white transition hover:border-meta-1 hover:bg-meta-1 hover:text-white dark:border-strokedark dark:hover:border-meta-1 dark:hover:bg-meta-1">Batal</button>
                    </div>
                    <div class="w-full px-3 2xl:w-1/2">
                        <button type="submit" class="block w-full rounded border border-primary bg-primary p-3 text-center font-medium text-white transition hover:bg-opacity-90">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal (Fixed Style) -->
    <div id="deleteModal" class="fixed inset-0 z-99999 hidden flex items-center justify-center bg-black/90 px-4 py-5">
        <div class="relative w-full max-w-lg rounded-lg border border-stroke bg-[#1e293b] px-8 py-10 shadow-default dark:border-strokedark dark:bg-[#1e293b] md:px-10 md:py-12">
             <button onclick="closeModal('deleteModal')" class="absolute top-4 right-4 text-white hover:text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="flex flex-col items-center justify-center mb-6">
                <span class="flex h-16 w-16 items-center justify-center rounded-full bg-red-100 text-red-500 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </span>
                <h3 class="text-xl font-bold text-white sm:text-2xl text-center">Hapus Tindakan Terapi?</h3>
                <p class="mt-2 text-center font-medium text-gray-300">Apakah Anda yakin ingin menghapus tindakan ini?<br>Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                 <div class="-mx-3 flex flex-wrap gap-y-4">
                    <div class="w-full px-3 2xl:w-1/2">
                        <button type="button" onclick="closeModal('deleteModal')" class="block w-full rounded border border-stroke bg-transparent p-3 text-center font-medium text-white transition hover:border-meta-1 hover:bg-meta-1 hover:text-white dark:border-strokedark dark:hover:border-meta-1 dark:hover:bg-meta-1">Batal</button>
                    </div>
                    <div class="w-full px-3 2xl:w-1/2">
                        <button type="submit" class="block w-full rounded border border-danger bg-danger p-3 text-center font-medium text-white transition hover:bg-opacity-90">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.getElementById(modalId).classList.add('flex');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.getElementById(modalId).classList.remove('flex');
        }

        function openEditModal(id, idKode, detail) {
            document.getElementById('edit_idkode').value = idKode;
            document.getElementById('edit_detail').value = detail;
            document.getElementById('editForm').action = "{{ route('dokter.rekam_medis.detail.update', ':id') }}".replace(':id', id);
            openModal('editModal');
        }

        function openDeleteModal(actionUrl) {
            document.getElementById('deleteForm').action = actionUrl;
            openModal('deleteModal');
        }
    </script>
@endsection
