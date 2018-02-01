<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Just an image -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="{{asset('img/tasks.svg')}}" width="30" height="30" alt="">
            Todolist app
        </a>
    </nav>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

        </ul>
        <span class="navbar-text">
            @auth
                Welcome! - {{Auth::user()->name}}
            @endauth
            
            @guest
                <a href="{{route('login')}}" class='btn btn-info'>Login</a>
                <a href="{{route('register')}}" class='btn btn-warning'>Register</a>
            @endguest
        </span>
    </div>
</nav>