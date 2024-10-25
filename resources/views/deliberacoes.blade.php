@extends('layouts.layout')
@section('title', 'Ata de encontro | Home')
@section('content')



<!--PRIMEIRA LINHA DO FORMULÁRIO DA ATA---------------->
<div class="box box-primary">
<main class="container_fluid d-flex justify-content-center align-items-center">
<div class="form-group col-xl-9 col-lg-xs-sm-md-12">
  <div class="row"> 
    @include('assets.accordions.informacoesderegistro')
    
<div class="accordion" id="accordionPanelsStayOpenExample">

<div class="accordion-item shadow">


<div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);">
    <div class="row">
    <div class="col-lg-6  col-lg-md-12 col-md-12">



    </div>
    
<div>

  

</div>
</div>
</div>
</div>
</div>
</div>

<!------------ACCORDION COM INFORMAÇÕES DE PARTICIPANTES---------------->
<div class="accordion mt-4" id="accordionPanelsStayOpenExample">

<div class="accordion-item shadow">
<h2 class="accordion-header">
<button class="accordion-button shadow-sm text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo" style="background-color: #1c8f69;">

<i class="fas"></i>
<i class="fa-solid fa-user p-1 mb-1"></i><h5>Participantes Adicionados </h5>

</button>
</h2>

<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse ">
<div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);">
<div class="col-md-12 text-center">         
    
</div>     







<div class="row">
<div class="col">
  <div>
      <div style="margin: 6px" class='form-control bg-body-secondary border rounded'>
          <ul>
          ata
            if (isset($_GET['updateid'])) {
                $id_ata = $_GET['updateid'];
                $participantes = $puxarform->buscarParticipantesPorIdAta($id_ata);
                if (!empty($participantes)) {
                    echo "<ul class='list-unstyled'>";
                    foreach ($participantes as $participante) {
                        echo "<li>";
                        echo "<span class='fw-bold' style='font-size: 18px;'>$participante</span>";
                        echo "<button type='button' class='btn btn-danger btn-sm ms-2 py-0' style='font-size: 12px;' onclick='excluirParticipante($id_ata, \"$participante\")'>Excluir</button>";
                        echo "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "Nenhum participante encontrado para esta ATA.";
                }
            } else {
                echo "Nenhum ID de ATA fornecido.";
            }
          ata
          </ul>
      </div>
  </div>
</div>
</div>

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






</div>
</div>
</div>
</div>
</div>



<!-- texto principal -->




<div class="accordion mt-4">
<div class="accordion-item shadow">
<h2 class="accordion-header">
<div class="accordion-button shadow-sm text-white" style="background-color: #66bb6a;">
<i class="fa-regular fa-pen-to-square p-1 mb-1"></i><h5>Descrição do Encontro</h5>

</div>
</h2>

<!-----------------------------4° FASE-------------------------------->

<div class="accordion-collapse collapse show">
<div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);">
<div class="col-md-12 text-center">               
</div>
<div class="row">
<div class ="col">
  <label style="height: 35px;"><b>Informe o texto principal:</b></label>
  <textarea id="textoprinc" style="height: 110px;" class="form-control"></textarea>

        </div>
</div>   
  
<div class="d-flex justify-content-center">
      <button id="abrirhist" type="button" class="btn btn-primary" data-bs-toggle="modal">Registrar Texto</button>
  </div>

      </div>          
</div>

</div>
</div>

<!-----------------------------ACCORDION COM PARTICIPANTES-------------------------------->

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
<div class="toast-container position-fixed bottom-0 end-0 p-3">
<div id="liveToast3" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="view/img/check.svg" class="rounded me-2" alt="..." style="width: 20px";>
    <strong class="me-auto">Perfeito!</strong>
    <small>Agora</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
   Descrição de encontro adicionado!
  </div>
</div>
</div>



<div class="toast-container position-fixed bottom-0 end-0 p-3">
<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="view/img/check.svg" class="rounded me-2" alt="..." style="width: 20px";>
    <strong class="me-auto">Perfeito!</strong>
    <small>Agora</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    A deliberação foi atribuída.
  </div>
</div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
<div id="liveToast2" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="view\img\x.svg" class="rounded me-2" alt="..." style="width: 15px";>
    <strong class="me-auto">Perfeito!</strong>
    <small>Agora</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    Atribuição excluída.
  </div>
</div>
</div>

  <br>
  
  <div class="col-12">

  <!-- <button id="" type="button" class="btn btn-primary" data-bs-toggle="modal"> Atualizar a ata </button> -->
  <div class=" col d-flex justify-content-center align-content-center">
     <button id="finalizarAtaBtn" type="button" class="btn btn-secondary" data-bs-toggle="modal">Finalizar Encontro</button>
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


});</script>
    

  </div></div>

</form>
    
      </div>          
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var botaocont = document.getElementById('botaocontinuarata');
  var botaoregistrar = document.getElementById('botaoregistrar');
  var itemList = document.getElementById('items');
  var filter = document.getElementById('filter');
  var addItemButton = document.getElementById('addItemButton'); 

});

</script>
</div>
</div>
</div>
   </div>
   
</main>

</div>
@endsection
