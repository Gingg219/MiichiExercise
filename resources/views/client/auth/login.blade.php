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
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div class="form">
          <div>
            <p class="message">User</p>
          </div>
          <form class="login-form" action="{{ route('client.login_handler') }}" method="POST">
            @csrf
            <input type="text" placeholder="email" name="email" value="{{ old('email') }}" />
            <input type="password" placeholder="password" name="password" />
            <button type="submit">login</button>
            <p class="message"><a href="{{ route('client.register') }}">Logout</a></p>
          </form>
        </div>
      </div>
</body>
</html>