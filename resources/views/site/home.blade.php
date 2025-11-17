<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSHP Universitas Airlangga - Beranda</title>
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
                    🐾
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-blue-100">RSHP UNAIR</p>
                    <p class="text-xl font-semibold">Rumah Sakit Hewan Pendidikan</p>
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
                    class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Visi &amp; Misi</a>
                <a href="{{ route('login') }}"
                    class="rounded-full bg-white px-5 py-2 text-blue-900 transition hover:bg-blue-50">Portal Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="relative overflow-hidden bg-gradient-to-r from-blue-900 via-blue-900 to-blue-700 text-white">
        <div class="container mx-auto grid max-w-6xl gap-10 px-6 py-16 lg:grid-cols-2 lg:items-center">
            <div class="space-y-6">
                <p class="text-xs font-semibold uppercase tracking-[0.5em] text-blue-200 drop-shadow">Pelayanan • Edukasi •
                    Penelitian</p>
                <h1
                    class="text-4xl font-semibold leading-tight drop-shadow-[0_12px_30px_rgba(15,23,42,0.55)] sm:text-5xl">
                    Layanan kesehatan hewan terpadu berbasis akademik Universitas Airlangga
                </h1>
                <p class="text-lg text-blue-100 drop-shadow">
                    RSHP Universitas Airlangga memberikan pelayanan medis, riset kedokteran hewan, dan pembelajaran
                    profesional bagi mahasiswa veteriner dengan standar fasilitas modern.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('site.layanan') }}"
                        class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3 font-semibold text-blue-900 shadow-lg shadow-blue-900/20">
                        Jelajahi Layanan
                    </a>
                    <a href="https://rshp.unair.ac.id" target="_blank"
                        class="inline-flex items-center justify-center rounded-2xl border border-white/40 px-6 py-3 font-semibold text-white hover:bg-white/10">
                        Situs Resmi RSHP →
                    </a>
                </div>
            </div>

            <div class="rounded-3xl bg-white/10 p-1 shadow-2xl shadow-blue-900/40 backdrop-blur">
                <div class="rounded-[28px] bg-white p-8 text-brand-900">
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="rounded-2xl border border-blue-100 p-4 text-center">
                            <p class="text-sm font-semibold text-blue-500">Kasus per tahun</p>
                            <p class="text-3xl font-bold">2.500+</p>
                        </div>
                        <div class="rounded-2xl border border-blue-100 p-4 text-center">
                            <p class="text-sm font-semibold text-blue-500">Dokter &amp; Residen</p>
                            <p class="text-3xl font-bold">35</p>
                        </div>
                        <div class="rounded-2xl border border-blue-100 p-4 text-center">
                            <p class="text-sm font-semibold text-blue-500">Program Pendidikan</p>
                            <p class="text-3xl font-bold">6</p>
                        </div>
                        <div class="rounded-2xl border border-blue-100 p-4 text-center">
                            <p class="text-sm font-semibold text-blue-500">Layanan Aktif</p>
                            <p class="text-3xl font-bold">20+</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Highlight Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto max-w-6xl px-6">
            <div class="mb-10 text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Layanan Utama</p>
                <h2 class="mt-3 text-3xl font-bold text-brand-900">Menghubungkan pelayanan medis dan akademik</h2>
                <p class="mt-3 text-lg text-slate-600">
                    Kami mendukung kebutuhan pemilik hewan sekaligus pengembangan ilmu kedokteran hewan modern.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <article
                    class="rounded-3xl border border-slate-100 p-6 shadow-lg transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-2xl">
                        🏥
                    </div>
                    <h3 class="text-xl font-semibold text-brand-900">Pelayanan Medis 24/7</h3>
                    <p class="mt-3 text-slate-600">
                        Instalasi gawat darurat, rawat jalan, rawat inap, dan bedah dengan peralatan lengkap.
                    </p>
                </article>

                <article
                    class="rounded-3xl border border-slate-100 p-6 shadow-lg transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-2xl">
                        🎓
                    </div>
                    <h3 class="text-xl font-semibold text-brand-900">Rumah Sakit Pendidikan</h3>
                    <p class="mt-3 text-slate-600">
                        Laboratorium pembelajaran bagi mahasiswa kedokteran hewan dengan supervisi dokter spesialis.
                    </p>
                </article>

                <article
                    class="rounded-3xl border border-slate-100 p-6 shadow-lg transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-2xl">
                        🔬
                    </div>
                    <h3 class="text-xl font-semibold text-brand-900">Riset &amp; Pengabdian</h3>
                    <p class="mt-3 text-slate-600">
                        Kolaborasi penelitian kedokteran hewan untuk menjawab tantangan kesehatan hewan nasional.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-gradient-to-r from-blue-50 to-white py-16">
        <div
            class="container mx-auto flex flex-col gap-6 rounded-[32px] border border-blue-100 bg-white px-8 py-12 shadow-xl lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Mulai Sekarang</p>
                <h3 class="mt-3 text-2xl font-bold text-brand-900">Ingin bekerja sama atau kunjungan edukasi?</h3>
                <p class="mt-2 text-slate-600">Hubungi kami untuk jadwal konsultasi, observasi, atau kegiatan akademik.</p>
            </div>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('login') }}"
                    class="rounded-2xl bg-blue-900 px-6 py-3 text-white shadow-lg shadow-blue-900/30 hover:bg-blue-800">
                    Masuk Portal
                </a>
                <a href="mailto:info@rshp.unair.ac.id"
                    class="rounded-2xl border border-blue-900 px-6 py-3 text-blue-900 hover:bg-blue-900 hover:text-white">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 py-10 text-white">
        <div class="container mx-auto flex flex-col gap-4 px-6 text-center">
            <p class="text-blue-100">&copy; 2025 RSHP Universitas Airlangga. Seluruh hak cipta dilindungi.</p>
            <p class="text-sm text-blue-200">Jl. Mulyorejo Surabaya • Telepon (031) 599-2785 • layanan@rshp.unair.ac.id</p>
        </div>
    </footer>
</body>

</html>
