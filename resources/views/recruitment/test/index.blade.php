<!doctype html>
<html lang="en">
  <head>
    @include('partial.head')
    <!-- Custom styles for this template -->
    <link href="{{ asset('dist/css/signin.css') }}" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
    @if($errors->any())
      <div class="alert alert-danger" role="alert">
          <h4>{{$errors->first()}}</h4>
        </div>
    @endif
  <form method="get" action="/recruitment/test/main" enctype="multipart/form-data">
    @csrf
    <img class="mb-4" src="{{ asset('dist/img/Logo PWI.png') }}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="userName" placeholder="User">
      <label for="floatingInput">User</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>


    
  </body>
</html>
