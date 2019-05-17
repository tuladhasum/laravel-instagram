<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   protected $fillable = ['title', 'content', 'active'];

   protected $casts = [
      'active' => 'boolean'
   ];

   public function categories()
   {
      return $this->belongsToMany(
         Category::class,
         'article_category',
         'article_id',
         'category_id')
         ->withTimestamps();
   }
}
