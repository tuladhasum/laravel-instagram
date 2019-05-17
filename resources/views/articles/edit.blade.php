@extends('layouts.app')

@section('content')
   <div class="container">

      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/kb">Knowledge Base</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Category View</a></li>
         </ol>
      </nav>

      <div class="card">
         <div class="card-header">Edit Article</div>
         <div class="card-body">
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif

            <form action="{{route('article.store')}}" method="post">
               @csrf
               <div class="form-group">
                  <label for="category_id">Category</label>

                  <select multiple="multiple" class="form-control select2 col w-100" name="category_id[]" id="category_id" >
                     @foreach($categories as $key =>$value)
                        <option value="{{$key}}" {{ (in_array($key, old('category_id', []))) ? 'selected' : '' }}>{{$value}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text"
                         class="form-control" name="title" id="title" aria-describedby="titleId" placeholder="Article Title">
                  <small id="titleId" class="form-text text-muted">Create New Title for Knowledge Base</small>
               </div>

               <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control" name="content" id="content" rows="3"></textarea>
               </div>

               <button class="btn btn-outline-success" type="submit">Create KB Article</button>
            </form>
         </div>
      </div>
   </div>
   </div>
@endsection
