@extends('layouts.adminmain')

@section('content')

               <form method="post" action="{{ route('fakultas.update', $data->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
        <div class="form-group">
         <label>Judul</label>
          <input type="text" name="name" value="{{ $data->name}}" class="form-control" />
        </div>
        <div class="form-group ">
         <input type="submit" name="edit" class="btn btn-warning" value="Edit" />
        </div>
  </form>

@endsection
