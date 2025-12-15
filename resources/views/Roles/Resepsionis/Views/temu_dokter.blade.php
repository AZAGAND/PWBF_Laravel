@extends('layouts.resepsionis')

@section('content')
<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="mb-6 flex items-center gap-2">
        <span class="text-2xl">🩺</span>
        <h2 class="text-2xl font-bold text-blue-900 dark:text-white">
            Manajemen Temu Dokter
        </h2>
    </div>
    <p class="mb-6 text-sm font-medium text-gray-500 dark:text-gray-400">
        Kelola jadwal dan pendaftaran temu dengan dokter
    </p>

    {{-- Form Section --}}
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-default dark:border-gray-800 dark:bg-gray-900 mb-8">
        <h3 class="mb-4 font-bold text-black dark:text-white flex items-center gap-2">
            ➕ Tambah Jadwal Temu Dokter
        </h3>

        @if(session('success'))
            <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
         @if(session('error'))
            <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('resepsionis.temu_dokter.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-5">
                {{-- Pemilik Dropdown --}}
                 <div>
                    <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Pemilik
                    </label>
                    <select id="pemilik_select" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent dark:text-white py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500">
                         <option value="">-- Pilih Pemilik --</option>
                         @foreach($pemiliks as $pemilik)
                            <option value="{{ $pemilik->idpemilik }}">{{ $pemilik->user->nama ?? '-' }}</option>
                         @endforeach
                    </select>
                </div>

                {{-- Pet Dropdown --}}
                <div>
                     <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Nama Pet <span class="text-red-500">*</span>
                    </label>
                    <select name="idpet" id="pet_select" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent dark:text-white py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
                         <option value="">-- Pilih Pet --</option>
                          @foreach($pemiliks as $pemilik)
                                @if($pemilik->pets && $pemilik->pets->count() > 0)
                                    @foreach($pemilik->pets as $pet)
                                        <option value="{{ $pet->idpet }}" data-owner="{{ $pemilik->idpemilik }}" class="hidden pet-option">
                                            {{ $pet->nama }}
                                        </option>
                                    @endforeach
                                @endif
                          @endforeach
                    </select>
                    <p class="mt-1 text-xs text-gray-500">Pilih Pemilik terlebih dahulu</p>
                </div>

                {{-- Dokter Dropdown --}}
                <div>
                     <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                        Dokter <span class="text-red-500">*</span>
                    </label>
                    <select name="idrole_user" class="w-full rounded border-[1.5px] border-gray-300 bg-transparent dark:text-white py-3 px-5 font-medium outline-none transition focus:border-blue-500 active:border-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:focus:border-blue-500" required>
                         <option class="mb-3 block text-sm font-medium text-black dark:text-white" value="">-- Pilih Dokter --</option>
                         @foreach($dokters as $dokter)
                            <option class="mb-3 block text-sm font-medium text-black dark:text-white" value="{{ $dokter->idrole_user }}">{{ $dokter->user->nama ?? '-' }}</option>
                         @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full flex items-center justify-center rounded bg-green-500 py-3 px-6 font-medium dark:text-white hover:bg-green-600 transition gap-2">
                 ✓ Tambah Jadwal Temu
            </button>
        </form>
    </div>

    {{-- Table Section --}}
    <div class="rounded-lg border border-gray-200 bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-gray-800 dark:bg-gray-900">
        <div class="mb-4 flex items-center gap-2">
             <span class="text-xl">📋</span>
             <h3 class="text-lg font-bold text-black dark:text-white">Data Temu Dokter</h3>
        </div>
        
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-900 text-left">
                        <th class="min-w-[50px] py-4 px-4 font-medium text-white">No</th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-white">No Reservasi</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Tanggal</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Nama Pet</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Jenis Hewan</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Pemilik</th>
                        <th class="min-w-[150px] py-4 px-4 font-medium text-white">Dokter</th>
                        <th class="py-4 px-4 font-medium text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($temuDokter as $index => $item)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="py-4 px-4">
                            <h5 class="font-medium text-black dark:text-white">{{ $index + 1 }}</h5>
                        </td>
                         <td class="py-4 px-4">
                            <span class="bg-slate-700 dark:text-white rounded-full px-3 py-1 text-xs font-bold inline-block shadow-sm">
                                {{ substr(str_pad($item->no_urut, 7, '0', STR_PAD_LEFT), 0, 6) . '-' . substr(str_pad($item->no_urut, 7, '0', STR_PAD_LEFT), 6) }}
                            </span>
                        </td>
                        <td class="py-4 px-4">
                            <p class="text-black dark:text-white text-sm">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y, H:i') }}</p>
                        </td>
                        <td class="py-4 px-4">
                             <p class="text-blue-600 font-semibold dark:text-white">{{ $item->pet->nama ?? '-' }}</p>
                        </td>
                        <td class="py-4 px-4">
                             <span class="bg-blue-50 dark:bg-blue-700 dark:text-white px-2 py-0.5 rounded text-xs border border-blue-200">
                                {{ $item->pet->rasHewan->jenisHewan->jenis_hewan ?? 'Hewan' }} ({{ $item->pet->rasHewan->nama_ras_hewan ?? '-' }})
                             </span>
                        </td>
                         <td class="py-4 px-4">
                             <p class="text-black dark:text-white text-sm">{{ $item->pet->pemilik->user->nama ?? '-' }}</p>
                        </td>
                         <td class="py-4 px-4">
                             <p class="text-black dark:text-white text-sm">{{ $item->dokter->user->nama ?? '-' }}</p>
                        </td>
                        <td class="py-4 px-4">
                             <form action="{{ route('resepsionis.temu_dokter.destroy', $item->idreservasi_dokter) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm flex items-center gap-1 transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-6 text-center text-gray-500">
                            Belum ada jadwal temu dokter.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
     <div class="mt-6">
        <a href="{{ route('Dashboard_Resepsionis') }}" class="inline-flex items-center justify-center rounded bg-slate-600 px-6 py-2.5 text-center font-medium text-white hover:bg-slate-700 transition">
             ⬅ Kembali ke Dashboard
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ownerSelect = document.getElementById('pemilik_select');
        const petSelect = document.getElementById('pet_select');
        const petOptions = document.querySelectorAll('.pet-option');

        // Reset state
        function updatePetOptions() {
            const selectedOwnerId = ownerSelect.value;
            
            // Reset pet select value
            petSelect.value = "";
            
            // Hide all options first
            petOptions.forEach(option => {
                option.classList.add('hidden');
                option.style.display = 'none'; // Safer cross-browser
            });

            if (selectedOwnerId) {
                // Show matching pets
                let count = 0;
                petOptions.forEach(option => {
                    if (option.getAttribute('data-owner') === selectedOwnerId) {
                        option.classList.remove('hidden');
                        option.style.display = 'block';
                        count++;
                    }
                });
                
                if (count === 0) {
                     // Maybe show a 'no pets' option?
                }
            }
        }

        ownerSelect.addEventListener('change', updatePetOptions);
        
        // Run once on load if browser caching form state
        updatePetOptions();
    });
</script>
@endsection
