 {{-- All cateories --}}
 <li class="flex-shrink-0 focus-within:z-10">
     <a href="#"
         class="inline-block px-4 py-2 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700 dark:text-white rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-blue-300 focus:outline-none mx-1 my-1"
         aria-current="page">
         {{ __('All') }}
     </a>
 </li>
 @forelse ($categories as $category)
     <li class="flex-shrink-0 focus-within:z-10">
         <a href="#"
             class="inline-block px-4 py-2 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:bg-gray-700 dark:text-white rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-blue-300 focus:outline-none mx-1 my-1"
             aria-current="page">{{ $category->name ?? '' }}</a>
     </li>
 @empty
     {{ $slot }}
 @endforelse
