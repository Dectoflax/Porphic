<div x-data="{ visible: @entangle('visible') }" x-show='visible'
    class="flex fixed z-30 justify-center items-center bg-black bg-opacity-20 top-0 w-full h-screen">
    <div class="flex items-end justify-center text-center sm:block sm:p-0" @click.away='visble = false'>
        <div
            class="relative inline-block p-4 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl sm:max-w-sm rounded-xl  sm:my-8 sm:w-full sm:p-6">
            <div class="flex items-center justify-center mx-auto">
                <img class="h-16 rounded-lg" src="{{ asset('resources/svg/Logo_ring.svg', app()->isProduction()) }}"
                    alt="logo" />
            </div>

            <div class="mt-5 text-center">
                <h3 class="text-lg font-medium text-gray-600 ">
                    {{ $message }} ?
                </h3>
            </div>

            <div class="mt-4 sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                <button @click="visible = false" wire:click='cancel'
                    class="px-4 sm:mx-2 w-full py-2.5 text-sm font-medium    tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                    Cancel
                </button>

                <button wire:click='confirmed'
                    class="px-4 sm:mx-2 w-full py-2.5 mt-3 sm:mt-0 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                    Confirm
                </button>

            </div>
        </div>
    </div>
</div>
