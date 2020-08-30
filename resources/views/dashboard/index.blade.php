@extends('backend.master')
@section('judul')
   Dashboard
@endsection

@section('content')

<div class="row">
  
 
  <div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title"><h4>Customers </h4>
       
        </div>
      
      </div>
      <div class="card-icon shadow-primary bg-primary">
        <i class="fas fa-user-friends"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Customer</h4>
        </div>
        <div class="card-body">
          {{ $customers }}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title"><h4>Laundry Masuk </h4>
       
        </div>
      
      </div>
      <div class="card-icon shadow-success bg-success">
        <i class="fas fa-poll"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Masuk</h4>
        </div>
        <div class="card-body">
          {{ $masuk }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title"><h4>Laundry Selesai </h4>
       
        </div>
      
      </div>
      <div class="card-icon shadow-primary bg-warning">
        <i class="fas fa-user-friends"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Selesai</h4>
        </div>
        <div class="card-body">
          {{ $selesai }}
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-stats">
        <div class="card-stats-title"><h4>Laundry diambil </h4>
       
        </div>
      
      </div>
      <div class="card-icon shadow-danger bg-danger">
        <i class="fas fa-book-open"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total diambil</h4>
        </div>
        <div class="card-body">
          {{ $diambil }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection