<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSHP Universitas Airlangga - Visi, Misi, dan Tujuan</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            900: '#0f1f3a'
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
</head>

<body class="bg-gray-50 text-slate-800">
    <!-- Navigasi -->
    <header class="sticky top-0 z-50 bg-blue-900 text-white shadow-lg">
        <div class="container mx-auto flex flex-wrap items-center justify-between gap-4 px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-2xl">
                    🌐
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-blue-100">Arah Strategis</p>
                    <p class="text-xl font-semibold">Visi Misi RSHP UNAIR</p>
                </div>
            </div>
            <nav class="flex flex-wrap items-center justify-center gap-3 text-sm font-semibold">
                <a href="{{ route('site.home') }}"
                    class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Beranda</a>
                <a href="{{ route('struktur_organisasi') }}"
                    class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Struktur</a>
                <a href="{{ route('site.layanan') }}"
                    class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Layanan</a>
                <a href="{{ route('site.visi-misi') }}"
                    class="rounded-full border border-white/20 px-4 py-1 bg-white/10">Visi &amp; Misi</a>
                <a href="{{ route('login') }}"
                    class="rounded-full bg-white px-5 py-2 text-blue-900 transition hover:bg-blue-50">Portal Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-900 via-blue-900 to-blue-700 py-16 text-white">
        <div class="container mx-auto max-w-5xl px-6">
            <p class="text-sm font-semibold uppercase tracking-[0.5em] text-blue-200 drop-shadow">Nilai • Integritas •
                Inovasi</p>
            <h1 class="mt-4 text-4xl font-bold leading-tight drop-shadow-[0_12px_30px_rgba(15,23,42,0.55)]">Visi, misi, dan
                tujuan RSHP Universitas Airlangga</h1>
            <p class="mt-4 text-blue-100 text-lg drop-shadow">
                Dokumen ini menjadi dasar pengembangan layanan kesehatan hewan berbasis akademik serta arah riset dan
                pengabdian masyarakat kami.
            </p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16">
        <div class="container mx-auto max-w-5xl px-6 space-y-10">
            <article class="rounded-[32px] bg-white p-10 shadow-xl">
                <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Visi</p>
                <h2 class="mt-3 text-3xl font-bold text-blue-900">Menjadi pusat layanan kesehatan hewan terdepan di Indonesia
                    berbasis pendidikan, penelitian, dan pengabdian masyarakat.</h2>
                <p class="mt-4 text-slate-600">
                    Visi ini menekankan integrasi antara pelayanan klinis, pendidikan dokter hewan, dan kontribusi nyata bagi
                    masyarakat.
                </p>
            </article>

            <article class="rounded-[32px] bg-white p-10 shadow-xl">
                <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Misi</p>
                <div class="mt-6 grid gap-4">
                    @foreach ([
                        'Menyelenggarakan layanan kesehatan hewan yang profesional, ramah, dan berkesinambungan.',
                        'Mendukung pendidikan dokter hewan dan penelitian klinis berbasis bukti.',
                        'Mengembangkan program pengabdian masyarakat dan edukasi pemilik hewan.',
                        'Membangun kolaborasi nasional dan internasional untuk inovasi kesehatan hewan.'
                    ] as $index => $mission)
                        <div class="flex items-start gap-4 rounded-3xl border border-blue-100 p-4">
                            <span
                                class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-50 text-lg font-semibold text-blue-900">{{ $index + 1 }}</span>
                            <p class="text-slate-700">{{ $mission }}</p>
                        </div>
                    @endforeach
                </div>
            </article>

            <article class="rounded-[32px] bg-white p-10 shadow-xl">
                <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Tujuan Strategis</p>
                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    @foreach ([
                        'Meningkatkan mutu layanan klinis melalui standar operasional berbasis evidence.',
                        'Menjadi pusat pembelajaran unggulan bagi mahasiswa kedokteran hewan.',
                        'Menghasilkan riset aplikatif yang menjawab masalah kesehatan hewan nasional.',
                        'Memberikan layanan informasi dan edukasi kesehatan hewan kepada masyarakat.'
                    ] as $goal)
                        <div class="rounded-2xl bg-blue-50 p-4 text-sm text-blue-900 shadow-inner">
                            {{ $goal }}
                        </div>
                    @endforeach
                </div>
            </article>

            <div class="rounded-[32px] border border-blue-100 bg-gradient-to-r from-blue-50 to-white p-8 shadow-lg">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Implementasi</p>
                        <p class="mt-2 text-lg font-semibold text-blue-900">Seluruh civitas RSHP diwajibkan memahami dan
                            menjalankan visi serta misi ini pada setiap pelayanan.</p>
                    </div>
                    <a href="{{ route('login') }}"
                        class="rounded-2xl bg-blue-900 px-6 py-3 text-white shadow-lg shadow-blue-900/30 hover:bg-blue-800">
                        Masuk Portal Strategi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 py-10 text-white">
        <div class="container mx-auto flex flex-col gap-4 px-6 text-center">
            <p class="text-blue-100">&copy; 2025 RSHP Universitas Airlangga. Seluruh hak cipta dilindungi.</p>
            <p class="text-sm text-blue-200">Dokumen visi misi ditetapkan oleh pimpinan RSHP UNAIR.</p>
        </div>
    </footer>
</body>

</html>
