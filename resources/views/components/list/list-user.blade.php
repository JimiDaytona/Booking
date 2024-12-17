<div id="list_user" style="display: none">
    <p>Users</p>
    <div class="user_box">
        <ul>
            @foreach($users as $user)
                <li>
                    <p>{{ $user -> id }}</p>
                    <p>{{ $user -> name }}</p>
                    <p>{{ $user -> email }}</p>
                </li>


            @endforeach
        </ul>
    </div>

    <button id="edit_user" >Edit User</button>

    <div id="form_edit_user" style="display: none">
        <form action="{{ route('user.edit') }}" method="post">
            @csrf
            <input type="text" name="name">
            @if ($errors->has('name'))
                <span style="color: red;">{{ $errors->first('name') }}</span>
            @endif
            <input type="email" name="email" >
            @if ($errors->has('email'))
                <span style="color: red;">{{ $errors->first('email') }}</span>
            @endif
            <input type="submit">
        </form>
    </div>

</div>
