<x-layouts.app :title="__('Post')">

    <div class="flex  w-full flex-1 flex-col gap-2 rounded-4xl justify-center items-center">
        <div class="w-full max-w-5xl">
            <ul
                class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500 rounded-lg shadow-sm dark:divide-gray-700 dark:text-gray-400 ">
               {{-- Categories --}}
                <x-category-tab >
                {{ __('No category found') }}
                </x-category-tab>
            </ul>
        </div>
    </div>
    {{-- Posts --}}
    <div class="grid grid-cols-1 mt-2 rounded-sm  gap-2 p-2">
        @forelse  ($posts as $post)
            <x-post-item :post="$post" />
        @empty
            <div class="text-center text-gray-500 dark:text-gray-400">
                {{ __('No posts available') }}
            </div>
        @endforelse
    </div>
    {{-- Pagination --}}
    <div class="mt-8">
        {{ $posts->links() }}
    </div>

</x-layouts.app>
