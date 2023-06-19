<x-app-layout>
    <div class="container p-0">
        <div class="card px-4">
            <p class="h8 py-3">Checkout produk</p>
            <div class="row gx-3">
                <div class="col-6">
                    <img src="{{ $produk->foto_produk }}" alt="">
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Nama Produk</p>
                        <input class="form-control mb-3" type="text" placeholder="Name" value="{{ $produk->nama_produk }}" readonly>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Jumlah Produk</p>
                            <div class="input-group">
                                <input class="form-control" type="number" name="jumlah" id="jumlah_produk" min="1" value="1" readonly>
                                <button class="btn" type="button" id="btn_plus" style="background-color:#0275d8; color:white;">+</button>
                                <button class="btn btn-primary" type="button" id="btn_minus" style="background-color:#d9534f; color:white;">-</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Total Harga</p>
                            <input class="form-control mb-3" type="number" name="total_harga" id="total_harga" value="{{ $produk->harga_produk }}" readonly>
                        </div>
                    </div>
                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                    <div class="col-12">
                        <input type="submit" class="btn " value="Beli" style="background-color: #0275d8; color:white;">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const jumlahProdukInput = document.getElementById('jumlah_produk');
        const btnPlus = document.getElementById('btn_plus');
        const btnMinus = document.getElementById('btn_minus');
        const totalHargaInput = document.getElementById('total_harga');
        const hargaPerProduk = parseInt(totalHargaInput.value);

        btnPlus.addEventListener('click', function() {
            jumlahProdukInput.value = parseInt(jumlahProdukInput.value) + 1;
            calculateTotalHarga();
        });

        btnMinus.addEventListener('click', function() {
            if (parseInt(jumlahProdukInput.value) > 1) {
                jumlahProdukInput.value = parseInt(jumlahProdukInput.value) - 1;
                calculateTotalHarga();
            }
        });

        jumlahProdukInput.addEventListener('input', function() {
            calculateTotalHarga();
        });

        function calculateTotalHarga() {
            const jumlahProduk = parseInt(jumlahProdukInput.value);
            const totalHarga = hargaPerProduk * jumlahProduk;

            totalHargaInput.value = totalHarga;
            document.getElementById('getHarga').innerHTML = totalHarga;
        }
    </script>
</x-app-layout>
