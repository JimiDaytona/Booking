<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="box-title">
    <h1>My booking</h1>
</div>

<div class="box-book">
    @foreach($resrvations as $resrvation)
        <div class="box-room">
            <p> {{ $resrvation->dateIn }} - {{ $resrvation->dateOut }} </p>
            <a href="/layout/{{ $resrvation->room_id }}"> Room </a>
            <a href="{{route('dellBooking', $resrvation->id)}}">Delete Booking</a>
        </div>
    @endforeach
        <a href="/layout/all">На главную</a>
</div>
</body>
</html>

