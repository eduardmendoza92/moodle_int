<nav class="site-nav mb-5">
         <div class="pb-2 top-bar mb-3">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-lg-9">
                        <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> <span class="d-none d-lg-inline-block">{{ $statusdb}}</span></a>
                        <!-- <a href="#" class="small mr-3"><span class="icon-phone mr-2"></span> <span class="d-none d-lg-inline-block">10 20 123 456</span></a> -->
                        <!-- <a href="#" class="small mr-3"><span class="icon-envelope mr-2"></span> <span class="d-none d-lg-inline-block">info@mydomain.com</span></a> -->
                    </div>

                     <div class="col-6 col-lg-3 text-right">
                        <!-- <a href="login.html" class="small mr-3">
                            <span class="icon-lock"></span>
                            Ingresar
                        </a> -->
                        <a href="/registro" class="small">
                            <span class="icon-person"></span>
                            Registro
                        </a>
                    </div> 

                </div>
            </div>
        </div> 
        <div class="sticky-nav js-sticky-header">
            <div class="container position-relative">
                <div class="site-navigation text-center">
                    <a href="index.html" class="logo menu-absolute m-0">Learner<span class="text-primary">.</span></a>

                    <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
                        <li class="{{ request()->is('home') ? 'active' : '' }}" ><a href="/home">Home</a></li>
                        <!-- <li class="has-children">
                            <a href="#">Dropdown</a>
                            <ul class="dropdown">
                                <li><a href="elements.html">Elements</a></li>
                                <li class="has-children">
                                    <a href="#">Menu Two</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Sub Menu One</a></li>
                                        <li><a href="#">Sub Menu Two</a></li>
                                        <li><a href="#">Sub Menu Three</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Menu Three</a></li>
                            </ul>
                        </li> -->
                        <li class="{{ request()->is('files') ? 'active' : '' }}"><a href="/files">Subir Documentos</a></li>
                        <!--                         <li><a href="news.html">News</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li> -->
                    </ul>

                    <!-- <a href="#" class="btn-book btn btn-secondary btn-sm menu-absolute">Enroll Now</a> -->

                    <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>

                </div>
            </div>
        </div>
    </nav>