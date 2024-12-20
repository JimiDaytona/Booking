<div id="list_user" style="display: none">
    <p>Users</p>
    <div class="user_box">
        <ul>
            @foreach($users as $user)
                <li>
                    <p>{{ $user -> id }}</p>
                    <p>{{ $user -> name }}</p>
                    <p>{{ $user -> email }}</p>
                    <p><a href="route('')"></a></p>
                </li>


            @endforeach
        </ul>
    </div>

</div>
