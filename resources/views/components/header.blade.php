<nav class="navbar navbar-expand-lg bg-white shadow-sm border-bottom">
    <div class="container-fluid">
        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/home') }}">
            <img src="https://cdn-icons-png.flaticon.com/512/906/906334.png" alt="Central de Serviço" width="50">
            <span class="fw-bold">Central de Serviço</span>
        </a>

        {{-- Toggle para mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu de navegação --}}
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @php
                    $links = [
                        'Home' => '/home',
                        'Suas Tasks' => '/historico',
                        'Sobre' => '/sobre',
                        'Fórum' => '/forum',
                    ];
                @endphp

                @foreach ($links as $label => $url)
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is(ltrim($url, '/')) ? 'active fw-bold' : '' }}" href="{{ $url }}">{{ $label }}</a>
                    </li>
                @endforeach
            </ul>

            {{-- Usuário logado --}}
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="/perfil">Perfil</a></li>
                    <li><a class="dropdown-item" href="/historico">Histórico</a></li>
                    <li><a class="dropdown-item" href="/configuracoes">Configurações</a></li>
                    <li><a class="dropdown-item" href="/ajuda">Ajuda</a></li>
                    <li><a class="dropdown-item" href="/sobre">Sobre</a></li>
                    <li><a class="dropdown-item" href="/forum">Fórum</a></li>
                    <li><a class="dropdown-item" href="/contato">Contato</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
