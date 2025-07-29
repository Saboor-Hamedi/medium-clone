<div
    class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mx-auto flex flex-col sm:flex-row">
    <div class="flex-1 p-4 sm:p-5 order-2 sm:order-1">
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2">
            {{ $post->title ?? 'Noteworthy technology acquisitions 2021' }}
        </h5>
        <p class="mb-3 text-sm sm:text-base font-normal text-gray-700 dark:text-gray-400 line-clamp-3">
            {{ Str::words($post->content ?? 'Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.', 30) }}
        </p>
        <p class="mb-2 text-xs sm:text-sm text-gray-500 dark:text-gray-400">
            Posted by: {{ $post->author ?? 'Unknown Author' }} on {{ $post->created_at ?? '2025-07-24' }}
        </p>
        <div class="flex gap-2">
            <a href="#"
                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                Edit
            </a>
            <form action="#" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-700">
                    Delete
                </button>
            </form>
        </div>
    </div>
    <div class="w-full sm:w-40 h-48 sm:h-auto order-1 sm:order-2">
        <img class="w-full h-full object-cover rounded-t-lg sm:rounded-r-lg sm:rounded-tl-none"
            src="{{ asset($post->image ?? 'storage/posts/image1.png') }}" alt="Not found" />
    </div>
</div>
