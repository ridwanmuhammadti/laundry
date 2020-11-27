@extends('backend.master')

@section('judul')
    Data Suara
@endsection

@section('content')
   <div class="row">
    <div class="col-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Data Suara</h4>
          </div>
          <div class="card-body">
            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="/suara/{{ $suara->id }}/update" method="POST">
                {{ csrf_field() }}
            
             

            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ $suara->nama }}">
            </div>
           

            <div class="form-group">
              <label>No KTP</label>
              <input type="text" class="form-control" name="no_ktp"  value="{{ $suara->no_ktp }}">
            </div>
           

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control"  value="{{ $suara->alamat }}">
            </div>
            <div class="form-group">
              <label>RT</label>
              <input type="text" name="rt" class="form-control"  value="{{ $suara->rt }}">
            </div>
            <div class="form-group">
              <label>RW</label>
              <input type="text" name="rw" class="form-control"  value="{{ $suara->rw }}">
            </div>
            <div class="form-group">
              <label for="">Kelurahan</label>
              <select name="kelurahan" id="" class="form-control select2">
                  <option>-- Pilih Kelurahan --</option>
                  <option value="Loktabat Utara" @if ($suara->kelurahan == 'Loktabat Utara')
                    selected
                @endif>Loktabat Utara</option>
                  <option value="Mentaos"  @if ($suara->kelurahan == 'Mentaos')
                    selected
                @endif>Mentaos</option>
                  <option value="Komet"  @if ($suara->kelurahan == 'Komet')
                    selected
                @endif>Komet</option>
                  <option value="Sungai Ulin"  @if ($suara->kelurahan == 'Sungai Ulin')
                    selected
                @endif>Sungai Ulin</option>
                  <option value="Sei Besar"  @if ($suara->kelurahan == 'Sei Besar')
                    selected
                @endif>Sei Besar</option>
                  <option value="Guntung Paikat"  @if ($suara->kelurahan == 'Guntung Paikat')
                    selected
                @endif>Guntung Paikat</option>
                  <option value="Kemuning"  @if ($suara->kelurahan == 'Kemuning')
                    selected
                @endif>Kemuning</option>
                  <option value="Loktabat Selatan" @if ($suara->kelurahan == 'Loktabat Selatan')
                    selected
                @endif>Loktabat Selatan</option>
                  <option value="Cempaka"  @if ($suara->kelurahan == 'Cempaka')
                    selected
                @endif>Cempaka</option>
                  <option value="Sungai Tiung"  @if ($suara->kelurahan == 'Sungai Tiung')
                    selected
                @endif>Sungai Tiung</option>
                  <option value="Bangkal"  @if ($suara->kelurahan == 'Bangkal')
                    selected
                @endif>Bangkal</option>
                  <option value="Palam"  @if ($suara->kelurahan == 'Palam')
                    selected
                @endif>Palam</option>
                  <option value="Landasan Ulin Timur"  @if ($suara->kelurahan == 'Landasan Ulin Timur')
                    selected
                @endif>Landasan Ulin Timur</option>
                  <option value="Syamsuddinoor"  @if ($suara->kelurahan == 'Syamsuddinoor')
                    selected
                @endif>Syamsuddinoor</option>
                  <option value="Guntung Manggis" @if ($suara->kelurahan == 'Guntung Manggis')
                    selected
                @endif>Guntung Manggis</option>
                  <option value="Guntung Payung" @if ($suara->kelurahan == 'Guntung Payung')
                    selected
                @endif>Guntung Payung</option>
                  <option value="Landasan Ulin Barat" @if ($suara->kelurahan == 'Landasan Ulin Barat')
                    selected
                @endif>Landasan Ulin Barat</option>
                  <option value="Landasan Ulin Tengah" @if ($suara->kelurahan == 'Landasan Ulin Tengah')
                    selected
                @endif>Landasan Ulin Tengah</option>
                  <option value="Landasan Ulin Utara" @if ($suara->kelurahan == 'Landasan Ulin Utara')
                    selected
                @endif>Landasan Ulin Utara</option>
                  <option value="Landasan Ulin Selatan" @if ($suara->kelurahan == 'Landasan Ulin Selatan')
                    selected
                @endif>Landasan Ulin Selatan</option>
                 
              </select>
          </div>
            <div class="form-group">
              <label>No TPS</label>
              <input type="text" name="no_tps" class="form-control"  value="{{ $suara->no_tps }}">
            </div>
            <div class="form-group">
              <label>Nomor Telpon</label>
              <input type="text" name="no_telpon" class="form-control"  value="{{ $suara->no_telpon }}">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="ket" class="form-control"  value="{{ $suara->ket }}">
            </div>
            <div class="form-group">
              <label>Koordinator</label>
              <input type="text" name="koordinator" class="form-control"  value="{{ $suara->koordinator }}">
            </div>
            <div class="form-group">
              <label>Tim Pendata</label>
              <input type="text" name="tim_pendata" class="form-control"  value="{{ $suara->tim_pendata}}">
            </div>
            <div class="form-group">
              <label>Tanggal Terima</label>
              <input type="text" class="form-control datepicker" name="tgl_terima"  value="{{ $suara->tgl_terima }}">
            </div>
            
           
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-warning mr-1" type="submit">Update</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
          </div>
        </form>
        </div>
      </div>

      <div class="col-12 col-md-8 col-lg-8">
          <div class="card">
            <div class="card-header">
              <a href="/suara/export" class="btn btn-success">Export All</a>
            </div>
              <div class="card-body">
                
            <div class="table-responsive">
                <table class="table table-striped" id="Table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No KTP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">RT</th>
                        <th scope="col">RW</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">No TPS</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Koordinator</th>
                        <th scope="col">Tim Pendata</th>
                        <th scope="col">Tanggal Terima</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($suaras as $item)
                          <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th scope="row">{{$item->nama}}</th>
                            <td>{{ $item->no_ktp }} Hari</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->rt }}</td>
                            <td>{{ $item->rw }}</td>
                            <td>{{ $item->kelurahan }}</td>
                            <td>{{ $item->no_tps }}</td>
                            <td>{{ $item->no_telpon }}</td>
                            <td>{{ $item->ket}}</td>
                            <td>{{ $item->koordinator }}</td>
                            <td>{{ $item->tim_pendata }}</td>
                            <td>{{ $item->tgl_terima->format('d-m-Y') }}</td>
                            <td>
                                <a href="/suara/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm delete" suara-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>
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
@endsection


@section('script')
    <script>
      $(document).ready( function () {
    $('#Table').DataTable();
} );
    </script>

    
<script>
  $('.delete').click(function(){
    var suara_id = $(this).attr('suara-id');
    swal({
        title: "Yakin?",
        text: "Mau dihapus Data suara dengan Id "+suara_id+" ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location = "/suara/"+suara_id+"/destroy";
          swal("Data Berhasil dihapus !!", {
            icon: "success",
          });
        } 
      });
  });
</script>
@endsection