<div x-data="{ isOpen: @entangle('open') }" class="relative flex justify-center">

    <div x-show="isOpen" class="fixed inset-0 z-10 overflow-y-auto bg-black bg-opacity-20" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform ml-16 bg-white rounded-lg shadow-xl  sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                <div>
                    <div class="flex items-center justify-center ">
                        <img class="object-cover w-14 h-14 rounded-full ring ring-white"
                            src="{{ asset('resources/svg/Logo_ring.svg', app()->isProduction()) }}" alt="">
                    </div>

                    <div class="mt-4 text-center">
                        <h3 class="font-medium leading-6 text-gray-800 capitalize " id="modal-title">
                            Invite your team
                        </h3>
                    </div>
                </div>
                <div class="mt-4">
                    <select wire:model.defer='role'
                        class="w-full block h-10 px-4 mx-1 text-sm text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                        @foreach ($roles as $key => $role)
                        <option value="{{ $key }}">
                            {{ $role }}
                        </option>
                        @endforeach
                    </select>
                    <x-auth.error :key="'role'" />
                </div>
                <div class="mt-2">
                    <input wire:model.defer='email' type="text" type="email" placeholder="Email address"
                        class="w-full block h-10 px-4 mx-1 text-sm text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring">
                    <x-auth.error :key="'email'" />
                </div>

                <div class="mt-4 sm:mt-6 sm:flex sm:items-center sm:-mx-2">
                    <button @click="isOpen = false"
                        class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2    hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                        Cancel
                    </button>
                    <button wire:click='invite'
                        class="w-full px-4 py-1 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        <i wire:loading.class='hidden' class="ri-mail-send-fill text-lg"></i>
                        <i wire:loading class="ri-loader-2-line text-lg animate-spin"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
