<table>
    <thead>
        <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Ruangan</th>
                <th>Total</th>
                <th>Rusak</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Edit</th>
        </tr>
    </thead>
   <tbody>
            @foreach($barang as $b)
            <tr>
                <td>{{$b->id_barang }}</td>
                <td>{{$b->nama_barang}}</td>
                <td>{{$b->ruangan->nama_ruangan}}</td>
                <td>{{$b->total}}</td>
                <td>{{$b->broken}}</td>
                <td>{{$b->created_at}}</td>
                <td>{{$b->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
</table>