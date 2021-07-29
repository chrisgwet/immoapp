@extends('front.app')

@section('front-content')

    <section class="probootstrap-slider flexslider">
        <div class="probootstrap-wrap-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="probootstrap-home-search probootstrap-animate">
                            <form action="{{ route('front.properties.indexforhome') }}" method="get">
                                <h2 class="heading">Trouvez la maison de vos rêves ici</h2>
                                <div class="probootstrap-field-group">
                                    <div class="probootstrap-fields">
                                        <div class="search-field">
                                            <i class="icon-location2"></i>
                                            <input type="text" name="address" class="form-control" required placeholder="Entrer l'adresse">
                                        </div>
                                        <div class="search-category">
                                            <i class="icon-chevron-down"></i>
                                            <select name="operation" id="" class="form-control">
                                                <option value="A Louer">A Louer</option>
                                                <option value="A Vendre">A Vendre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit"><i class="icon-magnifying-glass t2"></i> Lancer la recherche</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <ul class="slides">
            <li style="background-image: url(front/img/slider_1.jpg);" class="overlay"></li>
            <li style="background-image: url(front/img/slider_4.jpg);" class="overlay"></li>
            <li style="background-image: url(front/img/slider_2.jpg);" class="overlay"></li>
        </ul>
    </section>
    <!-- END: slider  -->

    <section class="probootstrap-section probootstrap-section-lighter">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="probootstrap-card text-center probootstrap-animate">
                        <div class="probootstrap-card-media svg-sm colored">
                            <img src="{{ asset('front/img/flaticon/svg/001-prize.svg') }}" class="svg" alt="Free HTML5 Template by uicookies.com">
                        </div>
                        <div class="probootstrap-card-text">
                            <h2 class="probootstrap-card-heading">Entreprise certifiée</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            <p><a href="{{ route('about') }}">Plus d'infos...</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="probootstrap-card text-center probootstrap-animate">
                        <div class="probootstrap-card-media svg-sm colored">
                            <img src="{{ asset('front/img/flaticon/svg/005-new.svg') }}" class="svg" alt="Free HTML5 Template by uicookies.com">
                        </div>
                        <div class="probootstrap-card-text">
                            <h2 class="probootstrap-card-heading">Nouvelles Maisons</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            <p><a href="{{ route('front.properties.index') }}">Plus d'infos...</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="probootstrap-card text-center  probootstrap-animate">
                        <div class="probootstrap-card-media svg-sm colored">
                            <img src="{{ asset('front/img/flaticon/svg/006-coin.svg') }}" class="svg" alt="Free HTML5 Template by uicookies.com">
                        </div>
                        <div class="probootstrap-card-text">
                            <h2 class="probootstrap-card-heading">Maisons Luxieuses</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            <p><a href="{{ route('front.properties.index') }}">Plus d'infos...</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: section -->

    <section class="probootstrap-section">
        <div class="container">
            <div class="row heading">
                <h2 class="mt0 mb50 text-center">Des propriétés variées</h2>
            </div>
            <div class="row probootstrap-gutter10">
                <div class="col-md-6 col-sm-6">
                    <a class="probootstrap-hover-overlay">
                        <img src="{{ asset('front/img/slider_2.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                        <div class="probootstrap-text-overlay">
                            <h3>Maisons</h3>
                            <p>{{ $nbreMaisons }} Properties</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <a class="probootstrap-hover-overlay">
                        <img src="{{ asset('front/img/slider_1.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                        <div class="probootstrap-text-overlay">
                            <h3>Villas</h3>
                            <p>{{ $nbreVillas }} Properties</p>
                        </div>
                    </a>
                </div>
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-4 col-sm-6">
                    <a class="probootstrap-hover-overlay">
                        <img src="{{ asset('front/img/slider_3.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                        <div class="probootstrap-text-overlay">
                            <h3>Studios</h3>
                            <p>{{ $nbreStudios }} Properties</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a class="probootstrap-hover-overlay">
                        <img src="{{ asset('front/img/slider_4.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                        <div class="probootstrap-text-overlay">
                            <h3>Appartements</h3>
                            <p>0 Properties</p>
                        </div>
                    </a>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-md-4 col-sm-6">
                    <a class="probootstrap-hover-overlay">
                        <img src="{{ asset('front/img/slider_2.jpg') }}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                        <div class="probootstrap-text-overlay">
                            <h3>Chambres</h3>
                            <p>{{ $nbreChambres }} Properties</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- END: section -->

    <section class="probootstrap-section probootstrap-bg" style="background-image: url(front/img/slider_2.jpg);">
        <div class="container text-center probootstrap-animate" data-animate-effect="fadeIn">
            <h2 class="heading">Meilleures maisons &amp; Proprietes</h2>
            <p class="sub-heading">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <p><a href="{{ route('front.properties.index') }}" class="btn btn-primary mb10">Plus d'infos</a></p>
        </div>
    </section>
    <!-- END: section -->

    <section class="probootstrap-section probootstrap-section-lighter">
        <div class="container">
            <div class="row heading">
                <h2 class="mt0 mb50 text-center">Mis en avant </h2>
            </div>
            <div class="row">
                @foreach($featuredProperties as $featured)

                    <div class="col-md-4 col-sm-6">
                        <div class="probootstrap-card probootstrap-listing">
                            <div class="probootstrap-card-media">
                                <img src="{{ asset('uploads/properties/'.$featured->image) }}" class="img-responsive">
                                <a href="#" class="probootstrap-love"><i class="icon-heart"></i></a>
                            </div>
                            <div class="probootstrap-card-text">
                                <h2 class="probootstrap-card-heading"><a href="{{ route('front.properties.show',$featured->id) }}">{{ $featured->name }}</a></h2>
                                <div class="probootstrap-listing-location">
                                    <i class="icon-location2"></i> <span>{{ $featured->address }}</span>
                                </div>
                                <div class="probootstrap-listing-category @if($featured->operation == 'A Vendre') for-sale @elseif ($featured->operation == 'A Louer') for-rent @endif"><span>@if($featured->operation == 'A Vendre') A Vendre @elseif ($featured->operation == 'A Louer') A Louer @endif</span></div>
                                <div class="probootstrap-listing-price">
                                    @if($featured->operation == 'A Vendre')
                                        <strong>{{ $featured->price }}</strong> FCFA</div>
                                    @elseif ($featured->operation == 'A Louer')
                                    <strong>{{ $featured->price }}</strong> FCFA/Mois</div>
                                    @endif
                            </div>
                            <div class="probootstrap-card-extra">
                                <ul>
                                    <li>
                                        Pieces
                                        <span>{{ $featured->rooms }}</span>
                                    </li>
                                    <li>
                                        Chambres
                                        <span>{{ $featured->bedrooms }}</span>
                                    </li>
                                    <li>
                                        Douches
                                        <span>{{ $featured->bathrooms }}</span>
                                    </li>
                                    <li>
                                        Salons
                                        <span>{{ $featured->leavingrooms }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END listing -->
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

    <section class="probootstrap-section">
        <div class="container">
            <div class="row heading">
                <h2 class="mt0 mb50 text-center">Nos Services</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
                    <div class="service text-center">
                        <div class="icon"><i class="icon-list2"></i></div>
                        <h2 class="heading">Catalogues des proprietes</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
                    <div class="service text-center">
                        <div class="icon"><i class="icon-power-cord"></i></div>
                        <h2 class="heading">Gestion des proprietes</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
                    <div class="service text-center">
                        <div class="icon"><i class="icon-price-tag2"></i></div>
                        <h2 class="heading">Location</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="clearfix visible-lg-block visible-md-block"></div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
                    <div class="service text-center">
                        <div class="icon"><i class="icon-direction"></i></div>
                        <h2 class="heading">Vente</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="clearfix visible-sm-block"></div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
                    <div class="service text-center">
                        <div class="icon"><i class="icon-clock"></i></div>
                        <h2 class="heading">Planification des visites</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
                    <div class="service text-center">
                        <div class="icon"><i class="icon-magnifying-glass"></i></div>
                        <h2 class="heading">Recherche detaillee</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="clearfix visible-lg-block visible-md-block"></div>
            </div>
        </div>
    </section>

    <!-- END: section -->

    <section class="probootstrap-section probootstrap-section-lighter">
        <div class="container">
            <div class="row heading">
                <h2 class="mt0 mb50 text-center">Nos Agents</h2>
            </div>
            <div class="row">
                @if($agents != null)
                    @foreach($agents as $agent)
                        <div class="col-md-3">
                            <div class="probootstrap-card probootstrap-person text-left">
                                <div class="probootstrap-card-media">
                                    <img src="{{ asset('uploads/users/'.$agent->avatar) }}" class="img-responsive" alt="Free HTML5 Template by uicookies.com">
                                </div>
                                <div class="probootstrap-card-text">
                                    <h2 class="probootstrap-card-heading mb0">{{ $agent->name }}</h2>
                                    <p><small>Agent KAJALI</small></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
