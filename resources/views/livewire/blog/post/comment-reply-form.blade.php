<form method="post" wire:submit.prevent='create' class="flex flex-col w-2/3">
    <div>
        <textarea placeholder="Reply here" class="w-full h-16 lg:h-20 ounline-none ring-1 ring-blue-500 rounded"
            wire:model.defer="body"></textarea>
        <x-auth.error :key="'body'" />
    </div>
    <div class="flex justify-end items-center">
        <button type="submit" class="text-white bg-blue-500 px-6 py-1">
            <i wire:loading class="ri-restart-line animate-spin"></i>
            <i wire:loading.class='hidden' class="ri-reply-line"></i>
        </button>
    </div>
</form>
