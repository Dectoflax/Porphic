@extends('layouts.blog')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <div class="lg:flex lg:-mx-6">

            <div class="md:mx-6 mx-2">
                <h1 class="bg-blue-500 text-white font-bold uppercase text-sm px-10 py-1.5 w-fit">{{
                    $category->getAttribute('name') }}</h1>
                <hr class="border border-blue-500 mt-5 mb-3">

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 md:mx-3">
                    @foreach ($posts as $post)
                    <div>
                        <livewire:blog.latest-preview :post="$post" />
                    </div>
                    @endforeach
                </div>

                <div class="mx-5 my-3">
                    {{ $posts->links() }}
                </div>
            </div>

            <div class="lg:w-1/4 lg:mt-0 mt-10">
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
</section>
@endsection
