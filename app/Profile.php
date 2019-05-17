<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

   protected $guarded = [];

   public function profileImage()
   {
      $imagePath = ($this->image) ?  $this->image : 'profile/gxGjwHMbyaiVPFr9J6rpNhjGqM5C7wBmY6HZEZXG.png';
//      dd($imagePath);
      // return '/storage/' . $imagePath;
      return $imagePath;
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function followers()
   {
      return $this->belongsToMany(User::class);
   }
}
