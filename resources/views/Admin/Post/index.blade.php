@extends('layouts.app')

@section('content')

<div class="container">
  @if(session('message'))
  <div class="alert alert-success">{{session('message')}}</div>
  @endif
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-item-center">
            <h4>Post</h4>
            <a href="{{url('admin/posts/create')}}" class="btn btn-primary">Tambah Post</a>
</div> 
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">Title</th>
      <th scope="col">slug</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @php
    $no = 1;
@endphp  

    @forelse($posts as $key => $data)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$data->title}}</td>
      <td>{{$data->slug}}</td>
      <td>
        <a href="{{url('admin/posts/edit/' .$data->id)}}" class="btn btn-primary">Edit</a>
        @include('admin.post.delete')
      </td>
    </tr>
  <tr>
    @empty
    <td colspan="4" class="text-center">Tidak ada data Kategory</td>
</tr>
    @endforelse
   
  </tbody>
</table>
</div>

@endsection