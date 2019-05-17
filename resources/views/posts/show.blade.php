@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-8">
            {{-- <img src="/storage/{{$post->image}}" class="w-100 " alt=""> --}}
            <img src="{{$post->image}}" class="w-100 " alt="">
         </div>
         <div class="col-4">
            <div class="d-flex align-items-center">
               <div class="pr-3">
                  {{-- <img src="{{$post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px" alt=""> --}}
                  <img src="{{$post->user->profile->profileImage() }}" class="w-100 rounded-circle" style="max-width: 40px" alt="">
               </div>

               <div>
                  <p class="font-weight-bold">
                     <a href="/profile/{{$post->user->id}}">
                        <span class="text-dark"> {{$post->user->username}}</span>
                     </a>
                     <a href="#" class="pl-3">Follow</a>
                  </p>
               </div>
            </div>

            <hr>

            <p><span class="font-weight-bold">
                  <like-button post-id="{{$post->id}}" likes="@if($post->liked->count()>0)true @else false @endif"></like-button>
                  <a href="/profile/{{$post->user->id}}">
                     <span class="text-dark"> {{$post->user->username}}</span>
                  </a></span> {{$post->caption}}</p>

         </div>
      </div>
   </div>
@endsection
