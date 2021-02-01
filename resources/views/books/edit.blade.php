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



   <form action="{{url("books/update/{$book->id}")}}" method="post" enctype="multipart/form-data">
  
   @csrf
   <img src="{{ asset("uploads/$book->img") }}" height="50px">
   <input type="text" name="name" value="{{$book->name}}">
   <br>
   <textarea name="desc"   cols="30" rows="10">{{$book->desc}}</textarea>
   <br>
   <label >Select Cat</label>

   <select class="form-control" name="cat_id">

        @foreach ($cats as $cat)
        <option value="{{$cat->id}}" @if($book->cat->id == $cat->id) selected @endif >{{$cat->name}}</option>     
        @endforeach

   </select>
   <br>
   <input type="file" class="form-control-file" name="img">
   <br>
   <input class="btn btn-sm btn-danger" type="submit" value="edit Book">
   </form> 
</div>
 
 @endsection