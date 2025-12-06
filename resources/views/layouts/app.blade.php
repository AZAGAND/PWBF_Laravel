<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Dark Mode Script (Prevent White Flash) --}}
    <script>
        if (localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    {{-- REMOVE if not needed --}}
    <link rel="stylesheet" href="{{ asset('build/assets/style.css') }}">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('head')
    <style>
        .preloader-mask {
            background-color: #ffffff;
            z-index: 9999999;
        }
        .dark .preloader-mask {
            background-color: #111827; /* gray-900 */
        }
        .spinner-border {
            border: 4px solid #2563eb; /* blue-600 */
            border-top-color: transparent;
        }
        .dark .spinner-border {
            border-color: #ffffff;
            border-top-color: transparent;
        }
    </style>
</head>

<body 
    x-data="{ 
        page: 'ecommerce', 
        loaded: true, 
        darkMode: localStorage.getItem('darkMode') === 'true', 
        stickyMenu: false, 
        sidebarToggle: false, 
        scrollTop: false 
    }"
    x-init="
        $watch('darkMode', value => {
            localStorage.setItem('darkMode', JSON.stringify(value));
            document.documentElement.classList.toggle('dark', value);
        });
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => loaded = false, 500);
        });
    "
    class="bg-gray-50 text-slate-900 dark:bg-gray-900 dark:text-gray-100 overflow-y-auto overflow-x-hidden w-full !p-0 !m-0"
>

    {{-- ========= PRELOADER GLOBAL ========= --}}
    <div x-show="loaded"
        x-init="$watch('loaded', value => { if (!value) setTimeout(() => $el.remove(), 500) })"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 flex items-center justify-center w-screen h-screen preloader-mask">
        <div class="h-16 w-16 animate-spin rounded-full spinner-border">
        </div>
    </div>

    {{-- ========= MAIN WRAPPER ========= --}}
    <div id="app" class="min-h-screen flex flex-col">

        @hasSection('layout')
            @yield('layout')
        @else
            <main class="flex-1">
                @yield('content')
            </main>
        @endif

    </div>

    <script src="{{ asset('build/assets/bundle.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
