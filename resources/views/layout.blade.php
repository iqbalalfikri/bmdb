<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand navbar-light bg-dark">
        <a class="navbar-brand text-warning font-weight-bold ml-3" href="/">BMDb</a>


        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto ml-3">
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-lighter" href=" {{ route('home') }} ">Home</a>
                </li>

                @if(Auth::check())

                @if(auth()->user()->role_id == 1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href="{{ route('manage-user') }}">Manage User</a>
                        <a class="dropdown-item text-white" href="{{ route('manage-movie') }}">Manage Movie</a>
                        <a class="dropdown-item text-white" href="{{ route('manage-genre') }}">Manage Genre</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-lighter" href="/saved-movie">Saved Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-lighter" href="{{ route('inbox') }}">Inbox</a>
                </li>
                @endif
                @endif
            </ul>
            <ul class="navbar-nav mr-3 ml-3">

                <li class="nav-item my-2 my-lg-0 mr-3">
                    <div class="nav-link text-white" id="time"></div>
                </li>
                @if(!Auth::check())
                <li class="nav-item my-2 my-lg-0">
                    <a href="{{ route('login') }}" class="nav-link text-white">Login</a>
                </li>
                <li class="nav-item my-2 my-lg-0">
                    <a href="{{ route('register') }}" class="nav-link text-white">Register</a>
                </li>
                @else
                <li class="nav-item my-2 my-lg-0">
                    <a href="{{ route('profile', auth()->user()->id) }}" class="nav-link text-white">Profile</a>
                </li>
                <li class="nav-item my-2 my-lg-0">

                    <a href="{{ route('logout') }}" class="nav-link text-white" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action=" {{ route('logout') }}" method="post">
                        @csrf
                    </form>
                </li>
                @endif
            </ul>

        </div>
    </nav>

    @yield('content')

    <footer class="page-footer font-small blue bg-dark">

        <div class="footer-copyright text-center py-3 text-white">© 2019 Copyright
            <a href="{{ route('home') }}" class="text-warning font-weight-bold"> BMDb.com</a>
        </div>

    </footer>



    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>