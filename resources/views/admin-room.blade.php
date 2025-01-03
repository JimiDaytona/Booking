<h1>Admin Panel</h1>

<div class="main">
    <div class="side_bar">
        <ul>
            <li> <button id="button_user" type="button"> List user </button> </li>
            <li><button id="button_room" type="button"> List room </button></li>
            <li><button id="button_booking" type="button"> List booking </button></li>
        </ul>
    </div>

    <div class="info_box">

        <x-list-user :users="$users" />

        <x-list-room :rooms="$rooms" />

        <x-list_reservation :reservations="$reservations" />

    </div>
</div>

<script>

    function editDisplay (tracked, changeable) {
        document.getElementById(tracked).addEventListener('click', function () {
            const content = document.getElementById(changeable);
            if (content.style.display === 'none') {
            content.style.display = 'block'
        } else {
                content.style.display = 'none'
            }
        })
    }

    editDisplay('button_user', 'list_user');
    editDisplay('button_room', 'list_room');
    editDisplay('button_booking', 'list_booking');

</script>
