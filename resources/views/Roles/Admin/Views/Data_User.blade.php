<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">

    <!-- 🔹 Navbar -->
    <nav class="bg-blue-900 text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-xl">👥</span>
                <span class="font-bold text-lg">Menu Manajemen User</span>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-blue-100">Halo,
                    <span class="font-semibold">{{ Auth::user()->nama ?? 'Admin' }}</span>
                </span>
                {{-- <a href="{{ route('logout') }}" --}}
                    class="relative font-medium pb-1 group inline-block transition-all duration-300">
                    Logout
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-300 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
        </div>
    </nav>

    <!-- 🔹 Konten Utama -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="mb-8 border-b-4 border-blue-900 pb-4">
            <h2 class="text-3xl font-bold text-blue-900 mb-2 flex items-center gap-2">
                <span class="text-4xl">👤</span>
                <span>Manajemen User</span>
            </h2>
            <p class="text-gray-600">Kelola data user, ganti password, dan ubah email dengan mudah</p>
        </div>

        <!-- 🔸 Tombol Tambah -->
        <div class="mb-6">
            {{-- <a href="{{ route('users.create') }}" --}}
                class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg transition-colors duration-300">
                ➕ Tambah User
            </a>
        </div>

        <!-- 🔸 Tabel User -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold w-16">No</th>
                            <th class="px-4 py-3 text-left font-semibold">Nama</th>
                            <th class="px-4 py-3 text-left font-semibold">Email</th>
                            <th class="px-4 py-3 text-left font-semibold">Role</th>
                            <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $data => $u)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-4 text-gray-800 font-medium">{{ $data + 1 }}</td>
                                <td class="px-4 py-4 text-gray-800">{{ $u->nama }}</td>
                                <td class="px-4 py-4 text-gray-700">{{ $u->email }}</td>
                                <td class="px-4 py-4 text-gray-700">
                                    {{ $u->roles->pluck('nama_role')->join(', ') ?: 'Belum ada role' }}
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        {{-- <a href="{{ route('users.edit', $u->iduser) }}" --}}
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-sm font-medium transition-colors">
                                            ✏️ Edit
                                        </a>
                                        {{-- <a href="{{ route('users.reset', $u->iduser) }}" --}}
                                            onclick="return confirm('Ganti password user ini?')"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm font-medium transition-colors">
                                            🔑 Ganti Password
                                        </a>
                                        {{-- <form action="{{ route('users.destroy', $u->iduser) }}" method="POST" --}}
                                            onsubmit="return confirm('Yakin ingin menghapus user {{ $u->nama }}?')"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm font-medium transition-colors">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-10 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <div class="text-5xl mb-2">📭</div>
                                        <p class="text-lg font-medium">Belum ada data user</p>
                                        <p class="text-sm">User baru akan muncul di sini setelah ditambahkan</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 🔸 Tombol Kembali -->
        <div class="mt-6">
            {{-- <a href="{{ route('admin.roles.dashboard') }}" --}}
                class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-300">
                ⬅ Kembali ke Dashboard
            </a>
        </div>
    </main>

    <!-- 🔹 Footer -->
    <footer class="bg-blue-900 text-white py-6 px-4 mt-auto">
        <div class="container mx-auto text-center">
            <p class="text-blue-200">&copy; 2024 RSHP Universitas Airlangga. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
