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
                               <option value="{{$usu->id}}"> {{ $usu->name }} </option> 
                            @endforeach 
                           </optgroup>
                        </select>
            </div>
            </div></div>
              
              </form>
              <div  class="row">
              <div class="col-lg-12 col-md-2 d-flex text-center">
                <button style="background-color:white; color:#353535; border:none; font-size: 13px;" id="botaoregistrar" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modaldeemail">
                  Clique aqui para cadastrar usuário
              </button>              
           </div>

          </div>
        </div>