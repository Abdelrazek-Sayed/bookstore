@extends('layout')
@section('title')
 search 
@endsection
@section('main')
    
@endsection

<h1>search result </h1>
<hr><hr>

@foreach ($books as $book)
<h2>{{$book->name}}</h2>
<p>{{$book->desc}}</p>
<hr>
@endforeach


@endsection
 