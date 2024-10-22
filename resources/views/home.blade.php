@extends('layouts.layout')
@section('title', 'Ata de encontro | Home')
@section('content')

</div>
  <!--PRIMEIRA LINHA DO FORMULÁRIO DA ATA---------------->
    <main class="container_fluid d-flex justify-content-center align-items-center">
      <div class="form-group col-8 mt-5">
        <!--2° LINHA DO FORMULÁRIO DA ATA----------------------->
        <div class="row"> 

          <!---COLUNA NOME + DATA---->
          <!--Título do formulário ----------------------->
          <div class="col-md-12 text-center m-3 p-2">
            <h2><b>Formulário de Solicitação</b></h2>
          </div>         
          <!---ABA DE DATA---->
          <div class="col-xl-4 col-lg-xl-3 col-md-6">
            <label><b>Data*</b></label>
            <input id="datainicio" class="mt-2 mb-2 form-control" placeholder="dd-mm-aaaa" min="2024-04-01" type="date">
          </div>
          <script>
                var hoje = new Date().toISOString().split('T')[0];
                document.getElementById("datainicio").setAttribute("min", hoje);
              </script>
          
          <!---ABA DE HORÁRIO INICIO---->
          <div class="col-xl-4 col-lg-xl-3 col-md-6">
            <label for="nomeMedico"><b>Horário de Início*:</b></label>
            <input class="mt-2 mb-2 form-control" type="time" id="horainicio" name="appt" min="" max="18:00">
          </div>

          <!---ABA DE HORÁRIO TERMINO---->
          <div class="col-xl-4 col-lg-xl-3 col-md-6">
            <label for="form-control"> <b> Horário de Término:</b> </label>
            <input class="mt-2 mb-2 form-control" type="time" id="horaterm" name="appt" min="13:00" max="12:00">
          </div>

  </div>
           <!---ABA DE OBJETIVO - REUNIÃO---->
          <div class="row ">
          <div class="col mt-1" id="objetivo">
            <label for="form-control"> <b>Objetivo:</b> </label>
 
  </div>

  <div class="row">
    <div class="col-xl-2 col-lg-xl-4 col-md-4 mt-2">
        <label class="form-control">
            <input type="radio" class="objetivo" name="objetivo" id="reuniao" value="Reunião"> Reunião
        </label>
    </div>
    <!---ABA DE OBJETIVO - TREINAMENTO---->
    <div class="col-xl-3 col-lg-xl-4 col-md-4 mt-2">
        <label class="form-control">
            <input type="radio" class="objetivo" name="objetivo" id="treinamento" value="Treinamento"> Treinamento
        </label>
    </div>
    <!---ABA DE OBJETIVO - CONSULTA---->
    <div class="col-xl-2 col-lg-xl-4 col-md-4 mt-2">
        <label class="form-control">
            <input type="radio" class="objetivo" name="objetivo" id="consulta" value="Consulta"> Consulta
        </label>
    </div>

        <div class="col-xl-5 col-sm-12 mt-2">
                <select class="form-control" id="pegarlocal" placeholder="Informe o Local">
              <option value="" disabled selected> Informe o Local </option>
                @foreach($locais as $local)
                  <option value="echo htmlspecialchars(locais['locais']); " data-tokens="echo htmlspecialchars(locais['locais']); ">
                      {{$local->nome}}
                  </option>
                @endforeach 
          </select>
        </div>


</div>
         
          <!---ABA DE ADICIONAR FACILITADORES---->
          <div class="row">
          <div class="col mt-3"> <label for="form-control"> <b> Facilitador(res) responsável*:</b> </label> 
          </div>

          <div class="row">
            <label>*precisa ser um multselec aqui</label>
            <select class="col mt-3 form-control" id="selecionandofacilitador" name="facilitador">
                <optgroup label="Selecione Facilitadores">
                  @foreach ($usuarios as $usu)
                        <option value="echo facnull['id']; "
                            data-tokens="echo facnull['nome_facilitador']; ">
                            {{$usu->name}} 
                        </option>
                  @endforeach
                </optgroup>
            </select>
          </div>
     
 
          <!--CAIXA DE TEXTO SOBRE O QUE SE TRATA A ATA-->

          <div class="col mt-2"><b>Tema*:</b>
            <input id="temaprincipal" class="mt-2 form-control" type="text" />
          </div>

          <!--BOTÕES-->
          <div class="row">
            <div class="col d-flex justify-content-center">
              <div class="btn-atas p-4">
                
              <button id="botaoregistrar" type="button" class="mt-2 col-md-5 col-sm-12 col-lg-3 btn btn-success">salvar</button>

              <button id="botaoregistrar" type="button" class="mt-2 col-md-5 col-sm-12 col-lg-3 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modaldeemail">Cadastre-se</button>
              </div>
              
              <div class="modal fade" id="modaldeemail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="col modal-title fs-5" id="staticBackdropLabel">Registro de usuário</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formularioRegistro">
            <div class="mb-3">
              <label class="col-form-label">Nome completo:</label>
              <input type="text" class="form-control" id="caixanome">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Informe o Email</label>
              <input type="email" class="form-control" id="caixadeemail">
            </div>
            <div class="row mb-3">
              <label class="col-4 form-label">Matricula: </label>
              <label id="labelcargo" class="col-8 form-label">Cargo: </label>
              <div class="col-4">
                <input type="text" maxlength="4" pattern="[0-9]{4}" class="form-control" id="caixamatricula">
              </div>
              <div class="col-8">
                <input type="text" class="form-control" id="caixacargo">
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection

