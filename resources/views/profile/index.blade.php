<x-layouts.app :title="__('Profile')">

    <div class="min-h-screen bg-gray-50 ">
        <div class="max-w-4xl mx-auto px-4 py-8">
            <!-- User Profile Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
                <!-- Profile Header -->
                <div class="relative h-32 bg-gradient-to-r from-blue-600 to-indigo-700">
                    <div class="absolute -bottom-12 left-6">
                        <div class="h-24 w-24 rounded-full border-4 border-white overflow-hidden bg-white shadow-md">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                                id="profileImage"
                                alt="Profile" class="h-full w-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="pt-14 px-6 pb-6">
                    <div class="flex flex-col sm:flex-row justify-between items-start mb-4">
                        <div class="mb-4 sm:mb-0">
                            <h1 class="text-2xl font-bold text-gray-800">John Anderson</h1>
                            <p class="text-gray-600 mt-1">UX Designer & Frontend Developer</p>
                            <div class="flex items-center mt-2 text-gray-500">
                                <i class="fas fa-map-marker-alt text-sm mr-2"></i>
                                <span class="text-sm">San Francisco, California</span>
                            </div>
                        </div>
                        
                        <x-ui.button type="submit" id="editButton"  
                            style="primary" icon="fa-solid fa-pen-to-square mr-1">
                            Edit Profile
                        </x-ui.button>
                        <input type="file" id="imageUpload" accept="image/*" class="hidden">
                    </div>

                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">About Me</h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Passionate designer and developer with over 5 years of experience creating user-friendly
                            interfaces
                            and responsive web applications. Focused on accessibility and performance.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Posts Section -->
            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-clipboard-list text-blue-500 mr-2"></i>
                    Latest Posts
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Post 1 -->
                    @forelse ($posts as $post)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden post-card">
                            <div class="p-5">
                                <div class="flex items-center mb-4">
                                    <div class="h-10 w-10 rounded-full overflow-hidden mr-3">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            alt="Author" class="h-full w-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800">{{ $post->user->name }}</h4>
                                        <p class="text-xs text-gray-500">{{ $post->getTime() }} · 5 min read</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $post->title ?? '' }}</h3>
                                <p class="text-gray-600 text-sm mb-4">
                                    {{ Str::words($post->content ?? '', 20) }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <div class="flex space-x-2">
                                        <span
                                            class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded">{{ $post->getCategoryName() ?? '' }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-500 text-sm">
                                        <i class="far fa-heart mr-1"></i>
                                        <span class="mr-3">42</span>
                                        <i class="far fa-comment mr-1"></i>
                                        <span>7</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <h1>Post not found.</h1>
                    @endforelse
                </div>
            </div>

            <!-- Load More Button -->
            @if ($posts->count() > 0)
                <div class="text-center mt-8">
                    <button
                        class="bg-white text-blue-600 border border-blue-600 hover:bg-blue-50 px-6 py-2 rounded-lg font-medium transition duration-200">
                        Load More Posts
                    </button>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
