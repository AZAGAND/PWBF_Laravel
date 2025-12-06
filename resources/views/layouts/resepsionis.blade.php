@extends('layouts.app')

@section('layout')

<div class="flex min-h-screen w-full overflow-hidden">

    @include('layouts.partials.sidebar_resepsionis')

    <div class="flex flex-col w-full">

        @include('layouts.partials.navbar_resepsionis')

        <main class="p-6 overflow-y-auto flex-1 w-full">
            @yield('content')
        </main>

    </div>

</div>

@endsection
