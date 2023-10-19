@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Post
        </div>
        <div class="card-body">
            <form action="{{url('admin/post/simpan')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                @error('title')<span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>@enderror
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $key => $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div> 

            <div class="mb-3">
                <label for="formFile" class="form-label">Gambar</label>
                <input class="form-control" type="file" name="image" id="formFile">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                @error('description')<span class="invalid-feedback" 
                    role="alert"><strong>{{$message}}</strong></span>@enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1"  checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Publish
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Draft
                </label>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-primary"> Save </button>
            </div>
            </form>
         </div>
    </div>
</div>



@endsection