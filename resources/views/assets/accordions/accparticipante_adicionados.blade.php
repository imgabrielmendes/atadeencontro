<div class="accordion mt-4" id="accordionPanelsStayOpenExample">

    <div class="accordion-item shadow">
    <h2 class="accordion-header">
    <button class="accordion-button shadow-sm text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo" style="background-color: #1c8f69;">
    
    <i class="fas"></i>
    <i class="fa-solid fa-user p-1 mb-1"></i><h5>Participantes Adicionados </h5>
    
    </button>
    </h2>
    
    <div>

    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse ">
    <div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);">
    <div class="col-md-12 text-center">    
        
        <div class="row">
            <div class="col">
                <div>
                    <div>
                    <div class="row g-3">
    @foreach ($participantes as $usuario)
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
    @endforeach
</div>

                    </div>
                </div>
            </div>
        </div>
        
            </div>
        
