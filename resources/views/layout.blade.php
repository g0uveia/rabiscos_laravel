<!DOCTYPE html>
<head>
    <link rel="stylesheet" href=" {{asset('css/app.css')}} ">
    <title>  - @yield('title') </title>
</head>
<body>
    @include('include.navbar')
    <main>
        <section class="container mt-5">
            @yield('content')
        </section>
    </main>
</body>
