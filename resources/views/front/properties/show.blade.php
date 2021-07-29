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
                                <a href="{{ route('home') }}">Accueil</a><span>Infos</span>
                            </div>
                            <h1>Propriété #{{ $property->id }}</h1>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END: slider  -->

    <section class="probootstrap-half">
        <div class="image-wrap">
            <img src="{{ asset('uploads/properties/'.$property->image) }}" class="image img-main" alt="" height="400">
            <div class="row" style="margin-top: 10px;">
                <div class="col-md-12">
                    <a><img class="img-details" src="{{ asset('uploads/properties/'.$property->image) }}" height="100" width="100"></a>
                    @foreach($property->images as $image)
                        <a><img class="img-details" src="{{ asset('uploads/properties/'.$image->path) }}" height="100" width="100"></a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="text">
            <h3 class="mt0 mb20">{{ $property->name }}</h3>
            <p class="mb20 subtitle"><strong><i class="icon-location2"></i></strong>: {{ $property->address }}
            </p>
            <p>{{ $property->description }}</p>

            <div>
                @if($property->operation == 'A Vendre')
                    <span style="background-color: forestgreen;" class="badge badge-success">A Vendre</span>
                @elseif ($property->operation == 'A Louer')
                    <span style="background-color: #ffbc34;" class="badge badge-warning">A Louer</span>
                @endif
            </div>
            <div style="margin-bottom: 20px; color: white;"><span><h2>Prix: {{ $property->price }} FCFA</h2></span></div>
            <div style="margin-bottom: 20px; color: white;"><span><h2>Prix de la visite: {{ $property->prixvisite }} FCFA</h2></span></div>

            <a href="#comments-section" class="btn btn-primary">Ca vous interresse ?</a>
            <a href="#create-visit-section" class="btn btn-info">Demandez à visiter</a>

        </div>
    </section>

    <section class="probootstrap-section probootstrap-section-lighter">
        <div class="container" id="comments-section">
            <div class="row heading">
                <h2 class="mt0 mb40 text-center">Commentaires</h2>
            </div>

            <div class="row">
                @foreach($comments as $comment)
                    <div class="col-md-12 col-lg-12 col-sm-12 mb10">
                        <h4>Par: <strong>{{ $comment->user->name }}</strong>, Le {{ $comment->created_at }}</h4>
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>

            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('front.properties.comment',$property->id) }}" method="post" class="probootstrap-form mb60">
                        @csrf
                        <div class="form-group">
                            <label for="message">Votre Message</label>
                            <textarea cols="30" rows="10" class="form-control" id="message" name="content" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" id="submit" value="Laissez votre commentaire">
                        </div>
                    </form>
                </div>

            </div>

            <div class="row heading" id="create-visit-section">
                <h2 class="mt0 mb40 text-center">Planifier votre visite</h2>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('front.properties.planvisit',$property->id) }}" method="post" class="probootstrap-form mb60">
                        @csrf
                        <div class="form-group">
                            <label for="message">Choisissez le jour et l'heure de la visite</label>
                            <input type="datetime-local" name="datevisite">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" id="submit" value="Valider">
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>

@endsection

@section('myScripts')

    <script>
        $('.img-details').click(function (e) {
            $('.img-main').attr('src', e.target.src);
            console.log(e.target.src);
        })
    </script>

@endsection
