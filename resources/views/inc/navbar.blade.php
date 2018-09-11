<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <div class="row w-100">
            <div class="col-2">
                <a href="/" class="navbar-brand">Mundo do Rabisco</a>
            </div>

            <div class="col-5 input-group barra-pesquisa">
                <input type="text" class="form-control" placeholder="Digite para pesquisar">  <!-- barra de pesquisa -->
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary">  <!-- botão de pesquisa -->
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </div>

            <div class="col-2">
                <!--
                <a href="#">
                    <img src="" alt="img">
                    <span>Nome de usuário</span>
                </a>
                -->
            </div>

            <div class="col-2 d-flex align-items-center icones-navbar">     <!-- icones nacbar -->
                <div class="row">
                    <a href="#" class="col-4 d-flex align-items-center"><i class="material-icons">edit</i></a>
                    <a href="#" class="col-4 d-flex align-items-center"><i class="material-icons">notifications</i></a>
                    <a href="#" class="col-4 d-flex align-items-center"><i class="material-icons">person</i></a>
                </div>
            </div>

            <div class="col-1 d-flex align-items-center icones-navbar">
                <a href="#"><i class="material-icons d-flex align-items-center">keyboard_arrow_down</i></a>
            </div>

        </div>
    </div>
</nav>

<style>
    .barra-pesquisa {
        height: 2.5em;
    }
    .icones-navbar a {
        color: #DDD;
    }

</style>
