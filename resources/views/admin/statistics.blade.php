@extends('layouts.admin')

@section('content')
<div class="">
    <div class="flex flex-col space-y-7 lg:grid lg:grid-cols-4 lg:gap-x-5 lg:gap-y-8 lg:space-y-0 mt-5">
        @foreach ($stats as $stat)
        <x-admin.statistic.card :model="$stat" />
        @endforeach
    </div>
    <div class="flex flex-col space-y-3 lg:grid lg:grid-cols-2 lg:gap-5 lg:flex-none lg:space-y-0 my-5">
        <div class="bg-white drop-shadow-lg rounded-lg p-5 border-x-4 border-blue-500">
            <div class="text-lg font-bold text-gray-500 uppercase mb-3">
                Weekly User Registrations
            </div>
            <div>
                {!! $users->container() !!}
            </div>
        </div>
        <div class="bg-white drop-shadow-lg rounded-lg p-5 border-x-4 border-blue-500">
            <div class="text-lg font-bold text-gray-500 uppercase mb-3">
                Weekly Post views
            </div>
            <div>
                {!! $views->container() !!}
            </div>
        </div>
    </div>
</div>
{!! $views->script() !!}
{!! $users->script() !!}
@vite(['resources/js/chart.js'])
@endsection
