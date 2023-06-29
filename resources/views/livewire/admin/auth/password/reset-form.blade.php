<form method="post" wire:submit.prevent='password'>
    <div class="w-full mt-4">
        <input wire:model.defer='password'
            class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
            type="password" placeholder="Create password" aria-label="Create Address" />
    </div>
    <x-auth.error :key="'password'" />

    <div class="w-full mt-4">
        <input wire:model.defer='password_confirmation'
            class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
            type="password" placeholder="Confirm password" aria-label="Confirm password" />
    </div>
    <x-auth.error :key="'password_confirmation'" />

    <div class="flex items-center justify-center mt-4">
        <button type="submit"
            class="px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
            <span wire:loading.class='hidden'>Reset password</span>
            <i wire:loading class="ri-loader-2-line animate-spin text-lg"></i>
        </button>
    </div>
</form>
