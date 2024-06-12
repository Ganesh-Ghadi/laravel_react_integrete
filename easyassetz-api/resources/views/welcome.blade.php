<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('static/js/index.js') }}">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div id="root"></div>
        <script src="{{ asset('static/js/main.js') }}"></script>
    </body>
</html>
