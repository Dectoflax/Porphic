<form method="post" wire:submit.prevent='login'>
    <div class="w-full mt-4">
        <input wire:model.defer='email'
            class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
            type="email" placeholder="Email Address" aria-label="Email Address" />
    </div>
    <x-auth.error :key="'email'" />

    <div class="w-full mt-2">
        <div class="flex justify-end items-center text-sm text-gray-500">
            <a href="{{ route('admin.password.forgot') }}">Forgot password?</a>
        </div>
        <input wire:model.defer='password'
            class="block w-full px-4 py-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
            type="password" placeholder="Password" aria-label="Password" />
    </div>
    <x-auth.error :key="'password'" />

    <div class="flex items-center justify-between mt-4">
        <div class="flex justify-center items-center space-x-1">
            <input
                class="border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                wire:model.defer='remember' type="checkbox">
            <label class="text-sm text-gray-500" for="remember">Remember me</label>
        </div>

        <button type="submit"
            class="px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
            <span wire:loading.class='hidden'>Sign In</span>
            <i wire:loading class="ri-loader-2-line animate-spin text-lg"></i>
        </button>
    </div>
</form>
