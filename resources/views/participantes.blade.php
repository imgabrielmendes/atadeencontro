@extends('layouts.layout')
@section('title', 'Ata de encontro | Participantes')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="box box-primary">
    <main class="container_fluid d-flex justify-content-center align-items-center">
      
    <div class="form-group col-xl-9 col-lg-xs-sm-md-12 ">

      @include('components.alertaparticipantes')

      @include('components.accordions.informacoesderegistro')

      @include('components.accordions.accparticipantes')


      <!--BOTÕES-->
      <div class="container-fluid   justify-content-center ">
        <div class="row">
          
          <div class="p-2 col-lg-3 col-md-5 col-sm-12">
          <button id="btnparticipantes" type="button" class="btn form-control btn-success" data-bs-toggle="modal">
            Prosseguir com a ata
          </button>

          <script>
            var id_ata = ' echo id_ata; '; 
            function abrirDeliberacoes(){
                window.location.href = 'pagdeliberacoes.php?updateid=' + id_ata;
            }
          </script>

        </div>

        {{-- ///////////// --}}
        
        <div class="p-2 col-lg-3 col-md-5 col-sm-12">
          <a href="/historico"  class="btn form-control btn-primary">
              Ir para histórico
          </a>
      </div>
      
          </div>

          </div>
            </div>
            <br>
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