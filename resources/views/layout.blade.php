<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand navbar-light bg-dark">
        <a class="navbar-brand text-warning font-weight-bold ml-3" href="/">BMDb</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-3">
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-lighter" href="/">Home</a>
                </li>

                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white" href="manage-user">Manage User</a>
                        <a class="dropdown-item text-white" href="manage-movie">Manage Movie</a>
                        <a class="dropdown-item text-white" href="manage-genre">Manage Genre</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-lighter" href="/saved-movie">Saved Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-lighter" href="inbox">Inbox</a>
                </li>
                @endif
            </ul>
            <ul class="navbar-nav mr-3 ml-3">

                <li class="nav-item my-2 my-lg-0 mr-3">
                    <div class="nav-link text-white" id="time"></div>
                </li>
                @if(!Auth::check())
                <li class="nav-item my-2 my-lg-0">
                    <a href="/login" class="nav-link text-white">Login</a>
                </li>
                <li class="nav-item my-2 my-lg-0">
                    <a href="/register" class="nav-link text-white">Register</a>
                </li>
                @else
                <li class="nav-item my-2 my-lg-0">
                    <a href="/profile" class="nav-link text-white">Profile</a>
                </li>
                <li class="nav-item my-2 my-lg-0">
                    <a href="/logout" class="nav-link text-white">Logout</a>
                </li>
                @endif
            </ul>

        </div>
    </nav>

    @yield('content')

    <footer class="page-footer font-small blue bg-dark">

        <div class="footer-copyright text-center py-3 text-white">© 2019 Copyright
            <a href="/" class="text-warning font-weight-bold"> BMDb.com</a>
        </div>

    </footer>



    <script src="js/app.js"></script>


    <script type="text/javascript">
        function showTime() {
            var date = new Date();
            document.getElementById('time').innerHTML =
                (date.getFullYear()) + '-' +
                ('0' + (date.getMonth() + 1)).slice(-2) + '-' +
                ('0' + date.getDate()).slice(-2) + ' ' +
                ('0' + date.getHours()).slice(-2) + ':' +
                ('0' + date.getMinutes()).slice(-2) + ':' +
                ('0' + date.getSeconds()).slice(-2);
        }

        setInterval(showTime, 1000);
    </script>
</body>

</html>