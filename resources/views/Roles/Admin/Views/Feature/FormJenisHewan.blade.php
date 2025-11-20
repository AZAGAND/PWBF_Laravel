<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jenis Hewan</title>

    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex flex-col py-8">

        <!-- HEADER -->
        <header class="bg-gradient-to-r from-blue-600 to-indigo-700 shadow-lg rounded-b-2xl mb-8">
            <div class="max-w-5xl mx-auto px-6 py-6">
                <h1 class="text-3xl font-bold text-white">
                    Tambah Jenis Hewan 🐾
                </h1>
                <p class="text-blue-100 mt-1 text-sm">
                    Tambahkan jenis hewan baru untuk kebutuhan data master klinik.
                </p>
            </div>
        </header>

        <!-- FORM CARD -->
        <div class="max-w-3xl mx-auto w-full">
            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">

                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Form Tambah Jenis Hewan
                </h2>

                <p class="text-gray-500 mb-6">
                    Isi nama jenis hewan dengan lengkap dan benar.
                </p>

                <form action="{{ route('StoreJenisHewan') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">
                            Nama Jenis Hewan
                        </label>
                        <input type="text" name="nama_jenis_hewan"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl
                                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Contoh: Kelinci (Oryctolagus cuniculus)"
                            value="{{ old('nama_jenis_hewan') }}">
                        @error('nama_jenis_hewan')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Back Button Vruhh -->
                    <div class="flex justify-end gap-3">

                        <a href="{{ route('jenis_hewan') }}"
                            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700
                                    font-semibold rounded-xl transition">
                            Batal
                        </a>

                        <button type="submit"
                            class="px-5 py-2 rounded-xl font-semibold text-white
                                    bg-gradient-to-r from-blue-600 to-indigo-700
                                    hover:opacity-90 shadow-md transition">
                            Simpan
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
