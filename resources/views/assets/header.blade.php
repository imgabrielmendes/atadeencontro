  <div class="container-fluid">
      <a class="navbar-brand me-auto" href="#">logo - hrg</a>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">logo</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                  <li class="nav-item">
                      <a class="nav-link mx-lg-2" aria-current="page" href="/home">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mx-lg-2" href="#">Criar Reunião</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mx-lg-2" href="#">Suas Atividades</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mx-lg-2" href="/historico">Histórico</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mx-lg-2" href="#">Sobre</a>
                  </li>
              </ul>
          </div>
      </div>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

      <a class="login-button" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>

      <button class="navbar-toggler text-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  </div>
