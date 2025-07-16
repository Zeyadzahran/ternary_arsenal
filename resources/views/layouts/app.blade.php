<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ternary Arsenal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&family=Space+Mono:wght@700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    
    @yield('head')
</head>

<body class="bg-circuit">
    <!-- Animated Background -->
    <div class="animated-bg">
        <div id="particles-js"></div>
    </div>

    @include('layouts.navbar')

    <main class="container">
        @yield('content')
    </main>

    @include('layouts.footer')

    @yield('scripts')
</body>
</html>