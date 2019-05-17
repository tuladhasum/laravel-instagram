@extends('layouts.app')

@section('content')

   <div class="container">

      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/kb">Knowledge Base</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Category View</a></li>
         </ol>
      </nav>

      <h1 class="display-4 mb-4">{{$category->name}}</h1>
      @foreach($category->articles as $article)
        <h1>{{$article->title}}</h1>
         <p>{{$article->content}}</p>
         <a href="{{route('article.show',['$article'=>$article])}}">View Article</a>
         <hr>
      @endforeach
   </div>
   </div>
@endsection
