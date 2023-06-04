<tr x-data="{ show: @entangle('show') }" x-show='show'>
    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
        <div class="inline-flex items-center gap-x-3">
            <input wire:model='select' type="checkbox"
                class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700">

            <div class="flex items-center gap-x-2">
                <img class="object-cover w-10 h-10 rounded-full" src="{{ $avatar }}" alt="{{ $adminData['name'] }}">
                <div>
                    <h2 class="font-medium text-gray-800 dark:text-white ">{{ $adminData['name'] }}</h2>
                    <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                        {{ '@' }}{{ $adminData['username'] }}
                    </p>
                </div>
            </div>
        </div>
    </td>
    <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">

            <h2 class="text-sm font-normal text-emerald-500">Active</h2>
        </div>
    </td>
    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
        {{-- {{ $adminData['role']['name'] }} --}}
        {{-- todo --}}
    </td>
    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
        {{ $adminData['email'] }}
    </td>
    <td class="px-4 py-4 text-sm whitespace-nowrap">
        <div class="flex items-center gap-x-2">
            <p class="px-3 py-1 text-xs text-indigo-500 rounded-full dark:bg-gray-800 bg-indigo-100/60">
                Design</p>
            <p class="px-3 py-1 text-xs text-blue-500 rounded-full dark:bg-gray-800 bg-blue-100/60">
                Product</p>
            <p class="px-3 py-1 text-xs text-pink-500 rounded-full dark:bg-gray-800 bg-pink-100/60">
                Marketing</p>
        </div>
    </td>
    <td class="px-4 py-4 text-sm whitespace-nowrap">
        <div class="flex items-center gap-x-6">

            <button
                class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button>

            <button
                wire:click="$emit('alert.confirmation', '{`event`: `admin.delete`, `message`: `Are you sure to want to delete this admin account`, `params`: `{{ $adminId }}` }')"
                class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>

        </div>
    </td>
</tr>
