<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
   public function __construct()
   {
   }

   public function store(Post $post)
   {
      return auth()->user()->likes()->toggle($post->id);
   }
}
