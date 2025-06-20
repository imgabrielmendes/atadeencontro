<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
    <div class="container-fluid">
        {{-- Logo e título --}}
        <a class="navbar-brand d-flex align-items-center gap-2" href="/home">
            <img src="https://cdn-icons-png.flaticon.com/512/906/906334.png" alt="Central de Serviço" width="40" height="40" class="rounded-circle">
            <span class="fw-semibold fs-5">Central de Serviço</span>
        </a>

        {{-- Botão do menu mobile --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu principal --}}
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto me-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('home') ? 'active text-info fw-bold' : '' }}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('historico') ? 'active text-info fw-bold' : '' }}" href="/historico">Suas Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('sobre') ? 'active text-info fw-bold' : '' }}" href="/sobre">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('forum') ? 'active text-info fw-bold' : '' }}" href="/forum">Fórum</a>
                </li>
            </ul>

            {{-- Dropdown de usuário --}}
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center gap-2" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-5"></i> {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="userDropdown">
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
