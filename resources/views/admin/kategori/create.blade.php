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
    <title>Tambah Kategori | PasarQ</title>
</head>
<body class="container">
    <header></header>
    <main>
        <form action="/admin/kategori/store" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Tambah Kategori</h2>
            <hr>
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                @error('nama_kategori')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-5">
                    <button type="submit" name="submit" value="Save" class="btn btn-primary">Tambah</button>
                    <a href="/admin/kategori" class="btn btn-outline-danger">Batal</a>
                </div>
            </div>
        </form>
    </main>
    <footer></footer>
</body>
</html>