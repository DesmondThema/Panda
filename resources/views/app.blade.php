<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panda Insights</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body>
    @yield('content')
    @stack('scripts')
    @livewireScripts
</body>
</html>
