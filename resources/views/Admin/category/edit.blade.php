@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Edit Category</h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/categories/update/' .$category->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                         value="{{$category->name}}">
                        @error('name')<span class="invalid-feedback"
                            role="alert"><strong>{{$message}}</strong></span>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection 