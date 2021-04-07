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
    {{-- <ul>
      @foreach ($errors->all() as $err )
        <li>{{$err}}</li>
      @endforeach
    </ul> --}}
    <form action="{{route('users.store')}}" method="POST">
    @csrf
    
    <x-input field='name' text='Full Name' type='text' />

    <x-input field='email' text='E-mail' type='email' />

    <x-input field='password' text='Password' type='password' />

    <div class="form-group">
      <label for="role">Role</label>
      <select name="role" id="role" class="form-control">
        @foreach ($roles as $role)
          <option value="{{$role}}">{{$role}}</option>
        @endforeach
      </select>
    </div>
          <button class="btn btn-primary" type="submit"> Save</button>
    </form>
  </div>
</div>
@endsection