@extends('layouts.app')

@section ('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Post
        </div>
        <div class="card-body">
            <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}">
                @error('title')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $key => $category)
                    <option value="{{$category->id}}" @if($post->category_id == 
                        $category->id){{'selected="selected"'}} @endif >{{$category->name}}</option>
                    @endforeach
                </select>
            </div> 

            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar</label>
                <input class="form-control" type="file" name="image" id="formFile">
                @if($post->image == null)
                @else
                <div class="col-md-3 my-3">
                <img src="{{url('uploads/post/' .$post->image)}}" class="img-fluid">
            </div>
            @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                    name="description">{{$post->description}}</textarea>
                @error('description')<span class="invalid-feedback" 
                    role="alert"><strong>{{$message}}</strong></span>@enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1" @if($post->status ==
                1){{'checked="checked"'}} @endif>
                <label class="form-check-label" for="flexRadioDefault1">
                    Publish
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault2" @if($post->status ==
                0){{'checked="checked"'}} @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                    Draft
                </label>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary"> Update </button>
            </div>
            </form>
         </div>
    </div>
</div>
@endsection