@extends('layouts.adminmain')
@section('title', 'Data Barang')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
       @if($message = Session::get('success'))
          <div class="alert alert-success">
            <p> {{ $message }} </p>
          </div>
        @endif
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          @if(auth()->user()->role == 'admin')
          <table>
            <tr>
              <td width="900">
          <div class="card-header">
            <div class="form-group">
            <a href="{{ route('barang.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div></div></td>
          <td>
          <div class="card-header">
               <a href="cetak/cetak_pdf" class="btn btn-dark" target="_blank"> PDF </a>
               
            <a href="cetak/export_excel" class="btn btn-success my-3" target="_blank">EXCEL</a>
            </a>
  </div></td></tr>
        </table>
          @endif
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Barang</th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Total</th>
                  <th scope="col">Rusak</th>
                  <th scope="col">Dibuat Oleh</th>
                  <th scope="col">Diubah Oleh</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $barang)
                <tr>
                  <td>{{ $barang->id_barang }}</td>
                  <td><img src="{{ URL::to('/') }}/images/{{ $barang->image }}" class="img-thumbnail" width="50" /></td>
                  <td>{{ $barang->nama_barang }}</td>
                  <td>{{ $barang->ruangan->nama_ruangan }}</td>
                  <td>{{ $barang->total }}</td>
                  <td>{{ $barang->broken }}</td>
                  <td>{{ $barang->created_updated->name }}</td>
                  <td>{{ $barang->updated_created->name }}</td>
                  <td>
                    <a href="{{ route('barang.edit', ['id_barang' => $barang->id_barang]) }}">
              <button type="button" class="btn btn-sm btn-warning">Edit</button> 
              @if(auth()->user()->role == 'admin')
              |
               <a href="{{ route('barang.delete', ['id_barang' => $barang->id_barang]) }}"
                    onclick="return confirm('Delete data?');" 
                    >
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </a>
                  @endif
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {!! $data->appends(request()->except('page'))->render() !!}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">   
            </nav>
          </div>
        </div>
      </div>  
  </div>
</section>
@endsection()