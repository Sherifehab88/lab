@extends('layout')

@section('title')
Login
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{Route('auth.handlelogin', )}}"  >
@csrf


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <hr>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<a href="{{ route('auth.github.redirect') }}" class="btn btn-success">Sign In With github</a>


@endsection