@extends('backend.master')
@section('judul')
   Add Post
@endsection

@section('content')

        <form action="/post/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="category_id" id="" class="form-control select2">
                   
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Tags</label>
                <select name="tag[]" id="" class="form-control select2" multiple="">
                    
                    @foreach ($tag as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
           <div class="form-group">
               <label for="">Thumnail</label>
               <input type="file" name="image" id="" class="form-control">
           </div>
            <div class="form-group">
                <label>Content</label>
               
                  <textarea class="summernote" name="content"></textarea>
                
              </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        
@endsection