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
                  <div style="margin: 6px" class='form-control bg-body-secondary border rounded'>
                      @foreach ($usuarios as $usuario)
                      <ul value="{{$usuario->id}}">{{$usuario->name}}</ul>
                      @endforeach
                  </div>
              </div>
            </div>
            </div>
        
