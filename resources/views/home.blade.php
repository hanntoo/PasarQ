<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide custom-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($produk as $index => $p)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ $p->foto_produk }}" class="d-block w-100 mw-100" alt="{{ $p->nama_produk }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12 container">
        <div class="row">
            @foreach($produk as $item)
            <div class="col-12 col-xl-4 col-md-6 col-sm-9 py-2 d-flex justify-content-center">
                <div class="card-produk shadow bg-white position-relative" style="width: 20rem;">
                    <img class="card-img-top img-fluid rounded" src="{{ $item->foto_produk }}" alt="{{ $item->nama_produk }}">
                    <div class="card-body text-center body-produk">
                        <a href="{{ route('favorite', ['id' => $item->id_produk]) }}" class="fas fa-heart position-absolute icon-heart" style="top: 10px; right: 10px;"></a>
                        <a href="{{ route('detail', ['id' => $item->id_produk]) }}" class="fas fa-eye position-absolute icon-eye" style="top: 10px; left: 10px;"></a>                        
                        <h4 class="card-title text-capitalize">{{ $item->nama_produk }}</h4>
                        <p class="card-text">Rp. {{ number_format($item->harga_produk) }},-</p>
                        <p class="card-text">Stok : {{ $item->stok_produk }}</p>
                        <a class="btn-cart" href="{{ route('keranjang', ['id' => $item->id_produk]) }}"><i class="fas fa-shopping-bag"></i> Keranjang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>           
</x-app-layout>
