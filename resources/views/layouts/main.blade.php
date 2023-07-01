<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('resources/svg/Icon.svg', app()->isProduction()) }}" type="image/x-icon">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    @laraflashStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="bg-gray-100">

    <x-main.header />
    <livewire:laraflash.container />
    <div class="antialiased mt-16">
        @yield('content')
    </div>

    <x-main.footer />

</body>

<livewire:scripts />

</html>
