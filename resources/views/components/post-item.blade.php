<div
    class="max-w-5xl w-full mx-auto  
     border-b-1 border-gray-100 
       flex flex-col sm:flex-row-reverse overflow-hidden min-h-60">
    <!-- Image on the right (desktop), on top (mobile) -->
    <div class="sm:w-56 w-full flex-shrink-0">
        <div class="h-40 sm:h-60 w-full bg-gray-100 dark:bg-gray-700 overflow-hidden">
            <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('storage/posts/image1.png') }}"
                alt="{{ $post->title ?? 'Post image' }}" onerror="this.src='{{ asset('storage/posts/image1.png') }}'"
                class="w-full h-full object-cover object-center" />
        </div>

    </div>
    <!-- Content -->
    <div class="flex-1 flex flex-col justify-between p-5">
        <div>
            <small class="text-xs text-gray-500 dark:text-gray-400 mb-2 cursor-pointer">
                {{ $post->is_published ? 'public' : 'private' }}
            </small>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">
                {{ $post->title ?? 'Noteworthy technology acquisitions 2021' }}
            </h3>
             <p class="text-[10px] text-gray-500 dark:text-gray-400">
                Category: {{ $post->getCategoryName() }}
            </p>
            <p class="text-gray-700 dark:text-gray-300 text-base mb-3 line-clamp-3">
                
                {{ Str::words($post->content ?? 'Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.', 35) }}
            </p>
            <p class="text-gray-700 dark:text-gray-300 text-base mb-3 line-clamp-3">
                <a href="{{ route('posts.show', ['post' => $post->slug ?? '']) }}"
                    class="text-gray-800 font-bold hover:underline">
                    Continue reading...
                </a>
            </p>
        </div>
        <div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                {{ $post->getTime() }} by {{ Str::ucfirst($post->user->name ?? 'Unknown Author') }}
            </p>
            <div class="flex gap-2">
                @can('update', $post)
                    <x-ui.button href="{{ route('posts.edit', ['post' => $post->slug ?? '']) }}" style="success"
                        icon="fa-solid fa-pen-to-square">
                        Edit
                    </x-ui.button>
                    
                @endcan

                @can('delete', $post)
                    <form action="{{ route('posts.destroy', ['post' => $post->slug]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-ui.button type="submit" style="danger" icon="fa-solid fa-trash">Delete</x-ui.button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>
