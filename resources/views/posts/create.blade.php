@extends('adminlte::page')

@section('title','Create Post')


@section('content')
<x-alert/>
<x-editor field="#body"/>
<div class="card">
  <div class="card-header">
    <h3 class="card-title text-bold">Create Post</h3>
    <div class="card-tools">
      <a href="{{route('posts.index')}}" class="btn btn-primary btn-sm">Show All Posts</a>
    </div>
  </div>
  
  <div class="card-body">
    {{-- <ul>
      @foreach ($errors->all() as $err )
        <li>{{$err}}</li>
      @endforeach
    </ul> --}}
    <form action="{{route('posts.store')}}" method="POST">
    @csrf
    
    <x-input field='title' text='Title' type='text' />
    <x-input field='body' text='Body' type='textarea' />
    <button class="btn btn-primary" type="submit"> Save</button>
    </form>
  </div>
</div>
@endsection