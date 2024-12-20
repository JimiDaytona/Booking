<div class="room_cont">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('fail'))
        <div class="alert alert-fail">
            {{ session('fail') }}
        </div>
    @endif


    <div class="name">
        <p> {{ $room->name }}</p>
    </div>

    <div class="img">
        <img src="{{ asset($room->img) }}" alt="room">
    </div>

    <div class="desk">
        <p>
            {{ $room->description }}
        </p>
    </div>
        @auth()
            <x-form action="/resrvations/{{ $id }}"/>
        @endif
    <a href="/layout/all">Назад</a>

</div>
