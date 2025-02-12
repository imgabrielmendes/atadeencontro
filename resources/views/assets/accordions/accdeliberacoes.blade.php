<div class="accordion mt-4">
    <div class="accordion-item shadow">
        <h2 class="accordion-header">
            <div class="accordion-button shadow-sm text-white" style="background-color: #66bb6a;">
                <i class="fa-solid fa-file p-1 mb-1"></i><h5>Deliberações</h5>
            </div>
        </h2>

        <!-- Fase de Deliberações -->
        <div class="accordion-collapse collapse show">
            <div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);">
            <div class="row" id="deliberacoes-container">
    @foreach ($deliberacoes as $delib)
        <div class="col-md-6 mb-4" id="deliberacao-{{ $delib['id'] ?? $loop->index }}">
            <div class="card shadow-sm border-light rounded">
                <div class="card-body">
                    <h5 class="card-title text-primary font-weight-bold">Deliberação:</h5>
                    <p class="card-text mb-3">{{ $delib['deliberacoes'] }}</p>

                    <h6 class="text-secondary font-weight-bold">Deliberados:</h6>
                    <ul class="list-unstyled pl-3">
                        @foreach ($delib['users'] as $user)
                            <li class="d-flex align-items-center mb-2">
                                <i class="icon-user text-success mr-2" style="font-size: 1.5rem;"></i>
                                <strong class="text-dark">{{ $user->name }}</strong>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>

            </div>
        </div>

        <!-- Formulário para Adicionar Deliberações -->
        <form id="addForm">
            <div class="form-group">
                <div class="col">
                    <textarea id="deliberacoes" class="form-control item" placeholder="Informe as deliberações..." style="height: 85px;"></textarea>
                </div>

                <div class="col">
                    <div class="mb-2">
                        <label for="facilitadores" class="mb-2">Deliberado para:</label>
                        <select id="multiselect_deliberacoes" name="usuarios[]" multiple class="form-control">
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">
                                    {{ $usuario->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#multiselect_deliberacoes').select2({
                            placeholder: "Selecione os facilitadores...",
                            allowClear: false,
                            width: '100%',
                            closeOnSelect: false,
                            theme: "classic",
                            tags: false,
                        });
                    });
                </script>

                <div class="col-12">
                    <ul id="caixadeselecaodel"></ul>
                </div>
            </div>

            <div class="col d-flex justify-content-center align-content-center mb-3">
                <button type="button" id="btnfinalizar" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalFinalizar">Finalizar Encontro</button>
                <button type="button" id="addItemButton" class="btn btn-success">Criar deliberações</button>
            </div>
        </form>
    </div>
</div>
