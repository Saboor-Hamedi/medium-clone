<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostValidationService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $validator;

    //  public function __construct(PostValidationService $validator)
    //  {
    //      $this->validator = $validator;
    //  }
    public function index(Request $request)
    {
        $categories = Category::get();
        return view('posts.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StorePostRequest $request)
    {
   
        $validated = $request->validated();
        if($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('posts', 'public');
        } else {
            $thumbnailPath = null;
        }
        $validated['thumbnail'] = $thumbnailPath;
        $validated['user_id'] = auth()->id();
        // Check if the post is published
        $validated['is_published'] = $request->has('is_published');

        // Generate slug from title
        $validated['slug'] = Str::slug($validated['title']);
        // unique slug
        $originalSlug  = $validated['slug'];
        $counter  = 1 ; 
        while (Post::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        $post = Post::create($validated);
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
