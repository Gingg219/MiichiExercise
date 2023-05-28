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
        <div class="form">
          <div>
            <p class="message">User</p>
          </div>
          <form class="register-form" action="{{ route('client.registering') }}" method="POST">
            @csrf
            <input type="text" placeholder="name" name="name" value="{{ old('name') }}" />
            <input type="text" placeholder="email address" name="email" value="{{ old('email') }}" />
            <input type="password" placeholder="password" name="password" value="{{ old('password') }}" />
            <button type="submit">create</button>
            <p class="message">Already registered? <a href="{{ route('client.login') }}">Sign In</a></p>
          </form>
        </div>
      </div>
</body>
</html>