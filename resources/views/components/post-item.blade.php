<div
    class="max-w-5xl w-full mx-auto bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow flex flex-col sm:flex-row-reverse overflow-hidden min-h-60">
    <!-- Image on the right (desktop), on top (mobile) -->
    <div class="sm:w-56 w-full flex-shrink-0">
        <div class="h-40 sm:h-full w-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
            <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('storage/posts/image1.png') }}"
                alt="{{ $post->title ?? 'Post image' }}" onerror="this.src='{{ asset('storage/posts/image1.png') }}'"
                class="h-full w-full object-cover object-center" />
        </div>
    </div>
    <!-- Content -->
    <div class="flex-1 flex flex-col justify-between p-5">
        <div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1 line-clamp-2">
                {{ $post->title ?? 'Noteworthy technology acquisitions 2021' }}
            </h3>
            <p class="text-gray-700 dark:text-gray-300 text-base mb-3 line-clamp-3">
                {{ Str::words($post->content ?? 'Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.', 35) }}
            </p>
        </div>
        <div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                Posted by: {{ $post->user->name ?? 'Unknown Author' }}
                {{ $post->getTime()}}
            </p>
            <div class="flex gap-2">
                <a href="#"
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700 transition">Edit</a>
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-700 transition">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
