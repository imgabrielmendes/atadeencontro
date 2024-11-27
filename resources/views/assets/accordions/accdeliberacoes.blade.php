
<div class="accordion mt-4">
    <div class="accordion-item shadow">
    <h2 class="accordion-header">
    <div class="accordion-button shadow-sm text-white" style="background-color: #66bb6a;">
    <i class="fa-solid fa-file p-1 mb-1"></i><h5>Deliberações</h5>
    
    </div>
    </h2>
    
    <!-----------------------------4° FASE-------------------------------->
    
    <div class="accordion-collapse collapse show">
        <div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);">
            <div class="row">
                @foreach ($deliberacoes as $delib)
                    <div class="col-md-6 mb-2">
                        <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body clearfix">
                                    <div class="media align-items-stretch">
                                        <div class="text-start media-body align-self-center">
                                            <!-- Exibe o texto (deliberação) -->
                                            <h4 class="text-primary">Deliberação:</h4>
                                            <p class="mb-2">{{ $delib['deliberacoes'] }}</p>
        
                                            <!-- Exibe os usuários associados ao texto -->
                                            <h4 class="text-secondary">Deliberados:</h4>
                                            <ul class="list-unstyled">
                                                @foreach ($delib['users'] as $user)
                                                    <li>
                                                        <i class="icon-user success"></i> 
                                                        <strong></strong> {{ $user->name }} <br>
                                                        {{-- <strong>M:</strong> {{ $user->email }} --}}
                                                    </li>
                                                @endforeach
                                            </ul>
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
    
    

    <form id="addForm">
    <div class="form-group">
    <div class="col">
        
            <ul class="list-group list-group-flush"></ul>              
            <textarea id="deliberacoes" class="form-control item" placeholder="Informe as deliberações..." style="height: 85px;"></textarea>
          </div>
    
    <div class="col">

    <!-- Primeira caixa de texto e select de facilitadores -->
    <div class="mb-2">
      <label for="" class="mb-2">Deliberado para:</label>
      @include("multiselect")
    </div>
      </div>

      <div class="col-12">
        <ul id="caixadeselecaodel"></ul>
    {{-- <div class="col d-flex justify-content-center align-content-center">
    
    <button type="button" id="addItemButton" class="btn btn-success  a">Criar deliberações</button>
    </div> --}}
    </div>
    
    </div>

    <div class=" col d-flex justify-content-center align-content-center mb-3">
        <button id="btnfinalizar" type="button" class="btn btn-secondary" data-bs-toggle="modal">Finalizar Encontro</button>
        <button type="button" id="addItemButton" class="btn btn-success  a">Criar deliberações</button>
    </div>