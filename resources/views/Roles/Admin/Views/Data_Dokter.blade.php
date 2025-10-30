<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Dokter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">

<!-- Navbar -->
<nav class="bg-blue-900 text-white sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="text-xl">🩺</span>
            <span class="font-bold text-lg">Menu Manajemen Dokter</span>
        </div>

        <div class="flex items-center gap-4">
            <span class="text-blue-100">
                Halo, <span class="font-semibold">{{ Auth::user()->nama ?? 'Admin' }}</span>
            </span>
            <span class="relative font-medium pb-1 group transition-all duration-300 cursor-pointer">
                Logout
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-300 transition-all duration-300 group-hover:w-full"></span>
            </span>
        </div>
    </div>
</nav>

<main class="flex-grow container mx-auto px-4 py-8">
    
    <!-- Header -->
    <div class="mb-8 border-b-4 border-blue-900 pb-4">
        <h2 class="text-3xl font-bold text-blue-900 flex items-center gap-2">
            <span class="text-4xl">👨‍⚕️</span>
            <span>Manajemen Dokter</span>
        </h2>
        <p class="text-gray-600">Daftar dokter yang terdaftar pada sistem RSHP</p>
    </div>

    <!-- Tombol Tambah Dokter -->
    <div class="mb-6">
        {{-- <a href="{{ route('dokter.create') }}" --}}
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg transition">
            ➕ Tambah Dokter
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold w-16">No</th>
                        <th class="px-4 py-3 text-left font-semibold">Nama Dokter</th>
                        <th class="px-4 py-3 text-left font-semibold">Email</th>
                        <th class="px-4 py-3 text-center font-semibold">Status</th>
                        <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($dokters as $i => $d)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 font-medium">{{ $i + 1 }}</td>
                        <td class="px-4 py-4">{{ $d->user->nama }}</td>
                        <td class="px-4 py-4">{{ $d->user->email }}</td>

                        <td class="px-4 py-4 text-center">
                            @if ($d->status == 1)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Aktif</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">Nonaktif</span>
                            @endif
                        </td>

                        <td class="px-4 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">

                                {{-- Edit --}}
                                {{-- <a href="{{ route('dokter.edit', $d->idrole_user) }}" --}}
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-sm">
                                    ✏️ Edit
                                </a>

                                {{-- Hapus --}}
                                {{-- <form action="{{ route('dokter.destroy', $d->idrole_user) }}" method="POST" --}}
                                    onsubmit="return confirm('Hapus dokter {{ $d->user->nama }}?')"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                                        🗑️ Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-10 text-center text-gray-500">
                            <div class="text-5xl mb-2">📭</div>
                            <p class="text-lg font-medium">Belum ada data dokter</p>
                            <p class="text-sm">Silahkan tambahkan dokter baru</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-6">
        <a href="{{ route('roles.admin.data_master') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

</main>

<footer class="bg-blue-900 text-white py-6 mt-auto">
    <div class="text-center text-blue-200">&copy; 2025 RSHP Universitas Airlangga</div>
</footer>

</body>
</html>
