<?php 

namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService{
    public function upload(?UploadedFile $file, ?string $existingPath = null, string $path = 'posts'): ?string{
        if ($file) {
            // Delete the existing file if provided
            if ($existingPath && Storage::disk('public')->exists($existingPath)) {
                Storage::disk('public')->delete($existingPath);
            }
            // Generate a new file name 
            $filename = time(). '_' . $file->getClientOriginalName();
            return $file->storeAs($path, $filename, 'public');
        }
        // Store the file and return the path
        return $existingPath;
    }
    public function delete(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}