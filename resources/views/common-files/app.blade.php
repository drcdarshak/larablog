<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{config('app.name','Larablog')}}</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body> 
        <div class="container">
            @include('common-files.messages')
            @include('common-files.navigation')
            @yield('content')
        </div>
    </body>
</html>
