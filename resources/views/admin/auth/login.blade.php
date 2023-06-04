@extends('layouts.admin.auth')

@section('content')
<div
    class="lg:w-full mx-5 max-w-sm lg:mx-auto overflow-hidden bg-white rounded-lg drop-shadow-xl border-t dark:bg-gray-800">
    <div class="px-6 py-4">
        <div class="flex justify-center mx-auto">
            <img class="w-auto h-10 sm:h-10" src="{{ asset('resources/svg/Logo_ring.svg', app()->isProduction()) }}"
                alt="">
        </div>

        <h3 class="mt-3 text-xl font-medium text-center text-gray-600 dark:text-gray-200">Welcome Back</h3>

        <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Login to continue</p>

        <livewire:admin.auth.login-form />
    </div>
</div>
@endsection
