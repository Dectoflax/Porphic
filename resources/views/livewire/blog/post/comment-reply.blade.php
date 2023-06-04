<div class="space-y-1 text-xs ml-8 my-1.5 lg:w-2/3">
    <div class="flex justify-between items-center px-2 text-gray-400">
        <span>{{ $name }}</span>
        <span>{{ $date }}</span>
    </div>
    {{-- Do your work, then step back. --}}
    <x-blog.comment-reply-body :reply="$body" />
</div>
