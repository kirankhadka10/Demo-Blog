@extends('adminlte::page')

@section('title','Category Details')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title text-bold">Category Details</h3>
    <div class="card-tools">
      <a href="{{route('categories.index')}}" class="btn btn-primary btn-sm">Show All Categories</a>
    </div>
  </div>
  <x-alert/>
  <div class="card-body">
    <table class="table">
      <tr>
        <td>ID</td>
        <td>{{$category->id}}</td>
      </tr>
      <tr>
        <td>Category Name</td>
        <td>{{$category->name}}</td>
      </tr>
      <tr>
        <td>Parent Category</td>
        <td>
          @if ($category->category_id)
           <a href="{{route('categories.show',$category->category_id)}}">
            {{$category->category->name}}
          </a> 
          @endif
        </td>
      </tr>
      <tr>
        <td>Created at</td>
        <td>{{$category->created_at}}</td>
      </tr>
      <tr>
        <td>Updated at</td>
        <td>{{$category->updated_at}}</td>
      </tr>
    </table>
  </div>
</div>
@endsection