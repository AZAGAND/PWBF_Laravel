<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSHP Universitas Airlangga - Layanan Umum</title>
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
                    💠
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-blue-100">Layanan RSHP</p>
                    <p class="text-xl font-semibold">Pelayanan Medis Komprehensif</p>
                </div>
            </div>
            <nav class="flex flex-wrap items-center justify-center gap-3 text-sm font-semibold">
                <a href="{{ route('site.home') }}"
                    class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Beranda</a>
                <a href="{{ route('struktur_organisasi') }}"
                    class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Struktur</a>
                <a href="{{ route('site.layanan') }}"
                    class="rounded-full border border-white/20 px-4 py-1 bg-white/10">Layanan</a>
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
            <p class="text-sm font-semibold uppercase tracking-[0.5em] text-blue-200 drop-shadow">Layanan Medis &amp;
                Edukasi</p>
            <h1 class="mt-4 text-4xl font-bold leading-tight drop-shadow-[0_12px_30px_rgba(15,23,42,0.55)]">Layanan umum
                RSHP Universitas Airlangga</h1>
            <p class="mt-4 text-blue-100 text-lg drop-shadow">
                Setiap layanan dirancang untuk memenuhi kebutuhan kesehatan hewan peliharaan sekaligus menunjang kegiatan
                pendidikan dan penelitian kedokteran hewan.
            </p>
        </div>
    </section>

    <!-- Layanan cards -->
    <section class="py-16">
        <div class="container mx-auto max-w-6xl px-6">
            <div class="mb-10 text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Spektrum Layanan</p>
                <h2 class="mt-3 text-3xl font-bold text-blue-900">Unggul dalam diagnostik, terapi, dan perawatan</h2>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Pelayanan Rawat Jalan','👩‍⚕️','Konsultasi umum, vaksinasi, pemeriksaan berkala, dan tindakan preventif.'],
                    ['Pelayanan Rawat Inap','🛏️','Ruang perawatan intensif dengan monitoring 24 jam dan ICU hewan kecil.'],
                    ['Laboratorium Diagnostik','🔬','Analisis darah, radiologi digital, USG, dan patologi klinik.'],
                    ['Bedah Umum & Spesialis','🩺','Fasilitas bedah modern untuk kasus ortopedi, soft tissue, dan dental.'],
                    ['Vaksinasi & Sterilisasi','💉','Program vaksinasi lengkap serta layanan steril jantan/betina.'],
                    ['Rehabilitasi & Fisioterapi','♻️','Pendampingan pasca operasi, terapi laser, dan manajemen nyeri.']
                ] as $service)
                    <article
                        class="rounded-3xl border border-slate-100 bg-white p-6 shadow-lg transition hover:-translate-y-1 hover:shadow-2xl">
                        <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 text-2xl">
                            {{ $service[1] }}
                        </div>
                        <h3 class="text-xl font-semibold text-blue-900">{{ $service[0] }}</h3>
                        <p class="mt-3 text-sm text-slate-600">{{ $service[2] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Info tambahan -->
    <section class="bg-blue-50 py-16">
        <div class="container mx-auto max-w-5xl px-6">
            <div class="rounded-[32px] bg-white p-10 shadow-xl">
                <div class="grid gap-8 md:grid-cols-2">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Jam Operasional</p>
                        <ul class="mt-4 space-y-3 text-sm text-slate-600">
                            <li class="flex items-center justify-between rounded-2xl border border-blue-100 px-4 py-3">
                                <span>Senin - Jumat</span>
                                <span class="font-semibold text-blue-900">08:00 - 21:00</span>
                            </li>
                            <li class="flex items-center justify-between rounded-2xl border border-blue-100 px-4 py-3">
                                <span>Sabtu</span>
                                <span class="font-semibold text-blue-900">08:00 - 17:00</span>
                            </li>
                            <li class="flex items-center justify-between rounded-2xl border border-blue-100 px-4 py-3">
                                <span>IGD 24/7</span>
                                <span class="font-semibold text-red-500">Siap tanggap</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-500">Alur Pelayanan</p>
                        <ol class="mt-4 space-y-4">
                            @foreach ([
                                'Registrasi melalui resepsionis atau telepon.',
                                'Triase oleh perawat / dokter jaga.',
                                'Pemeriksaan dokter dan tindakan diagnostik.',
                                'Terapi, edukasi pemilik, dan penjadwalan kontrol.'
                            ] as $index => $step)
                                <li class="flex items-start gap-3 rounded-2xl bg-blue-50/50 p-3 text-sm text-slate-600">
                                    <span
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-sm font-semibold text-blue-900">{{ $index + 1 }}</span>
                                    <span>{{ $step }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div
                    class="mt-8 flex flex-wrap items-center justify-between gap-4 rounded-2xl bg-blue-900 px-6 py-5 text-white">
                    <div>
                        <p class="text-sm uppercase tracking-[0.4em] text-blue-200">Informasi cepat</p>
                        <p class="text-lg font-semibold">Reservasi &amp; Hotline: (031) 599-2785</p>
                    </div>
                    <a href="mailto:layanan@rshp.unair.ac.id"
                        class="rounded-2xl bg-white px-6 py-3 text-blue-900 shadow-lg hover:bg-blue-50">Kirim Email</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 py-10 text-white">
        <div class="container mx-auto flex flex-col gap-4 px-6 text-center">
            <p class="text-blue-100">&copy; 2025 RSHP Universitas Airlangga. Seluruh hak cipta dilindungi.</p>
            <p class="text-sm text-blue-200">Layanan umum mengikuti standar Fakultas Kedokteran Hewan UNAIR.</p>
        </div>
    </footer>
</body>

</html>
