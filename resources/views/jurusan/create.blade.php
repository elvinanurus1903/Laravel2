 @extends('layouts.adminmain')
@section('title', 'Tambah Data Jurusan')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan <small>Add Data</small></h1>
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
  <form method="post" action="{{ route('jurusan.store') }}" enctype="multipart/form-data">
       @csrf
           <div class="form-group">
            <label>Jurusan</label>
             <input type="text" name="name" class="form-control input-lg" />
            </div>
              <div class="form-group">
             <label >Fakultas</label>
                <select class="form-control input-lg" id="genre" name="fakultas_id">
                    @foreach( $data as $fakultas)
                            <option value="{{$fakultas->id_fakultas }}">
                                  {{ $fakultas->nama_fakultas }}
                            </option>
                    @endforeach
                </select>
              </div>
            <div class="form-group">
               <input type="submit" name="add" class="btn btn-primary" value="Add" />
            </div>
      </form>
    </div>
  </div>
</div>
</div>
</section>
    @endsection()