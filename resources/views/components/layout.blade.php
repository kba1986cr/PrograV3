<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $metaTitle ?? 'Default title' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default description' }}" />
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite(['resources/css/app.css', 'resources/css/styleIndex.css', 'resources/js/app.js', 'resources/js/scriptIndex.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script src="{{ url('fullcalendar/es.global.js') }}"></script>

</head>

<body class="fantialiased bg-slate-100 dark:bg-slate-900">

    <x-navigation />
    @session('status')
        <div>{{ $value }}</div>
    @endsession
    <main class="flex-1 p-4">
        {{ $slot }}
    </main>

</body>
<footer class="py-10 px-4">
    <div class="mx-auto flex max-w6 flex-col items-center space-y-4 md:flex md:justify-between">
        <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
    </div>
</footer>


</html>
 