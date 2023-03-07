<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Posty</title>
</head>
<body class="grey lighten-3">
    <nav>
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="#">Home</a></li>
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('post') }}">Posts</a></li>
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        @auth
            <li><a href="">{{ auth()->user()->name }}</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn-flat white-text waves-effect red lighten-2" type="submit" name="action">Logout</button>
                </form>
            </li>
            
        @endauth 
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endguest
      </ul>
    </div>
  </nav>
    @yield('content')
</body>
</html>