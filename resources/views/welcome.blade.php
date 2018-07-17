@extends('layout')

@section('content')

  @if (Route::has('login'))
      <div class="top-right links">
          @auth
              <a href="{{ url('/home') }}">Home</a>
          @else
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
          @endauth
      </div>
  @endif

  <div class="content">
      <div class="title m-b-md">
          @php($teste = 'Mateus')
          @include('includes/any')
      </div>

      <div class="links">
          <a href="https://laravel.com/docs">Documentation</a>
          <a href="https://laracasts.com">Laracasts</a>
          <a href="https://laravel-news.com">News</a>
          <a href="https://forge.laravel.com">Forge</a>
          <a href="https://github.com/laravel/laravel">GitHub</a>
      </div>
      <hr>
      @for ($i = 0; $i < 10; $i++)
        {{ $i }}
      @endfor
  </div>
@endsection
