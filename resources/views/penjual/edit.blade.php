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
    <title>Edit Produk | PasarQ</title>
</head>
<body class="container">
    <header>
        <nav>
        <button type="button" id="toggle-btn">
          <i class="fa fa-bars"></i>
        </button>
        <span><a href="/">Penjual - PasarQ</a></span>
        <ul class="sidebar-menu">
          <li><a href="/profile" class="tombolnav"><i class="fa fa-home"> ProfilePenjual</i></a></li>
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
    <main>
        <form action="/dashboard/{{$produk->id_produk}}" method="POST" enctype="multipart/form-data">
            @method('put')
                @csrf
                <h2>Edit {{$produk->nama_produk}}</h2>
                <hr>
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{$produk->nama_produk}}" placeholder="Teks | Contoh: Mangga Arumanis">
                    @error('nama_produk')
                        <span class="text-danger" >{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga_produk" class="form-label">Harga Produk</label>
                    <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="{{$produk->harga_produk}}" placeholder="Angka | Contoh: 10000">
                    @error('harga_produk')
                        <span class="text-danger" >{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="kategori_produk" style="padding-bottom: 8px;">Kategori Produk</label>
                        <select class="form-control" id="kategori_produk" name="kategori_produk">
                          @foreach ($kategori as $k)
                            <option value="{{ $k->id_kategori }}" {{ $k->nama == $produk->kategori->nama ? 'selected' : '' }}>{{$k->nama}}</option>
                          @endforeach
                        </select>
                    </div>
                    @error('kategori_produk')
                        <span class="text-danger" >{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="berat_produk" class="form-label">Berat Produk</label>
                    <input type="text" class="form-control" id="berat_produk" name="berat_produk" value="{{$produk->berat_produk}}" placeholder="Angka dan sertakan satuannya | Contoh: 0.5 kg">
                    @error('berat_produk')
                        <span class="text-danger" >{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                    <textarea type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Teks | Contoh: Mangga Arumanis ini kami ambil dari Pengebun di Probolinggo, jadi dijamin keasliannya. Mangga ini kami jual kiloan, dengan rata-rata berat satu buahnya 0.5 kg. Stok 1, berarti sisa 1 kilogram Mangga (bisa jadi 2 Mangga, sesuai berat Mangga yang ada)">{{$produk->deskripsi_produk}}</textarea>
                    @error('deskripsi_produk')
                        <span class="text-danger" >{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stok_produk" class="form-label">Stok Produk</label>
                    <input type="number" class="form-control" id="stok_produk" name="stok_produk" value="{{$produk->stok_produk}}" placeholder="Angka | Contoh: 5">
                    @error('stok_produk')
                        <span class="text-danger" >{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Produk</label>
                    <div>
                        <img src="{{ asset($produk->foto_produk) }}" alt="fotoproduk" style="width: 150px; height: auto;">
                    </div>
                    <p>
                        <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Edit Foto Produk
                        </button>
                    </p>
                    @error('foto')
                        <span class="text-danger" >{{ $message }}</span>
                    @enderror
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <input class="form-control" type="file" id="foto" name="foto">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-sm-5">
                    <button type="submit" name="submit" value="Save" class="btn btn-primary">Simpan</button>
                    <a href="/dashboard"><button type="button" class="btn btn-outline-danger">Batal</button></a>
                    </div>
                </div>
        </form>
    </main>
    <footer></footer>
</body>
</html>