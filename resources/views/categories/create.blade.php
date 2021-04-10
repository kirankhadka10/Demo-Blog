@extends('adminlte::page')

@section('title','Create Category')

@section('plugins.Select2',true)
@section('js')
<script>
  $(document).ready(function(){
    $('#category_id').select2();
  });
</script>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title text-bold">Create Category</h3>
    <div class="card-tools">
      <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm">Show Categories</a>
    </div>
  </div>
  <x-alert/>
  <div class="card-body">
    {{-- <ul>
      @foreach ($errors->all() as $err )
        <li>{{$err}}</li>
      @endforeach
    </ul> --}}
    <form action="{{route('categories.store')}}" method="POST">
    @csrf
    
    <x-input field='name' text='Category Name' type='text' />

    <div class="form-group">
      <label for="role">Category ID</label>
      <select name="category_id" id="category_id" class="form-control">
        <option value="">Choose Sub Category</option>
        @foreach ($categories as $cat)
          <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
    </div>
          <button class="btn btn-primary" type="submit"> Save</button>
    </form>
  </div>
</div>
@endsection