<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Forum</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li class="{{Request::is('/') ? "active":""}}"><a href="/">Home</a></li>
                <li><a href="{{ route('profiles.index') }}">{{ Auth::user()->name }}</a></li>
                <li class="{{Request::is('/question') ? "active":""}}"><a href="{{ route('posts.create') }}">Create Post</a></li>
                <li class="{{Request::is('/posts') ? "active":""}}"><a href="{{ route('posts.index') }}">My Posts</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
                <li class="{{Request::is('auth/login') ? "active":""}}"><a href="{{ route('login') }}">Login</a></li>
                <li class="{{Request::is('auth/register') ? "active":""}}"><a href="{{ route('register') }}">Register</a></li>
            @endif
        </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>