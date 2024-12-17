<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<x-header />

@if($id == 'all')
    <main>
        <x-form action="/search" price=True />

            @foreach($room as $roomOne)
                <div class="box_rooms">
                    <div class="box_room">
                        <a href="/layout/{{ $roomOne->id }}"> {{ $roomOne->name }}</a>
                        <img src="{{ asset($roomOne->img) }}" alt="room">
                        <p>
                            {{ $roomOne->description }}
                        </p>
                        <p>
                            {{ $roomOne->price }}
                        </p>
                    </div>
                </div>
            @endforeach
    </main>
@elseif(is_numeric($id))
    <x-room-cont :room="$room" :id="$id" />
@endif

<x-footer />

</body>
</html>
