<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ternary Arsenal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('scripts')
</head>
<body>
     @include('layouts.navbar')

      {{-- @if(session('success'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 rounded bg-red-100 text-red-800 border border-red-300">
                {{ session('error') }}
            </div>
        @endif --}}

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>
</html>