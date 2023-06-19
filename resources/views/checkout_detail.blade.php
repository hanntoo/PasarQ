<x-app-layout>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Checkout</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Informasi Produk</h4>
                                <p><strong>Nama Produk:</strong> {{ $produk->nama_produk }}</p>
                                <p><strong>Total Harga:</strong> {{ $produk->total_harga }}</p>
                                <p><strong>Stok Produk:</strong> {{ $produk->stok_produk }}</p>
                                <p><strong>ID Produk:</strong> {{ $produk->id_produk }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Foto Produk</h4>
                                <img src="{{ $produk->foto_produk }}" alt="{{ $produk->nama_produk }}" width="200">
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>ID Checkout</h4>
                            <p>{{ $produk->id }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>