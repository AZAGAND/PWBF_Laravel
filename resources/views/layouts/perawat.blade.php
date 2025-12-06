@extends('layouts.app')

@section('layout')

<div class="flex min-h-screen w-full overflow-hidden">

    @include('layouts.partials.sidebar_perawat')

    <div class="flex flex-col w-full">

        @include('layouts.partials.navbar_perawat')

        <main class="p-6 overflow-y-auto flex-1 w-full">
            @yield('content')
        </main>

    </div>

</div>

@endsection
