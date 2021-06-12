<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>{{ config('app.name') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">


    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form method="POST">
        @csrf
        <img class="mb-4" src="{{ asset('images/admin_logo.jpeg') }}" alt="" width="200" height="200">
        <h1 class="h3 mb-3 fw-normal">Master管理画面</h1>

        <div class="form-floating">
          <input
            id="floatingInput"
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}"
            placeholder="ID"
          >
          <label for="floatingInput">メールアドレス</label>
        </div>
        @error('email')
          <div class="invalid-feedback d-block mb-2">{{ $message }}</div>
        @enderror
        <div class="form-floating">
          <input
            id="floatingPassword"
            type="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="パスワード"
          >
          <label for="floatingPassword">パスワード</label>
        </div>
        @error('password')
          <div class="invalid-feedback d-block mb-2">{{ $message }}</div>
        @enderror

        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン</button>
      </form>
    </main>
  </body>
</html>
