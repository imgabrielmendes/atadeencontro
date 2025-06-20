<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Ata de encontro')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.3.0/dist/select2-bootstrap4.min.css" rel="stylesheet" />

    <link href="{{ asset('css/custom/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom/multiselect.css') }}" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/custom/registro-ata.js')
</head>
<body>

    <x-header></x-header>
    <main class="container-fluid mt-5 mb-5">
        @yield('content')
    </main>

    @include('assets/footer')

    <script src="{{ asset('js/custom/registro-ata.js') }}"></script>

</body>
