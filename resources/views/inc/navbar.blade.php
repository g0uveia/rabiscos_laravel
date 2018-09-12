<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <!-- Logo -->
        <a href="/" class="navbar-brand">Mundo do Rabisco</a>

        <!-- Barra de Pesquisa -->
        <form class="ml-auto rb-barra-pesquisa">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Digite para pesquisar">  <!-- caixa de pesquisa -->
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary">  <!-- botão de pesquisa -->
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Perfil -->
        <a class="rb-perfil-link ml-auto" href="#">
            <img class="rb-perfil-img mr-2" src="{{asset('img/noimage.jpg')}}" alt="user">
            <span class="rb-perfil-span">Nome de usuário</span>
        </a>

        <!-- Icones  -->
        <ul class="navbar-nav ml-5">
            <li class="nav-item mx-1"><a class="nav-link" href="#"><i class="material-icons">notifications</i></a></li>
            <li class="nav-item mx-1"><a class="nav-link" href="#"><i class="material-icons">edit</i></a></li>
            <li class="nav-item mx-1"><a class="nav-link" href="#"><i class="material-icons">person</i></a></li>
        </ul>

        <!-- Icone dropdown -->
        <ul class="ml-3 navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"><i class="material-icons">keyboard_arrow_down</i></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Configurações</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Sair</a>
                </div>
            </li>
        </ul>

    </div>
</nav>

<style>
    .rb-barra-pesquisa {
        width: 30%;
    }
    .rb-barra-pesquisa div {
        height: 2.5em;
    }
    .rb-perfil-link {
        color: #DDD;
    }
    .rb-perfil-link:hover {
        color: #BBB;
        text-decoration: none;
    }
    .rb-perfil-img {
        max-height: 35px;
        border-radius: 50%;
    }


    .dropdown:hover > .dropdown-menu {
        display: block;
    }
    .dropdown-toggle::after {
        display:none;
    }

</style>
