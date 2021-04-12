@extends('adminlte::page')

@section('title','Post Details')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title text-bold">Post Details</h3>
    <div class="card-tools">
      <a href="{{route('posts.index')}}" class="btn btn-primary btn-sm">Show All Posts</a>
    </div>
  </div>
  <x-alert/>
  <div class="card-body">
    <table class="table">
      <tr>
        <td>ID</td>
        <td>{{$post->id}}</td>
      </tr>
      <tr>
        <td>Title</td>
        <td>{{$post->title}}</td>
      </tr>
      <tr>
        <td>Body</td>
        <td>{!! $post->body !!}</td>
      </tr>
      <tr>
        <td>Media</td>
        <td>
          @if ($post->media_id)
            <img src="/storage/{{$post->media->path}}" height="200px"/>
          @endif
        </td>
      </tr>
      <tr>
        <td>Created at</td>
        <td>{{$post->created_at}}</td>
      </tr>
      <tr>
        <td>Updated at</td>
        <td>{{$post->updated_at}}</td>
      </tr>
    </table>
  </div>
</div>
@endsection