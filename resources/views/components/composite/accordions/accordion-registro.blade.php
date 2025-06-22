@props(['ata'])

<div class="accordion-item shadow">
    <h2 class="accordion-header" id="heading-{{ $ata->id }}">
        <button class="accordion-button shadow-sm text-white collapsed" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#panel-{{ $ata->id }}"
            aria-expanded="false"
            aria-controls="panel-{{ $ata->id }}"
            style="background-color: #001f3f;">
            <i class="fa-solid fa-circle-info p-1 mb-1"></i>
            <h5 class="mb-0 ms-2">Informações de Registro</h5>
        </button>
    </h2>

    <div id="panel-{{ $ata->id }}"
         class="accordion show"
         aria-labelledby="heading-{{ $ata->id }}"
        <div class="accordion-body p-2 m-3" style="background-color: rgba(240, 240, 240, 0.41);">
            <x-row>
                <x-col size="col-sm-12 col-xl-3 col-md-6">
                    <label><b>Data*:</b></label>
                    <x-input-text
                        class=" form-control bg-body-secondary"
                        disabled
                        value="{{ $ata->dthr_solicitada ?? 'Não informada' }}"
                    />
                </x-col>

                <x-col size="col-sm-12 col-xl-3 col-md-6">
                    <label><b>Horário de Início*:</b></label>
                    <x-input-text
                        class=" form-control bg-body-secondary"
                        disabled
                        value="{{ substr($ata->hr_inicial, 0, 5) }}"
                    />
                </x-col>

                <x-col size="col-sm-12 col-xl-3 col-md-6">
                    <label><b>Horário de Término:</b></label>
                    <x-input-text
                        class=" form-control bg-body-secondary"
                        disabled
                        value="{{ substr($ata->hr_termino, 0, 5) }}"
                    />
                </x-col>

                <x-col size="col-lg-2 col-xl-3 col-md-6">
                    <label><b>Local:</b></label>
                    <x-input-text
                        class=" form-control bg-body-secondary"
                        disabled
                        value="{{ $ata->id_local }}"
                    />
                </x-col>
            </x-row>

            <x-row class="mt-3">
                <x-col size="col-lg-6 col-md-12">
                    <label><b>Facilitador(es):</b></label>
                    <x-input-text
                        class=" form-control bg-body-secondary"
                        disabled
                        value="{{ $ata->nome }}"
                    />
                </x-col>

                <x-col size="col-lg-3 col-md-6">
                    <label><b>Objetivo:</b></label>
                    <div class=" form-control bg-body-secondary border rounded">
                        <input type="checkbox" disabled checked>
                        {{ $ata->id_objetivo }}
                    </div>
                </x-col>

                <x-col class="mt-3">
                    <label><b>Tema:</b></label>
                    <x-input-text
                        class=" form-control bg-body-secondary"
                        disabled
                        value="{{ $ata->nome }}"
                    />
                </x-col>
            </x-row>
        </div>
    </div>
</div>
