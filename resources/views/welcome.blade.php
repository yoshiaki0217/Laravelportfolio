@include('layouts.app_head')

<body>
  @include('layouts.app_header')
  <section>
    <div class="catch-inner">
      @if (Route::has('login'))
      <div class="main-form">
        @auth
        <a class="main-home" href="{{ url('/home') }}">Home</a>
        @else
        <a class="main-login" href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
        <a class="main-register" href="{{ route('register') }}">Register</a>
        @endif
        @endauth
      </div>
      @endif
      <a href="http://localhost:8000/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
    </div>
  </section>
</body>

</html>