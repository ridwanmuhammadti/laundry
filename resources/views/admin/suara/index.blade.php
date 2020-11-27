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

                    
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
          </div>
        @endforeach

            <form action="/suara/store" method="POST">
                {{ csrf_field() }}
            
             


            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control">
            </div>
           

            <div class="form-group">
              <label>No KTP</label>
              <input type="text" class="form-control" name="no_ktp">
            </div>
           

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
              <label>RT</label>
              <input type="text" name="rt" class="form-control">
            </div>
            <div class="form-group">
              <label>RW</label>
              <input type="text" name="rw" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Kelurahan</label>
              <select name="kelurahan" id="" class="form-control select2">
                  <option>-- Pilih Kelurahan --</option>
                  <option value="Loktabat Utara">Loktabat Utara</option>
                  <option value="Mentaos">Mentaos</option>
                  <option value="Komet">Komet</option>
                  <option value="Komet">Komet</option>
                  <option value="Sungai Ulin">Sungai Ulin</option>
                  <option value="Sei Besar">Sei Besar</option>
                  <option value="Guntung Paikat">Guntung Paikat</option>
                  <option value="Kemuning">Kemuning</option>
                  <option value="Loktabat Selatan">Loktabat Selatan</option>
                  <option value="Cempaka">Cempaka</option>
                  <option value="Sungai Tiung">Sungai Tiung</option>
                  <option value="Bangkal">Bangkal</option>
                  <option value="Palam">Palam</option>
                  <option value="Landasan Ulin Timur">Landasan Ulin Timur</option>
                  <option value="Syamsuddinoor">Syamsuddinoor</option>
                  <option value="Guntung Manggis">Guntung Manggis</option>
                  <option value="Guntung Payung">Guntung Payung</option>
                  <option value="Landasan Ulin Barat">Landasan Ulin Barat</option>
                  <option value="Landasan Ulin Tengah">Landasan Ulin Tengah</option>
                  <option value="Landasan Ulin Utara">Landasan Ulin Utara</option>
                  <option value="Landasan Ulin Selatan">Landasan Ulin Selatan</option>
                 
              </select>
          </div>
            <div class="form-group">
              <label>No TPS</label>
              <input type="text" name="no_tps" class="form-control">
            </div>
            <div class="form-group">
              <label>Nomor Telpon</label>
              <input type="text" name="no_telpon" class="form-control">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="ket" class="form-control">
            </div>
            <div class="form-group">
              <label>Koordinator</label>
              <input type="text" name="koordinator" class="form-control">
            </div>
            <div class="form-group">
              <label>Tim Pendata</label>
              <input type="text" name="tim_pendata" class="form-control">
            </div>
            <div class="form-group">
              <label>Tanggal Terima</label>
              <input type="text" class="form-control datepicker" name="tgl_terima">
            </div>
            
           
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
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
                            <td>{{ $item->no_ktp }}</td>
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