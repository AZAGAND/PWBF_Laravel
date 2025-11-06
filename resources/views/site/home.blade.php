<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSHP Universitas Airlangga - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Navigasi -->
    <nav class="bg-blue-900 text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex flex-wrap justify-center gap-6 md:gap-8">
            <a href="" class="hover:text-blue-300 transition-colors duration-300 font-medium">Home</a>
            <a href="{{ route('struktur_organisasi') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Struktur Organisasi</a>
            <a href="{{Route('site.layanan')}}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Layanan Umum</a>
            <a href="{{ route('site.visi-misi') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Visi Misi dan Tujuan</a>
            <a href="{{ route('login') }}"
                class="bg-blue-600 hover:bg-blue-500 px-5 py-2 rounded-lg transition-colors duration-300 font-medium">Login</a>
        </div>
    </nav>

    <!-- Home -->
    <section id="home" class="pt-0">
        <div class="w-full">
            <div class="bg-white shadow-xl">
                <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
                    alt="Logo RSHP" class="w-full h-auto object-cover">
                <div class="py-12 px-4 md:px-8 max-w-5xl mx-auto">
                    <h1 class="text-3xl md:text-4xl font-bold text-blue-900 mb-6 text-center">
                        Rumah Sakit Hewan Pendidikan Universitas Airlangga
                    </h1>
                    <p class="text-gray-700 text-lg mb-4 leading-relaxed">
                        Selamat datang di <b class="text-blue-900">RSHP Universitas Airlangga</b>, pusat layanan
                        kesehatan hewan yang menggabungkan <i class="text-blue-700">pelayanan medis</i> dengan <u
                            class="text-blue-700">pendidikan veteriner</u>.
                    </p>
                    <p class="text-gray-700 text-lg">
                        Kunjungi situs resmi kami di <a href="https://rshp.unair.ac.id" target="_blank"
                            class="text-blue-600 hover:text-blue-800 font-semibold underline">RSHP Unair</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-8 px-4 mt-16">
        <div class="container mx-auto text-center">
            <p class="text-blue-200">&copy; 2025 RSHP Universitas Airlangga. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>