 <tr>
        <td>{{ $item->nama_produk }}</td>
        <td>{{ $item->total_harga }}</td>
        <td>{{ $item->stok_produk }}</td>
        <td>{{ $item->id_produk }}</td>
        <td>
            <img src="{{ $item->foto_produk }}" alt="{{ $item->nama_produk }}" width="100">
        </td>
        <td>{{ $item->id }}</td>
        <td> <a href="{{ route('riwayat.detail', ['id'=>$item->id]) }}">Detail</a> </td>
    </td>    
</tr>