 
@extends('layout')
@section('title')
Login 
@endsection


@section('main')
    


@if($errors->any())
@foreach ($errors->all()  as $error)
   <p>{{ $error }}</p> 
@endforeach
@endif

 <form action="{{url('/login')}}" method="post">
 @csrf
  
 <label>Email</label>

 <input type="email" name="email" class="form-control">
 <br>
 <label>password</label>

  <input type="password" name="password" class="form-control">
 <br>
  
  
 <input class="btn btn-sm btn-primary" type="submit" value="Login">

 
 </form>   

 @endsection