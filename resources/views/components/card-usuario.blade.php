@props(['usuario'])

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body text-center p-4">
            <div class="d-flex flex-column align-items-center">
                <i class="icon-user text-success display-4 mb-3"></i>
                <h5 class="fw-bold mb-1">{{ $usuario->name }}</h5>
            </div>
        </div>
    </div>
</div>
