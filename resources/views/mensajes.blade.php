@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@else
    <!-- Cualquier otro codigo -->
@endif