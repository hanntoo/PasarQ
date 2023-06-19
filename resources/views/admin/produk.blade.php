<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <title>Dashboard | PasarQ</title>
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
    <main>
        <h2>List Produk</h2>
        <hr>
        <div class="form-group">
            <form action="/admin/produk" method="GET">
                @csrf
                <div class="search-bar">
                    <input type="search" class="form-control" id="inputPassword3" placeholder="Cari Produk" name="cari_produk">
                    <button type="submit" name="submit" value="Save" class="btn btn-success" id="tombol">Cari</button>
                </div>
            </form>
        </div>
        <hr>
        @if ($produk->count() == 0)
            <div class="alert alert-danger" role="alert">
                <p class="text-center">Produk tidak ditemukan.</p>
            </div>
        @else
        <div class="kotak-tabel">
            <table class="table table-bordered border-dark">
                <thead>
                    <tr class="table-dark">
                    <th scope="col" class="col-1">Nama Toko</th>
                    <th scope="col" class="col-1">Nama Produk</th>
                    <th scope="col" class="col-1">Harga</th>
                    <th scope="col" class="col-1">Kategori</th>
                    <th scope="col" class="col-1">Berat</th>
                    <th scope="col" class="col-4">Foto</th>
                    <th scope="col" class="col-4">Deskripsi</th>
                    <th scope="col" class="col-1">Stok</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($produk as $p)
                        <tr>
                            <td>{{$p->penjual->name}}</td>
                            <td>{{$p->nama_produk}}</td>
                            <td>Rp.{{ number_format($p->harga_produk, 0, ',', '.') }}</td>
                            <td>{{ $p->kategori->nama ? $p->kategori->nama : 'N/A'}}</td>
                            @if ($p->berat_produk > 0)
                                <td class="text-center">{{$p->berat_produk}}</td>
                            @else
                                <td class="text-center"><p>N/A</p></td>
                            @endif
                            <td class="text-center"><img src="{{ asset($p->foto_produk) }}" alt="fotoproduk"></td>
                            <td>{{$p->deskripsi_produk}}</td>
                            @if ($p->stok_produk > 0)
                                <td class="text-center">{{$p->stok_produk}}</td>
                            @else
                                <td class="text-center"><p>Habis</p></td>
                            @endif
                        </tr>
                    @endforeach
                    <tr class="table-dark">
                        <?php
                            $totalProduk = $produk->count();
                        ?>
                        <td colspan="2" class="fw-bold text-center">Total Produk</td>
                        <td colspan="7" class="fw-bold text-center table-active">{{$totalProduk}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
    </main>
    <footer></footer>
    @if(session('error'))
    <script>
        window.alert('{{ session('error') }}');
    </script>
    @endif
</body>
</html>