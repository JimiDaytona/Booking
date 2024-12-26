<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style_register.css') }}">
    <title>Document</title>
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('store') }}" method="post">
    @csrf
    <p>Name</p>
    <input type="text" name="name">
    <p>Email</p>
    <input type="text" name="email">
    <p>Password</p>
    <input type="password" name="password">
    <p>Password confirm</p>
    <input type="password" name="password_confirmation">
    <input type="submit">
</form>


</body>
</html>


