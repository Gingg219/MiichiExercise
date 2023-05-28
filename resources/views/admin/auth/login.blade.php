<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="login-page">
    <div class="form" style="background: gray">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div>
        <p class="message">Admin</p>
      </div>
      @if(Session::has('fail'))
        <p>{{ Session::get('fail') }}</p>
      @endif
          <form class="login-form" action="{{ route('admin.login_handler') }}" method="POST">
            @csrf
            <input type="text" placeholder="email" name="email" value="{{ old('email') }}" />
            <input type="password" placeholder="password" name="password" />
            <button type="submit">login</button>
            <p class="message">Not registered? <a href="{{ route('admin.register') }}">Create an account</a></p>
          </form>
        </div>
      </div>
</body>
</html>