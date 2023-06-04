<div x-data="{ visible: @entangle('visible') }" x-show='visible' @click.away='visible = false'
    class="fixed right-0 top-20 flex mx-2 z-30 overflow-hidden transition-all duration-300 ease-in-out bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-center w-12 bg-{{ $color }}-500">
        <i class="{{ $icon }} text-white text-xl"></i>
    </div>

    <div class="px-4 py-2 -mx-3">
        <div class="mx-3">
            <span class="font-semibold text-{{ $color }}-500 dark:text-{{ $color }}-400">{{ $header }}</span>
            <p class="text-sm text-gray-600 dark:text-gray-200">{{ $message }}</p>
        </div>
    </div>
    <button type="button" @click='visible = false' class="flex justify-center items-center mr-1.5 cursor-pointer">
        <i class="ri-close-circle-fill text-{{ $color }}-500 text-lg"></i>
    </button>
    {{-- <div
        class="text-emerald-500 bg-emerald-500 text-red-500 bg-red-500 text-blue-500 bg-blue-500 text-yellow-500 bg-yellow-500">
    </div> --}}
</div>
