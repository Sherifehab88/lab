@extends('layout')

@section('title')
Edit Category - {{$category->name}}
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{Route('categories.update',$category->id)}}" enctype="multipart/form-data">
@csrf

     <div class="mb-3">
       <input type="text" name='name' class="form-control"  placeholder="name" value="{{ old('name') ?? $category->name }}">
     </div>


     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="{{ route('categories.index') }}" class="btn btn-danger" aria-current="page">Cancel</a>
</form>



@endsection