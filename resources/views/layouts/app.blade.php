<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anggota | Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon-32x32.png" type="image/x-icon">
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>
    <nav class="shadow-lg navbar-1-1 navbar navbar-expand-lg sticky-top" style="background-color: #FCFFE7;">
        <div class="container">
            <img src="https://laravel.com/img/favicon/favicon-32x32.png" alt="" width="25">
            <a class="navbar-brand ms-2 fw-semibold" href="#">
                SIOTICS | SMKN 1 Jakarta
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="gap-2 navbar-nav ms-md-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Home') ? "fw-semibold active" : "" }}" href="{{ route('anggota.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Tambah Data') ? "fw-semibold active" : "" }}" href="{{ route('anggota.create') }}">Tambah Data</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                          <li><p class="dropdown-item" href="#">{{Auth::user()->name }}<br><small class="text-capitalize">({{Auth::user()->role->name }})</small></p></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Profile</a></li>
                          <li><a class="dropdown-item text-primary" href="logout">Logout</a></li>
                        </ul>
                      </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
