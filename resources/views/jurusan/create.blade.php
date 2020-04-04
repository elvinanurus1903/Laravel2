 @extends('layouts.adminmain')

@section('content')
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
                            <option value="{{$fakultas->id }}">
                                  {{ $fakultas->name }}
                            </option>
                    @endforeach
                </select>
              </div>
            <div class="form-group">
               <input type="submit" name="add" class="btn btn-primary" value="Add" />
            </div>
      </form>
    @endsection()