<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .navbar-brand{
            font-weight: 500 !important;
        }

        .nav-link{
            font-weight: 500 !important;
        }
    </style>
    @yield('style')
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-success bg-gradient">
        <div class="container-fluid ">
          <a class="navbar-brand text-white">Amazing E-Grocery</a>

          <div class="d-flex " id="navbarNavDropdown">
            <ul class="navbar-nav ml-5">
            @auth
                <li class="nav-item mx-1">
                    <form action="/logout" method="GET">
                        <input class="btn btn-outline-warning" type="submit" value="Logout">
                    </form>
                </li>
            @else
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-warning" href="/register" role="button">Register</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="btn btn-outline-warning" href="/login" role="button">Login</a>
                </li>

            @endif
              <li class="nav-item dropdown mx-1">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('Language') }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ url('/switchLang/id') }}">Indonesia</a></li>
                  <li><a class="dropdown-item" href="{{ url('/switchLang/en') }}">English</a></li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>

      @auth
        <nav class="navbar navbar-expand-lg bg-warning bg-gradient d-flex justify-content-center">
            <ul class="navbar-nav ">
            <li class="nav-item mx-1">
                <a class="nav-link" href="/home" role="button">Home</a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link" href="/cart" role="button">{{ __('Cart') }}</a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link" href="/profile" role="button">{{ __('Profile') }}</a>
            </li>
            @if (Auth::user()->role_id ==1)
                <li class="nav-item mx-1">
                    <a class="nav-link" href="/showAcc" role="button">{{ __('Account Maintenance') }}</a>
                </li>
            @endif

            </ul>
        </nav>
      @endauth


      @yield('content')

      <footer class="navbar navbar-expand-lg bg-success bg-gradient d-flex py-3 mt-4 justify-content-center">
        <footer class="my-2">
            <p class="text-center text-white">©Amazing E-Grocery 2023</p>
        </footer>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
