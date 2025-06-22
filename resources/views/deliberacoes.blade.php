@extends('layouts.layout')
@section('title', 'Ata de encontro | Home')
@section('content')

<!--PRIMEIRA LINHA DO FORMULÁRIO DA ATA---------------->
<div class="box box-primary">
<main class="container_fluid d-flex justify-content-center align-items-center">
<div class="form-group col-xl-9 col-lg-xs-sm-md-12">
  <div class="row"> 


@include('components.composite.accordions.informacoesderegistro')
    
<div class="accordion" id="accordionPanelsStayOpenExample">

<div class="accordion-item shadow">

<div class="row">
<div class="col-lg-6  col-lg-md-12 col-md-12">

</div>
</div>
</div>
</div>

@include('components.composite.accordions.accparticipante_adicionados')
    
</div>     
</div>
</div>
</div>

</div>

<!-- /**
 *
 * @file resources/views/accordions.acctexto_principal.blade.php
 */ -->
@include("components.composite.accordions.acctexto_principal")

<!-- /**
 * @file resources/views/deliberacoes.blade.php
 */ -->
@include("components.composite.accordions.accdeliberacoes")

<!-- /**
* Toast de notificação
* @file resources/views/components.composite/toast/toast_descricaoadicionada.blade.php
*/ -->
@include("components.composite.toast.toast_descricaoadicionada")
@include("components.composite.toast.toast_deliberacaoatribuida")
@include("components.composite.toast.toast_deliberacaoexcluida")

</form>
  
</main>

</div>

@endsection
