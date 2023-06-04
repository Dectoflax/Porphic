<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, archive, follow">
    <link rel="canonical" href="{{ config('app.url') }}">
    <link rel="shortcut icon" href="{{ asset('resources/svg/Icon.svg', app()->isProduction()) }}" type="image/x-icon">
    @if (isset($category))
    <title>{{ config('app.name') }} - {{ $category->getAttribute('name') }}</title>
    <meta name="description" content="{{ $category->getAttribute('description') }}">
    <meta name="keywords" content="{{ $category->getAttribute('keywords') }}">
    @elseif (isset($post))
    <title>{{ config('app.name') }} - {{ $post->getAttribute('topic') }}</title>
    <meta name="description" content="{{ $post->getAttribute('description') }}">
    <meta name="keywords" content="{{ $post->getAttribute('keywords') }}">
    @else
    <title>{{ config('app.name') }}</title>
    @endif
    <!-- Scripts -->
    @if (isset($schema))
    {!! $schema->getSchema() !!}
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="bg-gray-100">

    <x-blog.header />
    <x-alert />
    <div class="antialiased mt-16">
        @yield('content')
    </div>

    <x-blog.footer />

</body>

<livewire:scripts />

</html>
