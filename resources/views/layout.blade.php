<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        @yield('estilos_adicionais')

        <title>Mundo do Rabisco</title>
    </head>
    <body>
        <!-- Navbar da Página -->
        @include('inc.navbar')

        <!-- Conteúdo da Página -->
        <main class="mt-5">
            <section class="container">
                @yield('conteudo')
            </section>
        </main>
    </body>
</html>
