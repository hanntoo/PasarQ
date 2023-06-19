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
            <div class="py-12 container">
                <div class="row">
                    @foreach($produk as $item)
                        @include('components.product', ['item' => $item])
                    @endforeach
                </div>
            </div>       
        </div>
    </x-slot>

</x-app-layout>