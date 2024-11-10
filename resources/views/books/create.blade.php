@extends('layout')

@section('title')
Create Book
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{Route('books.store', )}}" enctype="multipart/form-data" >
@csrf

     <div class="mb-3">
       <input type="text" name='title' class="form-control"  placeholder="title" value="{{ old('title') }}">
     </div>

     <div class="mb-3">
       <textarea class="form-control" name="desc" rows="3" placeholder="description">{{ old('desc') }}</textarea>
     </div>

     <div class="mb-3">
      <input class="form-control-file" type="file" name="img">
     </div>

     Select Categories :
     @foreach ($categories as $category )
      <div class="form-check">
          <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
          {{ $category->name }}
        </label>
      </div>
     @endforeach

     <br>

     <button type="submit" class="btn btn-primary">Submit</button>
     <a href="{{route("books.index")}}" class="btn btn-danger" >Back</a> 

</form>



@endsection