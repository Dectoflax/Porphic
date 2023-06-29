@extends('layouts.admin')

@section('content')
<section x-data="{ active: 'category' }" class="container px-4 mx-auto">
    <div class="flex overflow-x-auto whitespace-nowrap justify-center items-center">
        <button x-cloak
            :class="[active == 'category' ? 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 border border-b-0 border-gray-300 sm:px-4 rounded-t-md -px-1  whitespace-nowrap focus:outline-none' : 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 bg-transparent border-b border-gray-300 sm:px-4 -px-1  whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400 ']"
            @click="active = 'category'">
            <i class="ri-list-check-2 text-xl"></i>

            <span class="mx-1 text-sm sm:text-base">
                Categories
            </span>
        </button>

        <button x-cloak
            :class="[(active == 'post') ? 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 border border-b-0 border-gray-300 sm:px-4 rounded-t-md -px-1  whitespace-nowrap focus:outline-none' : 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 bg-transparent border-b border-gray-300 sm:px-4 -px-1  whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400 ']"
            @click="active = 'post'">
            <i class="ri-article-line text-xl"></i>
            <span class="mx-1 text-sm sm:text-base">
                Posts
            </span>
        </button>

        <button x-cloak
            :class="[(active == 'draft') ? 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 border border-b-0 border-gray-300 sm:px-4 rounded-t-md -px-1  whitespace-nowrap focus:outline-none' : 'inline-flex items-center h-12 px-2 py-2 text-center text-gray-700 bg-transparent border-b border-gray-300 sm:px-4 -px-1  whitespace-nowrap cursor-base focus:outline-none hover:border-gray-400 ']"
            @click="active = 'draft'">
            <i class="ri-draft-line text-xl"></i>

            <span class="mx-1 text-sm sm:text-base">
                Drafts
            </span>
        </button>
    </div>
    <div x-show="(active == 'category')">
        <livewire:admin.category-shell />
    </div>
    <div x-show="(active == 'post')">
        <livewire:admin.post-shell />
    </div>
    <div x-show="(active == 'draft')">
        <livewire:admin.draft-shell />
    </div>
</section>
@endsection
