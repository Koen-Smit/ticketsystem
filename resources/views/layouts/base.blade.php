<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Ticketsystem</title>
</head>
<body>
    <header>
      @Auth
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('layouts.navigation')
      @endAuth
        @guest
        <nav class="navbar navbar-expand-lg bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Ticketsystem</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">

                <li class="nav-item ml-4">
                  <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('register')}}">register</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        @endguest
    </header>
    <div class="container">
        <main>

            @yield('content')

        </main>
    </div>
    <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://github.com/Koen-Smit" class="hover:underline">Koen™</a>. All Rights Reserved.
      </span>
  </footer>
</body>
</html>
