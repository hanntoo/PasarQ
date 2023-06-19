<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">
                            <img src="{{ $produk->foto_produk }}" class="w-full" alt="{{ $produk->nama_produk }}">
                        </div>
                        <div class="w-full md:w-1/2 md:pl-4">
                            <div class="flex items-center justify-between mt-2 text-2xl font-bold">
                                <h2>{{ $produk->nama_produk }}</h2>
                                <h2>Stok: {{ $produk->stok_produk }}</h2>
                            </div>
                            <h4 class="text-xl font-bold mt-4">Rp. <?= number_format($produk->harga_produk); ?>,-</h4>
                            <p class="text-lg font-bold mt-4">Kategori: {{ $produk->kategori->nama }}</p>
                            <p class="text-lg font-bold mt-4">Penjual: {{ $produk->penjual->name }}</p>
                            <p class="text-lg font-bold mt-4">Berat: {{ $produk->berat_produk }}</p>
                            <p class="text-lg font-bold mt-4">Deskripsi Produk</p>
                            <p class="text-gray-600">{{ $produk->deskripsi_produk }}</p>
                            <div class="mt-4 flex items-center">
                                <label for="quantity" class="font-bold mr-2">Jumlah:</label>
                                <input type="number" class="form-input mt-1 block w-24" id="quantity" value="1" min="1">
                                <button class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambahkan ke Keranjang</button>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
