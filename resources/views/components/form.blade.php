<div class="box_search">
    <form action="{{ $action }}" method="post">
        @csrf
        <input type="date" name="dateIn">
        <input type="date" name="dateOut">
        <input type="number" max="10" min="1" name="person" value="1">
        @if($price == true)
            <input type="number" name="price">
        @endif
        <input type="submit">
    </form>
</div>

