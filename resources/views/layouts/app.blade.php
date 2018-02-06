<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    @auth()
    <link rel="stylesheet" href="{{asset('css/app.css')}}">  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    @endauth
    @yield('styles')
</head>

<body>
    @include('particles.nav')

    <div id='app' class='container'>
        @yield('content')
    </div>
    @yield('scripts')  
    <script src="{{asset('js/bootstrap-native-v4.min.js')}}"></script>  
</body>

</html>