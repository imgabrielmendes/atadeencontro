<div class="row">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        @php
            $facilitadores = [];
        @endphp
        
        @foreach ($atas as $ata)
            @php
                $facilitadores[] = $ata->nome;
            @endphp
        @endforeach

        @if (!empty($ata))
    <div class="accordion-item shadow">
        <h2 class="accordion-header">
            <button class="accordion-button shadow-sm text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panel-{{ $ata->id }}" aria-expanded="true" aria-controls="panel-{{ $ata->id }}" style="background-color: #001f3f;">
                <i class="fa-solid fa-circle-info p-1 mb-1"></i><h5>Informações de Registro</h5>
            </button>
        </h2>

        <div id="panel-{{ $ata->id }}" class="accordion-collapse collapse">
            <div class="accordion-body" style="background-color: rgba(240, 240, 240, 0.41);">
                <div class="row">
                    <div class="col-sm-12 col-xl-3  col-md-6">
                        <label><b>Data*:</b></label>
                        <ul class="mt-2 form-control bg-body-secondary">{{ $ata->data_solicitada_formatada ?? 'Não informada' }}</ul>
                    </div>

                    <div class="col-sm-12 col-xl-3  col-md-6">
                        <label><b>Horário de Início*:</b></label>
                        <ul class="mt-2 form-control bg-body-secondary">{{ substr($ata->hora_inicial, 0, 5) }}</ul>
                    </div>

                    <div class="col-sm-12 col-xl-3  col-md-6">
                        <label><b>Horário de Término:</b></label>
                        <ul class="mt-2 form-control bg-body-secondary">{{ substr($ata->hora_termino, 0, 5) }}</ul>
                    </div>

                    <div class="col-lg-2  col-xl-3 col-md-6">
                        <label><b>Local:</b></label>
                        <ul class="mt-2 form-control bg-body-secondary border rounded">{{ $ata->local }}</ul>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="facilitadorcol col-lg-6 col-lg-md-12 col-md-12">
                        <label><b>Facilitador(es):</b></label>
                        <ul class="mt-2 form-control bg-body-secondary">{{ $ata->nome }}</ul>
                    </div>

                    <div class="col-lg-3 col-lg-md-12 col-md-6">
                        <label><b>Objetivo:</b></label>
                        <ul class="mt-2 form-control bg-body-secondary border rounded">
                            <input type="checkbox" disabled checked> {{ $ata->objetivo }}
                        </ul>
                    </div>

                    <div class="col mt-3">
                        <b>Tema:</b> 
                        <ul class="mt-2 mb-2 form-control bg-body-secondary">{{ $ata->tema }}</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
