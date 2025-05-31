<nav class="navbar navbar-expand-lg navbar-light bg-light shadow navbar-border-hrg">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="/home">
            <img src="https://cdn-icons-png.flaticon.com/512/906/906334.png" alt="Central de Serviço" style="width: 60px;">
        </a>

        <!-- Botão para telas pequenas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarCentral" aria-controls="navBarCentral" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links do menu -->
        <div class="collapse navbar-collapse" id="navBarCentral">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/historico">Suas Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/sobre">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="/forum">Fórum</a>
                </li>
            </ul>

            <!-- Dropdown do usuário -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownUserMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUserMenu">
                    <li><a class="dropdown-item" href="/perfil">Perfil</a></li>
                    <li><a class="dropdown-item" href="/historico">Histórico</a></li>
                    <li><a class="dropdown-item" href="/configuracoes">Configurações</a></li>
                    <li><a class="dropdown-item" href="/ajuda">Ajuda</a></li>
                    <li><a class="dropdown-item" href="/sobre">Sobre</a></li>
                    <li><a class="dropdown-item" href="/forum">Fórum</a></li>
                    <li><a class="dropdown-item" href="/contato">Contato</a></li>
                    <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
