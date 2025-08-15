<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Service\ImageService;
use App\Service\SlugService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    use AuthorizesRequests;
  
    protected $validator;
    protected $imageService;
    protected $slugService;
    public function __construct(ImageService $imageService, SlugService $slugService)
    {
        $this->imageService = $imageService;
        $this->slugService = $slugService;
    }
    
    public function index(Request $request)
    {
        $categories = Category::get();
        return view('posts.create',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
   
       $categories = Category::all();
        return view('posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
          $validated = $request->validated();
        if($request->hasFile('thumbnail')) {
           $thumbnailPath = $this->imageService->upload($request->file('thumbnail'));
        } else {
            $thumbnailPath = null;
        }
        $validated['thumbnail'] = $thumbnailPath;
        $validated['user_id'] = auth()->id();
        // Check if the post is published
        $validated['is_published'] = $request->has('is_published');

        // Generate slug from title
        $validated['slug'] = $this->slugService->slug($validated['title']);
        

        Post::create($validated);
        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user'); 
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
      public function edit(Post $post)
    {
        $post->load('user');
        $categories = Category::get();
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {

        $this->authorize('update', $post);
        $validated = $request->validated();
        // Check if there is a new thumbnail 
        if($request->hasFile('thumbnail')){
            // Delete the old thumbnail if it exists
            $this->imageService->delete($post->thumbnail);
            // update new thumbnail 
            $validated['thumbnail'] = $this->imageService->upload($request->file('thumbnail'));
        }else{
            // Keep the old one if no new image
        $validated['thumbnail'] = $post->thumbnail;
        }
        $validated['is_published'] = $request->has('is_published');
         // Update slug only if title has changed
         $validated['slug'] = $validated['title'] !== $post->title
            ? $this->slugService->slug($validated['title'])
            : $post->slug;
   

     $post->update($validated);
     return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete the thumbnail if it exists
        $this->authorize('delete', $post);
        if ($post->thumbnail) {
            $this->imageService->delete($post->thumbnail);
        }
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
    }
}
