<table>
    <thead>
        <tr>
                <th>No</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
        </tr>
    </thead>
   <tbody>
            @foreach($jurusan as $jurusan)
            <tr>
                <td>{{$jurusan->id}}</td>
                <td>{{$jurusan->name}}</td>
                <td>{{$jurusan->fakultas->nama_fakultas}}</td>
            </tr>
            @endforeach
        </tbody>
</table>