@use('Illuminate\Support\Facades\Vite')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('Titulo')</title>
     <!-- Styles / Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <style>
        /* {!! Vite::content('resources/css/app.css') !!} */
    </style>
    <script>
        /* {!! Vite::content('resources/js/app.js') !!} */

        window.Laravel = {!! json_encode([
            'alert' => session('alert')
        ]) !!};
    </script>
    @yield('head')
</head>
<body class="bg-secondary">
    <x-barra-nav/>
    @yield('contenido')
</body>
</html>
