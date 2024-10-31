@extends('layouts.layout')
@section('title', 'Ata de encontro | Home')
@section('content')

<!--PRIMEIRA LINHA DO FORMULÁRIO DA ATA---------------->
<div class="box box-primary">
<main class="container_fluid d-flex justify-content-center align-items-center">
<div class="form-group col-xl-9 col-lg-xs-sm-md-12">
  <div class="row"> 
@include('assets.accordions.informacoesderegistro')
    
<div class="accordion" id="accordionPanelsStayOpenExample">

<div class="accordion-item shadow">

<div class="row">
<div class="col-lg-6  col-lg-md-12 col-md-12">

</div>
</div>
</div>
</div>

{{-- ACCORDION dos participantes adicionados --}}
@include('assets.accordions.accparticipante_adicionados')
    
</div>     
</div>
</div>
</div>

</div>

{{-- ACCORDION da caixa do texto principal --}}
@include("assets.accordions.acctexto_principal")

{{-- ACCORDION da caixa de deliberações --}}
@include("assets.accordions.accdeliberacoes")

{{-- Toast de notificação --}}
@include("assets.toast.toast_descricaoadicionada")
@include("assets.toast.toast_deliberacaoatribuida")
@include("assets.toast.toast_deliberacaoexcluida")

</form>
  
</main>

</div>

@endsection
