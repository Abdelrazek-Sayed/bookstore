 

@extends('layout')

@section('title')
 show book   
@endsection


@section('main')
    

    <h1>{{$book->name}}</h1>
    <h5>{{$book->cat->name}}</h5>
    <p>{{$book->desc}}</p>
    <p> <strong>Craeated At:</strong> {{$book->created_at}}</p>
    <hr>
    <a href="{{url("/books")}}">
    <button class="btn btn-sm btn-primary">
    
    Back
    </button>
    </a>

    @endsection