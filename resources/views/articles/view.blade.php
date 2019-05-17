@extends('layouts.app')

@section('content')

   <div class="container">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/kb">Knowledge Base</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.show',['category'=> $article->categories->first()->id])}}">Category View</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Article</a></li>
         </ol>
      </nav>

      <div class="row">
         <div class="col">
            <h1 class="display-4 mb-4">{{$article->title}}</h1>
         </div>
      </div>

      <div class="row">
         <div class="col">
            {{$article->content}}
         </div>
      </div>
      <div class="">
         <a href="{{route('article.edit',['article'=>$article->id])}}">Edit Article</a>
      </div>

   </div>
@endsection
