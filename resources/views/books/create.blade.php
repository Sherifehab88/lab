@extends('layout')

@section('title')
Create Book
@endsection

@section('content')
<form method="POST" action="{{Route('books.store', )}}" enctype="multipart/form-data">
@csrf

     <div class="mb-3">
       <input type="text" name='title' class="form-control"  placeholder="title">
     </div>

     <div class="mb-3">
       <textarea class="form-control" name="desc" rows="3" placeholder="description"></textarea>
     </div>

     <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection