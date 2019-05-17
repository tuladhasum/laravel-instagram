<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
   use Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'name', 'username', 'email', 'password',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
      'password', 'remember_token',
   ];

   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];

   protected static function boot()
   {
      parent::boot();

      // Create profile when user is created with event
      static::created(function ($user) {

         // Create Profile on created
         $user->profile()->create([
            'title' => $user->username
         ]);

//         Mail::to($user->email)->send(new NewUserWelcomeMail());

      });
   }

   public function profile()
   {
      return $this->hasOne(Profile::class);
   }

   public function posts()
   {
      return $this->hasMany(Post::class)
         ->orderBy('created_at', 'DESC');
   }

   public function following()
   {
      return $this->belongsToMany(Profile::class);
   }

   public function likes()
   {
      return $this->belongsToMany(Post::class,'likes')
         ->withTimestamps();
   }

}
