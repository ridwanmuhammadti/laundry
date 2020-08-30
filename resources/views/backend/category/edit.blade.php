
@extends('backend.master')
@section('judul')
    Edit Category
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        
        <div class="card-body">
            <form action="/category/{{$category->id}}/update" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="name" id="" value="{{$category->name}}" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection