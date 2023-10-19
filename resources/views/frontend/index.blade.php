@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card">
                <img src="{{url('uploads/post/'.$post->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <span class="badge text-bg-primary">{{$post->category_name}}</span>
                    <p class="card-text">{!!substr($post->description, 0, 50)!!}</p>
                    <a href="{{url('post/' .$post->slug)}}" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection