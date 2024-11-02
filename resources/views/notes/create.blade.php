@extends('layout')

@section('title')
Add Note
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{Route('notes.store', )}}"  >
@csrf

     <div class="mb-3">
       <input type="text" name='content' class="form-control"  placeholder="content" value="{{ old('content') }}">
     </div>

     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="{{route("books.index")}}" class="btn btn-danger" >Back</a> 

</form>



@endsection