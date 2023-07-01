<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('resources/svg/Icon.svg', app()->isProduction()) }}" type="image/x-icon">
    <title>{{ config('app.name') }} | {{ auth('admin')->user()->getAttribute('username') }}</title>
    <!-- Scripts -->
    @laraflashStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="bg-gray-100">

    <x-admin.header />
    <livewire:laraflash.container />
    <div class="antialiased ml-16 mt-16 p-5">
        @yield('content')
    </div>

</body>

<livewire:scripts />

</html>
