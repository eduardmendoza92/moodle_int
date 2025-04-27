<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link href="https://fonts.googleapis.com/css2?family=Display+Playfair:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='40' fill='%23007bff'/><text x='50%' y='55%' font-size='40' text-anchor='middle' fill='white' font-family='Arial' dy='.3em'>L</text></svg>">
    <style>
        .untree_co-hero.inner-page,
        .untree_co-hero.inner-page>.container>.row,
        .bg-img.inner-page,
        .bg-img.inner-page>.container>.row {
            height: 10vh !important;
            min-height: 125px !important;
        }
    </style>
    <title>@yield('title')</title>
</head>

<body>

    @include('layouts.header') <!-- Incluir el header -->

    <div class="untree_co-hero inner-page overlay" style="background-image: url('images/img-school-5-min.jpg'); z-index: 1;">
        <div class="container">
        </div> <!-- /.container -->

    </div> <!-- /.untree_co-hero -->


    <div class="untree_co-section" style="z-index: 2;">
        <div class="container">
            @yield('content')
        </div> <!-- /.container -->

    </div> <!-- /.untree_co-hero -->


    <!-- Incluir footer -->
    @include('layouts.footer')
</body>

</html>