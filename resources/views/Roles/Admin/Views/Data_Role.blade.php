<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">

    <!-- 🔹 Navbar -->
    <nav class="bg-blue-900 text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <!-- Brand -->
            <div class="flex items-center gap-2">
                <span class="text-xl">👥</span>
                <span class="font-bold text-lg">Manajemen Role</span>
            </div>

            <!-- User Info -->
            <div class="flex items-center gap-4">
                <span class="text-blue-100">Halo,
                    <span class="font-semibold">{{ Auth::user()->nama ?? 'Admin' }}</span>
                </span>
                {{-- <a href="{{ route('logout') }}" 
                    class="relative font-medium pb-1 group inline-block transition-all duration-300">
                    Logout
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-300 transition-all duration-300 group-hover:w-full"></span>
                </a> --}}
            </div>
        </div>
    </nav>

    <!-- 🔹 Konten Utama -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-blue-900 mb-2 flex items-center gap-2">
                <span class="text-4xl">🧩</span>
                <span>Manajemen Role Pengguna</span>
            </h2>
            <p class="text-gray-600">Kelola role dan hak akses pengguna sistem</p>
        </div>

        <!-- 🔸 Tombol Tambah Role -->
        {{-- <div class="mb-6">
            <a href="{{ route('roles.create') }}"
                class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-300">
                ➕ Tambah Role Baru
            </a>
        </div> --}}

        <!-- 🔸 Card Tabel -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            {{-- <th class="px-4 py-3 text-center font-semibold">No</th> --}}
                            <th class="px-4 py-3 text-center font-semibold">Nama User</th>
                            <th class="px-4 py-3 text-center font-semibold">Email</th>
                            <th class="px-4 py-3 text-center font-semibold">Role</th>
                            <th class="px-4 py-3 text-center font-semibold">Status</th>
                            <th class="px-4 py-3 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $user)
                            @foreach ($user->roles as $role)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    {{-- <td class="px-4 py-4 text-gray-800 font-medium">{{ $role + 1 }}</td> --}}
                                    <td class="px-4 py-4 text-center font-semibold text-gray-800">{{ $user->nama }}
                                    </td>
                                    <td class="px-4 py-4 text-center text-gray-700">{{ $user->email }}</td>
                                    <td class="px-4 py-4 text-center">
                                        <span
                                            class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                            {{ $role->nama_role }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        @if ($role->pivot->status)
                                            <span
                                                class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                                ✓ Aktif
                                            </span>
                                        @else
                                            <span
                                                class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">
                                                ✗ Tidak Aktif
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            {{-- <form action="{{ route('roles.toggle', $role->pivot->idrole_user) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="text-white px-3 py-1 rounded-lg text-sm font-medium
                                {{ $role->pivot->status ? 'bg-orange-600 hover:bg-orange-700' : 'bg-green-600 hover:bg-green-700' }}">
                                                    {{ $role->pivot->status ? '⊗ Nonaktifkan' : '✓ Aktifkan' }}
                                                </button>
                                            </form> --}}

                                            {{-- <form action="{{ route('roles.delete', $role->pivot->idrole_user) }}"
                                                method="POST"
                                                onsubmit="return confirm('Hapus role ini dari {{ $user->nama }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm font-medium">
                                                    🗑️ Hapus
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-10 text-center text-gray-500">
                                    📭 Belum ada data role pengguna
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        <!-- 🔹 Tombol Kembali -->
        <div class="mt-6">
            <a href="{{ route('roles.admin.data_master') }}"
                class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-300">
                ⬅ Kembali ke Data Master
            </a>
        </div>
    </main>

    <!-- 🔹 Footer -->
    <footer class="bg-blue-900 text-white py-6 px-4 mt-auto">
        <div class="container mx-auto text-center">
            <p class="text-blue-200">&copy; 2025 RSHP Universitas Airlangga. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
