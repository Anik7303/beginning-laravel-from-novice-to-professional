@if ($message = session('message'))
    <div class="alert alert-success" id="flash-message">{{ $message }}</div>
@endif
