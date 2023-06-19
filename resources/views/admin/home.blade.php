<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/side-bar.css') }}"/>
    <script defer src="{{ asset('js/side-bar.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"/>
    <title>Admin | PasarQ</title>
</head>
<body class="container">
    <header>
        <nav>
        <button type="button" id="toggle-btn">
          <i class="fa fa-bars"></i>
        </button>
        <span><a href="/">Admin - PasarQ</a></span>
        <ul class="sidebar-menu">
        <li><a href="/profile" class="tombolnav"><i class="fa fa-home"> ProfileAdmin</i></a></li>
        <li><a href="/admin" class="tombolnav"><i class="fa fa-suitcase"> ListUser</i></a></li>
        <li><a href="/admin/produk" class="tombolnav"><i class="fa fa-suitcase"> ListProduk</i></a></li>
        <li><a href="/admin/kategori" class="tombolnav"><i class="fa fa-suitcase"> ListKategori</i></a></li>
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
                $greeting = 'Selamat malam!';
            }
            $totalUser = $user->count();
            $total = $totalUser - 1;
            $totalKategori = $kategori->count();
            $totalProduk = $produk->count();
        ?>
        
        <h2 style="text-align: center">{{ $greeting }}</h2>
        <h1 style="text-align: center">{{ $namaUser }}</h1>
        <hr class="garis">
        <div class="container text-center">
            <div class="row">
              <div class="col">
                <div class="card">
                    <p>Total User</p>
                    <h1>{{ $total }}</h1>
                </div>
              </div>
              <div class="col">
                <div class="card">
                    <p>Total Kategori</p>
                    <h1>{{ $totalKategori }}</h1>
                </div>
              </div>
            </div>
            <div class="row" style="padding-top: 20px">
                <div class="col">
                  <div class="card">
                      <p>Total Produk</p>
                      <h1>{{ $totalProduk }}</h1>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col">
                      <div id="carouselExampleCaptions" class="carousel slide">
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            @for ($i = 1; $i <= $totalProduk; $i++)
                              @php
                                  $I = $i + 1;
                              @endphp
                              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $I }}"></button>
                            @endfor
                          </div>
                          <div class="carousel-inner">
                            @foreach ($produk as $index => $p)
                              <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $p->foto_produk }}" class="d-block w-100" alt="{{ $p->nama_produk }}">
                                <div class="carousel-caption d-none d-md-block">
                                  <h3>{{ $p->nama_produk }}</h3>
                                  <h4>{{ $p->penjual->name }}</h4>
                                </div>
                              </div>
                            @endforeach
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                      </div>
                  </div>
              </div>
        </div>
    </main>
    <footer></footer>
</body>
</html>