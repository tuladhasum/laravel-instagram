@extends('layouts.app')

@section('content')

   <div class="container">
      <div class="row">
         <div class="col">
            <h1 class="display-4 mb-4"><i class="fas fa-layer-group"></i> Categories</h1>
         </div>
      </div>
      <a href="{{route('category.create')}}" class="btn btn-sm btn-link"><i class="fas fa-folder-plus"></i> Add Category</a> |
      <a href="{{route('article.create')}}" class="btn btn-sm btn-link"><i class="far fa-newspaper"></i> Add KB Article</a>
   @foreach($categories->chunk(3) as $chunk)
         <div class="row">
            @foreach($chunk as $category)
               <div class="col-4">
                  <div class="card-group">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title">{{Str::limit($category->name,20)}} ({{$category->articles->count()}})</h4>
                           <h6 class="card-subtitle mb-2 text-muted">Description</h6>
                           <a href="{{route('category.show', ['category'=>$category->id])}}">View Category</a>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      @endforeach

      <flash message="{{session('flash')}}" type="info"></flash>
   </div>


   </div>
@endsection
