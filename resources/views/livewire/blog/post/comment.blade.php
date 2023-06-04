<div x-data="{ opened: false, reply: false }">
    <div class="space-y-1 text-sm">
        <div class="flex justify-between items-center px-2 text-gray-400 lg:w-3/4">
            <span>{{ $name }}</span>
            <span>{{ $date }}</span>
        </div>
        {{-- Do your work, then step back. --}}
        <x-blog.comment-body :comment="$body" />
    </div>
    <div class="flex justify-between items-center text-xs lg:w-3/4 my-1">
        @auth
        <span x-cloak @click="reply = !reply" class="cursor-pointer text-blue-500 border border-blue-500 px-5 py-0">
            <i class="ri-reply-line text-xl"></i></span>
        @endauth
        <span x-cloak @click="opened = !opened"
            class="cursor-pointer text-blue-500 border border-blue-500 px-5 py-1.5 capitalize">view replies</span>
    </div>
    @auth
    <div x-show='reply'>
        <livewire:blog.post.comment-reply-form :comment="$commentId">
    </div>
    @endauth
    <div x-show="opened">
        @forelse ($replies as $reply)
        <livewire:blog.post.comment-reply :reply="$reply" />
        @empty
        <span class="text-xs">No replies here</span>
        @endforelse
    </div>
</div>
