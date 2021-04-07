@extends('adminlte::page')

@section('title','Update Users')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title text-bold">Update Users</h3>
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
    <form action="{{route('users.update',$user->id)}}" method="POST">
    @csrf
    @method('PATCH')
    <x-input field='name' text='Full Name' type='text' :current="$user->name"  />

    <x-input field='email' text='E-mail' type='email' :current="$user->email" />

    <x-input field='password' text='Password' type='password' />

    <div class="form-group">
      <label for="role">Role</label>
      <select name="role" id="role" class="form-control">
        @foreach ($roles as $role)
          <option 
          value="{{$role}}"
          @if ($role == $user->role) selected @endif
          >{{$role}}</option>
        @endforeach
      </select>
    </div>
          <button class="btn btn-primary" type="submit"> Save</button>
    </form>
  </div>
</div>
@endsection