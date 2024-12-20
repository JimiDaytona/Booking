@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('room.add') }}" method="post">
    @csrf
    <p>Name room</p>
    <input type="text" name="name">
    <p>Link to room</p>
    <input type="text" name="img">
    <p>Price room</p>
    <input type="number" name="price">
    <p>Description room</p>
    <input type="text" name="description">
    <p>Person room</p>
    <input type="number" name="person">
    <input type="submit" value="Send">
</form>


