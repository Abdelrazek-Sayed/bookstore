<html>
<head>
<title>BookStore | @yield('title')</title>
<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    
@yield('style')
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/books')}}">Home</a>
          </li>
         @guest
          <li class="nav-item">
            <a class="nav-link  " href="{{url('/register')}}" tabindex="-1" aria-disabled="true">Register</a>

          </li>
          <li class="nav-item">
            <a class="nav-link  " href="{{url('/login')}}" tabindex="-1" aria-disabled="true">Login</a>
          </li>
          @endguest
          @auth
          <li class="nav-item">
            <form action="{{ url('/logout')}}" method="POST">
                @csrf
                <input type="submit" name="" class="nav-link btn btn-info" value="Logout">
                {{-- <a class="nav-link btn" href="#" tabindex="-1" aria-disabled="true">Logout</a> --}}
            </form>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

<div class="container py-5">


    @yield('main');

</div>

    
<script src="{{ asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{ asset('js/bootstrap.bundle.js')}}"></script>
@yield('script')
</body>
</html>