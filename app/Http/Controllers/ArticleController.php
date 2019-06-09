<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {

   }

   public function indexApi()
   {
      return Category::with('articles')->paginate();
   }


   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = Category::all()->pluck('name','id');
      return view('articles.create',compact('categories'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
//      dd($request->all());
      $data = $request->validate([
         'title' => 'required',
         'content' => 'required',
         'category_id' => ''
      ]);
      $article = Article::create($data)->categories()->attach($data['category_id']);
      return redirect('/kb');
//      dump($article);
   }

   /**
    * Display the specified resource.
    *
    * @param \App\Article $article
    * @return \Illuminate\Http\Response
    */
   public function show(Article $article)
   {
//      dd($article->categories->first()->id);
      return view('articles.view',compact('article'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param \App\Article $article
    * @return \Illuminate\Http\Response
    */
   public function edit(Article $article)
   {
      $categories = Category::all()->pluck('name','id');
      return view('articles.edit',compact('article','categories'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Article $article
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Article $article)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param \App\Article $article
    * @return \Illuminate\Http\Response
    */
   public function destroy(Article $article)
   {
      //
   }
}
