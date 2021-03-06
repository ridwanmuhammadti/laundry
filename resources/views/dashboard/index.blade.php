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

<div class="card">
  <div class="card-body">
    <table class="table table-striped" id="myTable">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Nama</th>
          <th>Tanggal Transaksi</th>
          <th>Status Order</th>
          <th>Status Payment</th>
          <th>Jenis Laundry</th>
          <th>Total</th>
          <th>Action</th>
          @if (auth()->user()->role == 'karyawan')
              
          <th>Details</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach ($proses as $item)
        <tr>
            <td>{{ $item->invoice }}</td>
            <td>{{ $item->customer->nama }}</td>
            <td>{{carbon\carbon::parse($item->tgl_transaksi)->format('d M Y')}}</td>
            <td>
              @if ($item->status_order == 'Selesai')
              <span class="badge badge-primary">Selesai</span>
              @elseif($item->status_order == 'Clear')
                  <span class="badge badge-success">Sudah Diambil</span>
              @elseif($item->status_order == 'Proses')
                  <span class="badge badge-secondary">Sedang Proses</span>
              @endif
            </td>
            <td>
              @if ($item->status_payment == 'Lunas')
              <span class="badge badge-primary">Sudah Dibayar</span>
          @elseif($item->status_payment == 'Belum')
              <span class="badge badge-danger">Belum Dibayar</span>
          @endif
            </td>
            <td>{{ $item->harga->jenis }}</td>
            <td>{{ Rupiah($item->total) }}</td>
        
          @if (auth()->user()->role == 'karyawan')
              
          <td>
            @if($item->status_payment == 'Belum')
                <form action="/transaksi/{{ $item->id }}/bayar/update" method="post">
                  {{ csrf_field() }}
                <button href="/transaksi/{{$item->id}}/bayar" class="btn btn-danger btn-sm"  onclick="return confirm('Anda yakin customer sudah bayar?')"><i class="fas fa-comment-dollar"></i></i></button>
              </form>
             
            @elseif($item->status_payment == 'Lunas' and $item->status_order == "Proses")
                <form action="/transaksi/{{ $item->id }}/selesai/update" method="post">
                  {{ csrf_field() }}
                <button href="/transaksi/{{$item->id}}/selesai" class="btn btn-success btn-sm"  onclick="return confirm('Anda yakin Laundry sudah selesai ?')">Selesai</button>
              </form>
              
            @elseif($item->status_order == 'Selesai')
            <form action="/transaksi/{{ $item->id }}/ambil/update" method="post">
              {{ csrf_field() }}
            <button href="/transaksi/{{$item->id}}/ambil" class="btn btn-warning btn-sm"  onclick="return confirm('Anda yakin Laundry sudah di ambil ?')">Ambil</button>
          </form>
            <a href="/transaksi/{{ $item->id }}/show" class="btn btn-sm btn-primary"><i class="fas fa-search-dollar"></i></i></a>
            @else
            
           @endif
          </td>

          
          @endif
          <td>
            <a href="/transaksi/{{ $item->id }}/show" class="btn btn-sm btn-primary"><i class="fas fa-search-dollar"></i></i></a>
          </td>
        </tr>
    @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection


@section('script')
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
@endsection