@extends('layouts.layout')
@section('title', 'Ata de encontro | Home')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="box box-primary">
<main class="container_fluid d-flex justify-content-center align-items-center">
<input type="hidden" id="ata_id" value="{{ $ata->id }}">

<div class="form-group col-xl-9 col-lg-xs-sm-md-12">

    <x-row>
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <x-composite.accordions.accordion-registro :ata="$ata" />
          </div>
    </x-row>  
    
</div>

  <x-row>
    <x-col>

      <x-composite.accordions.accordion-participatesadicionados :participantes="$participantes" 
      :ata="$ata" />

  </x-col>
  </x-row>

</main>
</div>


  @include("components.composite.toast.toast_descricaoadicionada")
  @include("components.composite.toast.toast_deliberacaoatribuida")
  @include("components.composite.toast.toast_deliberacaoexcluida")




@endsection
