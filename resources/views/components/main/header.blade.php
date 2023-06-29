<nav x-data="{ isOpen: false }" class="fixed top-0 z-40 w-full rounded-b bg-white shadow">
    <div class="container mx-auto px-3 py-2 md:flex md:items-center md:justify-between">
        <div class="flex items-center justify-between py-1">
            <div class="flex items-center justify-center">
                <a href="{{ route('blog') }}"><img width="45px" height="45px"
                        src="{{ asset('resources/svg/Logo_ring.svg', \app()->isProduction()) }}" alt="logo"></a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden lg:hidden">
                <button x-cloak @click="isOpen = !isOpen" type="button"
                    class="hover:text-accent text-black focus:text-blue-600 focus:outline-none"
                    aria-label="toggle menu">
                    <i x-show="!isOpen" class="ri-menu-3-fill text-xl"></i>
                    <i x-show="isOpen" class="ri-close-fill text-xl"></i>
                </button>
            </div>
        </div>

        <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
            class="text-accent absolute inset-x-0 z-20 mr-3 w-full border-t bg-white px-6 py-4 shadow transition-all duration-300 ease-in-out md:relative md:top-0 md:mt-0 md:flex md:w-auto md:translate-x-0 md:items-center md:border-none md:bg-transparent md:p-0 md:opacity-100 md:shadow-none">
            <div class="flex flex-col text-center text-sm uppercase md:mx-3 md:flex-row">

                @auth('admin')
                <a class="my-2 transform rounded-lg px-3 py-1 text-black transition-colors duration-300 mx-2 hover:border-b hover:border-blue-500 hover:text-blue-600 md:my-0"
                    href="{{ route('admin.dash') }}">Dashboard</a>
                @endauth

                <a class="my-2 transform rounded-lg px-3 py-1 text-black transition-colors duration-300 mx-2 hover:border-b hover:border-blue-500 hover:text-blue-600 md:my-0"
                    href="{{ route('blog') }}">Blog</a>
                <div x-data="{ dropped: false }" class="relative inline-block">
                    <!-- Dropdown toggle button -->
                    <button x-on:mouseover="dropped = true" x-on:mouseleave="dropped = false"
                        class="my-2 uppercase transform rounded-lg px-3 py-1 text-black transition-colors duration-300 mx-2 hover:border-b hover:border-blue-500 hover:text-blue-600 md:my-0">
                        <span>Categories</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-show="dropped" x-on:mouseover="dropped = true" x-on:mouseleave="dropped = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="absolute flex flex-col space-y-2 right-0 z-20 w-48 py-3 mt-2 origin-top-right bg-white rounded-md shadow-xl ">
                        @foreach ($categories as $category)
                        <a class="my-2 transform rounded-lg px-3 py-1 text-black transition-colors duration-300 mx-2 hover:border-b hover:border-blue-500 hover:text-blue-600 md:my-0"
                            href="{{ route('blog.category', ['category' => $category]) }}">{{
                            $category->getAttribute('name') }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
