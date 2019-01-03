<nav class="navbar navbar-expand-sm navbar-dark bg-blue fixed-top">
    <div class="container">
        <!-- Logo -->
        <a href="{{route('feed')}}" class="navbar-brand">Mundo do Rabisco</a>

        <!-- Perfil -->
        <a class="rb-perfil-link ml-auto" href="{{route('user', ['username' => Auth::id()])}}">
            <img class="rb-perfil-img mr-2 bg-white" src="{{Storage::url(Auth::user()->img_path)}}" alt="user">
            <span class="rb-perfil-span">{{Auth::user()->name}}</span>
        </a>

        <!-- Icone dropdown -->
        <ul class="ml-3 navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#">
                    <i class="material-icons align-middle">keyboard_arrow_down</i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
