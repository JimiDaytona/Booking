<div id="list_booking" style="display: none">
    <p>Reservation</p>
    <ul>
        @foreach($reservations as $reservation)
            <li>
                <p>{{ $reservation -> dateIn }}</p>
                <p>{{ $reservation -> dateOut }}</p>
                <p>{{ $reservation -> user_id }}</p>
                <p>{{ $reservation -> room_id }}</p>
                <p>{{ $reservation -> person }}</p>
            </li>
        @endforeach
    </ul>
</div>
