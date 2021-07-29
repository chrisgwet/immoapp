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
                                <a href="{{ route('home') }}">Accueil</a><span>Agents</span>
                            </div>
                            <h1>Agents</h1>
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

    <section class="probootstrap-section probootstrap-section-lighter">
        <div class="container">
            <div class="row heading">
                <h2 class="mt0 mb50 text-center">Nos Agents</h2>
            </div>
            <div class="row">
                @foreach($usersOfRole as $agent)
                    <div class="col-md-3 col-sm-6">
                        <div class="probootstrap-card probootstrap-person text-left">
                            <div class="probootstrap-card-media">
                                <img src="{{ asset('uploads/users/'.$agent->avatar) }}" class="img-responsive" alt="Free HTML5 Template by uicookies.com">
                            </div>
                            <div class="probootstrap-card-text">
                                <h2 class="probootstrap-card-heading mb0">{{ $agent->name }}</h2>
                                <p><small>Agent Kajali</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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

@endsection
