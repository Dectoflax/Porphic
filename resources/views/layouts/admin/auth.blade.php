<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('resources/svg/Icon.svg', app()->isProduction()) }}" type="image/x-icon">
    <title>{{ config('app.name') }} | Admin</title>
    <!-- Scripts -->
    @laraflashStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="bg-gray-100">
    <livewire:laraflash.container />
    <div class="mx-5 mt-10 flex justify-between items-center">
        <button type="button" onclick="window.history.back()"
            class="bg-white drop-shadow-lg rounded-lg px-5 font-bold py-1.5 uppercase flex items-center w-fit text-blue-500 space-x-2 border-t">
            <i class="ri-arrow-left-fill text-xl"></i>
            <span>Back</span>
        </button>

        <button type="button"
            class="bg-white drop-shadow-lg rounded-lg px-5 font-bold py-1.5 uppercase flex items-center w-fit text-blue-500 space-x-2 border-t">
            <i class="ri-home-line text-xl"></i>
            <a href="{{ route('blog') }}">Home</a>
        </button>
    </div>

    <div class="container antialiased mt-16 py-6">
        @yield('content')
    </div>

</body>

<livewire:scripts />

</html>
