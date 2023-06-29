@extends('layouts.admin')

@section('content')
<section x-data="{ admin: true }" class="container px-4 mx-auto">
    <div class="flex overflow-x-auto whitespace-nowrap justify-center items-center">
        <button x-cloak
            :class="[admin ? 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 border border-b-0 border-gray-300 sm:px-4 rounded-t-md -px-1 whitespace-nowrap focus:outline-none' : 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 bg-transparent border-b border-gray-300 sm:px-4 -px-1 whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400']"
            @click="admin = true">
            <i class="ri-admin-line text-xl"></i>
            <span class="mx-1 text-sm sm:text-base">
                Admins
            </span>
        </button>

        <button x-cloak
            :class="[!admin ? 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 border border-b-0 border-gray-300 sm:px-4 rounded-t-md -px-1 whitespace-nowrap focus:outline-none' : 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 bg-transparent border-b border-gray-300 sm:px-4 -px-1 whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400']"
            @click="admin = false">
            <i class="ri-team-line text-xl"></i>

            <span class="mx-1 text-sm sm:text-base">
                Users
            </span>
        </button>
    </div>
    <div x-show='admin'>
        <livewire:admin.admin-shell />
    </div>
    <div x-show='!admin'>
        <livewire:admin.user-shell />
    </div>
</section>
@endsection
