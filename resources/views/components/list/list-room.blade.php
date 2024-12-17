<div id="list_room" style="display: none">
    <p>Rooms</p>
    <lu>
        @foreach($rooms as $room)
            <li>
                <p>{{ $room -> name }}</p>
                <p>{{ $room -> img }}</p>
                <p>{{ $room -> price }}</p>
                <p>{{ $room -> person }}</p>
            </li>
        @endforeach
    </lu>
</div>
