<x-layouts.app :title="__('Post')">

    {{-- Create Post button --}}
    <x-create-post />
    {{-- Posts --}}
    <div class=" p-2 ">
        <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Thumbnail --}}
            <x-thumnail />

            {{-- Title --}}
            <div class="grid grid-cols-1">
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                    class="mt-1 block w-full rounded-md border {{ $errors->has('title') ? 'border-red-500' : '' }}  bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"
                    placeholder="Post title" />
                @error('title')
                    <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                @enderror
            </div>
            {{-- content --}}
            <div class="mt-2">
                <x-ui.textarea name="content" class="{{ $errors->has('content') ? 'border-red-500 focus:border-red-500 focus:ring-red-200' : '' }}"   placeholder="Write your post here...">
                    {{ $post->content }}
                </x-ui.textarea>
            </div>

            <!-- Category -->
            <div class="mt-2">
                <select name="category_id"
                    class="mt-1 block w-full rounded-md border {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300' }} bg-white px-3 py-2 text-gray-900 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
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
                <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $post->is_published))
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 mr-2" />
                <span class="text-sm text-gray-700">Published</span>
                @error('is_published')
                    <span class="text-sm text-red-600 mb-4 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-3">
                <x-ui.button type="submit" style="success" icon="fa-solid fa-pen-to-square">Update</x-ui.button>
            </div>

        </form>
    </div>

</x-layouts.app>
