<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ata de encontro')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/multiselect.css') }}">
    <link rel="stylesheet" href="https://use.typekit.net/your-project-id.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.x.x/dist/tailwind.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="home">
                <img src="images/Logo Hospital Rio Grande.png" class="logo2" alt="Hospital Rio Grande">
            </a>
            <div class="d-flex align-items-center">
                <div class="dropdown me-2">
                    <button class="entrar-navbar" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <div>{{ Auth::user()->name }} <i class="bi bi-person-fill"></i></div> --}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="profile">Meus dados</a></li>
                        <li><a class="dropdown-item" href="minhasestatisticas">Minhas estatísticas</a></li>
                        {{-- @if (Auth::user()->isAdmin())
                            <li><a class="dropdown-item" href="estatisticas-rh">Estatísticas RH</a></li>
                            <li><a class="dropdown-item" href="aprovacaorh">Aprovação RH</a></li>
                        @endif --}}
                        {{-- <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AjudaModal">Ajuda</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer style="font-weight:normal">
        <div class="text-center">
            <div class="col-11">Copyright © 2024 <a href="http://www.hospitalriogrande.com.br/" target="_blank">Hospital Rio Grande</a>. Todos os direitos reservados. Versão 0.0.1</div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="AjudaModal" tabindex="-1" aria-labelledby="AjudaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header header-avaliacao">
                    <img src="{{ asset('images/Logo Hospital Rio Grande.png') }}" style="width: 35px; margin-right: 15px" alt="Logo">
                    <h1 class="modal-title fs-5" id="AjudaModalLabel">Ajuda</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Seu conteúdo aqui -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Voltar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="{{ asset('js/custom/registrar_ata.js') }}"></script>
    <script src="{{ asset('js/custom/registrarparticipantes.js') }}"></script>
    <script src="{{ asset('js/custom/texto_principal.js') }}"></script>
    
