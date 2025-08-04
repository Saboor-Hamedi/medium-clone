<x-layouts.app :title="__('Post')">


    {{-- Create Post button --}}
    <x-create-post />
    {{-- Posts --}}
    <div class="grid grid-cols-1 mt-2 rounded-sm  gap-2 ">
        <form action="{{ route('posts.create') }}" method="POST" class="lg:w-full mx-auto" enctype="multipart/form-data">
        @if (session('success'))
            <div class="mb-4 text-green-700 bg-green-100 p-2 rounded">
                {{ session('success') }}
            </div>
        @endif
            @csrf

            <!-- Title -->
            <div class="mt-2">
                <span class="block text-sm font-medium text-gray-700 mb-1">Post Title</span>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="mt-1 block w-full rounded-md border {{ $errors->has('title') ? 'border-red-500' : '' }}  bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                    placeholder="Post title" />
                @error('title')
                    <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                @enderror
            </div>

            <!-- Content -->
            <div class="mt-2">
                <span class="block text-sm font-medium text-gray-700 mb-1">Content</span>
                <textarea name="content"
                    class="mt-1 block w-full rounded-md border {{ $errors->has('content') ? 'border-red-500' : '' }} bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition resize-y min-h-[120px]"
                    placeholder="Write your post here...">{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                @enderror
            </div>

            <!-- Thumbnail -->
            <div class="mt-2">
                <span class="block text-sm font-medium text-gray-700 mb-1">Thumbnail (optional)</span>
                <input type="file" name="thumbnail" accept="image/*"
                    class="mt-1 block w-full rounded-md border {{ $errors->has('content') ? 'border-red-500' : 'border-gray-300' }} bg-white px-3 py-2 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" />
                @error('thumbnail')
                    <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                @enderror
            </div>

            <!-- Category -->
            <div class="mt-2">
                <span class="block text-sm font-medium text-gray-700 mb-1">Category</span>
                <select name="category_id"
                    class="mt-1 block w-full rounded-md border {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300' }} bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                    @error('category_id')
                        <small class="text-sm text-red-600 mt-1 block">{{ $message }}</small>
                    @enderror
                </select>
            </div>



            <!-- Is Published -->
            <div class="flex items-center mt-2 ">
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', true))
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 mr-2" />
                <span class="text-sm text-gray-700">Published</span>
                @error('is_published')
                    <span class="text-sm text-red-600 mb-4 block">{{ $message }}</span>
                @enderror
            </div>


            <!-- Published At -->
            {{-- <span class="block text-sm font-medium text-gray-700 mb-1">Publish Date (optional)</span>
            <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                class="mt-1 block w-full rounded-md border {{ $errors->has('published_at') ? 'border-red-500' : 'border-gray-300' }} bg-white px-3 py-2 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" />
            @error('published_at')
                <span class="text-sm text-red-600 mt-1 block">{{ $message }}</span>
            @enderror --}}

            <!-- Submit Button -->
            <div class="mt-3">
                {{-- <button type="submit"
                    class="px-4  py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 cursor-pointer">
                    Create Post
                </button> --}}
                <x-ui.button type="submit" style="primary" icon="fa-solid fa-plus">Create</x-ui.button>
            </div>
        </form>
    </div>
    {{-- Pagination --}}


</x-layouts.app>
