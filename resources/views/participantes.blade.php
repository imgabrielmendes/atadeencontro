@extends('layouts.layout')
@section('title', 'Ata de encontro | Participantes')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="box box-primary">
    <main class="container_fluid d-flex justify-content-center align-items-center">
      
    <div class="form-group col-xl-9 col-lg-xs-sm-md-12 ">

      <!-- @include('components.alertaparticipantes') -->

      <div class="accordion" id="accordionPanelsStayOpenExample">
        <x-composite.accordions.accordion-registro :ata="$ata" />
      </div>

      <div class="accordion" id="accordionPanelsStayOpenExample2">
        <x-composite.accordions.accordion-participante :usuariosOptions="$usuariosOptions" />
      </div>

      </div>
            <x-row>

        <x-col size="3">
            <x-button
                id="btnparticipantes"
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