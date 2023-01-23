<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi-Antrian</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                  <a class="nav-link {{ Request::is('transaksi*') ? 'active' : '' }}" href="/transaksi">Transaksi</a>
                  <a class="nav-link {{ Request::is('cs*') ? 'active' : '' }}" href="/cs">Customer Service</a>
                  <a class="nav-link {{ Request::is('panggil-antrian*') ? 'active' : '' }}" href="/panggil-antrian">Panggil Antrian</a>
                </div>
              </div>
            </div>
          </nav>
    </div>

    @yield('content')

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</html>

