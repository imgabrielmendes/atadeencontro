@extends('layouts.layout')

@section('title', 'Ata de encontro | Home')

@section('content')

<x-select 
    id="selectLocal" 
    label="Local" 
    placeholder="Escolha o local desejado"
    :options="$locais->map(fn($l) => ['value' => $l->id, 'label' => $l->nome])"
/>

<x-select 
    id="selectUsuario" 
    label="Usuário" 
    placeholder="Escolha o usuário desejado"
    :options="$usuarios->map(fn($u) => ['value' => $u->id, 'label' => $u->name])"
/>



@endsection
