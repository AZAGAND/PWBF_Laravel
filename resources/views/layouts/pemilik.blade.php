@extends('layouts.app')

@section('layout')

<div class="flex min-h-screen w-full overflow-hidden">

    @include('layouts.partials.sidebar_pemilik')

    <div class="flex flex-col w-full">

        @include('layouts.partials.navbar_pemilik')

        <main class="p-6 overflow-y-auto flex-1 w-full">
            @yield('content')
        </main>

    </div>

</div>

@endsection
