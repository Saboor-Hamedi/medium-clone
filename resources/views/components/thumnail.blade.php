<div class="flex justify-start mt-2">
    <div class="rounded-lg shadow-md bg-gray-50 w-full max-w-xs p-3">
        <label
            class="block mb-1 text-sm font-medium text-gray-600 hover:text-gray-800 transition duration-200 text-center">
            Upload Image (jpg, png, svg, jpeg)
        </label>
        <div class="relative flex items-center justify-center w-full">
            <label
                class="flex flex-col items-center justify-center w-16 h-16 border-2 border-dashed border-gray-300 rounded-full cursor-pointer hover:bg-gray-100 hover:border-gray-400 transition duration-300 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400 group-hover:text-gray-600"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                <span class="mt-1 text-xs text-gray-400 group-hover:text-gray-600">Upload</span>
                <input type="file" name="thumbnail" accept="image/*" class="opacity-0 absolute inset-0" />
            </label>
        </div>
        <span id="fileName" class="mt-1 text-xs text-gray-400 flex justify-center items-center">No file
            selected
        </span>

    </div>
    @error('thumbnail')
        <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
    @enderror
</div>
<script>
                document.querySelector('input[type="file"]').addEventListener('change', function(event) {
                    const fileName = event.target.files[0]?.name || 'No file selected';
                    document.getElementById('fileName').textContent = fileName;
                });
            </script>
