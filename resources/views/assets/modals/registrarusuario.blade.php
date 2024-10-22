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