<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index()
   {
      $users = auth()->user()->following()->pluck('profiles.user_id');
      $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(10);

      return view('posts.index',compact('posts'));
   }

   public function create()
   {
      return view('posts.create');
   }

   public function store(Request $request)
   {
      $data = $request->validate([
         'caption' => 'required',
         'image' => 'required|image'
      ]);

      // $imagePath = request('image')->store('uploads','public');
      // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);

      // $image->save();

      $imagePath = \Cloudinary\Uploader::upload(request('image'), [
         'folder' =>  "posts/" . auth()->user()->id
      ]);

      // Created authenticated post
      auth()->user()->posts()->create([
         'caption' => $data['caption'],
         'image' => $imagePath['url'],
      ]);

      return redirect('/profile/'. auth()->user()->id);
   }

   public function show(Post $post)
   {
      dump($post->liked);
      return view('posts.show',compact('post'));
   }
}
