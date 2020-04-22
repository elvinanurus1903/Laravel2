@extends('layouts.adminmain')
@section('title', 'Edit Data Jurusan')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Jurusan <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('jurusan.index') }}"> 
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
               <form method="post" action="{{ route('jurusan.update', $jurusan->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
        <div class="form-group">
         <label>Judul</label>
          <input type="text" name="name" value="{{ $jurusan->name}}" class="form-control" />
        </div>
        <div class="form-group">
          <label>Fakultas</label>
        <select class="form-control" name="fakultas_id">
                          @foreach( $fakultas as $fakultas)
                              <option value="{{ $fakultas->id_fakultas }}" {{ $fakultas->id_fakultas == $jurusan->fakultas_id ? 'selected="selected"' : '' }}> {{ $fakultas->nama_fakultas}} </option>
                          @endforeach
          </select></div>
        <div class="form-group ">
         <input type="submit" name="edit" class="btn btn-warning" value="Edit" />
        </div>
  </form>
</div></div></div></div></section>

@endsection
