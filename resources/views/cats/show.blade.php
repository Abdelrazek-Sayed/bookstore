 

@extends('layout')

@section('title')
 show cats   
@endsection


@section('main')
    

    <h1>{{$cat->name}}</h1>
    
    <p> <strong>Craeated At:</strong> {{$cat->created_at}}</p>
    <hr>
<h3> It's Courses</h3>
    @foreach ($cat->books as $book)
    
       <a href="{{url("/books/show/{$book->id}")}}"> <p>{{$book->name}}</p> </a>

    @endforeach
    <a href="{{url("/cats")}}">
    <button class="btn btn-sm btn-primary">
    
    Back
    </button>
    </a>

    @endsection