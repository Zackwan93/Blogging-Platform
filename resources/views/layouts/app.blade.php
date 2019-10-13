<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" href = "{{asset('css/app.css')}}">
        <title>{{config('app.name','SilverLining')}}</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<style>.cities {
  background-color: green;
  color: white;
  margin: 20px;
  padding: 20px;
} 
</style>
</head>
<body>
    <div id="app">
       @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
         <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('article-ckeditor');
        </script>
    </div>
   
</body>
</html>
