<div x-data="{ visible: @entangle('visible') }" x-show='visible'
    class="flex fixed z-30 justify-center items-center bg-black bg-opacity-20 top-0 w-full h-screen">
    <div
        class="flex flex-col justify-center items-center w-60 lg:max-w-sm mx-2 z-30 overflow-hidden bg-white rounded-lg shadow-md  -mt-10 p-3">
        <div class="flex items-center justify-center">
            <i class="{{ $icon }} text-{{ $color }}-500 text-3xl"></i>
        </div>

        <div class="flex justify-center items-center flex-col m-3">
            <span class="font-semibold text-{{ $color }}-500">{{ $header }}</span>
            <p class="text-sm text-gray-600  mt-3">{{ $message }}</p>
        </div>

        <button type="button" @click='visible = false'
            class="flex capitalize justify-center items-center text-white font-semibold cursor-pointer bg-{{ $color }}-500 px-10 py-1.5 rounded-lg">
            <span>Close</span>
        </button>
    </div>
</div>
