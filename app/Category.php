<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['name', 'active'];

   protected $casts = [
      'active' => 'boolean'
   ];

   public function articles()
   {
      return $this->belongsToMany(
         Article::class,
         'article_category',
         'category_id',
         'article_id'
      )->withTimestamps();
   }
}
