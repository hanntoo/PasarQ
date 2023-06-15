<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Dashboard Kategori | PasarQ</title>
</head>
<body class="container">
    <header></header>
    <main>
        <h2>List Kategori</h2>
        <hr>
        <div class="form-group">
            <form action="/admin/kategori" method="GET">
                @csrf
                <div class="search-bar">
                    <input type="search" class="form-control" id="inputPassword3" placeholder="Cari Kategori" name="cari_kategori">
                    <button type="submit" name="submit" value="Save" class="btn btn-success" id="tombol">Cari</button>
                </div>
            </form>
        </div>
        <hr>
        <a href="/admin/kategori/create"><button class="btn btn-primary" type="submit" id="create-btn">Tambah Kategori</button></a>
        @if ($kategori->count() == 0)
            <div class="alert alert-danger" role="alert">
                <p class="text-center">Kategori tidak ditemukan.</p>
            </div>
        @else
        <div class="kotak-tabel">
            <table class="table table-bordered border-dark">
                <thead>
                    <tr class="table-dark">
                    <th scope="col" class="col-1">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col" class="col-1">Option</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($kategori as $k)
                        <tr>
                            <th scope="row">{{$k->id_kategori}}</th>
                            <td>{{$k->nama}}</td>
                            <td class="text-center optional">
                                <div>
                                    <a href="/admin/kategori/edit={{$k->id_kategori}}">
                                        <button type="button" class="btn btn-outline-primary" id="edit"><img src="{{ asset('icon/edit.png') }}" alt="Edit"></button>
                                    </a>
                                </div>
                                <div>
                                    <form action="/admin/kategori/hapus={{$k->id_kategori}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger" id="hapus"><img src="{{ asset('icon/hapus.png') }}" alt="Hapus"></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="table-dark">
                        <?php
                            $totalKategori = count($kategori);
                        ?>
                        <td colspan="2" class="fw-bold text-center">Total Kategori</td>
                        <td colspan="6" class="fw-bold text-center table-active">{{$totalKategori}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
    </main>
    <footer></footer>
</body>
</html>