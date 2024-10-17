@extends('layout')
@section('title')
All Categories
@endsection
@section('content') 

<h1>All categories</h1>
<a href="{{ route('categories.create') }}" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">Create</a>


@foreach ($categories as $category)
<hr>
<a href="{{route("categories.show",$category->id)}}" ><h3>{{$category -> name}}</h3></a> 


<div class="btn-group" role="group" aria-label="Basic mixed styles example">
<a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning" aria-current="page"> category Edit  </a>
<a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger" aria-current="page">Delete</a>
</div>

@endforeach

{{$categories->render()}}

@endsection


