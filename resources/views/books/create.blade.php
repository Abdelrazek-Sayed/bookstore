 
@extends('layout')
@section('title')
 Create new book   
@endsection


@section('main')
    


@if($errors->any())
@foreach ($errors->all()  as $error)
   <p>{{ $error }}</p> 
@endforeach
@endif

 <form action="{{url('books/store')}}" method="post" enctype="multipart/form-data">
 @csrf
 <input type="text" name="name">
 <br>
 <textarea name="desc"   cols="30" rows="10"></textarea>
 <br>
 <div class="form-group">


    <label >Select Cat</label>

    <select class="form-control" name="cat_id">

         @foreach ($cats as $cat)
         <option value="{{$cat->id}}" >{{$cat->name}}</option>     
         @endforeach

    </select>

 </div>
 <br>
 <input type="file" class="form-control-file" name="img">
 <br>
 <input class="btn btn-sm btn-info" type="submit" value="Add Book">

 
 </form>   

 @endsection