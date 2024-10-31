
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
    <div class="col-md-12 text-center">               
    </div>
    
    <span class="col d-flex align-items-end flex-column" id="inputContainer"></span>
    
      <form id="addForm">
      <div class="form-group">
      <div class="col">
        
            <br>
            <ul class="list-group list-group-flush"></ul>              
            <textarea id="deliberacoes" class="form-control item" placeholder="Informe as deliberações..." style="height: 85px;"></textarea>
          </div>
    
    <div class="col">
    <!-- Primeira caixa de texto e select de facilitadores -->
    <div class="mb-2">
      <label for="" class="mb-2">Deliberado para:</label>
      <select id="deliberador" class="form-control facilitator-select" placeholder="Deliberações" multiple>
      <optgroup label="Selecione Facilitadores">
                ata foreach ($pegarde as $facnull) : ata
                    <option value="ata echo $facnull['id']; ata"
                        data-tokens="ata echo $facnull['nome_facilitador']; ata">
                        ata echo $facnull['nome_facilitador']; ata
                    </option>
                ata endforeach ata
            </optgroup>
      </select>
    </div>
      </div>
      <div class="col-12">
        <ul id="caixadeselecaodel"></ul>
    <div class="col d-flex justify-content-center align-content-center">
    
    <button type="button" id="addItemButton" class="btn btn-success  a">Criar deliberações</button>
    </div>
    </div>
    
    </div>
    <div class=" col d-flex justify-content-center align-content-center">
        <button id="finalizarAtaBtn" type="button" class="btn btn-secondary" data-bs-toggle="modal">Finalizar Encontro</button>
    </div>

    <script>  
        document.getElementById("finalizarAtaBtn").addEventListener("click", function() {
        Swal.fire({
          title: "Finalizada!",
          text: "Você finalizou seu encontro com sucesso!",
          icon: "success",
          confirmButtonText: "OK"
        }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = "paghistorico.php";
          }
        });
        });
    </script>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //   var botaocont = document.getElementById('botaocontinuarata');
        //   var itemList = document.getElementById('items');
        //   var filter = document.getElementById('filter');
        //   var addItemButton = document.getElementById('addItemButton'); 
        
        // });
        
    </script>

    <script>
        function excluirParticipante(participante) {
            if (confirm("Tem certeza de que deseja excluir o participante '" + participante + "'?")) {
            var participanteElement = document.querySelector("li:contains('" + participante + "')");
            if (participanteElement) {
            participanteElement.remove();
                } else {
                alert("Participante não encontrado na lista.");
                }
            }
        }
    </script>