@extends('layouts.app')

@push('head')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            DEFAULT: '#1d4ed8',
                            dark: '#13348f'
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
@endpush

@section('content')
    <section class="min-h-screen bg-gray-50">
        <nav class="bg-blue-900 text-white shadow-lg">
            <div class="container mx-auto flex flex-wrap items-center justify-between gap-4 px-4 py-4">
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ url('/') }}"
                        class="inline-flex items-center gap-2 rounded-full border border-white/30 px-4 py-1 text-sm font-semibold tracking-wide hover:bg-white/10">
                        &larr; Kembali ke Situs
                    </a>
                    <div class="hidden h-6 w-px bg-blue-700 sm:block"></div>
                    <div class="flex items-center gap-2 text-white">
                        <span class="text-xl">📁</span>
                        <span class="text-lg font-bold">Portal Admin Klinik</span>
                    </div>
                    <span class="text-xs uppercase tracking-[0.4em] text-blue-200">akses aman</span>
                </div>
                <div class="flex flex-wrap items-center gap-2 text-sm font-semibold">
                    <a href="{{ route('site.home') }}"
                        class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Beranda</a>
                    <a href="{{ route('struktur_organisasi') }}"
                        class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Struktur</a>
                    <a href="{{ route('site.layanan') }}"
                        class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Layanan</a>
                    <a href="{{ route('site.visi-misi') }}"
                        class="rounded-full border border-white/20 px-4 py-1 hover:bg-white/10">Visi &amp; Misi</a>
                </div>
            </div>
        </nav>

        <div class="relative overflow-hidden bg-gradient-to-r from-blue-900 via-blue-900 to-blue-700">
            <div class="absolute inset-y-0 right-10 hidden w-40 rounded-full bg-blue-500/30 blur-3xl lg:block"></div>
            <div class="container relative mx-auto grid max-w-6xl gap-12 px-4 py-16 lg:grid-cols-2 lg:items-center">
                <div class="space-y-6 text-white">
                    <p class="text-sm font-semibold uppercase tracking-[0.4em] text-blue-200 drop-shadow">
                        Selamat Datang
                    </p>
                    <h1
                        class="text-4xl font-bold leading-tight text-white drop-shadow-[0_12px_30px_rgba(15,23,42,0.55)] sm:text-5xl">
                        Masuk untuk mengelola data klinik hewan secara terpadu
                    </h1>
                    <p class="text-lg text-blue-100 drop-shadow">
                        Gunakan kredensial akun resmi untuk mengakses dashboard sesuai peran Anda. Semua aktivitas dicatat
                        demi keamanan data pasien dan pemilik.
                    </p>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-xl bg-white/10 p-4 shadow-lg shadow-blue-900/30">
                            <p class="text-sm font-semibold text-blue-100">Modul Operasional</p>
                            <p class="text-2xl font-bold">10+</p>
                        </div>
                        <div class="rounded-xl bg-white/10 p-4 shadow-lg shadow-blue-900/30">
                            <p class="text-sm font-semibold text-blue-100">Akses Peran</p>
                            <p class="text-2xl font-bold">5 Level</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl bg-white p-8 shadow-2xl shadow-blue-900/25">
                    <div class="mb-6 text-center">
                        <p class="text-sm font-semibold text-blue-500">Masuk menggunakan</p>
                        <h2 class="mt-1 text-2xl font-bold text-blue-900">{{ __('Email & Password') }}</h2>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-red-100 bg-red-50 px-4 py-3 text-sm text-red-600">
                            {{ __('Pastikan email dan password sudah benar, lalu coba lagi.') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="text-sm font-semibold text-blue-900">
                                {{ __('Email Address') }}
                            </label>
                            <div class="mt-2">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus
                                    class="block w-full rounded-2xl border border-blue-100 bg-blue-50/40 px-4 py-3 text-blue-900 placeholder:text-blue-300 focus:border-blue-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 @error('email') border-red-400 bg-red-50 focus:border-red-400 focus:ring-red-100 @enderror"
                                    placeholder="nama@email.com">
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="text-sm font-semibold text-blue-900">
                                    {{ __('Password') }}
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="text-sm font-semibold text-blue-600 hover:text-blue-500">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="mt-2">
                                <input id="password" type="password" name="password" required
                                    autocomplete="current-password"
                                    class="block w-full rounded-2xl border border-blue-100 bg-blue-50/40 px-4 py-3 text-blue-900 placeholder:text-blue-300 focus:border-blue-400 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 @error('password') border-red-400 bg-red-50 focus:border-red-400 focus:ring-red-100 @enderror"
                                    placeholder="********">
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-3 text-sm text-blue-800 sm:flex-row sm:items-center sm:justify-between">
                            <label class="inline-flex items-center gap-3">
                                <input
                                    class="h-4 w-4 rounded border-blue-300 text-blue-700 focus:ring-blue-500 focus:ring-offset-0"
                                    type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>{{ __('Remember Me') }}</span>
                            </label>
                            <span class="text-xs uppercase tracking-[0.3em] text-blue-300">Keamanan Terjaga</span>
                        </div>

                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-2xl bg-blue-900 px-4 py-3 text-base font-semibold text-white shadow-lg shadow-blue-900/30 transition hover:bg-blue-800">
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mx-auto max-w-5xl px-4 py-12">
            <div class="rounded-2xl bg-white p-6 shadow-lg">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 text-2xl">
                            💡
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-blue-900">Tips Keamanan Masuk</h3>
                            <p class="text-sm text-slate-600">Gunakan jaringan terpercaya dan keluar dari akun setelah
                                menyelesaikan pekerjaan Anda.</p>
                        </div>
                    </div>
                    <div class="rounded-xl bg-blue-50 px-4 py-3 text-sm text-blue-700">
                        Aktivitas login dicatat untuk audit keamanan sistem.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
