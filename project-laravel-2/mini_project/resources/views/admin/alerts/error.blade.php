@if (session('alert-error'))
    <div class="alert alert-danger" role="alert">
        <i class="bi bi-ban"></i>
        {{ session('alert-error') }}
    </div>  
@endif()
