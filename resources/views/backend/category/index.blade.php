@extends('backend.master')
@section('judul')
    Category
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
           
            <button class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModal">Create Categories</button>
           
          </div>
        <div class="card-body p-0">
          
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tbody><tr>
                <th>No</th>
                <th>Category</th>
                <th>Update</th>
                <th>Action</th>
              </tr>
              @foreach ($category as $item)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->updated_at}}</td>
                      <td>
                        <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/category/{{$item->id}}/delete" class="btn btn-danger btn-sm">Hapus</a>
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

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/category/store" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="">Category</label>
              <input type="text" class="form-control" name="name" placeholder="Category" required>
          </div>
         
        
  
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  
        </div>