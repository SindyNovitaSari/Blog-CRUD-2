@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7 mx-auto">

        <h1> {{$post->title}}</h1>

        <img src="{{url('uploads/post/'.$post->image)}}" class="card-img-top rounded" alt="{{$post->title}}">

        <p> {{$post->description}}</p>

        <span class="badge text-bg-primary">{{$post->category_name}}</span>

    </div>
</div>


@endsection