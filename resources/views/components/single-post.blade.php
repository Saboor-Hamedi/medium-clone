<div class="flex w-full flex-1 flex-col gap-6 rounded-4xl justify-center items-center">
    <div class="w-full max-w-5xl space-y-6">
        <!-- Featured Image -->
        @if ($post->image)
            <div class="w-full h-96 rounded-3xl overflow-hidden shadow-lg">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                    class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Post Header -->
        <div class="space-y-4">
            <!-- Title -->


            <!-- Author and Date -->
            <div class="h-40 sm:h-60 w-full bg-gray-100 dark:bg-gray-700 overflow-hidden">
                <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('storage/posts/image1.png') }}"
                    alt="{{ $post->title ?? 'Post image' }}" onerror="this.src='{{ asset('storage/posts/image1.png') }}'"
                    class="w-full h-full object-cover object-center" />
            </div>
            <div class="flex items-center gap-4">


                <div>
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
                        {{ $post->title }}
                    </h1>
                    <p class="font-medium text-gray-900 dark:text-gray-200">
                        {{ $post->user->name }}
                    </p>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Published {{ $post->created_at->format('F j, Y') }}
                        • {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Post Content -->
        <div class="prose max-w-none dark:prose-invert">
            <p class="text-[10px] text-gray-500 dark:text-gray-400">
                Category: {{ $post->getCategoryName() }}
            </p>
            {!! $post->content !!}
        </div>
    </div>
</div>
