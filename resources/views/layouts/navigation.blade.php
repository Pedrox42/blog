<nav class="navbar navbar-expand-lg navbar-dark">
  <button class="navbar-toggler float-left" type="button" id="navbar-button" onclick="toggleClasses()">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="float-left ml-3">
    <a class="ml-4 school-logo" id="school-logo" href="#"><img src="{{ asset('img/colegio.png')}}" alt="Logo do Colégio" width="100" height="100"></a>
  </div>
  <div class="text-white navbar-title col-sm-12 ml-5 text-center">
    <h1>Colégio de Aplicação João XXIII/UFJF</h1>
    <h5>1º ano do Ensino Médio</h5>
  </div>
</nav>
<nav class="navbar-dark">
  <div class="">
    <div class="sidebar" id="sidebar">
      <ul class="navbar-nav sidebar-links">
        <li class="nav-item {{ Route::is('post.index') || Route::is('post.show') ? 'active' : '' }}">
          <a class="nav-link mb-3 mt-5" href="{{ route('post.index') }}" id="materials"><i class="fas fa-book"></i></a>
        </li>
        <li class="nav-item {{ Route::is('user.show', 'user.edit') ? 'active' : '' }}">
          <a class="nav-link mb-3" href="{{ route('user.show', Auth::user()->id) }}" id="profile"><i class="fas fa-user"></i></a>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link" id="logout" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"><i class="fas fa-power-off"></i></a>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>