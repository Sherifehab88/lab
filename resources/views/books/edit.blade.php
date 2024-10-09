@extends('layout')

@section('title')
Edit Book - {{$book->title}}
@endsection

@section('content')
<form method="POST" action="{{Route('books.update',$book->id)}}" enctype="multipart/form-data">
@csrf

     <div class="mb-3">
       <input type="text" name='title' class="form-control"  placeholder="title" value="{{$book->title}}">
     </div>

     <div class="mb-3">
       <textarea class="form-control" name="desc" rows="3" placeholder="description" >{{$book->desc}}</textarea>
     </div>

     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="{{ route('books.index') }}" class="btn btn-danger" aria-current="page">Cancel</a>
</form>



@endsection