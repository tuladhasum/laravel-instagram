@extends('layouts.app')

@section('content')
   <div class="container">
      <form action="/p" enctype="multipart/form-data" method="post">
         @csrf
         <div class="row">
            <div class="col-8 offset-2">
               <div class="card">
                  <div class="card-header pb-0"><h4>Add New Post</h4></div>
                  <div class="card-body">
                     <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>
                        <input id="caption"
                               type="text"
                               class="form-control @error('caption') is-invalid @enderror"
                               name="caption"
                               value="{{ old('caption') }}"
                               autocomplete="caption"
                               autofocus />

                        @error('caption')
                        <div class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                     </div>

                     <div class="row form-group">
                        <label for="image" class="col-md-4 col-form-label ">Post Image</label>

                        <input type="file"
                               class="form-control-file  @error('caption') is-invalid @enderror"
                               id="image"
                               name="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                     <div class="row pt-4">
                        <button class="btn btn-primary">Add New Post</button>
                     </div>
                  </div>
               </div>

            </div>
         </div>


      </form>

   </div>
@endsection
