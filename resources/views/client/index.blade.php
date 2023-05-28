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
                <h5 class="message">User</h5>
            </div>
            <a href="{{ route('client.logout') }}" class="message"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form action="{{ route('client.logout') }}" method="POST" id="logout-form">
                @csrf
                {{-- <button type="submit">Logout</button> --}}
            </form>
        </div>
    </div>
</body>

</html>
