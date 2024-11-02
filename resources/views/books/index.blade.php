@extends('layout')
@section('title')
All Books
@endsection
@section('content') 

<h3>Add Note</h3>
<a href="{{ route('notes.create') }}" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">Create</a>

@auth

    @foreach (Auth::user()->notes as $note )
        <p>{{ $note->content }}</p> 
    @endforeach

@endauth

<h1>All Books</h1>

<a href="{{ route('books.create') }}" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">Create</a>

@foreach ($books as $book)
    <hr>
        <a href="{{route("books.show",$book->id)}}" ><h3>{{$book -> title}}</h3></a> 
    <p>{{$book -> desc}}</p>
    @auth
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="{{ route('books.edit',$book->id) }}" class="btn btn-warning" aria-current="page"> Book Edit  </a>
        @if (Auth::user()->is_admin == 1)
            <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger" aria-current="page">Delete</a>
        @endif
        </div>
    @endauth
@endforeach

{{$books->render()}}

@endsection


