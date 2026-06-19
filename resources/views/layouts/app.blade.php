<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'Ventas Pro')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-light">

<div class="wrapper">

    <x-sidebar />

    <div class="main-content">

        <x-navbar />

        <main class="p-4">

            <x-flash-message />

            @yield('content')

        </main>

        <x-footer />

    </div>

</div>

@stack('scripts')

</body>
</html>