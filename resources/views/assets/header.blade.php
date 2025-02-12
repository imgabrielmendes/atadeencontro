    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-border-hrg shadow">
          <div class="container-fluid">
              <a class="navbar-brand" href=""><img src="https://cdn-icons-png.flaticon.com/512/906/906334.png" alt="Central de Serviço" style="width: 70px"></a>

                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarCentral" aria-controls="navBarCentral" aria-expanded="false" aria-label="Toggle navigation" href="/home">
                      <span class="navbar-toggler-icon"></span>
                  </button>
    

    <div class="collapse navbar-collapse" id="navBarCentral">
        <a class="nav-link active px-4" aria-current="page" href="/home">Home</a>
        <a class="nav-link active px-4" href="/historico">Suas tasks</a>
        <a class="nav-link active px-4" href="/historico">Sobre</a>
        <a class="nav-link active px-4" href="/historico">Forum</a>
    </div>
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="/perfil">Perfil</a></li>
            <li><a class="dropdown-item" href="/historico">Histórico</a></li>
            <li><a class="dropdown-item" href="/historico">Configurações</a></li>
            <li><a class="dropdown-item" href="/historico">Ajuda</a></li>
            <li><a class="dropdown-item" href="/historico">Sobre</a></li>
            <li><a class="dropdown-item" href="/historico">Forum</a></li>
            <li><a class="dropdown-item" href="/historico">Contato</a></li>
            <li><a class="dropdown-item" href="/historico">Sair</a></li>
        </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- <li><a class="dropdown-item" href="#"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
    </li> -->
  </div>
</nav>
