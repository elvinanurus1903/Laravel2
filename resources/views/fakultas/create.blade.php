 @extends('layouts.adminmain')

@section('content')
  <form method="post" action="{{ route('fakultas.store') }}" enctype="multipart/form-data">
       @csrf
           <div class="form-group">
            <label>Fakultas</label>
             <input type="text" name="name" class="form-control input-lg" />
            </div>
            <div class="form-group">
               <input type="submit" name="add" class="btn btn-primary" value="Add" />
            </div>
      </form>
    @endsection()