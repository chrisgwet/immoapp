<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kajali &mdash; Plateforme de vente et location immobilière</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

    <!--[if lt IE 9]>
    <script src="{{ asset('front/js/vendor/html5shiv.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>

<!-- START: header -->

<div class="probootstrap-loader"></div>

<header role="banner" class="probootstrap-header">
    <div class="container">
        <a href="{{ route('home') }}" class="probootstrap-logo">KAJALI<span>.</span></a>

        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
            <ul class="probootstrap-main-nav">
                <li class="active"><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('front.properties.index') }}">Propriétés</a></li>
                <li><a href="{{ route('agents') }}">Agents</a></li>
                <li><a href="{{ route('about') }}">A propos</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>

                @guest()

                <li><a href="{{ route('login') }}"><strong style="color: #2866AB;">Connexion</strong></a></li>

                @endguest

                @can('dashboard')
                    <li><a href="{{ route('dashboard') }}"><strong style="color: #2866AB;">Administration</strong></a></li>
                @endcan

                @auth()
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <strong style="color: #2866AB;">Mon Compte</strong>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Deconnexion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth

            </ul>
            <div class="extra-text visible-xs">
                <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
                <h5>Address</h5>
                <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                <h5>Connect</h5>
                <ul class="social-buttons">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook2"></i></a></li>
                    <li><a href="#"><i class="icon-instagram2"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- END: header -->

@yield('front-content')

<footer class="probootstrap-footer probootstrap-bg" style="background-image: url(img/slider_3.jpg)">
    <div class="container">
        <div class="row mb60">
            <div class="col-md-3">
                <div class="probootstrap-footer-widget">
                    <h4 class="heading">A Propos de KAJALI.</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                    <p><a href="#">Read more...</a></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="probootstrap-footer-widget probootstrap-link-wrap">
                    <h4 class="heading">Liens Rapides</h4>
                    <ul class="stack-link">
                        <li><a href="#">Les Proprietes</a></li>
                        <li><a href="#">A Louer</a></li>
                        <li><a href="#">A Vendre</a></li>
                        <li><a href="#">Agents</a></li>
                        <li><a href="#">Temoignages</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="probootstrap-footer-widget">
                    <h4 class="heading">Quartiers Populaires</h4>
                    <ul class="stack-link">
                        <li><a href="#">Palmiers <small>(320 properties)</small></a></li>
                        <li><a href="#">PK 10 <small>(294 properties)</small></a></li>
                        <li><a href="#">Bonaberi <small>(300 properties)</small></a></li>
                        <li><a href="#">AKwa <small>(268 properties)</small></a></li>
                        <li><a href="#">Makepe <small>(342 properties)</small></a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row copyright">
            <div class="col-md-6">
                <div class="probootstrap-footer-widget">
                    <p>&copy; 2017 <a href="#">kajali.cm</a>. Developpé par <a href="#">emegalodon.com</a> <br> Photos de <a href="https://pixabay.com/">Pixabay</a> &amp; <a href="https://unsplash.com/">Unsplash</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="probootstrap-footer-widget right">
                    <ul class="probootstrap-footer-social">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-instagram2"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
</div>


<script src="{{ asset('front/js/scripts.min.js') }}"></script>
<script src="{{ asset('front/js/main.min.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>

@yield('myScripts')

</body>
</html>
