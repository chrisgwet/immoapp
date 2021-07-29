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
                                <a href="{{ route('home') }}">Accueil</a><span>Proprietes</span>
                            </div>
                            <h1>Proprietes</h1>
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
            <div class="row">
                <div class="col-md-12">
                    <h3>Recherche avancée</h3>
                    <form action="{{ route('front.properties.index') }}" method="get" class="probootstrap-form mb60">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Selectionnez la categorie</label>
                                <select class="form-control" name="categorie">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Addresse</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Votre Montant MAX</label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Que voulez vous ?</label>
                                <select class="form-control" name="operation">
                                    <option value="A Louer">Location</option>
                                    <option value="A Vendre">Achat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Lancer la recherche">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @if($properties->count() > 0)
                    @foreach($properties as $property)
                        <div class="col-md-4 col-sm-6">
                            <div class="probootstrap-card probootstrap-listing">
                                <div class="probootstrap-card-media">
                                    <img src="{{ asset('uploads/properties/'.$property->image) }}" class="img-responsive">
                                    <a href="#" class="probootstrap-love"><i class="icon-heart"></i></a>
                                </div>
                                <div class="probootstrap-card-text">
                                    <h2 class="probootstrap-card-heading"><a href="{{ route('front.properties.show',$property->id) }}">{{ $property->name }}</a></h2>
                                    <div class="probootstrap-listing-location">
                                        <i class="icon-location2"></i> <span>{{ $property->address }}</span>
                                    </div>
                                    <div class="probootstrap-listing-category @if($property->operation == 'A Vendre') for-sale @elseif ($property->operation == 'A Louer') for-rent @endif"><span>{{ $property->operation }}</span></div>
                                    <div class="probootstrap-listing-price">
                                        @if($property->operation == 'A Vendre')
                                            <strong>{{ $property->price }} FCFA</strong></div>
                                    @elseif ($property->operation == 'A Louer')
                                        <strong>{{ $property->price }} FCFA/Mois</strong></div>
                                @endif
                            </div>
                            <div class="probootstrap-card-extra">
                                <ul>
                                    <li>
                                        Pieces
                                        <span>{{ $property->rooms }}</span>
                                    </li>
                                    <li>
                                        Chambres
                                        <span>{{ $property->bedrooms }}</span>
                                    </li>
                                    <li>
                                        Douches
                                        <span>{{ $property->bathrooms }}</span>
                                    </li>
                                    <li>
                                        Salons
                                        <span>{{ $property->leavingrooms }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END listing -->
            </div>
            @endforeach

            @else
                <h3>Aucun resultat correspondant à vos critères</h3>
            @endif
            </div>
        </div>
    </section>

@endsection
