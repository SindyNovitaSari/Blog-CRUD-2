@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Create Category</h4>
            </div>
            <div class="card-body">
                <form action="{{route('categories.simpan')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="from-label">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')<span class="invalid-feedback"
                            role="alert"><strong>{{$message}}</strong></span>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection 
                        


        