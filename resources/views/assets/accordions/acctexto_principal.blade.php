<div class="accordion mt-4">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="accordion-item shadow">
    <h2 class="accordion-header">
    <div class="accordion-button shadow-sm text-white" style="background-color: #66bb6a;">
    <i class="fa-regular fa-pen-to-square p-1 mb-1"></i><h5>Descrição do Encontro</h5>
    
    </div>
    </h2>
    
    <!-----------------------------4° FASE-------------------------------->
    
    <div class="accordion-collapse collapse show">
    <div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);">
    <div class="col-md-12 text-center">               
    </div>
    <div class="row">
    <div class ="col">
      <label style="height: 35px;"><b>Informe o texto principal:</b></label>
      <textarea id="caixadetexto" style="height: 110px;" class="form-control"></textarea>
    
            </div>
    </div>   
      
    <div class="d-flex justify-content-center">
          <button id="btntextoregistrar" type="button" class="btn btn-primary mt-3" data-bs-toggle="modal">Registrar Texto</button>
      </div>
        </div>          
    </div>
    
    </div>
    </div>