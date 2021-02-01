 
@extends('layout')
@section('title')
 Create new cat   
@endsection


@section('main')
    


@if($errors->any())
@foreach ($errors->all()  as $error)
   <p>{{ $error }}</p> 
@endforeach
@endif

 <form action="{{url('cats/store')}}" method="post" >
 @csrf
 <input type="text" name="name">
 <br>
 
 <input class="btn btn-sm btn-info" type="submit" value="Add Cat">

 
 </form>   

 @endsection