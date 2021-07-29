@extends('front.app')

@section('front-content')

    <section class="probootstrap-slider flexslider2 page-inner">
        <div class="overlay"></div>
        <div class="probootstrap-wrap-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <div class="page-title probootstrap-animate">
                            <div class="probootstrap-breadcrumbs">
                                <a href="{{ route('home') }}">Accueil</a><span>A Propos</span>
                            </div>
                            <h1>A Propos</h1>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <ul class="slides">
            <li style="background-image: url(front/img/slider_1.jpg);"></li>
            <li style="background-image: url(front/img/slider_4.jpg);"></li>
            <li style="background-image: url(front/img/slider_2.jpg);"></li>
        </ul>
    </section>
    <!-- END: slider  -->

    <section class="probootstrap-section">
        <div class="container">
            <div class="row heading">
                <div class="col-md-12"><h2 class="mt0 mb50 text-center">Notre Entreprise</h2></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>Notre Mission</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                </div>
                <div class="col-md-6">
                    <h2>Notre Vision</h2>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="probootstrap-half">
        <div class="image-wrap">
            <div class="image" style="background-image: url(front/img/slider_2.jpg);"></div>
        </div>
        <div class="text">
            <p class="mb10 subtitle">Plus nous connaitre</p>
            <h3 class="mt0 mb40">Notre Histoire</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb50">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p><a href="#" class="btn btn-primary mb10">Find out more</a></p>
        </div>
    </section>
    <section class="probootstrap-half reverse">
        <div class="image-wrap">
            <div class="image" style="background-image: url(front/img/slider_5.jpg);"></div>
        </div>
        <div class="text">
            <p class="mb10 subtitle">Pourquoi nous choisir ?</p>
            <h3 class="mt0 mb40">Vous aimerez nos services</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb50">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p><a href="#" class="btn btn-primary mb10">Find out more</a></p>
        </div>
    </section>
    <section class="probootstrap-half">
        <div class="image-wrap">
            <div class="image" style="background-image: url(front/img/slider_1.jpg);"></div>
        </div>
        <div class="text">
            <p class="mb10 subtitle">Reussites</p>
            <h3 class="mt0 mb40">Nos succes</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p class="mb50">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p><a href="#" class="btn btn-primary mb10">Find out more</a></p>
        </div>
    </section>

@endsection
