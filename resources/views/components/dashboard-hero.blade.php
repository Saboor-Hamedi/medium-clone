 <div class="max-w-7xl mx-auto">
     <!-- Hero Section -->
     <div class="p-4 md:p-5 mb-4 rounded-lg bg-gray-100 text-gray-800">
         <div class="max-w-2xl">
             <h1 class="lg:text-2xl md:text-md font-bold">
                 Welcome {{ Str::ucfirst(auth()->user()->name ?? 'Guest') }}
             </h1>
             <p class="lg:text-lg md:text-[13px] my-3">Multiple lines of text that form the lede, informing new readers
                 quickly and
                 efficiently about what's most interesting in this post's contents.</p>
         </div>
         @if (session('success'))
             <div class="mb-4 text-green-700 bg-green-100 p-2 rounded">
                 {{ session('success') }}
             </div>
         @endif

     </div>

     <!-- Featured Posts -->
     <div class="flex flex-wrap -mx-2 mb-4">
         <div class="w-full md:w-1/2 px-2 mb-4">
             <div class="flex flex-col md:flex-row border rounded-lg overflow-hidden shadow-sm h-64 relative">
                 <div class="p-4 flex flex-col flex-1">
                     <span class="inline-block mb-2 text-blue-600 font-bold">World</span>
                     <h3 class="text-xl font-bold mb-0">Featured post</h3>
                     <div class="text-sm text-gray-500 mb-2">Nov 12</div>
                     <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                         additional content.</p>
                     <a href="#" class="inline-flex items-center text-blue-600 hover:underline mt-2">
                         Continue reading
                         <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20">
                             <path fill-rule="evenodd"
                                 d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </a>
                 </div>
                 <div class="hidden md:block md:w-48 flex-none bg-gray-600">
                     <div class="h-full w-full flex items-center justify-center text-gray-300">Thumbnail</div>
                 </div>
             </div>
         </div>

         <div class="w-full md:w-1/2 px-2 mb-4">
             <div class="flex flex-col md:flex-row border rounded-lg overflow-hidden shadow-sm h-64 relative">
                 <div class="p-4 flex flex-col flex-1">
                     <span class="inline-block mb-2 text-green-600 font-bold">Design</span>
                     <h3 class="text-xl font-bold mb-0">Post title</h3>
                     <div class="text-sm text-gray-500 mb-2">Nov 11</div>
                     <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                         additional content.</p>
                     <a href="#" class="inline-flex items-center text-blue-600 hover:underline mt-2">
                         Continue reading
                         <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20">
                             <path fill-rule="evenodd"
                                 d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </a>
                 </div>
                 <div class="hidden md:block md:w-48 flex-none bg-gray-600">
                     <div class="h-full w-full flex items-center justify-center text-gray-300">Thumbnail</div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Main Content -->
     <div class="flex flex-wrap -mx-4">
         <div class="w-full md:w-2/3 px-4">
             <h3 class="pb-4 mb-4 italic font-bold border-b border-gray-200">From the Firehose</h3>

             <!-- Blog Post 1 -->
             <article class="mb-12">
                 <h2 class="text-3xl font-bold mb-2 text-gray-800">Sample blog post</h2>
                 <p class="text-sm text-gray-500 mb-4">January 1, 2021 by <a href="#"
                         class="text-blue-600 hover:underline">Mark</a></p>
                 <p class="mb-4">This blog post shows a few different types of content that's supported and
                     styled with Bootstrap. Basic typography, lists, tables, images, code, and more are all
                     supported as expected.</p>
                 <hr class="my-4 border-gray-200">
                 <p class="mb-4">This is some additional paragraph placeholder content. It has been written to
                     fill the available space and show how a longer snippet of text affects the surrounding
                     content.</p>

                 <h2 class="text-2xl font-bold mt-6 mb-3">Blockquotes</h2>
                 <blockquote class="border-l-4 border-gray-300 pl-4 italic mb-4">
                     <p>Quoted text goes here.</p>
                 </blockquote>

                 <!-- More content... -->
             </article>

             <!-- Blog Post 2 -->
             <article class="mb-12">
                 <h2 class="text-3xl font-bold mb-2 text-gray-800">Another blog post</h2>
                 <p class="text-sm text-gray-500 mb-4">December 23, 2020 by <a href="#"
                         class="text-blue-600 hover:underline">Jacob</a></p>
                 <p class="mb-4">This is some additional paragraph placeholder content. It has been written to
                     fill the available space and show how a longer snippet of text affects the surrounding
                     content.</p>
                 <!-- More content... -->
             </article>

         </div>
     </div>


     {{-- end --}}
 </div>
