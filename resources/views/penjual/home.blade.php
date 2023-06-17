<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/side-bar.css') }}"/>
    <script defer src="{{ asset('js/side-bar.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"/>
    <title>Penjual | PasarQ</title>
</head>
<body class="container">
    <header>
        <nav>
        <button type="button" id="toggle-btn">
          <i class="fa fa-bars"></i>
        </button>
        <span><a href="/">Penjual - PasarQ</a></span>
        <ul class="sidebar-menu">
          <li><a href="index.html" class="tombolnav"><i class="fa fa-home"> ProfilePenjual</i></a></li>
          <li><a href="/dashboard" class="tombolnav"><i class="fa fa-suitcase"> ListProduk</i></a></li>
          <li><a href="halaman3.html" class="tombolnav"><i class="fa fa-user"> Riwayat</i></a></li>
          <li><form method="POST" action="{{ route('logout') }}">
                                    @csrf
    
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
        </ul>
      </nav>
        </header>
    <main class="container">
        <?php
            $namaUser = auth()->user()->name;
            date_default_timezone_set('Asia/Jakarta');
            $jam = date('H');
            if ($jam >= 0 && $jam < 12) {
                $greeting = 'Selamat pagi!';
            } elseif ($jam >= 12 && $jam < 15) {
                $greeting = 'Selamat siang!';
            } elseif ($jam >= 15 && $jam < 18) {
                $greeting = 'Selamat sore!';
            } else {
                echo "Selamat malam!";
            }
            $totalProduk = $produk->count();
        ?>
        
        <h2 style="text-align: center">{{ $greeting }}</h2>
        <h1 style="text-align: center">{{ $namaUser }}</h1>
        <hr class="garis">
        <div class="container text-center">
            <div class="row">
              <div class="col">
                <div class="card">
                    <p>Total Produk</p>
                    <h1>{{ $totalProduk }}</h1>
                </div>
              </div>
              <div class="col">
                <div class="card">
                    <p>Total Penjualan</p>
                    <h1>Belum ada tabel riwayat</h1>
                </div>
              </div>
            </div>
        </div>
    </main>
    <footer></footer>
</body>
</html>