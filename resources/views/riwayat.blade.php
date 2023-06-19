<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="container">
        <div class="card">
            <div class="card-header">
                Checkout Produk
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Total Harga</th>
                            <th>jumlah produk</th>
                            <th>Foto Produk</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $data)
                            @include('components.riwayat', ['item' => $data])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 </div>
</div>
</x-app-layout>
