<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSHP Universitas Airlangga - Struktur Organisasi</title>
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
                    🧭
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-blue-100">Struktur RSHP</p>
                    <p class="text-xl font-semibold">Organisasi &amp; Kepemimpinan</p>
                </div>
            </div>
            <nav class="flex flex-wrap items-center justify-center gap-3 text-sm font-semibold">
                <a href="{{ route('site.home') }}"
                    class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Beranda</a>
                <a href="{{ route('struktur_organisasi') }}"
                    class="rounded-full border border-white/20 px-4 py-1 bg-white/10">Struktur</a>
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
    <section class="bg-gradient-to-r from-blue-900 via-blue-900 to-blue-700 py-16 text-white">
        <div class="container mx-auto max-w-5xl px-6">
            <p class="text-sm font-semibold uppercase tracking-[0.5em] text-blue-200 drop-shadow">Transparansi Organisasi</p>
            <h1 class="mt-4 text-4xl font-bold leading-tight drop-shadow-[0_12px_30px_rgba(15,23,42,0.55)]">Struktur
                manajemen RSHP Universitas Airlangga</h1>
            <p class="mt-4 text-blue-100 text-lg drop-shadow">
                Struktur organisasi memastikan koordinasi pelayanan medis, pendidikan, dan penelitian berjalan efektif dari
                pimpinan hingga unit operasional.
            </p>
        </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto max-w-6xl px-6">
            <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="rounded-3xl bg-white p-8 shadow-xl">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-blue-900">Struktur Inti</h2>
                        <span class="rounded-full bg-blue-50 px-4 py-1 text-sm font-semibold text-blue-600">Update 2025</span>
                    </div>
                    <div class="mt-8 space-y-6">
                        @foreach ([
                            ['Direktur','Drh. Andi Setiawan, M.Vet','Mengawal strategi layanan & akademik'],
                            ['Wakil Direktur','Drh. Siti Rahmawati','Koordinasi operasional harian'],
                            ['Kepala Pelayanan Medis','Drh. Budi Santoso','Pengawasan tindakan klinis & SOP'],
                            ['Kepala Pendidikan & Riset','Drh. Nur Aisyah, Ph.D','Integrasi kurikulum dan penelitian'],
                            ['Kepala Administrasi','Drs. Rudi Hartanto','Manajemen SDM dan keuangan']
                        ] as $row)
                            <article class="rounded-2xl border border-slate-100 p-4 shadow-sm">
                                <p class="text-xs font-semibold uppercase tracking-[0.4em] text-blue-500">{{ $row[0] }}</p>
                                <p class="mt-2 text-lg font-semibold text-blue-900">{{ $row[1] }}</p>
                                <p class="mt-1 text-sm text-slate-500">{{ $row[2] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-3xl bg-white p-8 shadow-xl">
                    <h3 class="text-xl font-semibold text-blue-900">Unit Pendukung</h3>
                    <p class="mt-2 text-sm text-slate-500">Unit-unit ini memastikan setiap layanan berjalan terkoordinasi.</p>
                    <ul class="mt-6 space-y-4 text-sm text-slate-600">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600"></span>
                            Instalasi Gawat Darurat &amp; ICU
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600"></span>
                            Rawat Jalan &amp; Rawat Inap
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600"></span>
                            Laboratorium Diagnostik &amp; Patologi
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600"></span>
                            Pendidikan, Riset, dan Pengabdian
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-blue-600"></span>
                            Administrasi, SDM, dan Teknologi Informasi
                        </li>
                    </ul>

                    <div class="mt-8 rounded-2xl bg-blue-50 p-6 text-blue-900">
                        <p class="text-sm font-semibold uppercase tracking-[0.4em]">Catatan</p>
                        <p class="mt-3 text-sm">
                            Struktur diperbarui setiap tahun akademik mengikuti kebijakan Universitas Airlangga. Dokumen
                            lengkap dapat diunduh melalui portal internal RSHP.
                        </p>
                        <a href="{{ route('login') }}"
                            class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-500">
                            Masuk untuk unduh struktur lengkap →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 py-10 text-white">
        <div class="container mx-auto flex flex-col gap-4 px-6 text-center">
            <p class="text-blue-100">&copy; 2025 RSHP Universitas Airlangga. Seluruh hak cipta dilindungi.</p>
            <p class="text-sm text-blue-200">Dokumen organisasi disahkan oleh Direktorat RSHP UNAIR.</p>
        </div>
    </footer>
</body>

</html>
