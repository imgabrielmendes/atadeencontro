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
                        <div class="col-md-6 mb-2" id="deliberacao-{{ $delib['id'] ?? $loop->index }}">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body clearfix">
                                        <div class="media align-items-stretch">
                                            <div class="text-start media-body align-self-center">
                                                <h4 class="text-primary">Deliberação:</h4>
                                                <p class="mb-2">{{ $delib['deliberacoes'] }}</p>

                                                <h4 class="text-secondary">Deliberados:</h4>
                                                <ul class="list-unstyled">
                                                    @foreach ($delib['users'] as $user)
                                                        <li>
                                                            <i class="icon-user success"></i>
                                                            <strong>{{ $user->name }}</strong>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
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
                    <!-- Caixa de Seleção para Facilitadores -->
                    <div class="mb-2">
                        <label for="facilitadores" class="mb-2">Deliberado para:</label>
                        @include("multiselect") <!-- Aqui o componente multiselect -->
                    </div>
                </div>

                <div class="col-12">
                    <ul id="caixadeselecaodel"></ul>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="col d-flex justify-content-center align-content-center mb-3">
                <button type="button" id="btnfinalizar" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalFinalizar">Finalizar Encontro</button>
                <button type="button" id="addItemButton" class="btn btn-success">Criar deliberações</button>
            </div>
        </form>
    </div>
</div>
