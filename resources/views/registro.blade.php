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
    <title>Registro de Usuario</title>
</head>

<body>

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>



    <nav class="site-nav mb-5">
        <div class="pb-2 top-bar mb-3">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-lg-9">
                        <!-- <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> <span class="d-none d-lg-inline-block">Have a questions?</span></a>
                        <a href="#" class="small mr-3"><span class="icon-phone mr-2"></span> <span class="d-none d-lg-inline-block">10 20 123 456</span></a>
                        <a href="#" class="small mr-3"><span class="icon-envelope mr-2"></span> <span class="d-none d-lg-inline-block">info@mydomain.com</span></a> -->
                    </div>

                    <div class="col-6 col-lg-3 text-right">
                        <a href="/login" class="small mr-3">
                            <span class="icon-lock"></span>
                            Log In
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="sticky-nav js-sticky-header">
            <div class="container position-relative">
                <div class="site-navigation text-center">
                    <a href="/home" class="logo menu-absolute m-0">Learner<span class="text-primary">.</span></a>

                    <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
                        @if (session('authenticated'))
                            <li class="{{ request()->is('home') ? 'active' : '' }}"><a href="/home">Home</a></li>
                            <li><a href="/users">Usuarios</a></li>
                            <li class="active"><a href="/users">Registro</a></li>
                        @endif
                    </ul>

                    <!-- <a href="#" class="btn-book btn btn-secondary btn-sm menu-absolute">Enroll Now</a> -->

                    <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>

                </div>
            </div>
        </div>
    </nav>


    <div class="untree_co-hero inner-page overlay" style="background-image: url('images/img-school-5-min.jpg'); z-index: 1;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12">
                    <div class="row justify-content-center ">
                        <div class="col-lg-6 text-center ">
                            <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Registro</h1>

                        </div>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->

    </div> <!-- /.untree_co-hero -->


    <div class="untree_co-section" style="z-index: 2;">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-5 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ route('registrar.usuario') }}" method="POST" class="form-box" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="col-12 mb-3">
                                <input type="text" name="firstname" class="form-control" placeholder="Nombre" required>
                            </div>

                            <div class="col-12 mb-3">
                                <input type="text" name="lastname" class="form-control" placeholder="Apellido(s)" required>
                            </div>

                            <div class="col-12 mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Dirección Email" required>
                            </div>

                            <div class="col-12 mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="curriculum" class="form-label">Curriculum (PDF, DOC, DOCX)</label>
                                <input type="file" class="form-control" id="curriculum" name="curriculum">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="documentation" class="form-label">Documentación (hasta 4 archivos, PDF, DOC, DOCX, JPG, PNG)</label>
                                <input type="file" class="form-control" id="documentation" name="documentation[]" multiple>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </div>
                    </form>

                    @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="site-footer">


        <div class="container">

            <div class="row">
                <div class="col-lg-3 mr-auto">
                    <div class="widget">
                        <h3>About Us<span class="text-primary">.</span> </h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div> <!-- /.widget -->
                    <div class="widget">
                        <h3>Connect</h3>
                        <ul class="list-unstyled social">
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-pinterest"></span></a></li>
                            <li><a href="#"><span class="icon-dribbble"></span></a></li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-3 -->

                <div class="col-lg-2 ml-auto">
                    <div class="widget">
                        <h3>Projects</h3>
                        <ul class="list-unstyled float-left links">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">jQuery</a></li>
                            <li><a href="#">Bootstrap</a></li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-3 -->

                <div class="col-lg-3">
                    <div class="widget">
                        <h3>Gallery</h3>
                        <ul class="instafeed instagram-gallery list-unstyled">
                            <li><a class="instagram-item" href="images/gal_1.jpg" data-fancybox="gal"><img src="images/gal_1.jpg" alt="" width="72" height="72"></a>
                            </li>
                            <li><a class="instagram-item" href="images/gal_2.jpg" data-fancybox="gal"><img src="images/gal_2.jpg" alt="" width="72" height="72"></a>
                            </li>
                            <li><a class="instagram-item" href="images/gal_3.jpg" data-fancybox="gal"><img src="images/gal_3.jpg" alt="" width="72" height="72"></a>
                            </li>
                            <li><a class="instagram-item" href="images/gal_4.jpg" data-fancybox="gal"><img src="images/gal_4.jpg" alt="" width="72" height="72"></a>
                            </li>
                            <li><a class="instagram-item" href="images/gal_5.jpg" data-fancybox="gal"><img src="images/gal_5.jpg" alt="" width="72" height="72"></a>
                            </li>
                            <li><a class="instagram-item" href="images/gal_6.jpg" data-fancybox="gal"><img src="images/gal_6.jpg" alt="" width="72" height="72"></a>
                            </li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-3 -->


                <div class="col-lg-3">
                    <div class="widget">
                        <h3>Contact</h3>
                        <address>43 Raymouth Rd. Baltemoer, London 3910</address>
                        <ul class="list-unstyled links mb-4">
                            <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                            <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                            <li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
                        </ul>
                    </div> <!-- /.widget -->
                </div> <!-- /.col-lg-3 -->

            </div> <!-- /.row -->

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="copyright">Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });
    </script>
</body>

</html>