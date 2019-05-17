@extends('layouts.app')

@section('content')
   <div class="container">
      <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
         @csrf
         @method('PATCH')
         <div class="col-8 offset-2">
            <div class="card ">
               <div class="card-header">Edit Profile</div>

               <div class="card-body">

                  <div class="form-group">
                     <label for="title">Title</label>
                     <input type="text"
                            value="{{old('title') ?? $user->profile->title}}"
                            class="form-control  @error('title') is-invalid @enderror"
                            name="title" id="title" aria-describedby="titleId" placeholder="Create a new Title">
                     <small id="titleId" class="form-text text-muted">Create a new Title</small>
                     @error('title')
                     <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </div>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="description">Description</label>
                     <input type="text"
                            value="{{old('description') ?? $user->profile->description}}"
                            class="form-control  @error('description') is-invalid @enderror"
                            name="description" id="description" aria-describedby="descriptionId" placeholder="Enter your Description">
                     <small id="descriptionId" class="form-text text-muted">Give a description</small>
                     @error('description')
                     <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </div>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="url">URL</label>
                     <input type="text"
                            value="{{old('url') ?? $user->profile->url}}"
                            class="form-control  @error('url') is-invalid @enderror"
                            name="url" id="url" aria-describedby="urlId" placeholder="Enter URL">
                     <small id="urlId" class="form-text text-muted">Enter valid URL</small>
                     @error('url')
                     <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </div>
                     @enderror
                  </div>

                  <div class="form-group">
                     <label for="image">Profile Image</label>
                     <input type="file" class="form-control-file   @error('image') is-invalid @enderror"
                            name="image" id="image" placeholder="Profile Image" aria-describedby="imageId">
                     <small id="imageId" class="form-text text-muted">Upload your Profile Image</small>
                     @error('image')
                     <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </div>
                     @enderror
                  </div>

                  <div class="row p-4">
                     <button class="btn btn-primary">Save Profile</button>
                  </div>

               </div>
            </div>
         </div>
      </form>
   </div>
@endsection
