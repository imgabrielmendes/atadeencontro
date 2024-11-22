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
                    <div style="margin: 3px" class='border rounded'>
                        <div class="row">
                            @foreach ($participantes as $usuario)
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-content">
                                            <div class="card-body clearfix">
                                                <div class="media align-items-stretch">
                                                    <div class="align-self-center">
                                                        <i class="icon-user success font-large-2 float-right mr-4"></i>
                                                    </div>
                                                    <div class="text-start media-body align-self-center">
                                                        <h4>{{$usuario->name}}</h4>
                                                    </div>
                                                </div>
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
        
