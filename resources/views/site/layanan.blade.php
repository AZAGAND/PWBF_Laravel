<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSHP Universitas Airlangga - Layanan Umum</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Navigasi -->
    <nav class="bg-blue-900 text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex flex-wrap justify-center gap-6 md:gap-8">
            {{-- <a href="{{route('site.home')}}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Home</a> --}}
            <a href="{{ route('struktur_organisasi') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Struktur Organisasi</a>
            <a href="{{ route('site.layanan') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Layanan Umum</a>
            <a href="{{ route('site.visi-misi') }}" class="hover:text-blue-300 transition-colors duration-300 font-medium">Visi Misi dan Tujuan</a>
            <a href="{{ route('login') }}"
                class="bg-blue-600 hover:bg-blue-500 px-5 py-2 rounded-lg transition-colors duration-300 font-medium">Login</a>
        </div>
    </nav>

    <!-- Layanan Umum -->
    <section id="layanan" class="py-16 px-4 min-h-screen">
        <div class="container mx-auto max-w-4xl">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-8 text-center">Layanan Umum</h2>
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-4 flex-shrink-0"></span>
                        <span class="text-gray-700 text-lg">Pelayanan rawat jalan</span>
                    </li>
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-4 flex-shrink-0"></span>
                        <span class="text-gray-700 text-lg">Pelayanan rawat inap</span>
                    </li>
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-4 flex-shrink-0"></span>
                        <span class="text-gray-700 text-lg">Laboratorium diagnostik</span>
                    </li>
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-4 flex-shrink-0"></span>
                        <span class="text-gray-700 text-lg">Bedah umum dan spesialis</span>
                    </li>
                    <li class="flex items-start">
                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 mr-4 flex-shrink-0"></span>
                        <span class="text-gray-700 text-lg">Vaksinasi dan sterilisasi</span>
                    </li>
                </ul>
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