<div class="bg-white p-5 border-x-4 border-blue-500 rounded-lg drop-shadow-lg h-20 text-gray-400">
    <div
        class="bg-blue-500 h-12 w-12 rounded-lg ring-2 ring-blue-300 drop-shadow-xl absolute -mt-12 -ml-2 flex justify-center items-center">
        <i class="{{ $model->getIcon() }} text-white text-3xl"></i>
    </div>
    <div class="flex items-center justify-between h-full mt-1.5">
        <span class="font-semibold capitalize">{{ $model->getName() }}</span>
        <span class="font-bold text-2xl">{{ $model->getCount() }}</span>
    </div>
</div>
