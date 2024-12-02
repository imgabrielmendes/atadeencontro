<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ata de encontro')</title>
    
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">

    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('css/custom/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom/multiselect.css') }}">

    {{-- <link rel="stylesheet" href="https://use.typekit.net/your-project-id.css"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.x.x/dist/tailwind.min.css">
</head>
<body>

    @include('assets/header')

    <div class="container-fluid">
    
        <main>
            @yield('content')
        </main>

    </div>

    @include('assets/footer')

    <script src="{{ asset('js\custom\multiselect.js') }}" defer></script>
    <script src="{{ asset('js/custom/dadousu.js') }}" defer></script>
    <script src="{{ asset('js/custom/finalizar_ata.js') }}" defer></script>
    <script src="{{ asset('js/custom/alerts.js') }}" defer></script>
    <script src="{{ asset('js/custom/deliberacoes.js') }}" defer></script>
    <script src="{{ asset('js/custom/registrar_ata.js') }}" defer></script>
    <script src="{{ asset('js/custom/registrarparticipantes.js') }}" defer></script>
    <script src="{{ asset('js/custom/texto_principal.js') }}" defer></script>
    
