@extends('layouts.app')


@section('content')
<div class="container">
  <div class="card-header">
    <h3 class="mb-0 text-center" style="font-weight: bold">{{$post->title}}</h3>
  </div>
  <div class="card-body">
    {!! $post->body !!}
  </div>

  <hr>
  <p>Posted on: {{$post->created_at}}</p>
</div>
@endsection