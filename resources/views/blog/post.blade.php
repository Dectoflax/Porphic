@extends('layouts.blog')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <div class="lg:flex lg:-mx-6">
            <div class="lg:w-3/4 lg:px-6 space-y-3">
                <div itemscope itemtype="http://schema.org/Article">

                    <a href="{{ route('blog.category', ['category' => $post->categoryModel]) }}"
                        class="bg-blue-500 text-white font-bold uppercase text-sm px-10 py-1.5 w-fit">{{
                        $post->categoryModel->getAttribute('name') }}</a>

                    <div class="flex justify-center items-center text-center mt-5">
                        <h1 itemprop="headline"
                            class="max-w-lg mb-4 text-2xl font-semibold leading-tight text-gray-800 dark:text-white">
                            {{ $post->getAttribute('topic') }}
                        </h1>
                    </div>

                    <div class="flex items-center mb-3">
                        <img class="object-cover object-center w-10 h-10 rounded-full"
                            src="{{ $post->author->avatar() }}" alt="{{ $post->author->getAttribute('name') }}">

                        <div class="mx-4">
                            <span class="text-sm text-gray-700 dark:text-gray-200">{{
                                $post->author->getAttribute('name') }}
                            </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $post->author->getRole() }}</p>
                        </div>
                    </div>

                    <img class="object-cover object-center w-full h-80 xl:h-[28rem] rounded-xl"
                        src="{{ $post->thumbnail->url() }}" alt="{{ $post->thumbnail->description() }}">

                    <x-article-body :value="$post->getAttribute('body')" />

                    {{-- Comments Section begins here --}}

                    <livewire:blog.comments :post="$post->getAttribute('id')">

                </div>
            </div>

            {{-- May also like starts here --}}

            <div class="lg:w-1/4 mt-5 lg:mt-0">
                <span class="bg-blue-500 text-white font-bold uppercase text-sm px-10 py-1.5 w-fit">You may also
                    like</span>
                <hr class="border border-blue-500 mt-5">
                <div class="mt-8 lg:px-3">

                    @foreach ($suggestions as $suggestion)
                    <div>
                        <livewire:blog.maylike-preview :post="$suggestion" />
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
