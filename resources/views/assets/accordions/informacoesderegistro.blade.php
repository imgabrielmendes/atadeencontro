<div class="row"> 
    <div class="accordion" id="accordionPanelsStayOpenExample">
      <div class="accordion-item shadow">
        <h2 class="accordion-header">
          <button class="accordion-button shadow-sm text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="background-color: #001f3f;">
  
          <i class="fa-solid fa-circle-info p-1 mb-1"></i><h5>Informações de Registro</h5>
          </button>
        </h2>

    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
      <div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);" >
          <div class="col-md-12 text-center">         
        
          </div>     

          <!---- PRIMEIRA LINHA DO REGISTRO ---->
          <div class="row">
    <br>
    <div class="col-sm-12 col-xl-3  col-md-6">
        <label><b>Data*:</b></label>
        <ul class="form-control bg-body-secondary"> {{ substr($ata->data_solicitada_formatada, 0, 10) }}  </ul>
    </div>

    <!---ABA DE HORÁRIO INICIO---->
    <div class="col-sm-12 col-xl-3  col-md-6">
        <label for="nomeMedico"><b>Horário de Início*:</b></label>
        <br>
        <ul class="form-control bg-body-secondary"> {{ substr($ata->hora_inicial, 0, 5) }} </ul>
    </div>

    <!---ABA DE HORÁRIO TERMINO---->
    <div class="col-sm-12 col-xl-3  col-md-6">
        <label for="form-control"> <b> Horário de Término:</b> </label>
        <ul class="form-control bg-body-secondary"> {{ substr($ata->hora_termino, 0, 5) }} </ul>
    </div>

    <!---ABA DE TEMPO ESTIMADO ---->
    {{-- <div class="col-sm-12 col-xl-3  col-md-6">
        <label for="form-control"><b>Tempo Estimado:</b></label>
        
        // Verifica se as variáveis estão definidas antes de calcular o tempo estimado
        <style>
            .tempo-estimado {
                width: 100%;
            }
        </style>
    </div> --}}
</div>

<div class="row">
    <div class="facilitadorcol col-lg-6  col-lg-md-12 col-md-12">
        <label><b >Facilitador(es):</b></label>
        <ul class=" mt-2 form-control bg-body-secondary"> {{ $ata->name }} </ul>
    </div>
    <div class="col-lg-3  col-lg-md-12 col-md-6">
        <label><b>Local:</b></label>
        <ul class=" mt-2 form-control bg-body-secondary border rounded"> {{$ata->local}} </ul>
    </div>
    <div class="col-lg-3  col-lg-md-12 col-md-6">
        <label for="form-control"> <b>Objetivo:</b> </label>
        <label class=" mt-2 form-control bg-body-secondary border rounded">
            <input type="checkbox" disabled checked> {{$ata->objetivo}} 
    </div>
    <div>
        <div class="col">
            <b>Tema:</b> 
        </div>
        <div>
            <div class="col-12">
                <ul class="form-control bg-body-secondary"> {{$ata->tema}} </ul>
            </div>
        </div>       
    </div>
</div>
      </div>
    </div>
</div>
  </div>