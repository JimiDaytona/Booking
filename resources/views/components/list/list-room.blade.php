<div id="list_room" style="display: none">
    <p>Rooms</p>
    <lu>
        @foreach($rooms as $room)
            <li>
                <ul>
                    <li>{{ $room -> id }}</li>
                    <li>{{ $room -> name }}</li>
                    <li>{{ $room -> img }}</li>
                    <li>{{ $room -> price }}</li>
                    <li>{{ $room -> person }}</li>
                    <li> <a href="{{ route('deleteRoom', $room->id) }}">DeleteRoom</a> </li>
                </ul>
            </li>
        @endforeach
    </lu>

    <a href="/addRoomView">Add Room</a>

</div>
