<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Oliva'))</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-store.header />

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container footer-inner">
            <span>Oliva Ecommerce Base</span>
            <span>Laravel {{ app()->version() }}</span>
        </div>
    </footer>
</body>
</html>
