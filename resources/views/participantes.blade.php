@extends('layouts.layout')
@section('title', 'Ata de encontro | Participantes')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="box box-primary">
    <main class="container_fluid d-flex justify-content-center align-items-center">
    <input type="hidden" id="ata_id" value="{{ $ata->id }}">
    <div class="form-group ">

    <x-row>
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <x-composite.accordions.accordion-registro :ata="$ata" />
          </div>
    </x-row>

    
</div>

  <x-row>
    <x-col>
      <x-composite.accordions.accordion-participante :usuariosOptions="$usuariosOptions" 
      :ata="$ata" />

  </x-col>
  </x-row>

      <x-row>
        <x-col size="3">
            <x-button
                id="btn-registro-participante"
                type="button"
                color="success"
              >
              Prosseguir com a ata
            </x-button>
        </x-col>

        <x-col size="3">
          <x-button
            id=""
            type="button"
            color="primary"
          >
          Ir para histórico
        </x-button>
        </x-col>
      </x-row>
</div>
          
    
           
          </div>  <br></div>
        </div>

            </div>

              
</main>
</div>

<!------------------ MODAL ------------------>
@include('components.modals.registrarusuario')
    
      </div>
</div>

@endsection