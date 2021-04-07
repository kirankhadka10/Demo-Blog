@extends('adminlte::page')

@section('title','Create Users')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title text-bold">Create Users</h3>
    <div class="card-tools">
      <a href="{{route('users.index')}}" class="btn btn-primary btn-sm">Show Users</a>
    </div>
  </div>
  <x-alert/>
  <div class="card-body">
    <table class="table">
      <tr>
        <td>ID</td>
        <td>{{$user->id}}</td>
      </tr>
      <tr>
        <td>Name</td>
        <td>{{$user->name}}</td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td>{{$user->email}}</td>
      </tr>
      <tr>
        <td>Role</td>
        <td>{{$user->role}}</td>
      </tr>
      <tr>
        <td>Created at</td>
        <td>{{$user->created_at}}</td>
      </tr>
      <tr>
        <td>Updated at</td>
        <td>{{$user->updated_at}}</td>
      </tr>
    </table>
  </div>
</div>
@endsection