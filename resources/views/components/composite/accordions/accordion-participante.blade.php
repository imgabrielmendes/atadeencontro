@props(['usuariosOptions', 'ata'])

<div class="accordion-item shadow">
    <h2 class="accordion-header" id="heading-{{ $ata->id }}">
        <button class="accordion-button shadow-sm text-white collapsed" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#panel-{{ $ata->id }}"
            aria-expanded="false"
            aria-controls="panel-{{ $ata->id }}"
            style="background-color: #001f3f;">
            <i class="fa-solid fa-circle-info p-1 mb-1"></i>
            <h5 class="mb-0 ms-2">Adicionar Participantes</h5>
        </button>
    </h2>

    <form id="form-ata">

    <div id="panel-{{ $ata->id }}"
         class="accordion show"
         aria-labelledby="heading-{{ $ata->id }}"
         data-bs-parent="#accordionParticipantes"
    >
        <div class="accordion-body p-2 m-3" style="background-color: rgba(240, 240, 240, 0.41);">
        
        <x-row>
            <x-col>
            <form id="addForm">
                <x-select
                    id="select-participante-ata"
                    name="select-participante-ata"
                    label="Informe os participantes"
                    name="usuarios[]"
                    label="Informe os participantes"
                    :options="$usuariosOptions"
                    :multiple="true"
                />
            </form>
            </x-col>
        </x-row>

        <x-row>
            <x-col>
                <x-button
                    type="button"
                    color="secondary"
                    size="sm"
                    icon="fas fa-user-plus"
                    data-bs-toggle="modal"
                    data-bs-target="#modaldeemail"
                /> 
                    Clique aqui para cadastrar usuário
            </x-col>
        </x-row>
        
        </div>
    </div>
    </form>
</div>
