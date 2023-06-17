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
    <title>List User| PasarQ</title>
</head>
<body class="container">
    <header>
        <nav>
        <button type="button" id="toggle-btn">
          <i class="fa fa-bars"></i>
        </button>
        <span><a href="/">Admin - PasarQ</a></span>
        <ul class="sidebar-menu">
          <li><a href="index.html" class="tombolnav"><i class="fa fa-home"> ProfileAdmin</i></a></li>
          <li><a href="/admin" class="tombolnav"><i class="fa fa-suitcase"> ListUser</i></a></li>
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
        <h2>List User</h2>
        <hr>
        <div class="form-group">
            <form action="/admin" method="GET">
                @csrf
                <div class="search-bar">
                    <input type="search" class="form-control" id="inputPassword3" placeholder="Cari User" name="cari_user">
                    <button type="submit" name="submit" value="Save" class="btn btn-success" id="tombol">Cari</button>
                </div>
            </form>
        </div>
        <hr>
        <a href="/admin/create"><button class="btn btn-primary" type="submit" id="create-btn">Tambah User</button></a>
        @if ($user->count() == 0)
            <div class="alert alert-danger" role="alert">
                <p class="text-center">User tidak ditemukan.</p>
            </div>
        @else
        <div class="kotak-tabel">
            <table class="table table-bordered border-dark">
                <thead>
                    <tr class="table-dark">
                    <th scope="col" class="col-1">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="col-1">Role</th>
                    <th scope="col" class="col-1">Option</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($user as $u)
                        @if ($u->role !== 'admin')
                            <tr>
                                <th scope="row">{{ $u->id }}</th>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->role }}</td>
                                <td class="text-center optional">
                                    <div>
                                        <a href="/admin/edit={{ $u->id }}">
                                            <button type="button" class="btn btn-outline-primary" id="edit">
                                                <img src="{{ asset('icon/edit.png') }}" alt="Edit">
                                            </button>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="/admin/hapus={{ $u->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger" id="hapus">
                                                <img src="{{ asset('icon/hapus.png') }}" alt="Hapus">
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class="table-dark">
                        <?php
                            $totalUser = DB::table('users')->count();
                        ?>
                        <td colspan="2" class="fw-bold text-center">Total User</td>
                        <td colspan="6" class="fw-bold text-center table-active">{{$totalUser}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
    </main>
    <footer></footer>
</body>
</html>