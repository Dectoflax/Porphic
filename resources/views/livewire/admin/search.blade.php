<div x-data="{ searchVisible: @entangle('searchVisible') }">
    <div class="flex items-center w-40 lg:w-72">
        <span class="absolute">
            <i wire:loading.class='hidden' class="ri-search-line w-6 h-6 mx-3 text-gray-400 dark:text-gray-500"></i>
            <i wire:loading class="ri-loader-2-line animate-spin w-6 h-6 mx-3 text-blue-400 dark:text-blue-500"></i>
        </span>
        <input wire:model='search' wire:input="search" type="text" placeholder="Search..."
            class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 bg-white border border-gray-200 rounded-lg pl-11 pr-5 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
    </div>
    <div x-show='searchVisible' @click.away='searchVisible = false' x-on:mouseleave='searchVisible = false'
        class="fixed bg-white divide-y-2 drop-shadow-lg z-30 rounded-lg border top-16 flex flex-col w-40 lg:w-72 overflow-auto max-h-screen">

        <div class="p-1 flex flex-col justify-center items-center">
            <span class="text-gray-400 border-b w-full text-center uppercase text-sm font-semibold">Posts</span>
            <div class="text-sm divide-y overflow-auto max-h-52 w-full">
                @forelse ($posts as $post)
                <a class="py-1 mt-1 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center"
                    href="{{ $post->getUri() }}">
                    <span>{{ $post->getName() }}</span>
                </a>
                @empty
                <span
                    class="py-1 mt-1 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center">
                    <i class="ri-search-line hidden lg:block"></i>
                    <span>No match</span>
                </span>
                @endforelse
            </div>
        </div>

        <div class="p-1 flex flex-col justify-center items-center">
            <span class="text-gray-400 border-b w-full text-center uppercase text-sm font-semibold">Categories</span>
            <div class="text-sm divide-y overflow-auto max-h-52 w-full">
                @forelse ($categories as $category)
                <a class="py-1 mt-1 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center"
                    href="{{ $category->getUri() }}">
                    <span>{{ $category->getName() }}</span>
                </a>
                @empty
                <span
                    class="py-1 mt-1 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center">
                    <i class="ri-search-line hidden lg:block"></i>
                    <span>No match</span>
                </span>
                @endforelse
            </div>
        </div>

        <div class="p-1 flex flex-col justify-center items-center">
            <span class="text-gray-400 border-b w-full text-center uppercase text-sm font-semibold">Admins</span>
            <div class="text-sm divide-y overflow-auto max-h-52 w-full">
                @forelse ($admins as $admin)
                <a class="py-1 mt-1 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center"
                    href="{{ $admin->getUri() }}">
                    <i class="ri-user-line"></i>
                    <span>{{ $admin->getName() }}</span>
                </a>
                @empty
                <span
                    class="py-1 mt-1 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center">
                    <i class="ri-search-line hidden lg:block"></i>
                    <span>No match</span>
                </span>
                @endforelse
            </div>
        </div>

        <div class="p-1 flex flex-col justify-center items-center">
            <span class="text-gray-400 border-b w-full text-center uppercase text-sm font-semibold">Users</span>
            <div class="text-sm divide-y overflow-auto max-h-52 w-full">
                @forelse ($users as $user)
                <a class="py-1 mt-1 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center"
                    href="{{ $user->getUri() }}">
                    <span>{{ $user->getName() }}</span>
                </a>
                @empty
                <span
                    class="py-1 mt-1 hover:bg-blue-200 text-blue-400 hover:text-gray-400 hover:rounded flex space-x-1 justify-start px-10 items-center">
                    <i class="ri-search-line hidden lg:block"></i>
                    <span>No match</span>
                </span>
                @endforelse
            </div>
        </div>

    </div>
</div>
