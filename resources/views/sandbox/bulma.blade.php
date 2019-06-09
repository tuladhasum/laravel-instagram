@extends('layouts.bulma')
@section('title', "Bulma Application ")

@section('content')
   <div class="columns">
      <div class="column">
         <h1 class="title">
            Bulma
         </h1>

         <p class="subtitle">
            Modern CSS framework based on <a
               href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Basic_Concepts_of_Flexbox">Flexbox</a>
         </p>

         <div class="field">
            <div class="control">
               <input class="input" type="text" placeholder="Input">
            </div>
         </div>

         <div class="field">
            <p class="control">
          <span class="select">
            <select>
              <option>Select dropdown</option>
            </select>
          </span>
            </p>
         </div>

         <div class="buttons">
            <a class="button is-primary">Primary</a>
            <a class="button is-link">Link</a>
         </div>
      </div>
   </div>
   <div class="columns">
      <div class="card">
         <header class="card-header">
            <p class="card-header-title">
               Component
            </p>
            <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
            </a>
         </header>
         <div class="card-content">
            <div class="content">
               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
               <a href="#">@bulmaio</a>. <a href="#">#css</a> <a href="#">#responsive</a>
               <br>
               <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
            </div>
         </div>
         <footer class="card-footer">
            <a href="#" class="card-footer-item">Save</a>
            <a href="#" class="card-footer-item">Edit</a>
            <a href="#" class="card-footer-item">Delete</a>
         </footer>
      </div>
   </div>
@endsection
