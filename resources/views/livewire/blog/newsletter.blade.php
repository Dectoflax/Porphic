<section
    class="flex flex-col max-w-4xl mx-auto overflow-hidden bg-white rounded-lg my-5 shadow-lg dark:bg-blue-800 md:flex-row md:h-48">
    <div class="md:flex md:items-center md:justify-center md:w-1/2 md:bg-blue-700 md:dark:bg-blue-800">
        <div class="px-6 py-6 md:px-8 md:py-0">
            <h2 class="text-lg font-bold text-gray-700 dark:text-white md:text-gray-100">Sign Up For <span
                    class="text-blue-600 dark:text-blue-400 md:text-blue-300">Newsletter</span> and Updates</h2>
        </div>
    </div>

    <div class="flex items-center justify-center pb-6 md:py-0 md:w-1/2">
        <form method="POST" wire:submit.prevent='subscribe'>
            <div
                class="flex flex-col p-1.5 overflow-hidden border rounded-lg dark:border-gray-600 lg:flex-row dark:focus-within:border-blue-300 focus-within:ring focus-within:ring-opacity-40 focus-within:border-blue-400 focus-within:ring-blue-300">
                <input wire:model.defer='email'
                    class="px-6 py-2 text-gray-700 placeholder-gray-500 bg-white outline-none dark:bg-blue-800 dark:placeholder-gray-400 focus:placeholder-transparent dark:focus:placeholder-transparent"
                    type="text" name="email" placeholder="Enter your email" aria-label="Enter your email">

                <button
                    class="px-4 py-3 text-sm font-medium tracking-wider text-gray-100 uppercase transition-colors duration-300 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:bg-blue-600 focus:outline-none">
                    <span wire:loading.class='hidden'>subscribe</span>
                    <i wire:loading class="ri-loader-2-line animate-spin text-lg"></i>
                </button>
            </div>
            <x-auth.error :key="'email'" />
        </form>
    </div>
</section>
