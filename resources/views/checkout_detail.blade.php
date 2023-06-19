<x-app-layout>
     <div class="container p-6">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Checkout</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between">
                                    <h4>Informasi Produk</h4>
                                    <h4>ID Checkout : {{ $produk->id }}</h4>
                                </div>
                                <p><strong>Nama Produk:</strong> {{ $produk->nama_produk }}</p>
                                <p><strong>Total Harga:</strong> {{ $produk->total_harga }}</p>
                                <h4><strong>Foto Produk</strong></h4>
                                <img src="{{ $produk->foto_produk }}" alt="{{ $produk->nama_produk }}" width="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>