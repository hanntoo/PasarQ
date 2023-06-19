<x-app-layout>
    <div class="py-12 container">
        <div class="row">
            @foreach($produk as $item)
            <div class="col-12 col-xl-4 col-md-6 col-sm-9 py-2 d-flex justify-content-center">
                <div class="card-produk shadow bg-white position-relative" style="width: 20rem;">
                    <img class="card-img-top img-fluid rounded" src="{{ $item->foto_produk }}" alt="{{ $item->nama_produk }}">
                    <div class="card-body text-center body-produk">
                        @if(Auth::check())
                            @if($item->favorite->contains('id_produk', $item->id_produk) && $item->favorite->contains('id_pembeli', Auth::user()->id))
                                <form  class="favorite-form" action="{{ route('favorite.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                    <button type="submit" class="position-absolute icon-heart" style="top: 10px; right: 10px; background: none; color:red; border: none;"><i class="fas fa-heart"></i></button>
                                </form>
                            @else
                                <form class="favorite-form" action="{{ route('favorite.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                    <button type="submit" class="far fa-heart position-absolute icon-heart" style="top: 10px; right: 10px;"></button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="position-absolute icon-heart" style="top: 10px; right: 10px; background: none; color: border: none;"><i class="far fa-heart"></i></a>
                        @endif
                        <a href="{{ route('detail', ['id' => $item->id_produk]) }}" class="fas fa-eye position-absolute icon-eye" style="top: 10px; left: 10px;"></a>                        
                        <h4 class="card-title text-capitalize">{{ $item->nama_produk }}</h4>
                        <p class="card-text">Rp. {{ number_format($item->harga_produk) }},-</p>
                        @if(Auth::check())
                            @if($item->keranjang->contains('id_produk', $item->id_produk) && $item->keranjang->contains('id_pembeli', Auth::user()->id))
                                <form class="cart-form" action="{{ route('keranjang.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                    <button type="submit" class="btn" style="background-color: #dc3545; color: white;">Hapus dari Keranjang</button>
                                </form>
                            @else
                                <form class="cart-form" action="{{ route('keranjang.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #0d6efd; color:white; ">Tambah ke Keranjang</button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block">Tambah ke Keranjang</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>           
</x-app-layout>
