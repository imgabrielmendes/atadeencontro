@props(['usuariosOptions'])

<div class="accordion mt-4" id="accordionParticipantes">
    <x-accordion id="participantes" title="Participantes" icon="fa-solid fa-user">
        <form id="addForm">
            <x-select
                id="multiselect_participante"
                name="usuarios[]"
                label="Informe os participantes"
                :options="$usuariosOptions"
            />
        </form>

        <div class="d-flex justify-content-center mt-3">
            <x-button
                type="button"
                color="secondary"
                size="sm"
                icon="fas fa-user-plus"
                data-bs-toggle="modal"
                data-bs-target="#modaldeemail"
            /> Clique aqui para cadastrar usuário
        </div>
    </x-accordion>
</div>
