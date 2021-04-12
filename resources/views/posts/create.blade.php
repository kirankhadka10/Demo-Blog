@extends('adminlte::page')

@section('title','Create Post')

@section('plugins.Select2',true)
@push('js')
<script>
  $(document).ready(function(){
    $('#category_id').select2();
  });
</script>
@endpush

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
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    
    <x-input field='title' text='Title' type='text' />

    <x-input field='body' text='Body' type='textarea' />

    <x-input
    field="image"
    text="Post Image"
    type="file"
    />

    <div class="form-group">
      <label for="category_id">Select Category</label>
      <select name="categories[]" multiple id="category_id" class="form-control">
      <option value="">Choose One</option>
      @foreach ($categories as $category )
        <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>

    @error('categories')
      <small class="form-text text-danger">{{$message}}</small>
    @enderror
    </div>
    
    <button class="btn btn-primary" type="submit"> Save</button>
    </form>
  </div>
</div>
@endsection