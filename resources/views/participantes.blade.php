@extends('layouts.layout')
@section('title', 'Ata de encontro | Participantes')
@section('content')

<div class="box box-primary">
    <main class="container_fluid d-flex justify-content-center align-items-center">
      
      <div class="form-group col-xl-9 col-lg-xs-sm-md-12 ">

      <style>
        .text-danger {
        color: #198754;
      }

      .text-primary {
        color: #007bff;
      }
      </style>

    @include('assets.alertaparticipantes')

    @include('assets.accordions.informacoesderegistro')

    
<!-----------------------------2° FASE-------------------------------->

<div class="accordion mt-4">
<div class="accordion-item shadow">
  <h2 class="accordion-header">
    <div class="accordion-button shadow-sm text-white" style="background-color: #1c8f69;">
    <i class="fa-solid fa-user p-1 mb-1"></i>
<h5>Participantes</h5>
</div>
  </h2>                                                                                                                                       
        <div class="container-fluid ">
        <div class="row">
          <form id="addForm">
              <div class="form-group ">
                  <br>
                  <div id="items" class="list-group">                    
              </div>
                  <label for="item"><b>Informe os participantes</b></label>

                  <div class="row">
                    <div class="col" > 
                    <select  class="col form-control" id="participantesadicionados" name="facilitador" multiple style="width: 100px;">
                      <optgroup label="Selecione Facilitadores">
                        @foreach ($usuarios as $usu)
                        <option value=" echo facnull['id']; "
                                  data-tokens=" echo facnull['nome_facilitador']; ">
                                   {{ $usu->name }} 
                              </option> 
                        @endforeach 
                       </optgroup>
                    </select>
        </div>
        </div></div>
          
          </form>
          <div  class="row">
          <div class="col-lg-12 col-md-2 d-flex text-center">
           <button style=" background-color:white; color:#353535; border:none; font-size: 13px;" id="botaoregistrar" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modaldeemail">
              Clique aqui para cadastrar usúario 
            </button>
       </div>
      </div>
    </div>
<br>
           <br><br>
      <!--BOTÕES-->
      <div class="container-fluid   justify-content-center ">
        <div class="row">
          <div class="btnsparticipante">

          <div class="p-2 col-lg-3 col-md-5 col-sm-12">
          <button id="botaocontinuarata" type="button" class="btn form-control btn-success" onclick="abrirDeliberacoes( echo id_ata; )" data-bs-toggle="modal">
            Prosseguir com a ata
          </button>
          <script>
            var id_ata = ' echo id_ata; '; 
            function abrirDeliberacoes(){
                window.location.href = 'pagdeliberacoes.php?updateid=' + id_ata;
            }
          </script>

        </div>
        <br>
        <div class="p-2 col-lg-3 col-md-5 col-sm-12">
              <button onclick="abrirHistorico()" id="botaoregistrar" type="button" class="btn form-control btn-primary" data-bs-toggle="modal">
                Ir para histórico
              </button>
           
            
              <script>
        function abrirHistorico() {
            window.location.href = 'paghistorico.php';
        }
    </script> 
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
                      <div class="modal fade" id="modaldeemail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="col modal-title fs-5" id="staticBackdropLabel">Registro de usuário</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                              <form>
                                <div class="mb-3">

                                  <label class="col-form-label">Nome completo:</label>
                                  <input type="text" class="form-control" id="caixanome">
                                </div>

                                <div class="mb-3">
                                  <label class="col-form-label">Informe o Email</label>
                                  <input type="email" class="form-control" id="caixadeemail">
                                </div>

                                <div class="row">
                                <label class="col-4 form-label">Matricula: </label>
                                <label id="labelcargo" class="col-8 form-label">Cargo: </label>
                                <div class="col-4">
                                <input type="text" maxlength="4" class="form-control" id="caixamatricula">
                                </div>  

                                <div class="col-8">
                                <input type="text" class="col-5 form-control" id="caixacargo">
                              </div></div>
                              </form>

                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                              <button id="registraremail" type="button" class="btn btn-primary">Registrar</button>

                            </div>
                          </div>
                        </div>
                      </div> 
                      
<!-------------------- BOTÃO DA MODAL ------------------->
     
      </div>
</div>

@endsection