<?php 

namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Str;

class SlugService{
    public function slug(string $title, ?int $excludedId=null){
        $slug = Str::slug($title);
        $originalSlug = $slug; 
        $counter = 1;
        while(Post::where('slug', $slug)
        ->when($excludedId, fn($query) => $query->where('id', '!=', $excludedId))
        ->exists()){
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        return $slug;
    }
}