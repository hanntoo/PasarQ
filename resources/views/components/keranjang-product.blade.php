            <div class="col-12 col-xl-4 col-md-6 col-sm-9 py-2 d-flex justify-content-center">
                <div class="card-produk shadow bg-white position-relative" style="width: 20rem;">
                    <img class="card-img-top img-fluid rounded" src="{{ $item->foto_produk }}" alt="{{ $item->nama_produk }}">
                    <div class="card-body text-center body-produk">
                        {{-- <a href="{{ route('favorite', ['id' => $item->id_produk]) }}" class="fas fa-heart position-absolute icon-heart" style="top: 10px; right: 10px;"></a> --}}
                        <a href="{{ route('detail', ['id' => $item->id_produk]) }}" class="fas fa-eye position-absolute icon-eye" style="top: 10px; left: 10px;"></a>                        
                        <h4 class="card-title text-capitalize">{{ $item->nama_produk }}</h4>
                        <p class="card-text">Rp. {{ number_format($item->harga_produk) }},-</p>
                        <p class="card-text">Stok : {{ $item->stok_produk }}</p>
                        <a href="{{ route('checkout.get', ['id'=> $item->id_produk]) }}" class="btn btn-success">checkout</a>
                        <br><br>
                        @if(Auth::check())
                            @if($item->keranjang->contains('id_produk', $item->id_produk) && $item->keranjang->contains('id_pembeli', Auth::user()->id))
                                <form class="cart-form" action="{{ route('keranjang.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                    <button type="submit" class="btn" style="background-color: #dc3545; color:white;">Hapus dari Keranjang</button>
                                </form>
                            @else
                                <form class="cart-form" action="{{ route('keranjang.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                    <button type="submit" class="btn" style="background-color: #0d6efd; color:white; ">Tambah ke Keranjang</button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block">Tambah ke Keranjang</a>
                        @endif
                    </div>
                </div>
            </div>