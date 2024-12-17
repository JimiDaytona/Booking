<div class="success_fail">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('fail'))
        <div class="alert alert-fail">
            {{ session('fail') }}
        </div>
    @endif
</div>
