@extends('backend.master')
@section('judul')
    Post
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
           
            <a href="/post/create" class="btn btn-primary">Create Post</a>
           
          </div>
        <div class="card-body p-0">
          
          <div class="table-responsive">
            <table class="table table-striped table-md">
              <tbody><tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              @foreach ($post as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>
                      @foreach ($item->tag as $tags)
                          <ul>
                            <li>{{$tags->name}}</li>
                          </ul>
                      @endforeach
                    </td>
                    <td><img src="{{asset('/images/'.$item->image)}}" class="img-fluid" width="100px" alt="" srcset=""></td>
                    <td>
                      <a href="/post/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                      <a href="/post/{{$item->id}}/delete" class="btn btn-danger btn-sm">Hapus</a>
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