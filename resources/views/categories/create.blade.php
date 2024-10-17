@extends('layout')

@section('title')
Create Category
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{Route('categories.store', )}}" enctype="multipart/form-data" >
@csrf

     <div class="mb-3">
       <input type="text" name='name' class="form-control"  placeholder="name" value="{{ old('name') }}">
     </div>


     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="{{route("books.index")}}" class="btn btn-danger" >Back</a> 

</form>



@endsection