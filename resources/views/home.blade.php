@extends('layouts.layout')
@section('title', 'Ata de encontro | Home')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container_fluid d-flex justify-content-center align-items-center">
  <div class="form-group col-8 mt-5">
    <div class="row">

      {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <li><a class="dropdown-item" href="#"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
    </li> --}}

      <div class="position-relative top-0 start-50 translate-middle-x m-4">
        <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
          <div class="progress-bar" style="width: 50%"></div>
        </div>
        <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 1rem; height:1rem;"></button>
        <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 1rem; height:1rem;"></button>
        <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 1rem; height:1rem;"></button>
        <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 1rem; height:1rem;"></button>
        <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 1rem; height:1rem;"></button>
      </div>

      <div class="col-md-12 text-center mb-4 m-3 p-2">
        <p class="fs-1"><b> Formulário de Solicitação </b></p>
      </div>

      <div class="col-xl-2 col-lg-xl-2 col-md-6">
        <label><b>Data*</b></label>
        <input id="datainicio" class="mt-2 mb-2 form-control" placeholder="dd-mm-aaaa" type="date">
      </div>

      <div class="col-xl-2 col-lg-xl-3 col-md-6">
        <label for="nomeMedico"><b>Horário de Início*:</b></label>
        <input class="mt-2 mb-2 form-control" type="time" id="horainicio" name="appt" max="18:00">
      </div>
      
      <div class="col-xl-2 col-lg-xl-3 col-md-6">
        <label for="form-control"> <b> Horário de Término:</b> </label>
        <input class="mt-2 mb-2 form-control" type="time" id="horaterm" name="appt" min="13:00" max="12:00">
      </div>

      <div class="col-xl-5">
      <label for="form-control"> <b> Local:</b> </label>
        <select class="form-control mt-2 mb-2" id="pegarlocal">
          <option value="" disabled selected> Informe o Local </option>
          @foreach($locais as $local)
            <option value="{{$local->id}}">{{$local->nome}}</option>
          @endforeach 
        </select>
      </div>
      
    </div>
    <div class="row ">
      <div class="col mt-1" id="objetivo">
        <label for="form-control"> <b>Objetivo:</b> </label>
      </div>
      <div class="row">
        <div class="col-xl-2 col-lg-xl-4 col-md-4 mt-2">
          <label class="form-control">
            <input type="radio" class="objetivo" name="objetivo" value="Reunião"> Reunião
          </label>
        </div>
        <div class="col-xl-2 col-lg-xl-2 col-md-3 mt-2">
          <label class="form-control">
            <input type="radio" class="objetivo" name="objetivo" value="Treinamento"> Treinamento
          </label>
        </div>
        <div class="col-xl-2 col-lg-xl-4 col-md-4 mt-2">
          <label class="form-control">
            <input type="radio" class="objetivo" name="objetivo" value="Consulta"> Consulta
          </label>
        </div>
      </div>
      <div class="row">
        <div class="col mt-3"> <label for="form-control"> <b> Facilitador(res) responsável*:</b> </label> 
        </div>
        <div class="row">

            @include("multiselect")

        </div>
        <div class="col mt-2"><b>Tema*:</b>
          <input id="temaprincipal" class="mt-2 form-control" type="text" />
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <div class="btn-atas p-4">
              <button id="botaoregistrar" type="button" class="mt-2 col-md-5 col-sm-12 col-lg-4 btn btn-success">salvar</button>
              <button id="botaoregistraarr" type="button" class="mt-2 col-md-5 col-sm-12 col-lg-7 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modaldeemail">Cadastre-se</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <script src="{{ asset('js\custom\multiselect.js') }}" defer></script> --}}
@endsection
