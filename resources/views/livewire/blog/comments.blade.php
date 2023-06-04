<div x-data="{ comments: false, create: false }">
    @auth()
    <div x-cloak @click="create = !create"
        class="bg-blue-500 text-white cursor-pointer font-bold uppercase text-sm my-2 px-10 py-1 w-fit">
        <span>Add comment</span>
    </div>
    <div x-show='create'>
        <livewire:blog.post.comment-form :post="$postId">
    </div>
    @endauth

    <div wire:click='comments' x-cloak @click="comments = !comments"
        class="bg-blue-500 text-white cursor-pointer font-bold uppercase text-sm my-2 px-10 py-1 w-fit">
        <span x-show='comments'>Hide comments</span>
        <span x-show='!comments'>Show comments</span>
    </div>
    <div x-show='comments'>
        @if ($count > 0)
        <div class="space-y-2 lg:w-3/4">
            @foreach ($toPass as $comment)
            <livewire:blog.post.comment :comment="$comment" />
            @endforeach
        </div>
        @else
        <span>No comments here</span>
        @endif
    </div>
</div>
