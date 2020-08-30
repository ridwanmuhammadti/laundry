@extends('backend.master')
@section('judul')
    Data Customers
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">

        @if (auth()->user()->role == 'karyawan')
        <div class="card-header">
           
            <a href="/customer/create" class="btn btn-primary">Tambah Customer</a>
           
          </div>
          @endif
          <div class="card">
            <div class="card-body">
          <table class="table table-striped" id="table-1">
            <thead>
              <tr>
                <th>No</th>

                @if (auth()->user()->role == 'admin')
                <th>Cabang</th>
                @endif
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  @if (auth()->user()->role == 'admin')
                  <td>{{ $item->user->nama_cabang }}</td>
                  @endif
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->email }}</td>
                  <td>@if ($item->kelamin == 'L')
                      Laki - laki
                  @else 
                Perempuan @endif</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->no_telp }}</td>
                <td>
                  <a href="/customer/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                  <a href="/customer/{{$item->id}}/destroy" class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
          @endforeach
            </tbody>
          </table>

            </div>
       
        </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection