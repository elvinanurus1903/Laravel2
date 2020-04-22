@extends('layouts.adminmain')

@section('content')
 <!-- End Navbar -->

<section class="section">
	   <div class="section-header">
    <h1>Dashboard</h1>
</div>

	@if(auth()->user()->role == 'admin')

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
            	 <a href="{{ route('fakultas.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-building" aria-hidden="true"></i>
                  </div>
                   <div class="card-header">
                    <h4 >Fakultas</h4>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              	<a href="{{ route('jurusan.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-university" aria-hidden="true"></i>
                  </div>
                   <div class="card-header">
                    <h4 >Jurusan</h4>
                  </div>
                </div>
              </div>	
            <div class="col-lg-3 col-md-6 col-sm-6">
            	<a href="{{ route('ruangan.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-home" aria-hidden="true"></i>
                  </div>
                  <div class="card-header">
                    <h4 >Ruangan</h4>
                  </div>
                </div>
              </div>
          @endif
            <div class="col-lg-3 col-md-6 col-sm-6">
               <a href="{{ route('barang.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-cube fa-lg" aria-hidden="true"></i>
                  </div>
                   <div class="card-wrap">
                  <div class="card-header">
                    <h4>Barang</h4>
                  </div>
                </div>
              </div>
            </div>

</section>

@endsection()