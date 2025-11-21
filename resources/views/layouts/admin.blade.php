<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- TailAdmin CSS hasil build --}}
    <link rel="stylesheet" href="{{ asset('build/assets/style.css') }}">

    <img src="{{ asset('build/assets/src/images/logo/logo.svg') }}" class="w-10" />

    {{-- JS dari Laravel Vite --}}
    @vite(['resources/js/app.js'])

</head>



<body class="bg-gray-50 dark:bg-boxdark-2">
    <div class="flex">

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Wrapper --}}
        <div class="flex flex-col w-full">
            @include('layouts.partials.navbar')

            <main class="p-6">
                @yield('content')
            </main>
        </div>

    </div>

    {{-- TailAdmin JS --}}
    <script src="{{ asset('build/assets/bundle.js') }}" defer></script>

    {{-- Laravel Vite JS --}}
    @vite(['resources/js/app.js'])
</body>

</html>
