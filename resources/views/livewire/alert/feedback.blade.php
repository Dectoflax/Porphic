<div x-data="{ visible: @entangle('visible') }" x-show='visible'
    class="flex fixed z-30 justify-center items-center bg-black bg-opacity-20 top-0 w-full h-screen">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
            class="relative inline-block p-4 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl sm:max-w-sm rounded-xl  sm:my-8 sm:w-full sm:p-6">
            <div class="flex items-center justify-center mx-auto">
                <img class="h-full rounded-lg"
                    src="https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                    alt="" />
            </div>

            <div class="mt-5 text-center">
                <h3 class="text-lg font-medium text-gray-800 " id="modal-title">
                    Blog post published
                </h3>

                <p class="mt-2 text-gray-500 ">
                    This blog post has been published. Team members will be
                    able to edit this post.
                </p>
            </div>

            <div class="flex items-center justify-between w-full mt-5 gap-x-2">
                <input type="text" value="https://merakiui.com/project"
                    class="flex-1 block h-10 px-4 text-sm text-gray-700 bg-white border border-gray-200 rounded-md    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" />

                <button
                    class="rounded-md hidden sm:block p-1.5 text-gray-700 bg-white border border-gray-200    focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring transition-colors duration-300 hover:text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </button>
            </div>

            <div class="mt-4 sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                <button @click="isOpen = false"
                    class="px-4 sm:mx-2 w-full py-2.5 text-sm font-medium    tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                    Cancel
                </button>

                <button
                    class="px-4 sm:mx-2 w-full py-2.5 mt-3 sm:mt-0 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>
