@extends('layout')

@section('title')
Register
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{Route('auth.handleregister', )}}"  >
@csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputname"  placeholder="Enter name" value="{{ old('name') }}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
    <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <hr>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection