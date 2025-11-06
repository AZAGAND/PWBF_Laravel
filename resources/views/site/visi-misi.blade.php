<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSHP Universitas Airlangga - Visi Misi dan Tujuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Navigasi -->
    <nav class="bg-blue-900 text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex flex-wrap justify-center gap-6 md:gap-8">
            {{-- <a href="{{ route('site.home') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Home</a> --}}
            <a href="{{ route('struktur_organisasi') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Struktur Organisasi</a>
            <a href="{{ route('site.layanan') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Layanan Umum</a>
            <a href="{{ route('site.visi-misi') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Visi Misi dan Tujuan</a>
            <a href="{{ route('login') }}"
                class="bg-blue-600 hover:bg-blue-500 px-5 py-2 rounded-lg transition-colors duration-300 font-medium">Login</a>
        </div>
    </nav>

    <!-- Visi Misi -->
    <section id="visi" class="py-16 px-4 bg-gradient-to-b from-gray-100 to-blue-50 min-h-screen">
        <div class="container mx-auto max-w-4xl">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-12 text-center">Visi, Misi, dan Tujuan</h2>

            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 mb-8">
                <h3 class="text-2xl font-bold text-blue-800 mb-4 border-l-4 border-blue-600 pl-4">Visi</h3>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Menjadi pusat layanan kesehatan hewan terdepan di Indonesia berbasis pendidikan, penelitian, dan
                    pengabdian masyarakat.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 mb-8">
                <h3 class="text-2xl font-bold text-blue-800 mb-6 border-l-4 border-blue-600 pl-4">Misi</h3>
                <ol class="space-y-4">
                    <li class="flex items-start">
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded-full font-bold mr-4 flex-shrink-0">1</span>
                        <span class="text-gray-700 text-lg pt-1">Menyelenggarakan layanan kesehatan hewan yang
                            profesional dan ramah.</span>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded-full font-bold mr-4 flex-shrink-0">2</span>
                        <span class="text-gray-700 text-lg pt-1">Mendukung pendidikan dan penelitian di bidang
                            kedokteran hewan.</span>
                    </li>
                    <li class="flex items-start">
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 bg-blue-600 text-white rounded-full font-bold mr-4 flex-shrink-0">3</span>
                        <span class="text-gray-700 text-lg pt-1">Meningkatkan kesadaran masyarakat akan pentingnya
                            kesehatan hewan.</span>
                    </li>
                </ol>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                <h3 class="text-2xl font-bold text-blue-800 mb-4 border-l-4 border-blue-600 pl-4">Tujuan</h3>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Memberikan pelayanan medis berkualitas tinggi sekaligus menjadi pusat pembelajaran mahasiswa
                    kedokteran hewan.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-8 px-4">
        <div class="container mx-auto text-center">
            <p class="text-blue-200">&copy; 2024 RSHP Universitas Airlangga. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>