<div wire:click='read' class="cursor-pointer">
    <img class="relative z-10 object-cover w-full rounded-md h-96" src="{{ $thumb }}" alt="{{ $thumbAlt }}">

    <div class="relative z-20 max-w-lg p-6 mx-auto -mt-20 bg-white rounded-md shadow ">
        <div class="font-semibold text-gray-800 hover:underline  md:text-xl">
            {{ $topic }}
        </div>

        <p class="mt-3 text-sm text-gray-500  md:text-sm">
            {{ $body }}
        </p>

        <p class="mt-3 text-sm text-blue-500">{{ $date }}</p>
    </div>
</div>
