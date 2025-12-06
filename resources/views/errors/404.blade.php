<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <title>404 — Page Not Found</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Import Tailwind (gunakan CDN agar error page tetap muncul meskipun Vite tidak jalan) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .animate-fade {
            animation: fade 1s ease-in-out infinite alternate;
        }
        @keyframes fade {
            from { opacity: 0.5; }
            to { opacity: 1; }
        }
    </style>
</head>

<body class="h-full bg-gray-50 dark:bg-gray-900 flex items-center justify-center px-6">

    <div class="text-center">
        
        <h1 class="text-[100px] font-extrabold text-gray-300 dark:text-gray-700 leading-none animate-fade">
            404
        </h1>

        <p class="mt-2 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            Oops… Halaman tidak ditemukan
        </p>

        <p class="mt-1 text-gray-500 dark:text-gray-400 max-w-md mx-auto">
            Sepertinya halaman yang kamu cari tidak tersedia atau sudah dipindahkan.
        </p>

        <div class="mt-6">
            <a href="{{ url('dashboard  ') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-white text-sm font-medium shadow hover:bg-indigo-700">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l-2 2m0 0v10a1 1 0 01-1 1h-3m-4 0h4" />
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <p class="mt-6 text-xs text-gray-400">
            © {{ date('Y') }} {{ config('app.name') }} — All Rights Reserved
        </p>

    </div>

</body>
</html>
