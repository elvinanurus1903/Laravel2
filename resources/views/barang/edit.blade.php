@extends('layouts.adminmain')
@section('title', 'Edit Data Barang')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Barang <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('barang.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="card-body">
            <form action="{{ route('barang.update', ['id_barang' => $barang->id_barang]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">
              </div>
              <div class="form-group">
                 <label>Ruangan</label>
        <select class="form-control" name="ruangan_id">
                          @foreach( $ruangan as $ruangan)
                              <option value="{{ $ruangan->id_ruangan }}" {{ $ruangan->id_ruangan == $barang->ruangan_id ? 'selected="selected"' : '' }}> {{ $ruangan->nama_ruangan}} </option>
                          @endforeach
          </select>
        </div>
        <div class="form-group">
                <label>Total</label>
                <input type="text" name="total" class="form-control" value="{{ $barang->total }}">
              </div>
        <div class="form-group">
                <label>Rusak</label>
                <input type="text" name="broken" class="form-control" value="{{ $barang->broken }}">
              </div>
              <div class="form-group">
         <label >Pilih Gambar</label>
         <br>
          <input type="file" name="image" />
                <img src="{{ URL::to('/') }}/images/{{ $barang->image }}" class="img-thumbnail" width="100" />
                          <input type="hidden" name="hidden_image" value="{{ $barang->image }}" />
        </div>
                <div class="form-group">
            <label>Dibuat Oleh</label>
             <input type="text" name="created_by" readonly value="{{$barang->created_by}}" class="form-control input-lg" />
            </div>
            <div class="form-group">
            <label>Diubah Oleh</label>
             <input type="text" name="updated_by" readonly value="{{ auth()->user()->id }}" class="form-control input-lg" />
            </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>
</section>
@endsection()