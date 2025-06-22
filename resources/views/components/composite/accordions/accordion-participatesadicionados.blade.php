@props(['participantes', 'ata', 'usuarios', 'usuariosOptions'])

<div class="accordion-item shadow">
    <h2 class="accordion-header" id="heading-participantes-adicionados-{{ $ata->id }}">
        <button class="accordion-button shadow-sm text-white" type="button"
            data-bs-toggle=""
            data-bs-target="#panel-participantes-adicionados-{{ $ata->id }}"
            aria-expanded="false"
            aria-controls="panel-participantes-adicionados-{{ $ata->id }}"
            style="background-color: #1c8f69;">
            <i class="fa-solid fa-user p-1 mb-1"></i>
            <h5 class="mb-0 ms-2">Participantes Adicionados</h5>
        </button>
    </h2>

    <div id="panel-participantes-adicionados-{{ $ata->id }}"
         class="accordion show"
         aria-labelledby="heading-participantes-adicionados-{{ $ata->id }}"
         data-bs-parent="#accordionParticipantes"
    >
        <div class="accordion-body p-2 m-3" style="background-color: rgba(240, 240, 240, 0.41);">
dsdasdasda
            <div class="row g-3 justify-content-center">
                @foreach ($participantes as $usuario)
                    <x-card-usuario :usuario="$usuario" />
                @endforeach
            </div>
            
        </div>
    </div>
</div>
