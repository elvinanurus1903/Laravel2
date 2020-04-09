<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Barang</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Ruangan</th>
				<th>Total</th>
				<th>Rusak</th>
				<th>Dibuat Oleh</th>
                <th>Diedit Oleh</th>
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
 				<td>{{$b->created_updated->name}}</td>
                <td>{{$b->updated_created->name}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>