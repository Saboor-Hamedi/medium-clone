<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $fillable = [
    'title',
    'content',
    'thumbnail',
    'slug',
    'category_id',
    'user_id',
    'is_published',
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getTime(){
        // return $this->created_at->diffForHumans() ;
        return $this->created_at->format('F j, Y');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    // This method calls the category name
    public function getCategoryName()
    {
        return $this->category ? $this->category->name : 'Uncategorized';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
