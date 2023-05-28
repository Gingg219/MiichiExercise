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
        <div>
            <table border="1px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Show</th>
                            @if (session()->get('role')===0)
                                <th>Delete</th>
                                <th>Edit</th>
                            @endif
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route("admin.users.show", $user) }}"> <i>Show</i></a>
                                </td>
                                @if (session()->get('role')===0)
                                    <td>
                                    <form action="{{ route("admin.users.destroy", $user) }}">
                                        @csrf
                                        @method('Delete')
                                        <button style="border: none"> <i>Delete</i></button>
                                    </form>
                                    </td>
                                    <td>
                                        <a href="{{ route("admin.users.edit", $user) }}"> <i>Edit</i></a>
                                    </td>
                                @endif
                            </tr> 
                        @endforeach
                        
                    </tbody>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
