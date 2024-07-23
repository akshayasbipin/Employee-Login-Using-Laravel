<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sam3.css') }}">
</head>
<body>
<!-- resources/views/layouts/nav_f.blade.php -->
<nav style="width: 100%; background-color: #f8f9fa; padding: 10px; position: fixed; top: 0; left: 0; z-index: 1000;">
    <ul style="list-style-type: none; margin: 0; padding: 0; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <a href="{{ URL('/') }}" style="text-decoration: none; color: black;">Navigate</a>
        </div>
        <div style="display: flex; align-items: center;">
            {{-- <li class="nav-item" style="margin-right: 10px;"><a href="{{ URL('/') }}">Home</a></li> --}}
            @guest
                <li class="nav-item" style="margin-right: 10px;"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else
                <li class="nav-item dropdown" style="margin-right: 10px;">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Logout ({{ Auth::user()->name }})
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </div>
    </ul>
</nav>



<div>
    @yield('content')
</div>
</body>
</html>