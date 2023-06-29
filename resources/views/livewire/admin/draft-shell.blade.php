<div x-data="{ checked: false }">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div class="flex items-center gap-x-3">
            <h2 class="text-lg font-medium text-gray-800 ">Drafts</h2>

            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full  ">
                {{ $count }} {{ Str::plural('draft', $count) }}
            </span>
        </div>
        <div class="flex items-center mt-4 gap-x-3">
            <button type="button"
                wire:click="$emit('alert.confirmation', '{`event`: `draft.selected.publish`, `message`: `Publish all selected drafts`}')"
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2 hover:bg-green-600">
                <i class="ri-check-fill text-md lg:text-lg"></i>
                <span>Publish</span>
            </button>

            <button
                wire:click="$emit('alert.confirmation', '{`event`: `draft.selected.delete`, `message`: `Delete all selected Drafts`}')"
                @click='checked = false'
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg sm:w-auto gap-x-2 hover:bg-red-600">
                <i class="ri-delete-bin-6-line text-md lg:text-lg"></i>
                <span>Delete</span>
            </button>
        </div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200  md:rounded-lg">


                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-50 ">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                    <div class="flex items-center gap-x-3">
                                        <i x-show='checked' x-on:click='checked = false'
                                            wire:click='$emit("draft.all.selected", false)'
                                            class="ri-checkbox-fill text-blue-500 text-xl"></i>
                                        <i x-show='!checked' x-on:click='checked = true'
                                            wire:click='$emit("draft.all.selected", true)'
                                            class="ri-checkbox-blank-line text-xl"></i>
                                        <span>Category</span>
                                    </div>
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                    <button class="flex items-center gap-x-2">
                                        <span>Owner</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                        </svg>
                                    </button>
                                </th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                    Topic</th>

                                <th scope="col"
                                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                    Keywords
                                </th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200  ">
                            @foreach ($drafts as $draft)
                            <livewire:admin.draft-data :draft="$draft" />
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-5">
                        {{ $drafts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
