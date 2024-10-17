@extends('layout')

@section('content') 
<h1>Category ID : {{$category->id}}</h1>
<h3>{{$category->name}}</h3>

<hr>
<a href="{{route("categories.index")}}" class="btn btn-primary" >Back</a> 

@endsection