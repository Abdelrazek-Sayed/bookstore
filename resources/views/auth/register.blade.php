 
@extends('layout')
@section('title')
Regiter 
@endsection


@section('main')
    


@if($errors->any())
@foreach ($errors->all()  as $error)
   <p>{{ $error }}</p> 
@endforeach
@endif

 <form action="{{url('/register')}}" method="post">
 @csrf
 <label>Name</label>
 <input type="text" name="name" class="form-control">
 <br>
 <label>Email</label>

 <input type="email" name="email" class="form-control">
 <br>
 <label>password</label>

  <input type="password" name="password" class="form-control">
 <br>
 <label>Confirm password</label>

 <input type="password" name="password_confirmation" class="form-control">
 <br>
  
 <input class="btn btn-sm btn-primary" type="submit" value="Register">

 
 </form>   

 @endsection