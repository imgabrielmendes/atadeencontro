@extends('layouts.layout')
@section('title', 'Ata de encontro | Home')
@section('content')

<form id="form-ata">
    <x-row>

        <x-col size="4">
            <x-input-text
                id="input-titulo-ata"
                name="input-titulo-ata"
                label="Título da Ata"
                required
                autofocus
            />
        </x-col>

        <x-col size="4">
            <x-datetime-picker 
                id="date-select-inicio-ata"
                label="Data e hora de início"
                name="date-select-inicio-ata"
                :required="true"
            />
        </x-col>

        <x-col size="2">
            <x-input-text 
                id="input-tempoestimado-ata"
                class="form-control" 
                type="number" 
                name="input-tempoestimado-ata" 
                :value="old('tempo')" 
                required 
                autocomplete="tempo" 
                label="Tempo estimado (horas)"
            />
        </x-col>
    </x-row>

    <x-row>
        <x-col size="4">
            <x-select 
                id="select-setor-ata"
                name="select-setor-ata" 
                label="Selecione o Setor da reunião" 
                placeholder="Escolha o setor"
                :options="$setores->map(fn($l) => ['value' => $l->id, 'label' => $l->nome])"
            />
        </x-col>

        <x-col size="4">
            <x-select 
                id="select-local-ata" 
                name="localAta"
                label="Selecione a sala da reunião" 
                placeholder="Escolha a sala"
                :options="$locais->map(fn($l) => ['value' => $l->id, 'label' => $l->nome])"
            />
        </x-col>

        <x-col size="4">
            <x-select 
                id="select-objetivo-ata" 
                name="select-objetivo-ata"
                label="Selecione o objetivo da reunião" 
                placeholder="Escolha a sala"
                :options="$locais->map(fn($l) => ['value' => $l->id, 'label' => $l->nome])"
            />
        </x-col>
    </x-row>

    <x-row>
        <x-col size="6">
            <x-select 
                id="select-participante-ata" 
                label="Informe os participantes" 
                name="usuarios[]"
                :options="$usuarios->map(fn($u) => ['value' => $u->id, 'label' => $u->name])"
                :multiple="true"
            />
        </x-col>
    </x-row>

    <x-row>
        <x-col size="12">
            <x-input-textarea
                id="input-descricao-ata"
                name="descricao"
                label="Descrição da reunião"
                placeholder="Digite aqui os detalhes da ata"
            />
        </x-col>
    </x-row>

    <x-row class="mt-4">
        <x-col size="12">
            <x-button 
                id="btn-iniciarAta" 
            type="button" 
                color="success" 
            icon="fas fa-check">
                Salvar
            </x-button>
        </x-col>
    </x-row>
</form>

@endsection
