<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>
<body>

<x-success-and-fail />

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
    editDisplay('edit_user', 'form_edit_user');

</script>

</body>
</html>
