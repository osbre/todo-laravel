<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TodoList app</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
</head>

<body class='bg-success'>
    @include('particles.nav')
    <br><br><br>

        <div class="container card card-body">
            <h1 class='text-dark text-center'>Correctly distribute your tasks!</h1>
            <p class="lead text-center">This web application helps you manage your tasks on a daily basis.</p>
            <br>
            @auth
            <div class="d-flex justify-content-center">
                <a href="{{route('tasks.index')}}" class='btn btn-success btn-lg'>Go to my tasks</a>
            </div>
            @endauth
            @guest
            <div class="d-flex justify-content-center btn-group">
                <a href="{{route('login')}}" class='btn btn-info btn-lg'>Log in</a>
                <a href="{{route('register')}}" class='btn btn-dark btn-lg'>Sign up</a>                
            </div>
            @endguest

        </div>
    </div>
    <script src="{{asset('js/bootstrap-native-v4.min.js')}}"></script>
</body>

</html>