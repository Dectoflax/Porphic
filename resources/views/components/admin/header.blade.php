<div x-data='{ shown: false }'>
    <aside class="fixed left-0 top-0 bottom-0 z-30 flex flex-col items-center w-16 py-5 bg-white drop-shadow-xl  ">
        <nav class="flex flex-col flex-1 space-y-2">
            <a href="{{ config('binkap.website') }}">
                <img class="w-auto h-10" src="{{ asset('resources/svg/Logo_ring.svg', \app()->isProduction()) }}"
                    alt="">
            </a>

            <a x-data="{ tooltip: false }" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                href="{{ route('home') }}"
                class="p-1.5 text-blue-500 focus:outline-nones transition-colors duration-200 rounded-lg  hover:bg-blue-100 text-center">
                <i class="ri-home-line text-xl"></i>

                <span x-show="tooltip" class="absolute z-20 ml-7 bg-white drop-shadow px-6 py-2 rounded-lg">Home</span>
            </a>

            <a x-data="{ tooltip: false }" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                href="{{ route('admin.stat') }}"
                class="p-1.5 text-blue-500 focus:outline-nones transition-colors duration-200 rounded-lg   hover:bg-blue-100 text-center">
                <i class="ri-line-chart-line text-xl"></i>

                <span x-show="tooltip"
                    class="absolute z-20 ml-7 -mt-5 bg-white drop-shadow px-6 py-2 rounded-lg">Statistics</span>
            </a>

            <a x-data="{ tooltip: false }" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                href="{{ route('admin.administration') }}"
                class="p-1.5 text-blue-500 focus:outline-nones transition-colors duration-200 rounded-lg   hover:bg-blue-100 text-center">
                <i class="ri-admin-line text-xl"></i>

                <span x-show="tooltip"
                    class="absolute z-20 ml-7 -mt-5 bg-white drop-shadow px-6 py-2 rounded-lg">Administration</span>
            </a>

            <a x-data="{ tooltip: false }" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                href="{{ route('admin.blog') }}"
                class="p-1.5 text-blue-500 focus:outline-nones transition-colors duration-200 rounded-lg   hover:bg-blue-100 text-center">
                <i class="ri-list-check-2 text-xl"></i>

                <span x-show="tooltip"
                    class="absolute z-20 ml-7 -mt-5 bg-white drop-shadow px-6 py-2 rounded-lg">Blog</span>
            </a>
            <a x-data="{ tooltip: false }" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                href="{{ route('admin.settings') }}"
                class="p-1.5 text-blue-500 focus:outline-nones transition-colors duration-200 rounded-lg   hover:bg-blue-100 text-center">
                <i class="ri-list-settings-line text-xl"></i>
                <span x-show="tooltip"
                    class="absolute z-20 ml-7 -mt-5 bg-white drop-shadow px-6 py-2 rounded-lg">Settings</span>
            </a>
        </nav>

        <div class="flex flex-col space-y-1">
            <a href="{{ route('admin.newsletter') }}" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                x-on:mouseleave="tooltip = false"
                class="p-1.5 text-blue-500 focus:outline-nones transition-colors duration-200 rounded-lg   hover:bg-blue-100 text-center">
                <i class="ri-newspaper-line text-xl"></i>
                <span x-show="tooltip"
                    class="absolute z-20 ml-7 -mt-5 bg-white drop-shadow px-6 py-2 rounded-lg">Newsletter</span>
            </a>
            <a href="{{ route('admin.media') }}" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                x-on:mouseleave="tooltip = false"
                class="p-1.5 text-blue-500 focus:outline-nones transition-colors duration-200 rounded-lg   hover:bg-blue-100 text-center">
                <i class="ri-file-line text-xl"></i>
                <span x-show="tooltip"
                    class="absolute z-20 ml-7 -mt-5 bg-white drop-shadow px-6 py-2 rounded-lg">Media</span>
            </a>
            <a href="{{ route('admin.trash') }}" x-data="{ tooltip: false }" x-on:mouseover="tooltip = true"
                x-on:mouseleave="tooltip = false"
                class="p-1.5 text-blue-500 focus:outline-nones transition-colors duration-200 rounded-lg   hover:bg-blue-100 text-center">
                <i class="ri-delete-bin-6-fill text-xl"></i>
                <span x-show="tooltip"
                    class="absolute z-20 ml-7 -mt-5 bg-white drop-shadow px-6 py-2 rounded-lg">Trash</span>
            </a>
        </div>
    </aside>
    <div class="fixed px-5 py-3 bg-white left-0 ml-16 top-0 z-30 right-0 shadow-lg flex justify-between items-center">
        <livewire:admin.search>
            <div class="flex items-center gap-x-5">
                <i class="ri-notification-3-line text-blue-500 ring-1 rounded-full px-1 ring-blue-300 "></i>
                <img x-cloak @click="shown = !shown" class="object-cover w-10 h-10 rounded-full ring-1 ring-blue-300 "
                    src="{{ asset('resources/svg/Logo_ring.svg', \app()->isProduction()) }}" alt="">
            </div>
    </div>
    <div x-show='shown' @click.away='shown = false'
        class="fixed bg-white divide-y-2 drop-shadow-lg z-30 rounded-lg border right-0 mr-1 lg:right-3 top-16 flex flex-col">
        <a class="py-2 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center"
            href="{{ route('admin.stat') }}">
            <i class="ri-dashboard-line"></i>
            <span>Dashboard</span>
        </a>
        <a class="py-2 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center"
            href="{{ route('admin.profile') }}">
            <i class="ri-user-line"></i>
            <span>Profile</span>
        </a>
        <livewire:admin.auth.logout />
    </div>
</div>
