<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Vitrina Rampicentro') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-rampi-primary text-white p-4">
        <!-- Navegación -->
    </nav>

    <main class="container mx-auto mt-4">
        @yield('content')
    </main>

    <footer class="bg-gray-200 p-4 text-center">
        © {{ date('Y') }} Vitrina Rampicentro
    </footer>
</body>
</html>