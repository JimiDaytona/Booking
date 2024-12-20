<div class="box_search">
    <form action="{{ $action }}" method="post">
        @csrf
        <p>Date in</p>
        <input type="date" name="dateIn">
        <p>Date Out</p>
        <input type="date" name="dateOut">
        <p>Person</p>
        <input type="number" max="10" min="1" name="person" value="1">
        @if($price == true)
            <p>Price</p>
            <input type="number" name="price">
        @endif
        <input type="submit">
    </form>
</div>

