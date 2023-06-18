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
    <title>Tambah User | PasarQ</title>
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
    <main>
        <form action="/admin/store" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Tambah User</h2>
            <hr>
            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama User</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user">
                @error('nama_user')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email_user" class="form-label">Email User</label>
                <input type="email" class="form-control" id="email_user" name="email_user">
                @error('email_user')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_user" class="form-label">Password User</label>
                <input type="password" class="form-control" id="password_user" name="password_user">
                @error('password_user')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="role_user">Role User</label>
                    <select class="form-control" id="role_user" name="role_user">
                      <option value="invalid">Klik disini untuk memilih Role User</option>
                      <option value="penjual">penjual</option>
                      <option value="pembeli">pembeli</option>
                    </select>
                </div>
                @error('role_user')
                    <span class="text-danger" >{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-5">
                <button type="submit" name="submit" value="Save" class="btn btn-primary">Tambah</button>
                <a href="/admin"><button type="button" class="btn btn-outline-danger">Batal</button></a>
                </div>
            </div>
        </form>
    </main>
    <footer></footer>
</body>
</html>