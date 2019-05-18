<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', 'Vajra')</title>
    <link rel="stylesheet" href="{{ mix('css/bulma.css') }}">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  </head>
  <body>
     @include('partials.bulmanav')
     <div class="container">
        @yield('content')
     </div>
  </body>
</html>
