<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileImageRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\profile\Profile;
use App\Service\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
     protected $imageService;
     public function __construct(ImageService $imageService)
     {
         $this->imageService = $imageService;
     }
    public function index()
    {
        $posts = Post::with(['category', 'user'])
                ->where('user_id', auth()->id())
                ->latest()
                ->paginate(5);
                $profile = Auth::user()->profile;
        return view('profile.index', ['posts' => $posts, 'profile' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function image(ProfileImageRequest $request){
      $validated = $request->validated();
      $imagePath = null;
      if($request->hasFile('image')){
        $existingProfile = Profile::where('user_id', Auth::id())->first();
        $existingImagePath = $existingProfile ? $existingProfile->image : null;
        $imagePath = $this->imageService->upload($request->file('image'), $existingImagePath, 'profiles');
      }else{
        $imagePath = null;
      }
        Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            ['image' => $imagePath]
        );
        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('here');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
