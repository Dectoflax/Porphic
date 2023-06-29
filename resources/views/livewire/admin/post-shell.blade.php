<div>
    <div x-data="{ checked: false }">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 ">Posts</h2>

                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full  ">
                    {{ $count }} {{ Str::plural('post', $count) }}
                </span>
            </div>
        </div>
    </div>
</div>
