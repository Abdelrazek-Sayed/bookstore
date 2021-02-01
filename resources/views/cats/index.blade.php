


@extends('layout')


@section('title')
 index   
@endsection


@section('main')
    


<h1>All Cats</h1>
<a class="btn btn-sm btn-info" href="{{ url("/cats/create") }}">Add Cat</a>
   

<hr><hr>
<?php $counter =1;?>
@foreach ($cats as  $cat)
<div>
     <h2><a href="{{url("/cats/show/{$cat->id}")}}">{{$counter++}}-{{$cat->name}}</h2></a>
     <a class="btn btn-sm btn-info" href="{{ url("/cats/edit/{$cat->id}") }}">Edit</a>
     <a class="btn btn-sm btn-danger" href="{{ url("/cats/delete/{$cat->id}") }}">Delete</a>
     <hr>
</div>
@endforeach
     
 

@endsection