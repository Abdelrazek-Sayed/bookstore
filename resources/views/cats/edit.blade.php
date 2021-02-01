@extends('layout')
@section('title')
    
 edit 
@endsection

@section('main')
    

@if($errors->any())
@foreach ($errors->all()  as $error)
   <p>{{ $error }}</p> 
@endforeach
@endif
<div class="container py-5" >



   <form action="{{url("cats/update/{$cat->id}")}}" method="post" >
  
   @csrf
   
   <input type="text" name="name" value="{{$cat->name}}">
   <br>
   <input class="btn btn-sm btn-danger" type="submit" value="edit Cat">
   </form> 
</div>
 
 @endsection