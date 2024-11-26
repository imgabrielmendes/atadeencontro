
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
    
    @foreach ($deliberacoes as $delib)
        <div class="card overflow-hidden">
            <div class="card-content">
                <div class="card-body clearfix">
                    <div class="media align-items-stretch">
                        <div class="text-start media-body align-self-center">
                            <!-- Exibe o texto (deliberação) -->
                            <h4 class="text-primary">Deliberação:</h4>
                            <p class="mb-2">{{ $delib['deliberacoes'] }}</p>

                            <!-- Exibe os usuários associados ao texto -->
                            <h4 class="text-secondary">Deliberados:</h4>
                            <ul class="list-unstyled">
                                @foreach ($delib['users'] as $user)
                                    <li>
                                        <i class="icon-user success"></i> {{ $user }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endforeach
</div>   

    <form id="addForm">
    <div class="form-group">
    <div class="col">
        
            <ul class="list-group list-group-flush"></ul>              
            <textarea id="deliberacoes" class="form-control item" placeholder="Informe as deliberações..." style="height: 85px;"></textarea>
          </div>
    
    <div class="col">

    <!-- Primeira caixa de texto e select de facilitadores -->
    <div class="mb-2">
      <label for="" class="mb-2">Deliberado para:</label>
      @include("multiselect")
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
            window.location.href = `/ata/historico`;
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