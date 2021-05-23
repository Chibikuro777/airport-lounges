<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="{{ route('admin_login') }}" methid="POST">
    <img class="mb-4" src="{{ asset('images/admin_logo.jpeg') }}" alt="" width="200" height="200">
    <h1 class="h3 mb-3 fw-normal">Master管理画面</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
          <li class="list-unstyled">{{ $error }}</li>
      @endforeach
    </div>
    @endif

    @if (session('login_error'))
        <div class="alert alert_danger">
            {{ session('login_error') }}
        </div>
    @endif

    <div class="form-floating">
      <input type="id" class="form-control" id="floatingInput" placeholder="ID">
        
      <label for="floatingInput">ID</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="パスワード">
      <label for="floatingPassword">パスワード</label>
    </div>

    <div class="checkbox mb-3">
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン</button>
  </form>
</main>


    
  </body>
</html>
