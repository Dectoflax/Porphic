@extends('layouts.admin.auth')

@section('content')
<div class="lg:w-full mx-5 max-w-sm lg:mx-auto overflow-hidden drop-shadow-xl border-t bg-white rounded-lg shadow-md ">
    <div class="px-6 py-4">
        <div class="flex justify-center mx-auto">
            <img class="w-auto h-10 sm:h-10" src="{{ asset('resources/svg/Logo_ring.svg', app()->isProduction()) }}"
                alt="">
        </div>

        <h3 class="mt-3 text-xl font-medium text-center text-gray-600 ">Recover Password</h3>

        <p class="mt-1 text-center text-gray-500 ">Enter email to reset</p>

        <livewire:admin.auth.password.forgot-form />
    </div>
</div>
@endsection
