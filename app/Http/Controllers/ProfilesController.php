<?php

namespace App\Http\Controllers;


use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
   public function index(User $user)
   {
      $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;

      $postCount = Cache::remember(
         'count.posts.' . $user->id,
         now()->addSecond(30),
         function () use ($user) {
            return $user->posts->count();
         });

      $followersCount = Cache::remember(
         'count.followers.' . $user->id,
         now()->addSecond(30),
         function() use ($user){
            return $user->profile->followers->count();
         }
      );

      $followingCount = Cache::remember(
         'count.following.'. $user->id,
         now()->addSecond(30),
         function() use($user){
            return $user->following->count();
         }
      );

      return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
   }

   public function edit(User $user)
   {
      $this->authorize('update', $user->profile);
      if ($user->profile === null) {
         $user->profile()->save(new Profile(['title' => '']))->push();
      }
      return view('profiles.edit', compact('user'));
   }

   public function update(User $user)
   {
      $this->authorize('update', $user->profile);

      $data = request()->validate([
         'title' => 'required',
         'description' => 'required',
         'url' => 'url',
         'image' => ''
      ]);

      if (request('image')) {
         $imagePath = request('image')->store('profile', 'public');

         $image = \Cloudinary\Uploader::upload( request('image'),[
            'folder' => "profile"
         ]);

         // dd($image['url']);
         // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
         // $image->save();

         $imageArray = ['image' => $image['url']];
         // $imageArray = ['image' => $imagePath];
      }

      auth()->user()->profile->update(array_merge(
         $data,
         $imageArray ?? []
//         (request('image')) ? ['image' => $imagePath] : []
      ));

      return redirect("/profile/{$user->id}");

   }
}
