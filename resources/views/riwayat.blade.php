<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ini adalah halaman riwayat pembelian!") }}
                </div>
            </div>
            <!-- resources/views/checkout.blade.php -->

<x-app-layout>
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
                            <th>Stok Produk</th>
                            <th>ID Produk</th>
                            <th>Foto Produk</th>
                            <th>ID User</th>
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
</x-app-layout>

        </div>
    </div>
</x-app-layout>
