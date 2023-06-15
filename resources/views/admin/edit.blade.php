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
    <title>Edit Produk | PasarQ</title>
</head>
<body class="container">
    <head></head>
    <main>
        <form action="/admin/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <h2>Edit User</h2>
            <hr>
            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama User</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user" value="{{ $user->nama_user }}">
                @error('nama_user')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email_user" class="form-label">Email User</label>
                <input type="email" class="form-control" id="email_user" name="email_user" value="{{ $user->email_user }}">
                @error('email_user')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_user" class="form-label">Password User</label>
                <input type="password" class="form-control" id="password_user" name="password_user">
                @error('password_user')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="role_user">Role User</label>
                    <select class="form-control" id="role_user" name="role_user">
                        <option value="invalid">Klik disini untuk memilih Role User</option>
                        <option value="penjual" {{ $user->role_user == 'penjual' ? 'selected' : '' }}>penjual</option>
                        <option value="pembeli" {{ $user->role_user == 'pembeli' ? 'selected' : '' }}>pembeli</option>
                    </select>
                </div>
                @error('role_user')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-5">
                    <button type="submit" name="submit" value="Save" class="btn btn-primary">Simpan</button>
                    <a href="/admin"><button type="button" class="btn btn-outline-danger">Batal</button></a>
                </div>
            </div>
        </form>
    </main>
    <footer></footer>
</body>
</html>