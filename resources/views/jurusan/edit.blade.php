@extends('layouts.adminmain')

@section('content')

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
                              <option value="{{ $fakultas->id }}" {{ $fakultas->name == $fakultas->id ? 'selected="selected"' : '' }}> {{ $fakultas->name}} </option>
                          @endforeach
          </select></div>
        <div class="form-group ">
         <input type="submit" name="edit" class="btn btn-warning" value="Edit" />
        </div>
  </form>

@endsection
