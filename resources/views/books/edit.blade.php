@extends('layout')

@section('title')
Edit Book - {{$book->title}}
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{Route('books.update',$book->id)}}" enctype="multipart/form-data">
@csrf

     <div class="mb-3">
       <input type="text" name='title' class="form-control"  placeholder="title" value="{{ old('title') ?? $book->title }}">
     </div>

     <div class="mb-3">
       <textarea class="form-control" name="desc" rows="3" placeholder="description" >{{ old('desc') ?? $book->desc }}</textarea>
     </div>

     <div class="mb-3">
      <input class="form-control-file" type="file" name="img">
     </div>

     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="{{ route('books.index') }}" class="btn btn-danger" aria-current="page">Cancel</a>
</form>



@endsection