
@extends('backend.master')
@section('judul')
    Edit Tags
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        
        <div class="card-body">
            <form action="/tag/{{$tag->id}}/update" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">tag</label>
                <input type="text" name="name" id="" value="{{$tag->name}}" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection