


@extends('layout')


@section('title')
 index   
@endsection
@section('main')
    

<h1>All Books</h1>
     @auth
<a class="btn btn-sm btn-info" href="{{ url("/books/create") }}">Add book</a>
     <form method="post" action="{{ url("/books/search")}}">
          <input type="text" name="search" placeholder="Search">
          <input type="submit" value="search">
     </form>
     @endauth
<hr><hr>
          @foreach ($books as $book)
     <div>
          <img src="{{ asset("uploads/$book->img") }}" height="50px">
          <h2><a href="{{url("/books/show/{$book->id}")}}">{{$book->name}}</a></h2>
          <br>
          <p>{{$book->cat->name}}</p>
          <br>
          <p>{{$book->desc}}</p>
          @auth
          <a class="btn btn-sm btn-info" href="{{ url("/books/edit/{$book->id}") }}">Edit</a>
          <a class="btn btn-sm btn-danger" href="{{ url("/books/delete/{$book->id}") }}">Delete</a>
          @endauth
          <hr>
     </div>
          @endforeach




{{$books->links()}}


@endsection