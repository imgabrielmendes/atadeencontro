<div class="accordion mt-4">
    <div class="accordion-item shadow">
      <h2 class="accordion-header">
        <div class="accordion-button shadow-sm text-white" style="background-color: #1c8f69;">
        <i class="fa-solid fa-user p-1 mb-1"></i>
    <h5>Participantes</h5>
    </div>
            <div class="container-fluid ">
            <div class="row">
              <form id="addForm">
                  <div class="form-group ">
                      <br>
                      <div id="items" class="list-group">                    
                  </div>
                      <label for="item"><b>Informe os participantes</b></label>
    
                      <div class="row">
                        <div class="mt-3 mb-3" > 
                        <select id="multiselect_participante" name="usuarios[]" multiple class="form-control">
    @foreach($usuarios as $usuario)
        <option value="{{ $usuario->id }}">
            {{ $usuario->name}}
        </option>
    @endforeach
</select>
                        </div>
            <script>
    $(document).ready(function() {
        $('#multiselect_participante').select2({
            placeholder: "Selecione os facilitadores...",
            allowClear: false,
            width: '100%',
            closeOnSelect: false,
            theme: "classic",
            tags: false,
        });
    });
</script>
              
              </form>
              <div  class="row">
              <div class="col-lg-12 col-md-2 d-flex text-center">
                <button style="background-color:white; color:#353535; border:none; font-size: 13px;" id="btnusuario" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modaldeemail">
                  Clique aqui para cadastrar usuário
              </button>              

      