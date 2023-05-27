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
          <div>
            <p class="message">Admin</p>
          </div>
          <form class="login-form">
            <input type="text" placeholder="username"/>
            <input type="password" placeholder="password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="{{ route('admin.register') }}">Create an account</a></p>
          </form>
        </div>
      </div>
</body>
</html>