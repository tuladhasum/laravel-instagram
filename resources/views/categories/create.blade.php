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
         <div class="card-header">Add Category</div>
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
            <form action="{{route('category.store')}}" method="post">
               @csrf
               <div class="form-group">
                  <label for="name">Name</label>
                  <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}">
               </div>
               <button class="btn btn-outline-success" type="submit">Create Category</button>
            </form>
         </div>
      </div>
   </div>
   </div>
@endsection
