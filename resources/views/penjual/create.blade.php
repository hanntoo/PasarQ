<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/create_edit.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="{{ asset('js/main.js') }}"></script>
    <title>Tambah Produk | PasarQ</title>
</head>
<body class="container">
    <head>
        <nav>
            <button type="button" id="toggle-btn">
              <i class="fa fa-bars"></i>
            </button>
            <span>Penjual - PasarQ</span>
            <ul class="sidebar-menu">
              <li><a href="index.html"><i class="fa fa-home"></i>Profile Penjual</a></li>
              <li><a href="halaman2.html"><i class="fa fa-suitcase"></i>List Product</a></li>
              <li><a href="halaman3.html"><i class="fa fa-user"></i>Riwayat</a></li>
              <li><a href="halaman4.html"><i class="fa fa-gear"></i>Logout</a></li>
              <li id="bgModeBtn"><a href="#"><i id="bgModeIcon" class="fa fa-sun-o"></i>Mode</a></li>
            </ul>
          </nav>
    </head>
    <main>
        <form action="/dashboard/store" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Tambah Produk</h2>
            <hr>
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Teks | Contoh: Mangga Arumanis">
                @error('nama_produk')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_produk" class="form-label">Harga Produk</label>
                <input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="Angka | Contoh: 10000">
                @error('harga_produk')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="kategori_produk">Kategori Produk</label>
                    <select class="form-control" id="kategori_produk" name="kategori_produk">
                      <option value="invalid">Klik disini untuk memilih Kategori Produk</option>
                      @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}">{{$k->nama}}</option>
                      @endforeach
                    </select>
                </div>
                @error('kategori_produk')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="berat_produk" class="form-label">Berat Produk</label>
                <input type="text" class="form-control" id="berat_produk" name="berat_produk" placeholder="Angka dan sertakan satuannya | Contoh: 0.5 kg">
                @error('berat_produk')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                <textarea type="text" class="form-control input_deskripsi" id="deskripsi_produk" name="deskripsi_produk" placeholder="Teks | Contoh: Mangga Arumanis ini kami ambil dari Pengebun di Probolinggo, jadi dijamin keasliannya. Mangga ini kami jual kiloan, dengan rata-rata berat satu buahnya 0.5 kg. Stok 1, berarti sisa 1 kilogram Mangga (bisa jadi 2 Mangga, sesuai berat Mangga yang ada)"></textarea>
                @error('deskripsi_produk')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stok_produk" class="form-label">Stok Produk</label>
                <input type="number" class="form-control" id="stok_produk" name="stok_produk" placeholder="Angka | Contoh: 5">
                @error('stok_produk')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Produk</label>
                <input class="form-control" type="file" id="foto" name="foto">
                @error('foto')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-5">
                <button type="submit" name="submit" value="Save" class="btn btn-primary">Tambah</button>
                <a href="/dashboard"><button type="button" class="btn btn-outline-danger">Batal</button></a>
                </div>
            </div>
        </form>
    </main>
    <footer></footer>
</body>
</html>