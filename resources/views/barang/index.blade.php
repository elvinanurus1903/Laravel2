@extends('layouts.adminmain')
@section('title', 'Data Barang')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
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
            <a href="{{ route('fakultas.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          @if(auth()->user()->role == 'admin')
          <div class="card-header">
            <a href="{{ route('barang.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          @endif
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Barang</th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Total</th>
                  <th scope="col">Rusak</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $barang)
                <tr>
                  <td>{{ $barang->id_barang }}</td>
                  <td>{{ $barang->nama_barang }}</td>
                  <td>{{ $barang->ruangan->nama_ruangan }}</td>
                  <td>{{ $barang->total }}</td>
                  <td>{{ $barang->broken }}</td>
                  <td>
                    <a href="{{ route('barang.edit', ['id_barang' => $barang->id_barang]) }}">
              <button type="button" class="btn btn-sm btn-warning">Edit</button> |
              @if(auth()->user()->role == 'admin')
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